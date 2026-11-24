<?php

namespace App\Http\Controllers;

use App\Models\PermohonanIzin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;

class IzinAttachmentController extends Controller
{
    /**
     * Unduh atau buka lampiran surat izin/dokter secara privat dan terotorisasi (Anti-IDOR).
     */
    public function show(Request $request, PermohonanIzin $permohonanIzin): Response
    {
        $user = $request->user();

        // Anti-IDOR: Hanya pemilik izin atau staf berwenang yang dapat melihat berkas
        $isOwner = $user && $user->id === $permohonanIzin->user_id;
        $isStaff = Gate::allows('staff-access');

        if (! $isOwner && ! $isStaff) {
            abort(403, 'Akses ditolak: Anda tidak memiliki wewenang untuk melihat lampiran surat ini.');
        }

        if (! $permohonanIzin->surat_dokter) {
            abort(404, 'Lampiran surat tidak ditemukan.');
        }

        $disk = Storage::disk('izin_attachments');

        if (! $disk->exists($permohonanIzin->surat_dokter)) {
            abort(404, 'Berkas fisik lampiran tidak ditemukan pada server.');
        }

        $mimeType = $disk->mimeType($permohonanIzin->surat_dokter) ?? 'application/octet-stream';

        return response()->stream(
            function () use ($disk, $permohonanIzin) {
                $stream = $disk->readStream($permohonanIzin->surat_dokter);
                if ($stream) {
                    fpassthru($stream);
                    fclose($stream);
                }
            },
            200,
            [
                'Content-Type' => $mimeType,
                'Content-Disposition' => 'inline; filename="'.basename($permohonanIzin->surat_dokter).'"',
                'Cache-Control' => 'private, no-cache, no-store, must-revalidate',
            ]
        );
    }
}
