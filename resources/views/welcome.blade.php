@extends('components.layouts.app')

@section('content')
<div class="flex flex-col items-center justify-center min-h-[70vh] text-center">
    <div class="max-w-md p-8 bg-white rounded-2xl shadow-lg border border-slate-100">
        <h1 class="text-3xl font-extrabold text-slate-800 mb-4 brand-serif">Selamat Datang di Aplikasi Poliklinik</h1>
        <p class="text-slate-600 mb-6 text-sm">Silakan masuk ke akun Anda untuk mulai mengelola layanan kesehatan dan antrean poli.</p>
        <a href="{{ route('login') }}" class="inline-block w-full py-3 px-4 bg-indigo-600 hover:bg-indigo-700 text-white font-semibold rounded-xl shadow transition duration-200">
            Login ke Akun
        </a>
    </div>
</div>
@endsection