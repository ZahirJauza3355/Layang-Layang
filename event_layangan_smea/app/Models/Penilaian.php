<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Penilaian extends Model
{
    protected $fillable = [
        'karya_id',
        'juri_id',      // ← pakai juri_id bukan user_id
        'kreativitas',
        'keindahan',
        'keunikan',
        'total',
    ];

    public function karya()
    {
        return $this->belongsTo(Karya::class);
    }

    public function juri()
    {
        return $this->belongsTo(User::class, 'juri_id');
    }
}