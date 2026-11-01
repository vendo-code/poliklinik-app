@extends('components.layouts.app', ['title' => 'Edit Jadwal Periksa'])

@section('content')
<div class="container mx-auto px-4 py-6">
    <!-- Header -->
    <div class="flex items-center gap-3 mb-6">
        <a href="{{ route('dokter.jadwal-periksa.index') }}" class="inline-flex items-center justify-center w-9 h-9 rounded-lg bg-slate-100 text-slate-500 hover:bg-slate-200 transition">
            <i class="fas fa-arrow-left text-xs"></i>
        </a>
        <h2 class="text-2xl font-bold text-slate-800">Edit Jadwal Periksa</h2>
    </div>

    <!-- Card Form -->
    <div class="card bg-white shadow-md rounded-2xl border border-slate-200 max-w-2xl">
        <div class="card-body p-8">
            <form action="{{ route('dokter.jadwal-periksa.update', $jadwalPeriksa->id) }}" method="POST">
                @csrf
                @method('PUT')

                <!-- Hari -->
                <div class="mb-4">
                    <label class="block text-sm font-semibold text-slate-700 mb-2">Hari</label>
                    <select name="hari" class="select select-bordered w-full bg-white text-slate-700" required>
                        <option value="" disabled>Pilih Hari</option>
                        <option value="Senin" {{ old('hari', $jadwalPeriksa->hari ?? '') == 'Senin' ? 'selected' : '' }}>Senin</option>
                        <option value="Selasa" {{ old('hari', $jadwalPeriksa->hari ?? '') == 'Selasa' ? 'selected' : '' }}>Selasa</option>
                        <option value="Rabu" {{ old('hari', $jadwalPeriksa->hari ?? '') == 'Rabu' ? 'selected' : '' }}>Rabu</option>
                        <option value="Kamis" {{ old('hari', $jadwalPeriksa->hari ?? '') == 'Kamis' ? 'selected' : '' }}>Kamis</option>
                        <option value="Jumat" {{ old('hari', $jadwalPeriksa->hari ?? '') == 'Jumat' ? 'selected' : '' }}>Jumat</option>
                        <option value="Sabtu" {{ old('hari', $jadwalPeriksa->hari ?? '') == 'Sabtu' ? 'selected' : '' }}>Sabtu</option>
                    </select>
                </div>

                <!-- Jam Mulai -->
                <div class="mb-4">
                    <label class="block text-sm font-semibold text-slate-700 mb-2">Jam Mulai</label>
                    <input type="time" name="jam_mulai" value="{{ old('jam_mulai', $jadwalPeriksa->jam_mulai ?? '') }}" class="input input-bordered w-full bg-white text-slate-700" required>
                </div>

                <!-- Jam Selesai -->
                <div class="mb-4">
                    <label class="block text-sm font-semibold text-slate-700 mb-2">Jam Selesai</label>
                    <input type="time" name="jam_selesai" value="{{ old('jam_selesai', $jadwalPeriksa->jam_selesai ?? '') }}" class="input input-bordered w-full bg-white text-slate-700" required>
                </div>

                <!-- Status Aktif -->
                <div class="mb-6">
                    <label class="block text-sm font-semibold text-slate-700 mb-2">Status Aktif</label>
                    <select name="aktif" class="select select-bordered w-full bg-white text-slate-700" required>
                        <option value="Y" {{ old('aktif', $jadwalPeriksa->aktif ?? '') == 'Y' ? 'selected' : '' }}>Aktif</option>
                        <option value="N" {{ old('aktif', $jadwalPeriksa->aktif ?? '') == 'N' ? 'selected' : '' }}>Tidak Aktif</option>
                    </select>
                </div>

                <!-- Tombol Aksi -->
                <div class="flex items-center justify-end gap-3">
                    <a href="{{ route('dokter.jadwal-periksa.index') }}" class="btn btn-ghost bg-slate-100 hover:bg-slate-200 text-slate-500 rounded-lg px-6">
                        Batal
                    </a>
                    <button type="submit" class="flex items-center gap-2 px-6 py-2.5 bg-[#2d4499] hover:bg-[#1e2d6b] text-white rounded-lg text-sm font-semibold shadow transition">
                        <i class="fas fa-save"></i> Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection