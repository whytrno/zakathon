@extends('layouts.auth.main')

@section('content')
    <div class="flex flex-col justify-center items-center h-screen space-y-8">
        <img src="{{ asset('logo.png') }}" alt="">
        <div class="bg-[#FBFBFB] rounded-[12px] drop-shadow-xl px-24 py-8 space-y-4">
            <h1 class="text-3xl font-bold text-[#014F31] text-center">LOGIN</h1>
            <form action="" class="space-y-4">
                <div class="space-y-2">
                    <p class="font-semibold">Email</p>
                    <input type="email" placeholder="Masukan email" class="rounded-[12px] px-4 py-2 shadow-lg w-full">
                </div>
                <div class="space-y-2">
                    <p class="font-semibold">Password</p>
                    <input type="password" placeholder="********" class="rounded-[12px] px-4 py-2 shadow-lg w-full">
                </div>
                <a href="" class="font-semibold block">Lupa password</a>
                <button class="block rounded-[12px] bg-[#1D8E48] text-center w-full text-white py-2">Login</button>
                <p class="font-semibold">Belum punya akun ? Silahkan <a href=""
                        class="text-[#0092FB] border-b border-[#0092FB]">Register</a></p>
            </form>
        </div>
    </div>
@endsection
