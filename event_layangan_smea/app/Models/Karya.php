<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Karya extends Model
{
    use HasFactory;

    // nama tabel (opsional, Laravel sudah otomatis)
    protected $table = 'karyas';

    // field yang boleh diisi
    protected $fillable = [
        'user_id',
        'judul',
        'file',
    ];

    /**
     * Relasi ke user (peserta)
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Relasi ke penilaian
     */
    public function penilaian()
    {
        return $this->hasMany(Penilaian::class);
    }
}