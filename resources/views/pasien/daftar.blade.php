@extends('components.layouts.app')

@section('content')
<!-- Memaksa Konten Ini Menggunakan Flexbox Berjejer ke Samping jika Layout Utama Gagal -->
<div style="display: flex; flex-direction: column; width: 100%; max-width: 1200px; margin: 0 auto; padding: 20px;">
    
    <h2 class="text-2xl font-bold mb-6 text-gray-800">Pendaftaran Poli</h2>

    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <!-- Form Pendaftaran -->
    <div class="bg-white p-6 rounded-xl shadow-md mb-8">
        <form action="{{ route('pasien.daftar-poli.store') }}" method="POST">
            @csrf
            
            <!-- Nomor Rekam Medis -->
            <div class="mb-4">
                <label class="font-semibold block mb-1 text-gray-700">Nomor Rekam Medis</label>
                <input type="text" value="{{ Auth::user()->no_rm ?? '202610-001' }}" class="w-full border border-gray-300 rounded-lg p-2.5 bg-gray-100" disabled>
            </div>

            <!-- Pilih Poli -->
            <div class="mb-4">
                <label class="font-semibold block mb-1 text-gray-700">Pilih Poli</label>
                <select name="id_poli" id="poliSelect" class="w-full border border-gray-300 rounded-lg p-2.5 bg-white" required>
                    <option value="">-- Pilih Poli --</option>
                    @foreach($polis as $poli)
                        <option value="{{ $poli->id }}">{{ $poli->nama_poli }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Pilih Jadwal Periksa -->
            <div class="mb-4">
                <label class="font-semibold block mb-1 text-gray-700">Pilih Jadwal Periksa</label>
                <select name="id_jadwal" id="jadwalSelect" class="w-full border border-gray-300 rounded-lg p-2.5 bg-white" required>
                    <option value="">-- Pilih Jadwal --</option>
                    @foreach($jadwals as $jadwal)
                        <option value="{{ $jadwal->id }}">
                            {{ $jadwal->hari }} | {{ $jadwal->jam_mulai }} - {{ $jadwal->jam_selesai }} | Dr. {{ $jadwal->dokter?->name ?? '-' }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Keluhan -->
            <div class="mb-4">
                <label class="font-semibold block mb-1 text-gray-700">Keluhan</label>
                <textarea name="keluhan" class="w-full border border-gray-300 rounded-lg p-2.5" rows="3" placeholder="Tuliskan keluhan Anda..." required></textarea>
            </div>

            <button type="submit" class="bg-blue-600 text-white px-5 py-2.5 rounded-lg font-semibold hover:bg-blue-700 transition">Daftar</button>
        </form>
    </div>

    <!-- Tabel Riwayat Pendaftaran -->
    <div class="bg-white p-6 rounded-xl shadow-md">
        <h3 class="text-xl font-bold mb-4 text-gray-800">Riwayat Pendaftaran Poli</h3>
        <div class="overflow-x-auto">
            <table class="w-full border-collapse border border-gray-200 text-left">
                <thead>
                    <tr class="bg-gray-100 text-gray-700">
                        <th class="border border-gray-200 p-3 text-center">No</th>
                        <th class="border border-gray-200 p-3">Poli</th>
                        <th class="border border-gray-200 p-3">Dokter</th>
                        <th class="border border-gray-200 p-3">Hari / Jam</th>
                        <th class="border border-gray-200 p-3 text-center">Antrean</th>
                        <th class="border border-gray-200 p-3 text-center">Status</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($daftarPolis as $index => $dp)
                    <tr>
                        <td class="border border-gray-200 p-3 text-center">{{ $index + 1 }}</td>
                        <td class="border border-gray-200 p-3">{{ $dp->jadwal?->poli?->nama_poli ?? '-' }}</td>
                        <td class="border border-gray-200 p-3">{{ $dp->jadwal?->dokter?->name ?? '-' }}</td>
                        <td class="border border-gray-200 p-3">{{ $dp->jadwal?->hari }} ({{ $dp->jadwal?->jam_mulai }} - {{ $dp->jadwal?->jam_selesai }})</td>
                        <td class="border border-gray-200 p-3 text-center font-bold text-blue-600">{{ $dp->no_antrian }}</td>
                        <td class="border border-gray-200 p-3 text-center">
                            <span class="px-2 py-1 rounded text-sm bg-yellow-100 text-yellow-800 font-medium">Menunggu</span>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center p-4 text-gray-500">Belum ada riwayat pendaftaran poli.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</div>
@endsection