@extends('layouts.auth.main')
@section('content')
    <div class="flex flex-col justify-center items-center h-full space-y-5">
        <img src="{{ asset('logo.png') }}" alt="Logo">
        <h1 class="text-center text-3xl font-bold text-[#014F31]">Verifikasi</h1>
        <h3>Masukkan Kode yang sudah dikirimkan melalui e-mail terdaftar</h3>
        <div class="bg-[#FBFBFB] rounded-[12px] drop-shadow-xl w-1/3 px-10 py-8 space-y-4">
            <div class="space-y-2">
                <form action="" class="grid grid-cols-4 gap-3">
                    <input type="text" class="py-4 rounded-[12px] shadow-xl">
                    <input type="text" class="py-4 rounded-[12px] shadow-xl">
                    <input type="text" class="py-4 rounded-[12px] shadow-xl">
                    <input type="text" class="py-4 rounded-[12px] shadow-xl">
                </form>
            </div>
            <button class="block rounded-[12px] bg-[#1D8E48] text-center w-full text-white py-2">Kirim</button>
        </div>
    </div>
@endsection
