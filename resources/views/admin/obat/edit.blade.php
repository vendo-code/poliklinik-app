@extends('components.layouts.app')

@section('content')
<div class="p-6">
    <div class="flex items-center gap-3 mb-6">
        <a href="{{ route('admin.obat.index') }}" class="px-4 py-2 bg-slate-200 text-slate-700 rounded-lg font-semibold hover:bg-slate-300 transition">
            ← Kembali
        </a>
        <h2 class="text-2xl font-bold text-gray-800">Edit Data Obat</h2>
    </div>

    <div class="bg-white rounded-xl shadow-md p-6 max-w-xl">
        <form action="{{ route('admin.obat.update', $obat->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label class="block text-gray-700 font-semibold mb-2">Nama Obat</label>
                <input type="text" name="nama_obat" value="{{ old('nama_obat', $obat->nama_obat) }}" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 font-semibold mb-2">Kemasan</label>
                <input type="text" name="kemasan" value="{{ old('kemasan', $obat->kemasan) }}" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            </div>

            <div class="mb-6">
                <label class="block text-gray-700 font-semibold mb-2">Harga</label>
                <input type="number" name="harga" value="{{ old('harga', $obat->harga) }}" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            </div>

            <div class="flex justify-end gap-2">
                <a href="{{ route('admin.obat.index') }}" class="px-6 py-2.5 rounded-xl bg-slate-100 hover:bg-slate-200 text-slate-600 font-semibold text-sm transition">
                    Batal
                </a>
                <button type="submit" class="px-6 py-2.5 rounded-xl bg-blue-600 hover:bg-blue-700 text-white font-semibold text-sm transition">
                    Simpan Perubahan
                </button>
            </div>
        </form>
    </div>
</div>
@endsection