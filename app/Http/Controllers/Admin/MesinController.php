<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreMesinRequest;
use App\Http\Requests\Admin\UpdateMesinRequest;
use App\Http\Requests\Admin\UploadUsbLogRequest;
use App\Models\Mesin;
use App\Models\Pool;
use App\Services\MachineSyncService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class MesinController extends Controller
{
    public function __construct(
        protected MachineSyncService $syncService
    ) {}

    /**
     * Tampilkan halaman kelola mesin fingerprint & status tarik data.
     */
    public function index(): View
    {
        $machines = Mesin::withCount('pools')
            ->orderBy('id')
            ->get();

        $stats = [
            'total' => $machines->count(),
            'ip_count' => $machines->where('tipe', 'ip')->count(),
            'usb_count' => $machines->where('tipe', 'usb')->count(),
            'total_pools' => Pool::count(),
            'last_sync_overall' => Pool::max('timestamp'),
        ];

        return view('admin.mesin.index', [
            'machines' => $machines,
            'stats' => $stats,
        ]);
    }

    /**
     * Simpan konfigurasi mesin fingerprint baru.
     */
    public function store(StoreMesinRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        $mesin = Mesin::create([
            'name' => $validated['name'],
            'tipe' => $validated['tipe'],
            'ip' => $validated['tipe'] === 'ip' ? $validated['ip'] : null,
            'port' => $validated['tipe'] === 'ip' ? (string) ($validated['port'] ?? '4370') : null,
            'grup' => $validated['grup'] ?? 6,
            'maker_id' => auth()->id() ?? 1,
        ]);

        return redirect()->route('admin.mesin.index')
            ->with('success', "Mesin '{$mesin->name}' berhasil ditambahkan ke sistem.");
    }

    /**
     * Perbarui konfigurasi mesin fingerprint.
     */
    public function update(UpdateMesinRequest $request, Mesin $mesin): RedirectResponse
    {
        $validated = $request->validated();

        // Gunakan update via DB query builder berdasar ID untuk keamanan primary key komposit legacy
        DB::table('mesins')->where('id', $mesin->id)->update([
            'name' => $validated['name'],
            'tipe' => $validated['tipe'],
            'ip' => $validated['tipe'] === 'ip' ? $validated['ip'] : null,
            'port' => $validated['tipe'] === 'ip' ? (string) ($validated['port'] ?? '4370') : null,
            'grup' => $validated['grup'] ?? ($mesin->grup ?? 6),
            'updated_at' => now(),
        ]);

        return redirect()->route('admin.mesin.index')
            ->with('success', "Konfigurasi mesin '{$validated['name']}' berhasil diperbarui.");
    }

    /**
     * Hapus perangkat mesin fingerprint secara aman (Non-Destruktif).
     */
    public function destroy(Mesin $mesin): RedirectResponse
    {
        // Proteksi Non-Destruktif: Larang penghapusan jika mesin memiliki log presensi di pools
        $poolCount = Pool::where('mesin_id', $mesin->id)->count();
        if ($poolCount > 0) {
            return redirect()->route('admin.mesin.index')
                ->with('error', "Mesin '{$mesin->name}' tidak dapat dihapus karena memiliki riwayat {$poolCount} log presensi fingerprint di sistem.");
        }

        DB::table('mesins')->where('id', $mesin->id)->delete();

        return redirect()->route('admin.mesin.index')
            ->with('success', "Mesin '{$mesin->name}' berhasil dihapus dari sistem.");
    }

    /**
     * Periksa konektivitas jaringan ke mesin fingerprint via UDP.
     */
    public function checkConnection(Request $request, Mesin $mesin): JsonResponse|RedirectResponse
    {
        $result = $this->syncService->checkConnection($mesin);

        if ($request->expectsJson() || $request->ajax()) {
            return response()->json($result);
        }

        return redirect()->route('admin.mesin.index')
            ->with($result['connected'] ? 'success' : 'error', $result['message']);
    }

    /**
     * Sinkronkan data presensi dari satu mesin IP tertentu.
     */
    public function sync(Request $request, Mesin $mesin): JsonResponse|RedirectResponse
    {
        $force = $request->boolean('force');
        $result = $this->syncService->syncMachine($mesin, $force);

        if ($request->expectsJson() || $request->ajax()) {
            return response()->json($result);
        }

        return redirect()->route('admin.mesin.index')
            ->with($result['success'] ? 'success' : 'error', $result['message']);
    }

    /**
     * Sinkronkan seluruh mesin presensi bertipe IP secara massal.
     */
    public function syncAll(Request $request): JsonResponse|RedirectResponse
    {
        $force = $request->boolean('force');
        $result = $this->syncService->syncAllIpMachines($force);

        $msg = "Sinkronisasi selesai: {$result['success_count']} mesin berhasil, {$result['fail_count']} mesin gagal. Total {$result['total_inserted']} log baru ditambahkan, {$result['total_skipped']} log lama dilewati.";

        if ($request->expectsJson() || $request->ajax()) {
            return response()->json(array_merge($result, ['message' => $msg]));
        }

        return redirect()->route('admin.mesin.index')
            ->with($result['fail_count'] === 0 ? 'success' : 'warning', $msg);
    }

    /**
     * Unggah berkas log presensi offline ekspor flashdisk USB (.dat).
     */
    public function uploadUsb(UploadUsbLogRequest $request, Mesin $mesin): RedirectResponse
    {
        $file = $request->file('filedata');
        if (! $file) {
            return redirect()->route('admin.mesin.index')
                ->with('error', 'Berkas .dat tidak ditemukan.');
        }

        $result = $this->syncService->importUsbDatFile($mesin, $file);

        return redirect()->route('admin.mesin.index')
            ->with($result['success'] ? 'success' : 'error', $result['message']);
    }
}
