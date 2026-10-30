@extends('components.layouts.app', ['title' => 'Edit Dokter'])

@section('content')

    {{-- Tombol Kembali & Header --}}
    <div class="flex items-center gap-3 mb-6">
        <a href="{{ route('admin.dokters.index') }}" class="btn bg-slate-100 text-slate-600 hover:bg-slate-200 border-none rounded-lg">
            <i class="fas fa-arrow-left"></i>
        </a>
        <h2 class="text-2xl font-bold text-slate-800">
            Edit Dokter
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

            <form action="{{ route('admin.dokters.update', $dokter->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                    {{-- Nama Dokter --}}
                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-2">
                            Nama Dokter <span class="text-red-500">*</span>
                        </label>
                        <input type="text" name="nama" value="{{ old('nama', $dokter->nama) }}" placeholder="Masukkan nama dokter..." class="input input-bordered w-full rounded-lg bg-white" required />
                    </div>

                    {{-- Email --}}
                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-2">
                            Email <span class="text-red-500">*</span>
                        </label>
                        <input type="email" name="email" value="{{ old('email', $dokter->email) }}" placeholder="email@example.com" class="input input-bordered w-full rounded-lg bg-white" required />
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                    {{-- No. KTP --}}
                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-2">
                            No. KTP <span class="text-red-500">*</span>
                        </label>
                        <input type="text" name="no_ktp" value="{{ old('no_ktp', $dokter->no_ktp) }}" placeholder="Masukkan No. KTP..." class="input input-bordered w-full rounded-lg bg-white" required />
                    </div>

                    {{-- No. HP --}}
                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-2">
                            No. HP <span class="text-red-500">*</span>
                        </label>
                        <input type="text" name="no_hp" value="{{ old('no_hp', $dokter->no_hp) }}" placeholder="Masukkan No. HP..." class="input input-bordered w-full rounded-lg bg-white" required />
                    </div>
                </div>

                {{-- Alamat --}}
                <div class="mb-4">
                    <label class="block text-sm font-semibold text-slate-700 mb-2">
                        Alamat <span class="text-red-500">*</span>
                    </label>
                    <textarea name="alamat" placeholder="Masukkan alamat..." class="textarea textarea-bordered w-full rounded-lg bg-white h-24" required>{{ old('alamat', $dokter->alamat) }}</textarea>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
                    {{-- Pilih Poli --}}
                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-2">
                            Poli <span class="text-red-500">*</span>
                        </label>
                        <select name="id_poli" class="select select-bordered w-full rounded-lg bg-white" required>
                            <option value="">Pilih Poli</option>
                            @foreach($polis as $poli)
                                <option value="{{ $poli->id }}" {{ (old('id_poli', $dokter->id_poli) == $poli->id) ? 'selected' : '' }}>
                                    {{ $poli->nama_poli }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    {{-- Password (Opsional saat Edit) --}}
                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-2">
                            Password <span class="text-xs text-slate-400 font-normal">(Kosongkan jika tidak ingin mengubah password)</span>
                        </label>
                        <input type="password" name="password" placeholder="••••••••" class="input input-bordered w-full rounded-lg bg-white" />
                    </div>
                </div>

                {{-- Tombol Aksi --}}
                <div class="flex items-center gap-3">
                    <button type="submit" class="btn bg-[#2d4499] hover:bg-[#1e2d6b] text-white border-none rounded-lg px-6">
                        Update
                    </button>
                    <a href="{{ route('admin.dokters.index') }}" class="btn bg-slate-200 hover:bg-slate-300 text-slate-700 border-none rounded-lg px-6">
                        Batal
                    </a>
                </div>

            </form>
        </div>
    </div>

@endsection