@extends('layouts.main')

@section('content')
    <div class="flex flex-col justify-center items-center h-full space-y-[40px] mb-40 mt-10">
        <div class="lg:w-2/5 px-20 lg:px-0 space-y-4">
            <div class="flex justify-center">
                <img src="{{ asset('images/banner.png') }}" alt="banner">
            </div>
            <h1 class="text-center font-bold text-md">TUNAIKAN ZAKAT, INFAQ & SEDEKAH<br>DENGAN AMAN & MUDAH</h1>
            <form action="" class="space-y-8">
                <div class="bg-[#FBFBFB] rounded-[12px] drop-shadow-xl py-8 space-y-4 px-6 ">
                    @csrf
                    <div class="space-y-2">
                        <p>Nama Lengkap</p>
                        <input type="text" name="" id="" placeholder="Masukkan Nama Lengkap"
                            class="rounded-[12px] px-4 py-2 shadow-lg w-full">
                    </div>
                    <div class="space-y-2">
                        <p>Email</p>
                        <input type="email" name="" id="" placeholder="Masukkan Email"
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
                        <p>Nominal</p>
                        <div class="flex rounded-[12px] shadow-lg w-full ">
                            <div class="flex items-center justify-center bg-[#1D8E4880] px-2 py-2 rounded-[12px]">
                                <p class="rounded-[12px] px-2 text-white">RP.</p>
                            </div>
                            <input type="number" name="" id="" class="rounded-r-[12px] px-4 py-2 w-full"
                                placeholder="Masukkan Jumlah Nominal">
                        </div>
                    </div>

                    <div class="space-y-2">
                        <p>Upload Bukti Pembarayan</p>
                        <div onclick="document.getElementById('choseFile').click()"
                            class="flex justify-center rounded-[12px] shadow-lg w-full border-dashed border-2 border-black py-6 cursor-pointer">
                            <div class="space-y-2">
                                <div class="flex justify-center">
                                    <svg width="68" height="43" viewBox="0 0 68 43" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M57.12 18.2674C57.5556 17.263 57.8 16.1647 57.8 15.0194C57.8 10.0442 53.2313 6.00777 47.6 6.00777C45.5069 6.00777 43.5519 6.571 41.9369 7.52849C38.9938 3.02266 33.5006 0 27.2 0C17.8075 0 10.2 6.72119 10.2 15.0194C10.2 15.2729 10.2106 15.5263 10.2212 15.7798C4.27125 17.6291 0 22.6418 0 28.5369C0 35.9997 6.85313 42.0544 15.3 42.0544H54.4C61.9119 42.0544 68 36.6756 68 30.0389C68 24.2282 63.325 19.3751 57.12 18.2674ZM41.7988 24.0311H34.85V34.5447C34.85 35.3708 34.085 36.0466 33.15 36.0466H28.05C27.115 36.0466 26.35 35.3708 26.35 34.5447V24.0311H19.4013C17.8819 24.0311 17.1275 22.4165 18.2006 21.4684L29.3994 11.5743C30.0581 10.9923 31.1419 10.9923 31.8006 11.5743L42.9994 21.4684C44.0725 22.4165 43.3075 24.0311 41.7988 24.0311Z"
                                            fill="#E5E7EB" />
                                    </svg>
                                </div>


                                <p class="text-[#7BB1F9]">Jelajahi file</p>
                            </div>
                        </div>
                    </div>
                    <input type="file" class="hidden" id="choseFile">
                    <button class="rounded-[12px] w-full py-2 text-[#FFFFFF] bg-[#1D8E48] ">Kirim</button>

                </div>

            </form>
        </div>
    </div>
@endsection
