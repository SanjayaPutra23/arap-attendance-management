<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peserta extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->hasOne(User::class, 'peserta_id');
    }

    public function detailAbsens()
    {
        return $this->hasMany(DetailAbsen::class, 'id_peserta', 'uid');
    }

    public function getDivisiFormattedAttribute()
    {
        return formatDivisi($this->jabatan);
    }
}
