@extends('layouts.auth.main')

@section('content')
    <div class="flex justify-center items-center h-screen">
        <div class="bg-[#FBFBFB] rounded-[12px] drop-shadow-xl space-y-20">
            <img src="{{ asset('logo.png') }}" alt="">
            <div>
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
    </div>
@endsection
