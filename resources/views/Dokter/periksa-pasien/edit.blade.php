@extends('components.layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <h2 class="text-2xl font-bold mb-4">Periksa Pasien</h2>

    <form action="{{ route('dokter.periksa-pasien.update', $daftarPoli->id) }}" method="POST">
        @csrf
        @method('PUT')

        <!-- Nama Pasien -->
        <div class="mb-4">
            <label class="font-semibold block mb-1">Nama Pasien</label>
            <input type="text" value="{{ $daftarPoli->pasien?->name ?? '-' }}" class="w-full border-2 rounded-lg p-2 bg-gray-100" disabled>
        </div>

        <!-- Keluhan -->
        <div class="mb-4">
            <label class="font-semibold block mb-1">Keluhan</label>
            <textarea class="w-full border-2 rounded-lg p-2 bg-gray-100" rows="2" disabled>{{ $daftarPoli->keluhan }}</textarea>
        </div>

        <!-- Catatan / Pemeriksaan -->
        <div class="mb-4">
            <label class="font-semibold block mb-1">Catatan / Pemeriksaan</label>
            <textarea name="catatan" class="w-full border-2 rounded-lg p-2" rows="3" placeholder="Masukkan catatan pemeriksaan..." required></textarea>
        </div>

        <!-- Biaya Periksa -->
        <div class="mb-4">
            <label class="font-semibold block mb-1">Biaya Periksa</label>
            <input type="number" name="biaya_periksa" value="150000" class="w-full border-2 rounded-lg p-2" required>
        </div>

        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">Simpan Pemeriksaan</button>
    </form>
</div>
@endsection