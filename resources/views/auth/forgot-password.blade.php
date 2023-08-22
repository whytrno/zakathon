@extends('layouts.main')
@section('content')
    <div class="flex flex-col justify-center items-center h-screen space-y-8">
        <img src="{{ asset('logo.png') }}" alt="logo">
        <div class="bg-[#FBFBFB] rounded-[12px] drop-shadow-xl w-1/3 px-10 py-8 space-y-4">
            <h1 class="text-center text-3xl font-bold text-[#014F31]">LUPA PASSWORD</h1>
            <h3 class="text-center">Masukkan email yang terdaftar, untuk verifikasi selanjutnya</h3>
            <form action="" class="space-y-4">
                <div class="space-y-2">
                    <p>Email</p>
                    <input type="text" placeholder="Masukkan Email" class="rounded-[12px] px-4 py-2 shadow-lg w-full">
                </div>
                <button class="block rounded-[12px] bg-[#1D8E48] text-center w-full text-white py-2">Verifikasi</button>
            </form>
        </div>
    </div>
@endsection
