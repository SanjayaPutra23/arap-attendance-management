<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kehadiran extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function pesertas()
    {
        return $this->belongsTo('App\Models\Peserta','peserta_id', 'id');
    }
    public function rapat()
    {
        return $this->belongsTo('App\Models\Presensi','presensi_id', 'id');
    }
}
