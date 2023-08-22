@extends('layouts.auth.main')

@section('content')
    <div class="flex flex-col justify-center items-center h-full space-y-[40px] mb-24 mt-24">
        <div class="w-2/5 space-y-4">
            <div class="flex justify-center">
                <img src="{{ asset('images/banner.png') }}" alt="banner">
            </div>
            <h1 class="text-center font-bold text-md">TUNAIKAN ZAKAT, INFAQ & SEDEKAH<br>DENGAN AMAN & MUDAH</h1>
            <form action="" class="space-y-8">
                <div class="bg-[#FBFBFB] rounded-[12px] drop-shadow-xl py-8 space-y-4 px-6 ">

                    @csrf
                    <div class="space-y-2">
                        <p>Nama</p>
                        <input type="text" name="" id=""
                            class="rounded-[12px] px-4 py-2 shadow-lg w-full">
                    </div>
                    <div class="space-y-2">
                        <p>Jenis Kelamin</p>
                        <div class="flex gap-4">
                            <div class="space-x-2">
                                <input type="radio" id="laki-laki" name="jenis-kelamin" value="Laki-Laki">
                                <label for="laki-laki">Laki-Laki</label><br>
                            </div>
                            <div class="space-x-2">
                                <input type="radio" id="perempuan" name="jenis-kelamin" value="Perempuan">
                                <label for="perempuan">Perempuan</label><br>
                            </div>

                        </div>
                    </div>
                    <div class="space-y-2">
                        <p>Email</p>
                        <input type="email" name="" id=""
                            class="rounded-[12px] px-4 py-2 shadow-lg w-full">
                    </div>
                    <div class="space-y-2 ">
                        <p>Jenis Dana</p>
                        <select class="w-full rounded-[12px] px-4 py-2 shadow-lg w-full" name="" id="">
                            <option value="zakat">Zakat</option>
                            <option value="infaq">Infaq</option>
                            <option value="sedekah">Sedekah</option>
                        </select>
                    </div>
                    <div class="space-y-2">
                        <p>Nomor Handphone</p>
                        <input type="number" name="" id=""
                            class="rounded-[12px] px-4 py-2 shadow-lg w-full">
                    </div>
                    <div class="space-y-2">
                        <p>Nominal</p>
                        <div class="flex rounded-[12px] shadow-lg w-full ">
                            <div class="flex items-center justify-center bg-[#1D8E4880] px-2 py-2 rounded-[12px]">
                                <p class="rounded-[12px] px-2 text-white">RP.</p>
                            </div>
                            <input type="number" name="" id="" class="rounded-r-[12px] px-4 py-2">
                        </div>
                    </div>
                </div>

                <button class="rounded-[12px] w-full py-2 text-[#FFFFFF] bg-[#1D8E48] ">Pilih Pembayaran</button>
            </form>
        </div>
    </div>
@endsection
