<?php

namespace App\Http\Controllers\Dokter;

use App\Http\Controllers\Controller;
use App\Models\JadwalPeriksa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JadwalPeriksaController extends Controller
{
   public function index()
{
    // Ambil semua data jadwal periksa (atau sesuaikan dengan dokter yang sedang login)
    $jadwals = \App\Models\JadwalPeriksa::all();

    // Kirim variabel $jadwals ke view index
    return view('Dokter.jadwal-periksa.index', compact('jadwals'));
}
    public function create(){
        return view('dokter.jadwal-periksa.create');
    }

    public function store(Request $request){
        $request->validate([
            'hari' => 'required',
            'jam_mulai' => 'required',
            'jam_selesai' => 'required'
        ]);

        JadwalPeriksa::create([
            'id_dokter' => Auth::id(),
            'hari' => $request->hari,
            'jam_mulai' => $request->jam_mulai,
            'jam_selesai' => $request->jam_selesai
        ]);
return redirect()->route('dokter.jadwal-periksa.index')
                 ->with('success', 'Jadwal periksa berhasil ditambahkan!');
    }

    public function edit($id){
        $jadwalPeriksa = JadwalPeriksa::findOrFail($id);
        return view('dokter.jadwal-periksa.edit', compact('jadwalPeriksa'));
    }

  public function update(Request $request, $id)
{
    $request->validate([
        'hari' => 'required',
        'jam_mulai' => 'required',
        'jam_selesai' => 'required',
        'aktif' => 'required|in:Y,N',
    ]);

    $jadwal = JadwalPeriksa::findOrFail($id);
    
    // Pastikan field 'aktif' disertakan saat mengupdate data
    $jadwal->update([
        'hari' => $request->hari,
        'jam_mulai' => $request->jam_mulai,
        'jam_selesai' => $request->jam_selesai,
        'aktif' => $request->aktif, 
    ]);

    return redirect()->route('dokter.jadwal-periksa.index')
                     ->with('success', 'Berhasil Melakukan Update Data');
}

    public function destroy(string $id){
        $jadwalPeriksa = JadwalPeriksa::findOrFail($id);
        $jadwalPeriksa->delete();

        return redirect()->route('dokter.jadwal-periksa.index')
                 ->with('success', 'Berhasil Melakukan Hapus Data');
    }
}
