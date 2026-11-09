@extends('components.layouts.app')

@section('content')
<div class="p-6">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold text-gray-800">Data Obat</h2>
        <!-- Diperbarui menjadi admin.obat.create -->
        <a href="{{ route('admin.obat.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded-lg font-semibold hover:bg-blue-700 transition">
            + Tambah Obat
        </a>
    </div>

   @if(session('message'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
            {{ session('message') }}
        </div>
    @endif

    <div class="bg-white rounded-xl shadow-md overflow-hidden p-6">
        <div class="overflow-x-auto">
            <table class="w-full border-collapse border border-gray-200 text-left">
                <thead>
                    <tr class="bg-gray-100 text-gray-700">
                        <th class="border border-gray-200 p-3 text-center">No</th>
                        <th class="border border-gray-200 p-3">Nama Obat</th>
                        <th class="border border-gray-200 p-3">Kemasan</th>
                        <th class="border border-gray-200 p-3">Harga</th>
                        <th class="border border-gray-200 p-3 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($obats as $index => $obat)
                    <tr>
                        <td class="border border-gray-200 p-3 text-center">{{ $index + 1 }}</td>
                        <td class="border border-gray-200 p-3">{{ $obat->nama_obat }}</td>
                        <td class="border border-gray-200 p-3">{{ $obat->kemasan }}</td>
                        <td class="border border-gray-200 p-3">Rp {{ number_format($obat->harga, 0, ',', '.') }}</td>
                        <td class="border border-gray-200 p-3 text-center">
                            <!-- Diperbarui menjadi admin.obat.edit -->
                            <a href="{{ route('admin.obat.edit', $obat->id) }}" class="bg-yellow-500 text-white px-3 py-1 rounded text-sm font-medium hover:bg-yellow-600 mr-2">Edit</a>
                            
                            <!-- Diperbarui menjadi admin.obat.destroy -->
                           <form action="{{ route('admin.obat.destroy', $obat->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Yakin ingin menghapus obat ini?')">
    @csrf
    @method('DELETE')
    <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded text-sm font-medium hover:bg-red-600">Hapus</button>
</form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center p-4 text-gray-500">Belum ada data obat.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection