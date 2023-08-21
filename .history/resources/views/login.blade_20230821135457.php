@extends('layouts.auth.main')

@section('content')
    <div class="flex flex-col justify-center items-center h-screen space-y-8">
        <img src="{{ asset('logo.png') }}" alt="">
        <div class="bg-[#FBFBFB] rounded-[12px] drop-shadow-xl px-20">
            <h1>LOGIN</h1>
            <form action="">
                <div>
                    <label for="">Email</label>
                    <input type="email" placeholder="Masukan email">
                </div>
                <div>
                    <label for="">Password</label>
                    <input type="password" placeholder="********">
                </div>
                <a href="">Lupa password</a>
                <button>Login</button>
                <p>Belum punya akun ? <a href="">Silahkan Register</a></p>
            </form>
        </div>
    </div>
@endsection
