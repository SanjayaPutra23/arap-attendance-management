<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\PermohonanIzin;
use App\Models\Peserta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UserIzinController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Menampilkan daftar riwayat pengajuan izin/sakit milik relawan yang login
     */
    public function index(Request $request)
    {
        $user = Auth::user();
        $peserta = $user->peserta ?? Peserta::where('nik', $user->nik)->first();

        $query = PermohonanIzin::where('user_id', $user->id);

        if ($request->filled('status') && in_array($request->status, ['menunggu', 'disetujui', 'ditolak'])) {
            $query->where('status', $request->status);
        }

        if ($request->filled('jenis') && in_array($request->jenis, ['izin', 'sakit'])) {
            $query->where('jenis', $request->jenis);
        }

        $izins = $query->orderBy('id', 'desc')->paginate(10);

        $counts = [
            'total' => PermohonanIzin::where('user_id', $user->id)->count(),
            'menunggu' => PermohonanIzin::where('user_id', $user->id)->where('status', 'menunggu')->count(),
            'disetujui' => PermohonanIzin::where('user_id', $user->id)->where('status', 'disetujui')->count(),
            'ditolak' => PermohonanIzin::where('user_id', $user->id)->where('status', 'ditolak')->count(),
        ];

        return view('page.user.izin.index', compact('user', 'peserta', 'izins', 'counts'));
    }

    /**
     * Menampilkan formulir pengajuan izin/sakit
     */
    public function create()
    {
        $user = Auth::user();
        $peserta = $user->peserta ?? Peserta::where('nik', $user->nik)->first();

        return view('page.user.izin.create', compact('user', 'peserta'));
    }

    /**
     * Menyimpan permohonan izin/sakit baru
     */
    public function store(Request $request)
    {
        $user = Auth::user();
        $peserta = $user->peserta ?? Peserta::where('nik', $user->nik)->first();

        $validated = $request->validate([
            'jenis' => 'required|in:izin,sakit',
            'tgl_mulai' => 'required|date',
            'tgl_selesai' => 'required|date|after_or_equal:tgl_mulai',
            'alasan' => 'required|string|min:5|max:1000',
            'surat_dokter' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
        ], [
            'jenis.required' => 'Pilih jenis pengajuan (Izin atau Sakit).',
            'tgl_mulai.required' => 'Tanggal mulai harus diisi.',
            'tgl_selesai.required' => 'Tanggal selesai harus diisi.',
            'tgl_selesai.after_or_equal' => 'Tanggal selesai harus sama atau setelah tanggal mulai.',
            'alasan.required' => 'Alasan / keterangan wajib diisi.',
            'alasan.min' => 'Alasan minimal terdiri dari 5 karakter.',
            'surat_dokter.file' => 'Bukti surat dokter harus berupa berkas file.',
            'surat_dokter.mimes' => 'Format file surat dokter harus PDF, JPG, JPEG, atau PNG.',
            'surat_dokter.max' => 'Ukuran berkas surat dokter tidak boleh melebihi 2MB.',
        ]);

        $filePath = null;
        if ($request->hasFile('surat_dokter')) {
            $file = $request->file('surat_dokter');
            $filename = 'surat_' . $user->id . '_' . time() . '.' . $file->getClientOriginalExtension();
            $filePath = $file->storeAs('surat_dokter', $filename, 'public');
        }

        PermohonanIzin::create([
            'user_id' => $user->id,
            'peserta_id' => $peserta ? $peserta->id : null,
            'jenis' => $validated['jenis'],
            'tgl_mulai' => $validated['tgl_mulai'],
            'tgl_selesai' => $validated['tgl_selesai'],
            'alasan' => $validated['alasan'],
            'surat_dokter' => $filePath,
            'status' => 'menunggu',
        ]);

        return redirect()->route('user.izin.index')->with('success', 'Permohonan ' . ucfirst($validated['jenis']) . ' berhasil diajukan dan sedang menunggu persetujuan Admin.');
    }

    /**
     * Menampilkan detail permohonan izin/sakit
     */
    public function show($id)
    {
        $user = Auth::user();
        $izin = PermohonanIzin::with(['user', 'peserta', 'approver'])->findOrFail($id);

        // Isolasi ketat: Hanya pemilik yang dapat melihat
        if ($izin->user_id !== $user->id) {
            abort(403, 'Akses Ditolak: Anda hanya dapat melihat permohonan milik Anda sendiri.');
        }

        return view('page.user.izin.show', compact('user', 'izin'));
    }

    /**
     * Unduh surat dokter dengan proteksi akses
     */
    public function downloadSurat($id)
    {
        $user = Auth::user();
        $izin = PermohonanIzin::findOrFail($id);

        if ($izin->user_id !== $user->id) {
            abort(403, 'Akses Ditolak: Anda tidak memiliki izin untuk mengunduh berkas ini.');
        }

        if (!$izin->surat_dokter || !Storage::disk('public')->exists($izin->surat_dokter)) {
            abort(404, 'Berkas surat dokter tidak ditemukan.');
        }

        return Storage::disk('public')->download($izin->surat_dokter);
    }
}
