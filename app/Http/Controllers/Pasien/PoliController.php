<?php

namespace App\Http\Controllers\Pasien;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Poli;
use App\Models\JadwalPeriksa;
use App\Models\DaftarPoli;

class PoliController extends Controller
{
    // Halaman utama pasien / dashboard
    public function dashboard()
    {
        return view('pasien.dashboard');
    }

    // Menampilkan halaman pendaftaran poli beserta daftar riwayat pendaftarannya
    public function index()
    {
        $polis = Poli::all();
        $jadwals = JadwalPeriksa::with('dokter')->where('aktif', 'Y')->get();
        
        $daftarPolis = DaftarPoli::where('id_pasien', Auth::id())
            ->with(['jadwal.poli', 'jadwal.dokter'])
            ->get();
            
        return view('pasien.daftar', compact('polis', 'jadwals', 'daftarPolis'));
    }

    // Memproses penyimpanan data saat tombol "Daftar" diklik
    public function store(Request $request)
{
    $request->validate([
        'id_jadwal' => 'required|exists:jadwal_periksa,id',
        'keluhan' => 'required|string',
    ]);

    $noAntrian = DaftarPoli::where('id_jadwal', $request->id_jadwal)->count() + 1;

    DaftarPoli::create([
        'id_pasien' => Auth::id(),
        'id_jadwal' => $request->id_jadwal,
        'keluhan' => $request->keluhan,
        'no_antrian' => $noAntrian,
        // Hapus baris 'status' karena kolomnya belum ada di database
    ]);

    return redirect()->route('pasien.daftar-poli.index')->with('success', 'Berhasil mendaftar poli!');
}
}