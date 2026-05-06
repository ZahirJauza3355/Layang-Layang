<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * Field yang boleh diisi
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'is_approved',
    ];

    /**
     * Field yang disembunyikan
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Casting tipe data
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
        'is_approved' => 'boolean',
    ];

    /**
     * Default value
     */
    protected $attributes = [
        'role' => 'peserta',
        'is_approved' => false,
    ];

    /**
     * Relasi ke karya (peserta punya banyak karya)
     */
    public function karya()
    {
        return $this->hasMany(Karya::class);
    }

    /**
     * Relasi sebagai juri (menilai banyak karya)
     */
    public function penilaian()
    {
        return $this->hasMany(Penilaian::class, 'juri_id');
    }
}