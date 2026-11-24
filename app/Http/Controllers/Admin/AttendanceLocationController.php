<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreAttendanceLocationRequest;
use App\Http\Requests\Admin\UpdateAttendanceLocationRequest;
use App\Models\AttendanceLocation;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class AttendanceLocationController extends Controller
{
    /**
     * Tampilkan daftar seluruh lokasi geofence SPPG.
     */
    public function index(): View
    {
        $locations = AttendanceLocation::orderByDesc('is_active')
            ->orderBy('name')
            ->get();

        $activeLocation = $locations->firstWhere('is_active', true) ?? $locations->first();

        return view('admin.settings.locations', [
            'locations' => $locations,
            'activeLocation' => $activeLocation,
        ]);
    }

    /**
     * Simpan titik lokasi geofence baru ke database.
     */
    public function store(StoreAttendanceLocationRequest $request): RedirectResponse
    {
        $data = $request->validated();
        $isActive = (bool) ($data['is_active'] ?? false);

        // Jika lokasi ini diatur aktif, nonaktifkan lokasi aktif lain agar tetap ada 1 sentral utama
        if ($isActive) {
            AttendanceLocation::where('is_active', true)->update(['is_active' => false]);
        } else {
            // Jika belum ada lokasi aktif sama sekali, paksa lokasi pertama ini menjadi aktif
            $hasActive = AttendanceLocation::where('is_active', true)->exists();
            if (! $hasActive) {
                $isActive = true;
            }
        }

        $data['is_active'] = $isActive;
        AttendanceLocation::create($data);

        return redirect()->route('admin.settings.locations.index')
            ->with('success', 'Titik lokasi geofence baru berhasil ditambahkan.');
    }

    /**
     * Perbarui data titik lokasi geofence yang ada.
     */
    public function update(UpdateAttendanceLocationRequest $request, AttendanceLocation $location): RedirectResponse
    {
        $data = $request->validated();
        $isActive = (bool) ($data['is_active'] ?? false);

        // Proteksi: Larang menonaktifkan jika lokasi ini satu-satunya yang aktif
        if ($location->is_active && ! $isActive) {
            $otherActiveCount = AttendanceLocation::where('is_active', true)
                ->where('id', '!=', $location->id)
                ->count();

            if ($otherActiveCount === 0) {
                return back()->withInput()->with('error', 'Gagal menonaktifkan lokasi: Setidaknya harus ada minimal 1 lokasi sentral geofence aktif.');
            }
        }

        if ($isActive) {
            AttendanceLocation::where('id', '!=', $location->id)->update(['is_active' => false]);
        }

        $data['is_active'] = $isActive;
        $location->update($data);

        return redirect()->route('admin.settings.locations.index')
            ->with('success', "Pengaturan lokasi '{$location->name}' berhasil diperbarui.");
    }

    /**
     * Toggle status aktif / nonaktif lokasi dengan proteksi minimal 1 lokasi aktif.
     */
    public function toggleActive(AttendanceLocation $location): RedirectResponse
    {
        if ($location->is_active) {
            $otherActiveCount = AttendanceLocation::where('is_active', true)
                ->where('id', '!=', $location->id)
                ->count();

            if ($otherActiveCount === 0) {
                return back()->with('error', 'Tidak dapat menonaktifkan lokasi ini karena merupakan satu-satunya lokasi geofence yang aktif.');
            }

            $location->update(['is_active' => false]);
            $msg = "Lokasi '{$location->name}' telah dinonaktifkan.";
        } else {
            // Aktifkan lokasi ini dan nonaktifkan lokasi lain
            AttendanceLocation::where('id', '!=', $location->id)->update(['is_active' => false]);
            $location->update(['is_active' => true]);
            $msg = "Lokasi '{$location->name}' telah diaktifkan sebagai titik sentral utama geofence.";
        }

        return redirect()->route('admin.settings.locations.index')->with('success', $msg);
    }
}
