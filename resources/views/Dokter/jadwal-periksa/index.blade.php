@extends('components.layouts.app', ['title' => 'Jadwal Periksa'])

@section('content')
<div class="container mx-auto px-4 py-6">
    <div class="flex items-center justify-between mb-6">
        <h2 class="text-2xl font-bold text-slate-800">Jadwal Periksa</h2>
        <a href="{{ route('dokter.jadwal-periksa.create') }}" class="btn bg-[#2d4499] hover:bg-[#1e2d6b] text-white border-none rounded-lg px-5">
            <i class="fas fa-plus mr-2"></i> Tambah Jadwal
        </a>
    </div>

    <div class="card bg-white shadow-md rounded-2xl p-6 border border-slate-200">
        <table class="table table-zebra w-full">
            <thead>
                <tr class="bg-slate-100 text-slate-600">
                    <th>No</th>
                    <th>Hari</th>
                    <th>Jam Mulai</th>
                    <th>Jam Selesai</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @isset($jadwals)
                    @forelse($jadwals as $index => $jadwal)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $jadwal->hari }}</td>
                        <td>{{ $jadwal->jam_mulai }}</td>
                        <td>{{ $jadwal->jam_selesai }}</td>
                        <td>
                            <span class="badge {{ $jadwal->aktif == 'Y' ? 'bg-green-100 text-green-700 border-green-200' : 'bg-red-100 text-red-700 border-red-200' }}">
                                {{ $jadwal->aktif == 'Y' ? 'Aktif' : 'Tidak Aktif' }}
                            </span>
                        </td>
                        <td class="flex items-center gap-2">
                            <!-- Tombol Edit -->
                            <a href="{{ route('dokter.jadwal-periksa.edit', $jadwal->id) }}" class="btn btn-sm bg-amber-500 hover:bg-amber-600 text-white border-none">Edit</a>
                            
                            <!-- Tombol Hapus yang Diperbaiki -->
                            <form action="{{ route('dokter.jadwal-periksa.destroy', $jadwal->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Yakin ingin menghapus jadwal ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm bg-red-500 hover:bg-red-600 text-white border-none">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr><td colspan="6" class="text-center text-slate-400 py-4">Belum ada jadwal periksa.</td></tr>
                    @endforelse
                @endisset
            </tbody>
        </table>
    </div>
</div>
@endsection