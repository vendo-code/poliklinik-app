@extends('components.layouts.app')

@section('content')
<div class="p-6">
    <div class="mb-6">
        <h2 class="text-2xl font-bold text-gray-800">Dashboard Admin</h2>
        <p class="text-gray-500 text-sm">Selamat datang kembali, Admin! Berikut adalah ringkasan data sistem poliklinik.</p>
    </div>

    <!-- Grid Kartu Statistik -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
    <!-- Card Poli -->
    <div class="bg-white rounded-xl shadow-md p-6 border-l-4 border-blue-500">
        <div class="flex items-center justify-between">
            <div>
                <h3 class="text-2xl font-bold text-gray-800 mt-1">{{ $totalPoli ?? 0 }}</h3>
            </div>
            <div class="p-3 bg-blue-100 text-blue-600 rounded-full">
                <i class="fas fa-hospital text-xl"></i>
            </div>
        </div>
    </div>

    <!-- Card Dokter -->
    <div class="bg-white rounded-xl shadow-md p-6 border-l-4 border-green-500">
        <div class="flex items-center justify-between">
            <div>
                <h3 class="text-2xl font-bold text-gray-800 mt-1">{{ $totalDokter ?? 0 }}</h3>
            </div>
            <div class="p-3 bg-green-100 text-green-600 rounded-full">
                <i class="fas fa-user-md text-xl"></i>
            </div>
        </div>
    </div>

    <!-- Card Pasien -->
    <div class="bg-white rounded-xl shadow-md p-6 border-l-4 border-yellow-500">
        <div class="flex items-center justify-between">
            <div>
              <h3 class="text-2xl font-bold text-gray-800 mt-1">{{ $totalPasien ?? 0 }}</h3>
            </div>
            <div class="p-3 bg-yellow-100 text-yellow-600 rounded-full">
                <i class="fas fa-users text-xl"></i>
            </div>
        </div>
    </div>

    <!-- Card Obat -->
    <div class="bg-white rounded-xl shadow-md p-6 border-l-4 border-purple-500">
        <div class="flex items-center justify-between">
            <div>
                <h3 class="text-2xl font-bold text-gray-800 mt-1">{{ $totalObat ?? 0 }}</h3>
            </div>
            <div class="p-3 bg-purple-100 text-purple-600 rounded-full">
                <i class="fas fa-pills text-xl"></i>
            </div>
        </div>
    </div>
</div>

    <!-- Informasi Tambahan / Selamat Datang -->
    <div class="bg-white rounded-xl shadow-md p-6">
        <h3 class="text-lg font-bold text-gray-800 mb-2">Sistem Informasi Poliklinik</h3>
        <p class="text-gray-600 text-sm leading-relaxed">
            Gunakan menu navigasi di sebelah kiri untuk mengelola data master seperti manajemen poli, dokter, pasien, dan obat secara berkala dengan mudah dan terstruktur.
        </p>
    </div>
</div>
@endsection