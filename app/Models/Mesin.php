<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mesin extends Model
{
    use HasFactory;
    protected $guarded = [];
    
     public function groupOption()
    {
        // kolom foreign key 'grup' mengarah ke options.id
        return $this->belongsTo(Option::class, 'grup', 'id');
    }
}
