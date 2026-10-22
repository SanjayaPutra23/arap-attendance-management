<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailAbsen extends Model
{
    use HasFactory;

    public function peserta()
    {
        return $this->belongsTo(Peserta::class, 'id_peserta', 'uid');
    }

    public function absensi()
    {
        return $this->belongsTo(Absensi::class, 'id_absen');
    }
}
