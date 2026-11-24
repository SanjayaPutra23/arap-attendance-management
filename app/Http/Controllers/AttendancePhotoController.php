<?php

namespace App\Http\Controllers;

use App\Models\AttendancePhoto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\StreamedResponse;

class AttendancePhotoController extends Controller
{
    /**
     * Sajikan file foto selfie presensi dari private storage dengan otorisasi ketat.
     */
    public function show(Request $request, AttendancePhoto $attendancePhoto): StreamedResponse
    {
        $user = $request->user();

        // 1. Verifikasi Otorisasi (Cegah IDOR):
        // Diizinkan jika user adalah pemilik foto ATAU memiliki hak akses staf/admin (Gate 'staff-access')
        $isOwner = false;
        if ($user && $user->peserta_id && $attendancePhoto->mobileAttendance) {
            $isOwner = ((int) $attendancePhoto->mobileAttendance->peserta_id === (int) $user->peserta_id);
        }

        $isStaff = Gate::allows('staff-access');

        if (! $isOwner && ! $isStaff) {
            abort(403, 'Akses ditolak. Anda tidak memiliki izin untuk melihat foto presensi ini.');
        }

        // 2. Cek eksistensi berkas pada private disk
        $disk = Storage::disk($attendancePhoto->disk);
        if (! $disk->exists($attendancePhoto->path)) {
            abort(404, 'Berkas foto presensi tidak ditemukan pada media penyimpanan.');
        }

        // 3. Sajikan file secara streamed dengan header privat
        return $disk->response(
            $attendancePhoto->path,
            basename($attendancePhoto->path),
            [
                'Cache-Control' => 'private, max-age=3600',
                'Content-Type' => $attendancePhoto->mime_type ?? 'image/jpeg',
            ]
        );
    }
}
