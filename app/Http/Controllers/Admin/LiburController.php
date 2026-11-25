<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreLiburRequest;
use App\Http\Requests\Admin\UpdateLiburRequest;
use App\Models\Libur;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\View\View;
use Throwable;

class LiburController extends Controller
{
    /**
     * Tampilkan daftar hari libur nasional.
     */
    public function index(Request $request): View
    {
        $currentYear = Carbon::now('Asia/Jakarta')->year;
        $selectedYear = $request->input('year');
        $search = $request->input('search');

        // Dapatkan daftar tahun unik dari database + rentang wajar (tahun ini - 2 s.d. tahun ini + 2)
        $dbYears = Libur::query()
            ->selectRaw('SUBSTRING(tanggal, 1, 4) as y')
            ->distinct()
            ->pluck('y')
            ->filter()
            ->map(fn ($val) => (int) $val)
            ->toArray();

        $fallbackYears = [
            $currentYear - 2,
            $currentYear - 1,
            $currentYear,
            $currentYear + 1,
            $currentYear + 2,
        ];

        $availableYears = array_values(array_unique(array_merge($dbYears, $fallbackYears)));
        rsort($availableYears);

        $query = Libur::query();

        if ($selectedYear && $selectedYear !== 'all') {
            $query->where('tanggal', 'like', $selectedYear.'-%');
        }

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('ket', 'like', '%'.$search.'%')
                    ->orWhere('tanggal', 'like', '%'.$search.'%');
            });
        }

        $liburs = $query->orderBy('tanggal', 'desc')->paginate(15)->withQueryString();

        return view('admin.libur.index', [
            'liburs' => $liburs,
            'selectedYear' => $selectedYear,
            'search' => $search,
            'availableYears' => $availableYears,
            'currentYear' => $currentYear,
        ]);
    }

    /**
     * Simpan hari libur nasional baru.
     */
    public function store(StoreLiburRequest $request): RedirectResponse
    {
        Libur::create($request->validated());

        return redirect()->route('admin.libur.index', ['year' => substr($request->validated('tanggal'), 0, 4)])
            ->with('success', 'Hari libur nasional berhasil ditambahkan.');
    }

    /**
     * Perbarui data hari libur nasional.
     */
    public function update(UpdateLiburRequest $request, Libur $libur): RedirectResponse
    {
        $libur->update($request->validated());

        return redirect()->back()->with('success', 'Hari libur nasional berhasil diperbarui.');
    }

    /**
     * Hapus hari libur nasional.
     */
    public function destroy(Libur $libur): RedirectResponse
    {
        $libur->delete();

        return redirect()->back()->with('success', 'Hari libur nasional berhasil dihapus.');
    }

    /**
     * Sinkronkan hari libur nasional dari API publik Indonesia.
     */
    public function syncApi(Request $request): RedirectResponse
    {
        $request->validate([
            'target_year' => ['required', 'integer', 'min:2020', 'max:2035'],
        ]);

        $year = (int) $request->input('target_year');

        try {
            $response = Http::timeout(5)->get("https://dayoffapi.vercel.app/api?year={$year}");

            if (! $response->successful()) {
                // Coba fallback URL alternatif jika diperlukan
                $response = Http::timeout(5)->get("https://api-harilibur.vercel.app/api?year={$year}");
            }

            if (! $response->successful()) {
                return redirect()->back()->with('error', "Gagal mengambil data dari API hari libur (HTTP {$response->status()}). Silakan coba beberapa saat lagi atau input secara manual.");
            }

            $holidays = $response->json();
            if (! is_array($holidays)) {
                return redirect()->back()->with('error', 'Format data hari libur dari API tidak valid.');
            }

            $addedCount = 0;
            $skippedCount = 0;

            foreach ($holidays as $holiday) {
                // Support berbagai format response payload publik
                $rawDate = $holiday['tanggal'] ?? $holiday['holiday_date'] ?? $holiday['date'] ?? null;
                $rawKet = $holiday['keterangan'] ?? $holiday['holiday_name'] ?? $holiday['name'] ?? null;
                $isCuti = (bool) ($holiday['is_cuti'] ?? false);

                if ($rawDate && $rawKet) {
                    $dateStr = Carbon::parse($rawDate)->toDateString();
                    $ket = $isCuti && ! str_contains(strtolower($rawKet), 'cuti') ? "Cuti Bersama: {$rawKet}" : $rawKet;

                    $existing = Libur::where('tanggal', $dateStr)->first();
                    if (! $existing) {
                        Libur::create([
                            'tanggal' => $dateStr,
                            'ket' => substr($ket, 0, 255),
                        ]);
                        $addedCount++;
                    } else {
                        $skippedCount++;
                    }
                }
            }

            return redirect()->route('admin.libur.index', ['year' => $year])
                ->with('success', "Sinkronisasi libur tahun {$year} selesai. {$addedCount} hari libur baru berhasil ditambahkan ({$skippedCount} sudah ada sebelumnya).");
        } catch (Throwable $e) {
            Log::warning('Gagal sinkronisasi API hari libur: '.$e->getMessage());

            return redirect()->back()->with('error', 'Tidak dapat terhubung ke server API libur nasional (timeout/offline). Silakan periksa koneksi internet server atau input hari libur secara manual.');
        }
    }
}
