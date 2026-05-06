<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Penilaian extends Model
{
    use HasFactory;

    protected $fillable = [
        'karya_id',
        'juri_id',
        'kreativitas',
        'keindahan',
        'keunikan',
        'total',
    ];
}