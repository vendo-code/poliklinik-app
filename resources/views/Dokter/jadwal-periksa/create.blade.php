@extends('components.layouts.app', ['title' => 'Tambah Jadwal Periksa'])

@section('content')
<div class="container mx-auto px-4 py-6">
    <!-- Header -->
    <div class="flex items-center gap-3 mb-6">
        <a href="{{ route('dokter.jadwal-periksa.index') }}" class="flex items-center justify-center w-9 h-9 rounded-lg bg-slate-100 text-slate-500 hover:bg-slate-200 transition">
            <i class="fas fa-arrow-left text-xs"></i>
        </a>
        <h2 class="text-2xl font-bold text-slate-800">Tambah Jadwal Periksa</h2>
    </div>

    <!-- Card Form -->
    <div class="card bg-white shadow-md rounded-2xl border border-slate-200 max-w-2xl">
        <div class="card-body p-8">
            <form action="{{ route('dokter.jadwal-periksa.store') }}" method="POST">
                @csrf

                <!-- Hari -->
                <div class="mb-4">
                    <label class="block text-sm font-semibold text-slate-700 mb-2">Hari</label>
                    <select name="hari" class="select select-bordered w-full bg-white text-slate-700" required>
                        <option value="" disabled selected>Pilih Hari</option>
                        <option value="Senin">Senin</option>
                        <option value="Selasa">Selasa</option>
                        <option value="Rabu">Rabu</option>
                        <option value="Kamis">Kamis</option>
                        <option value="Jumat">Jumat</option>
                        <option value="Sabtu">Sabtu</option>
                    </select>
                </div>

                <!-- Jam Mulai -->
                <div class="mb-4">
                    <label class="block text-sm font-semibold text-slate-700 mb-2">Jam Mulai</label>
                    <input type="time" name="jam_mulai" class="input input-bordered w-full bg-white text-slate-700" required>
                </div>

                <!-- Jam Selesai -->
                <div class="mb-6">
                    <label class="block text-sm font-semibold text-slate-700 mb-2">Jam Selesai</label>
                    <input type="time" name="jam_selesai" class="input input-bordered w-full bg-white text-slate-700" required>
                </div>

                <!-- Tombol Aksi -->
                <div class="flex items-center justify-end gap-3">
                    <a href="{{ route('dokter.jadwal-periksa.index') }}" class="btn btn-ghost bg-slate-100 hover:bg-slate-200 text-slate-500 rounded-lg px-6">
                        Batal
                    </a>
                    <button type="submit" class="flex items-center gap-2 px-6 py-2.5 bg-[#2d4499] hover:bg-[#1e2d6b] text-white rounded-lg text-sm font-semibold shadow transition">
                        <i class="fas fa-save"></i> Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection