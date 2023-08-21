@extends('layouts.auth.main')

@section('content')
    <div class="flex justify-center items-center">
        <div>
            <img src="" alt="">
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
