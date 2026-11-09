@extends('components.layouts.app')

@section('content')
<div class="p-6">
    <div class="flex items-center gap-3 mb-6">
        <a href="{{ route('admin.obat.index') }}" class="flex items-center justify-center w-9 h-9 rounded-lg bg-slate-100 hover:bg-slate-200 text-slate-600 transition">
            <i class="fas fa-arrow-left"></i>
        </a>
        <h2 class="text-2xl font-bold text-gray-800">Tambah Obat Baru</h2>
    </div>

    @if ($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="bg-white rounded-xl shadow-md overflow-hidden p-8">
        <form action="{{ route('admin.obat.store') }}" method="POST">
            @csrf

            <div class="mb-4">
                <label for="nama_obat" class="block text-sm font-medium text-gray-700 mb-2">Nama Obat</label>
                <input type="text" name="nama_obat" id="nama_obat" value="{{ old('nama_obat') }}" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500" placeholder="Contoh: Paracetamol">
            </div>

            <div class="mb-4">
                <label for="kemasan" class="block text-sm font-medium text-gray-700 mb-2">Kemasan</label>
                <input type="text" name="kemasan" id="kemasan" value="{{ old('kemasan') }}" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500" placeholder="Contoh: Strip / Tablet / Botol">
            </div>

            <div class="mb-6">
                <label for="harga" class="block text-sm font-medium text-gray-700 mb-2">Harga (Rp)</label>
                <input type="number" name="harga" id="harga" value="{{ old('harga') }}" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500" placeholder="Contoh: 5000">
            </div>

            <div class="flex justify-end gap-3">
                <a href="{{ route('admin.obat.index') }}" class="px-6 py-2.5 rounded-xl bg-slate-100 hover:bg-slate-200 text-slate-600 font-semibold text-sm transition">
                    Batal
                </a>
                <button type="submit" class="px-6 py-2.5 rounded-xl bg-blue-600 hover:bg-blue-700 text-white font-semibold text-sm transition shadow-md">
                    <i class="fas fa-save mr-1"></i> Simpan
                </button>
            </div>
        </form>
    </div>
</div>
@endsection