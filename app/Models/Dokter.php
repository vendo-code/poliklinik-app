<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dokter extends Model
{
    // Arahkan ke tabel 'users' karena data dokter disimpan di sana
    protected $table = 'users';

    protected $fillable = [
        'name',
        'email',
        'password',
        'alamat',
        'no_hp',
        'role',
        'id_poli'
    ];

    // Otomatis membatasi hanya mengambil user yang rolenya 'dokter'
    protected static function booted()
    {
        static::addGlobalScope('dokter', function ($builder) {
            $builder->where('role', 'dokter');
        });
    }

    public function poli()
    {
        return $this->belongsTo(Poli::class, 'id_poli');
    }

    public function jadwalPeriksa()
    {
        return $this->hasMany(JadwalPeriksa::class, 'id_dokter');
    }
}