@extends('layouts.auth.main')

@section('content')
    <div class="flex flex-col justify-center items-center h-screen space-y-8">
        <img src="{{ asset('logo.png') }}" alt="">
        <div class="bg-[#FBFBFB] rounded-[12px] drop-shadow-xl px-24 py-8 space-y-4">
            <h1 class="text-3xl font-bold text-[#014F31] text-center">LOGIN</h1>
            <form action="" class="space-y-4">
                <div>
                    <p class="font-semibold">Email</p>
                    <input type="email" placeholder="Masukan email" class="rounded-[12px] px-4 py-1">
                </div>
                <div>
                    <p class="font-semibold">Password</p>
                    <input type="password" placeholder="********">
                </div>
                <a href="">Lupa password</a>
                <button>Login</button>
                <p>Belum punya akun ? <a href="">Silahkan Register</a></p>
            </form>
        </div>
    </div>
@endsection
