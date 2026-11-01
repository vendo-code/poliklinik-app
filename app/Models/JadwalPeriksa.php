<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Dokter; // <-- Tambahkan baris ini
use App\Models\Poli;   // <-- Pastikan ini juga ada

class JadwalPeriksa extends Model
{
    protected $table = 'jadwal_periksa';

    protected $fillable = [
        'id_dokter',
        'hari',
        'jam_mulai',
        'jam_selesai',
        'aktif'
    ];

    public function poli()
    {
        return $this->belongsTo(Poli::class, 'id_poli');
    }

    public function dokter()
{
    return $this->belongsTo(Dokter::class, 'id_dokter', 'id');
}

    public function daftarPoli()
    {
        return $this->hasMany(DaftarPoli::class, 'id_jadwal');
    }
}