<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use App\Models\DetailAbsen;
use App\Models\Peserta;
use App\Models\Setting;
use Barryvdh\DomPDF\Facade\Pdf as PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserPresensiController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Menampilkan daftar periode presensi milik relawan yang sedang login
     */
    public function index()
    {
        $user = Auth::user();
        $peserta = $user->peserta ?? Peserta::where('nik', $user->nik)->first();

        if (!$peserta) {
            return view('page.user.no_profile', [
                'user' => $user
            ]);
        }

        $settings = Setting::pluck('value', 'name');

        // Ambil daftar detail presensi milik relawan ini (server-side filter by uid)
        $detailList = DetailAbsen::with('absensi')
            ->where('id_peserta', $peserta->uid)
            ->orderBy('id', 'desc')
            ->paginate(12);

        // Hitung statistik singkat untuk setiap periode
        $jabatanKey = strtolower($peserta->jabatan ?? 'persiapan');
        if ($jabatanKey === 'scurity') $jabatanKey = 'security';
        if ($jabatanKey === 'cs') $jabatanKey = 'kebersihan';

        $btsd = $settings['jam_datang_' . $jabatanKey] ?? $settings['jam_datang_persiapan'] ?? '08:00:00';
        $btsp = $settings['jam_pulang_' . $jabatanKey] ?? $settings['jam_pulang_persiapan'] ?? '17:00:00';

        return view('page.user.presensi', [
            'peserta' => $peserta,
            'detailList' => $detailList,
            'settings' => $settings,
            'btsd' => $btsd,
            'btsp' => $btsp,
        ]);
    }

    /**
     * Menampilkan rincian presensi untuk 1 periode tertentu
     * Server-side ownership: wajib mencocokkan id_peserta = peserta->uid
     */
    public function show($id)
    {
        $user = Auth::user();
        $peserta = $user->peserta ?? Peserta::where('nik', $user->nik)->first();

        if (!$peserta) {
            abort(403, 'Profil relawan Anda belum terhubung.');
        }

        $dataUser = DetailAbsen::where('id', $id)
            ->where('id_peserta', $peserta->uid)
            ->first();

        if (!$dataUser) {
            abort(404, 'Data presensi tidak ditemukan atau Anda tidak memiliki izin untuk melihat data ini.');
        }

        $absen = Absensi::find($dataUser->id_absen);
        $settings = Setting::pluck('value', 'name');

        return view('page.detailUser', [
            "list" => $dataUser,
            "absen" => $absen,
            "peserta" => $peserta,
            "settings" => $settings,
        ]);
    }

    /**
     * Mengunduh file PDF rincian presensi milik relawan yang login
     * Server-side ownership: wajib mencocokkan id_peserta = peserta->uid
     */
    public function downloadPdf($id)
    {
        $user = Auth::user();
        $peserta = $user->peserta ?? Peserta::where('nik', $user->nik)->first();

        if (!$peserta) {
            abort(403, 'Profil relawan Anda belum terhubung.');
        }

        $dataUser = DetailAbsen::where('id', $id)
            ->where('id_peserta', $peserta->uid)
            ->first();

        if (!$dataUser) {
            abort(404, 'Data presensi tidak ditemukan atau Anda tidak memiliki izin untuk mengunduh berkas ini.');
        }

        $absen = Absensi::find($dataUser->id_absen);
        $settings = Setting::pluck('value', 'name');
        $parts = explode("-", $dataUser->data_peserta);
        $rawNama = $peserta ? $peserta->name : ($parts[0] ?? 'relawan');
        $namaBersih = preg_replace('/[^A-Za-z0-9_\-]/', '_', trim($rawNama));
        $nama = $namaBersih . "_" . ($absen->type ?? 'absen') . "_" . ($absen->bln ?? '') . "_" . ($absen->thn ?? '');

        $pdf = PDF::loadview('pdf.detail_user_pdf', [
            "list" => $dataUser,
            "absen" => $absen,
            "peserta" => $peserta,
            "settings" => $settings
        ]);

        return $pdf->download('detail_' . $nama . '.pdf');
    }
}
