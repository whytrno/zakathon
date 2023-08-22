@extends('layouts.auth.main')

@section('content')
    <div class="flex flex-col justify-center items-center h-full space-y-[40px] mb-24 mt-24">
        <img src="{{ asset('logo.png') }}" alt="Logo">

        <div class="bg-[#FBFBFB] rounded-[12px] drop-shadow-xl w-2/5 px-20 py-8 space-y-4">
            <h1 class="text-center text-3xl font-bold text-[#014F31]">REGISTER</h1>
            <form action="{{ route('register.process') }}" method="POST" class="space-y-4">
                @csrf
                <div class="space-y-2">
                    <p>Nama</p>
                    <input name="nama" type="text" placeholder="Masukkan Nama"
                        class="rounded-[12px] px-4 py-2 shadow-lg w-full">
                </div>
                <div class="space-y-2">
                    <p>Email</p>
                    <input name="email" type="email" placeholder="Masukkan Email"
                        class="rounded-[12px] px-4 py-2 shadow-lg w-full">
                </div>
                <div class="space-y-2">
                    <p>Jenis</p>
                    <select name="jenis" id="jenis" class="rounded-[12px] px-4 py-2 shadow-lg w-full">
                        <option value="perorangan">Perorangan</option>
                        <option value="lembaga">Lembaga</option>
                    </select>
                </div>
                <div class="space-y-2" id="nik">
                    <p>Nomor Induk Keluarga</p>
                    <input name="nik" type="number" placeholder="Masukkan NIK 16 digit"
                        class="rounded-[12px] px-4 py-2 shadow-lg w-full">
                </div>
                <div class="space-y-2">
                    <p>Password</p>
                    <div class="relative">
                        <input name="password" id="password" type="password" placeholder="********"
                            class="rounded-[12px] px-4 py-2 w-full">
                        <svg onclick="showPassword()"
                            class="cursor-pointer absolute right-4 top-1/2 transform -translate-y-1/2" width="19"
                            height="19" viewBox="0 0 19 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g clip-path="url(#clip0_84_2354)">
                                <path d="M1.58398 1.58325L17.4173 17.4166" stroke="#242424" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" />
                                <path
                                    d="M5.31493 5.32198C2.90194 6.96284 1.58398 9.49992 1.58398 9.49992C1.58398 9.49992 4.46277 15.0416 9.50065 15.0416C11.1238 15.0416 12.5228 14.4664 13.6736 13.6866M8.70898 4.00434C8.96659 3.97419 9.23053 3.95825 9.50065 3.95825C14.5385 3.95825 17.4173 9.49992 17.4173 9.49992C17.4173 9.49992 16.8696 10.5542 15.834 11.7431"
                                    stroke="#242424" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                <path
                                    d="M11.0833 11.2703C10.6631 11.6463 10.1083 11.8751 9.5 11.8751C8.18829 11.8751 7.125 10.8118 7.125 9.50006C7.125 8.84797 7.38778 8.2573 7.81321 7.82812"
                                    stroke="#242424" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </g>
                            <defs>
                                <clipPath id="clip0_84_2354">
                                    <rect width="19" height="19" fill="white" />
                                </clipPath>
                            </defs>
                        </svg>
                    </div>
                </div>
                <div class="space-y-2">
                    <p>Konfirmasi Password</p>
                    <div class="relative">
                        <input name="password_confirmation" id="passwordConfirmation" type="password" placeholder="********"
                            class="rounded-[12px] px-4 py-2 w-full">
                        <svg onclick="showPasswordConfirmation()"
                            class="cursor-pointer absolute right-4 top-1/2 transform -translate-y-1/2" width="19"
                            height="19" viewBox="0 0 19 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g clip-path="url(#clip0_84_2354)">
                                <path d="M1.58398 1.58325L17.4173 17.4166" stroke="#242424" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" />
                                <path
                                    d="M5.31493 5.32198C2.90194 6.96284 1.58398 9.49992 1.58398 9.49992C1.58398 9.49992 4.46277 15.0416 9.50065 15.0416C11.1238 15.0416 12.5228 14.4664 13.6736 13.6866M8.70898 4.00434C8.96659 3.97419 9.23053 3.95825 9.50065 3.95825C14.5385 3.95825 17.4173 9.49992 17.4173 9.49992C17.4173 9.49992 16.8696 10.5542 15.834 11.7431"
                                    stroke="#242424" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                <path
                                    d="M11.0833 11.2703C10.6631 11.6463 10.1083 11.8751 9.5 11.8751C8.18829 11.8751 7.125 10.8118 7.125 9.50006C7.125 8.84797 7.38778 8.2573 7.81321 7.82812"
                                    stroke="#242424" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </g>
                            <defs>
                                <clipPath id="clip0_84_2354">
                                    <rect width="19" height="19" fill="white" />
                                </clipPath>
                            </defs>
                        </svg>
                    </div>
                    <p class="text-red-700 hidden" id="password-not-match">Password harus sama!</p>
                </div>
                <button class="rounded-[12px] bg-gray-400 text-center w-full py-2 text-[#FFFFFF]"
                    disabled>Register</button>
                <p class="font-semibold">Sudah punya akun ? Silahkan <a href="{{ route('login') }}"
                        class="text-[#0092FB] border-b-2 border-[#0092FB]">Login</a></p>
            </form>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        function showPassword() {
            var password = document.getElementById("password");
            if (password.type === "password") {
                password.type = "text";
            } else {
                password.type = "password";
            }
        }

        function showPasswordConfirmation() {
            var passwordConfirmation = document.getElementById("passwordConfirmation");
            if (passwordConfirmation.type === "password") {
                passwordConfirmation.type = "text";
            } else {
                passwordConfirmation.type = "password";
            }
        }

        $('#passwordConfirmation').keyup(function() {
            var password = $('#password').val();
            var passwordConfirmation = $('#passwordConfirmation').val();
            if (password != passwordConfirmation) {
                $('#passwordConfirmation').css('border', '1px solid red');
                $('#password-not-match').removeClass('hidden');
            } else {
                $('#passwordConfirmation').css('border', '1px solid green');
                $('#password-not-match').addClass('hidden');
            }
        });

        // if semua inputan terisi dan password confirmation dan password sama maka button register akan aktif
        $('#passwordConfirmation').keyup(function() {
            var password = $('#password').val();
            var passwordConfirmation = $('#passwordConfirmation').val();
            if (password != passwordConfirmation) {
                $('button').prop('disabled', true);
                $('button').addClass('bg-gray-400');
                $('button').removeClass('bg-[#1D8E48]');
            } else {
                $('button').prop('disabled', false);
                $('button').removeClass('bg-gray-400');
                $('button').addClass('bg-[#1D8E48]');
            }
        });

        $('#jenis').change(function() {
            if ($(this).val() == 'perorangan') {
                $('#nik').show();
            } else {
                $('#nik').hide();
            }
        });
    </script>
@endpush
