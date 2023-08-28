@extends('layouts.homePage.main')

@section('content')
    <div class="space-y-20">
        <div>
            <img src="{{asset('images/index-banner.png')}}" alt="">
        </div>
        <div class="px-20 space-y-10 font-semibold">
            <h1 class="text-3xl font-bold text-center text-[#014F31]">KENAPA ZAKAT PENTING?</h1>
            <p class="px-20 text-center">Zakat merupakan salah satu rukun iman ke 4, memiliki arti memberikan sebagian
                harta
                kepada
                orang yang berhak,
                Sehingga ini merupakan kewajiban setiap umat islam yang yang wajib dibayarkan. Berikut keutamaan Zakat :
            </p>
            <div class="px-40">
                <ol class="list-decimal list-inside">
                    <li>Menjaga Keimanan</li>
                    <li>Meningkatkan Keberkahan Harta yang kita punya</li>
                    <li>Menghapus / menggugurkan dosa</li>
                    <li>Mendapatkan Pahala serta menjauhkan sifat Kikir</li>
                    <li>Membantu orang-orang yang kurang mampu dan meningkatkan rasa kepedulian sesama.</li>
                </ol>
            </div>
        </div>


        <div class="space-y-10">
            <h1 class="text-3xl font-bold text-center text-[#014F31]">CARA PEMBAYARAN ZAKAT</h1>
            <div class="flex justify-between">
                <div>
                    <img src="{{asset('images/phone.png')}}" alt="">
                </div>
                <div class="space-y-2">
                    <img src="{{asset('images/niat.png')}}" alt="">
                    <div class="font-semibold text-lg space-y-1">
                        <div class="flex gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                 stroke="currentColor" class="w-8 h-8 stroke-[#014F31] stroke-[#014F31]">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>

                            <p>Lakukan pembayaran zakat melalui nomer Rekening yang tersedia</p>
                        </div>

                        <div class="flex gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                 stroke="currentColor" class="w-8 h-8 stroke-[#014F31]">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>

                            <p>Kemudian Registrasi akun / login terlebih dahulu.</p>
                        </div>

                        <div class="flex gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                 stroke="currentColor" class="w-8 h-8 stroke-[#014F31]">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>

                            <p>Klik Bayar Zakat, isi data diri dan upload bukti pembayaran</p>
                        </div>

                        <div class="flex gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                 stroke="currentColor" class="w-8 h-8 stroke-[#014F31]">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>

                            <p>Selesai, Tunggu Status berubah sampai berhasil.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
