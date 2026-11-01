<?php

namespace App\Http\Controllers\Dokter;

use App\Http\Controllers\Controller;
use App\Models\DaftarPoli;
use App\Models\Periksa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

// Ubah class PeriksaController menjadi PeriksaPasienController
class PeriksaPasienController extends Controller
{
    // Halaman Periksa Pasien (Daftar antrian pasien)
   public function index()
    {
        $daftarPolis = DaftarPoli::with(['pasien', 'jadwal'])->get();
        // Sesuaikan dengan folder 'Dokter' dan 'periksa-pasien'
        return view('Dokter.periksa-pasien.index', compact('daftarPolis'));
    }

   // Halaman Riwayat Pasien
    public function riwayat()
    {
        // Ubah variabel menjadi $riwayatPasien agar cocok dengan view
        $riwayatPasien = Periksa::with(['daftarPoli.pasien', 'detailPeriksa.obat'])->get();
        
        return view('Dokter.riwayat-pasien.index', compact('riwayatPasien'));
    }

    public function edit($id)
{
    $daftarPoli = DaftarPoli::with(['pasien', 'jadwal.poli'])->findOrFail($id);
    
    // Ambil data obat jika diperlukan untuk form resep
    $obats = \App\Models\Obat::all(); 

    return view('dokter.periksa-pasien.edit', compact('daftarPoli', 'obats'));
}

    // Simpan Pemeriksaan
    public function store(Request $request, $id)
    {
        $request->validate([
            'catatan' => 'required|string',
            'biaya_periksa' => 'required|numeric',
        ]);

        Periksa::create([
            'id_daftar_poli' => $id,
            'tgl_periksa' => now(),
            'catatan' => $request->catatan,
            'biaya_periksa' => $request->biaya_periksa,
        ]);

        return redirect()->route('dokter.periksa-pasien.index')->with('success', 'Pemeriksaan berhasil disimpan!');
    }

    public function update(Request $request, $id)
{
    $request->validate([
        'catatan' => 'required|string',
        'biaya_periksa' => 'required|numeric',
    ]);

    // Simpan atau update data pemeriksaan ke database (sesuaikan dengan model Periksa Anda)
    // Contoh:
    // \App\Models\Periksa::updateOrCreate(
    //     ['id_daftar_poli' => $id],
    //     [
    //         'tgl_periksa' => now(),
    //         'catatan' => $request->catatan,
    //         'biaya_periksa' => $request->biaya_periksa,
    //     ]
    // );

    return redirect()->route('dokter.periksa-pasien.index')->with('success', 'Pemeriksaan pasien berhasil disimpan!');
}
}