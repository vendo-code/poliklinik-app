@extends('components.layouts.app')

@section('content')

    {{-- Header / Tombol Kembali --}}
    <div class="flex items-center gap-3 mb-6">
        <a href="{{ route('admin.polis.index') }}" class="btn bg-slate-100 text-slate-600 hover:bg-slate-200 border-none rounded-lg">
            <i class="fas fa-arrow-left"></i>
        </a>
        <h2 class="text-2xl font-bold text-slate-800">
            Edit Poli
        </h2>
    </div>

    {{-- Form Card --}}
    <div class="card bg-base-100 shadow-md rounded-2xl border border-slate-200">
        <div class="card-body p-6">
            
            {{-- Alert Error Validasi jika ada --}}
            @if ($errors->any())
                <div class="alert alert-error mb-4 rounded-xl text-white">
                    <ul class="list-disc pl-4">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('admin.polis.update', $poli->id) }}" method="POST">
                @csrf
                @method('PUT')

                {{-- Nama Poli --}}
                <div class="mb-4">
                    <label class="block text-sm font-semibold text-slate-700 mb-2">Nama Poli</label>
                    <input type="text" name="nama_poli" value="{{ old('nama_poli', $poli->nama_poli) }}" placeholder="Contoh: Poli Umum" class="input input-bordered w-full rounded-lg" required />
                </div>

                {{-- Keterangan --}}
                <div class="mb-6">
                    <label class="block text-sm font-semibold text-slate-700 mb-2">Keterangan</label>
                    <textarea name="keterangan" placeholder="Masukkan keterangan poli (opsional)" class="textarea textarea-bordered w-full rounded-lg h-24">{{ old('keterangan', $poli->keterangan) }}</textarea>
                </div>

                {{-- Tombol Aksi --}}
                <div class="flex justify-end gap-2">
                    <a href="{{ route('admin.polis.index') }}" class="btn btn-ghost rounded-lg">Batal</a>
                    <button type="submit" class="btn bg-[#2d4499] hover:bg-[#1e2d6b] text-white border-none rounded-lg px-6">
                        <i class="fas fa-save mr-1"></i> Simpan
                    </button>
                </div>

            </form>
        </div>
    </div>

@endsection