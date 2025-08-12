<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Persepsi extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function mesin()
{
    return $this->belongsTo(Mesin::class, 'type', 'id'); 
    // 'type' = kolom foreign key di persepsis, 'id' = primary key di mesins
}
}
