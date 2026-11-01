@extends('components.layouts.app', ['title' => 'Periksa Pasien'])

@section('content')
<div class="container mx-auto px-4 py-6">
    <h2 class="text-2xl font-bold text-slate-800 mb-6">Daftar Pasien yang Perlu Diperiksa</h2>

    <div class="card bg-white shadow-md rounded-2xl p-6 border border-slate-200">
        <table class="table table-zebra w-full">
            <thead>
                <tr class="bg-slate-100 text-slate-600">
                    <th>No. Antrian</th>
                    <th>Nama Pasien</th>
                    <th>Keluhan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @isset($daftarPolis)
                   @foreach($daftarPolis as $dp)
<tr>
    <td class="border p-2 text-center">{{ $dp->no_antrian }}</td>
    <td class="border p-2">{{ $dp->pasien?->name ?? '-' }}</td>
    <td class="border p-2">{{ $dp->keluhan }}</td>
    <td class="border p-2 text-center">
        <!-- Ubah menjadi link atau tombol form menuju halaman periksa -->
        <a href="{{ route('dokter.periksa-pasien.edit', $dp->id) }}" class="bg-blue-600 text-white px-3 py-1 rounded hover:bg-blue-700">
            Periksa
        </a>
    </td>
</tr>
@endforeach
                @endisset
            </tbody>
        </table>
    </div>
</div>
@endsection