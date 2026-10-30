@extends('components.layouts.app', ['title' => 'Tambah Poli'])

@section('content')

    {{-- Tombol Kembali & Header --}}
    <div class="flex items-center gap-3 mb-6">
        <a href="{{ route('admin.polis.index') }}" class="btn bg-slate-100 text-slate-600 hover:bg-slate-200 border-none rounded-lg">
            <i class="fas fa-arrow-left"></i>
        </a>
        <h2 class="text-2xl font-bold text-slate-800">
            Tambah Poli
        </h2>
    </div>

    {{-- Card Form Putih --}}
    <div class="card bg-base-100 shadow-md rounded-2xl border border-slate-200">
        <div class="card-body p-8">
            
            {{-- Pesan Error Validasi --}}
            @if ($errors->any())
                <div class="alert alert-error mb-6 rounded-xl text-white">
                    <ul class="list-disc pl-4">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('admin.polis.store') }}" method="POST">
                @csrf

                {{-- Input Nama Poli --}}
                <div class="mb-5">
                    <label class="block text-sm font-semibold text-slate-700 mb-2">
                        Nama Poli <span class="text-red-500">*</span>
                    </label>
                    <input type="text" name="nama_poli" value="{{ old('nama_poli') }}" placeholder="Masukkan nama poli..." class="input input-bordered w-full rounded-lg bg-white" required />
                </div>

                {{-- Input Keterangan --}}
                <div class="mb-8">
                    <label class="block text-sm font-semibold text-slate-700 mb-2">
                        Keterangan
                    </label>
                    <textarea name="keterangan" placeholder="Masukkan keterangan poli..." class="textarea textarea-bordered w-full rounded-lg bg-white h-32">{{ old('keterangan') }}</textarea>
                </div>

                {{-- Tombol Aksi (Simpan & Batal) --}}
                <div class="flex items-center gap-3">
                    <button type="submit" class="btn bg-[#2d4499] hover:bg-[#1e2d6b] text-white border-none rounded-lg px-6">
                        Simpan
                    </button>
                    <a href="{{ route('admin.polis.index') }}" class="btn bg-slate-200 hover:bg-slate-300 text-slate-700 border-none rounded-lg px-6">
                        Batal
                    </a>
                </div>

            </form>
        </div>
    </div>

@endsection