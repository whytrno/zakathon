@extends('layouts.homePage.main')

@section('content')
    <div class="space-y-20 px-20">
        <div class="flex justify-center">
            @php
                $banner = 'images/donasi-banner.png';

                if($data->banner) {
                    $banner = 'uploads/donasi/'.$data->banner;
                }
            @endphp
            <img src="{{asset($banner)}}" alt="" class="rounded-[12px] h-96">
        </div>

        <div class="space-y-3 text-center">
            <h1 class="text-3xl font-bold text-[#014F31]">{{ucwords($data->judul)}}</h1>
            <p class="text-2xl">{{$data->deskripsi}}</p>
        </div>

        <div class="space-y-8">
            <div class="space-y-3">
                <div class="flex justify-between">
                    <p>Rp. 1.000.000</p>
                    <p>terkumpul dari</p>
                    <p>Rp. 1.000.000.000</p>
                </div>
                <div class="relative">
                    <div class="w-full rounded-full py-1 bg-gray-400"></div>
                    <div class="w-[40%] absolute top-0 left-0 rounded-full py-1 bg-[#014F31]"></div>
                </div>
                <div class="flex justify-between">
                    <div>
                        <h1 class="font-semibold">Terkumpul</h1>
                        <p>Rp. 1.000.000</p>
                    </div>
                    <div>
                        <h1 class="font-semibold">Donatur</h1>
                        <p>2052</p>
                    </div>
                </div>
            </div>

            <div class="bg-[#01502D] rounded-[12px] text-lg py-2 w-full text-center font-semibold text-white">Donasi
                Sekarang
            </div>
        </div>

        <div class="space-y-8">
            <div class="flex gap-10 text-2xl font-bold text-[#014F31]">
                <button class="text-[#014F31]/70">Detail</button>
                <button class="border-b-2 border-[#014F31]">Donatur</button>
            </div>

            {{--            <div class="text-lg space-y-3">--}}
            {{--                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Itaque minus quidem tenetur totam ullam--}}
            {{--                    vero!--}}
            {{--                    Aliquam, ducimus, sit! Adipisci atque ea molestiae molestias necessitatibus nemo nisi quas quod--}}
            {{--                    tenetur--}}
            {{--                    unde.</p>--}}
            {{--                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad aliquid atque dignissimos dolorem earum--}}
            {{--                    et--}}
            {{--                    incidunt inventore minus nam natus officia provident, repellat reprehenderit repudiandae, sequi--}}
            {{--                    soluta--}}
            {{--                    tempora veniam veritatis!</p>--}}
            {{--                <img src="{{asset('images/donasi-banner.png')}}" alt="">--}}
            {{--                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Itaque minus quidem tenetur totam ullam--}}
            {{--                    vero!--}}
            {{--                    Aliquam, ducimus, sit! Adipisci atque ea molestiae molestias necessitatibus nemo nisi quas quod--}}
            {{--                    tenetur--}}
            {{--                    unde.</p>--}}
            {{--                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad aliquid atque dignissimos dolorem earum--}}
            {{--                    et--}}
            {{--                    incidunt inventore minus nam natus officia provident, repellat reprehenderit repudiandae, sequi--}}
            {{--                    soluta--}}
            {{--                    tempora veniam veritatis!</p>--}}
            {{--                <img src="{{asset('images/donasi-banner.png')}}" alt="">--}}
            {{--            </div>--}}

            <div class="space-y-3">
                <div class="p-10 rounded-[12px] flex gap-5 bg-gray-200 w-full items-center">
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                             class="w-16 h-16 fill-[#014F31]">
                            <path fill-rule="evenodd"
                                  d="M7.5 6a4.5 4.5 0 119 0 4.5 4.5 0 01-9 0zM3.751 20.105a8.25 8.25 0 0116.498 0 .75.75 0 01-.437.695A18.683 18.683 0 0112 22.5c-2.786 0-5.433-.608-7.812-1.7a.75.75 0 01-.437-.695z"
                                  clip-rule="evenodd"/>
                        </svg>
                    </div>

                    <div class="space-y-2">
                        <p class="text-xl">Wahyu Triono</p>
                        <p class="text-[#014F31] font-bold text-3xl">Rp. 100.000</p>
                        <p class="text-xl italic">2 Hari yang lalu</p>
                    </div>
                </div>
                <div class="p-10 rounded-[12px] flex gap-5 bg-gray-200 w-full items-center">
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                             class="w-16 h-16 fill-[#014F31]">
                            <path fill-rule="evenodd"
                                  d="M7.5 6a4.5 4.5 0 119 0 4.5 4.5 0 01-9 0zM3.751 20.105a8.25 8.25 0 0116.498 0 .75.75 0 01-.437.695A18.683 18.683 0 0112 22.5c-2.786 0-5.433-.608-7.812-1.7a.75.75 0 01-.437-.695z"
                                  clip-rule="evenodd"/>
                        </svg>
                    </div>

                    <div class="space-y-2">
                        <p class="text-xl">Wahyu Triono</p>
                        <p class="text-[#014F31] font-bold text-3xl">Rp. 100.000</p>
                        <p class="text-xl italic">2 Hari yang lalu</p>
                    </div>
                </div>
                <div class="p-10 rounded-[12px] flex gap-5 bg-gray-200 w-full items-center">
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                             class="w-16 h-16 fill-[#014F31]">
                            <path fill-rule="evenodd"
                                  d="M7.5 6a4.5 4.5 0 119 0 4.5 4.5 0 01-9 0zM3.751 20.105a8.25 8.25 0 0116.498 0 .75.75 0 01-.437.695A18.683 18.683 0 0112 22.5c-2.786 0-5.433-.608-7.812-1.7a.75.75 0 01-.437-.695z"
                                  clip-rule="evenodd"/>
                        </svg>
                    </div>

                    <div class="space-y-2">
                        <p class="text-xl">Wahyu Triono</p>
                        <p class="text-[#014F31] font-bold text-3xl">Rp. 100.000</p>
                        <p class="text-xl italic">2 Hari yang lalu</p>
                    </div>
                </div>
                <div class="p-10 rounded-[12px] flex gap-5 bg-gray-200 w-full items-center">
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                             class="w-16 h-16 fill-[#014F31]">
                            <path fill-rule="evenodd"
                                  d="M7.5 6a4.5 4.5 0 119 0 4.5 4.5 0 01-9 0zM3.751 20.105a8.25 8.25 0 0116.498 0 .75.75 0 01-.437.695A18.683 18.683 0 0112 22.5c-2.786 0-5.433-.608-7.812-1.7a.75.75 0 01-.437-.695z"
                                  clip-rule="evenodd"/>
                        </svg>
                    </div>

                    <div class="space-y-2">
                        <p class="text-xl">Wahyu Triono</p>
                        <p class="text-[#014F31] font-bold text-3xl">Rp. 100.000</p>
                        <p class="text-xl italic">2 Hari yang lalu</p>
                    </div>
                </div>
                <div class="p-10 rounded-[12px] flex gap-5 bg-gray-200 w-full items-center">
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                             class="w-16 h-16 fill-[#014F31]">
                            <path fill-rule="evenodd"
                                  d="M7.5 6a4.5 4.5 0 119 0 4.5 4.5 0 01-9 0zM3.751 20.105a8.25 8.25 0 0116.498 0 .75.75 0 01-.437.695A18.683 18.683 0 0112 22.5c-2.786 0-5.433-.608-7.812-1.7a.75.75 0 01-.437-.695z"
                                  clip-rule="evenodd"/>
                        </svg>
                    </div>

                    <div class="space-y-2">
                        <p class="text-xl">Wahyu Triono</p>
                        <p class="text-[#014F31] font-bold text-3xl">Rp. 100.000</p>
                        <p class="text-xl italic">2 Hari yang lalu</p>
                    </div>
                </div>
                <div class="p-10 rounded-[12px] flex gap-5 bg-gray-200 w-full items-center">
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                             class="w-16 h-16 fill-[#014F31]">
                            <path fill-rule="evenodd"
                                  d="M7.5 6a4.5 4.5 0 119 0 4.5 4.5 0 01-9 0zM3.751 20.105a8.25 8.25 0 0116.498 0 .75.75 0 01-.437.695A18.683 18.683 0 0112 22.5c-2.786 0-5.433-.608-7.812-1.7a.75.75 0 01-.437-.695z"
                                  clip-rule="evenodd"/>
                        </svg>
                    </div>

                    <div class="space-y-2">
                        <p class="text-xl">Wahyu Triono</p>
                        <p class="text-[#014F31] font-bold text-3xl">Rp. 100.000</p>
                        <p class="text-xl italic">2 Hari yang lalu</p>
                    </div>
                </div>
                <div class="p-10 rounded-[12px] flex gap-5 bg-gray-200 w-full items-center">
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                             class="w-16 h-16 fill-[#014F31]">
                            <path fill-rule="evenodd"
                                  d="M7.5 6a4.5 4.5 0 119 0 4.5 4.5 0 01-9 0zM3.751 20.105a8.25 8.25 0 0116.498 0 .75.75 0 01-.437.695A18.683 18.683 0 0112 22.5c-2.786 0-5.433-.608-7.812-1.7a.75.75 0 01-.437-.695z"
                                  clip-rule="evenodd"/>
                        </svg>
                    </div>

                    <div class="space-y-2">
                        <p class="text-xl">Wahyu Triono</p>
                        <p class="text-[#014F31] font-bold text-3xl">Rp. 100.000</p>
                        <p class="text-xl italic">2 Hari yang lalu</p>
                    </div>
                </div>
                <div class="p-10 rounded-[12px] flex gap-5 bg-gray-200 w-full items-center">
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                             class="w-16 h-16 fill-[#014F31]">
                            <path fill-rule="evenodd"
                                  d="M7.5 6a4.5 4.5 0 119 0 4.5 4.5 0 01-9 0zM3.751 20.105a8.25 8.25 0 0116.498 0 .75.75 0 01-.437.695A18.683 18.683 0 0112 22.5c-2.786 0-5.433-.608-7.812-1.7a.75.75 0 01-.437-.695z"
                                  clip-rule="evenodd"/>
                        </svg>
                    </div>

                    <div class="space-y-2">
                        <p class="text-xl">Wahyu Triono</p>
                        <p class="text-[#014F31] font-bold text-3xl">Rp. 100.000</p>
                        <p class="text-xl italic">2 Hari yang lalu</p>
                    </div>
                </div>
                <div class="p-10 rounded-[12px] flex gap-5 bg-gray-200 w-full items-center">
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                             class="w-16 h-16 fill-[#014F31]">
                            <path fill-rule="evenodd"
                                  d="M7.5 6a4.5 4.5 0 119 0 4.5 4.5 0 01-9 0zM3.751 20.105a8.25 8.25 0 0116.498 0 .75.75 0 01-.437.695A18.683 18.683 0 0112 22.5c-2.786 0-5.433-.608-7.812-1.7a.75.75 0 01-.437-.695z"
                                  clip-rule="evenodd"/>
                        </svg>
                    </div>

                    <div class="space-y-2">
                        <p class="text-xl">Wahyu Triono</p>
                        <p class="text-[#014F31] font-bold text-3xl">Rp. 100.000</p>
                        <p class="text-xl italic">2 Hari yang lalu</p>
                    </div>
                </div>
                <div class="p-10 rounded-[12px] flex gap-5 bg-gray-200 w-full items-center">
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                             class="w-16 h-16 fill-[#014F31]">
                            <path fill-rule="evenodd"
                                  d="M7.5 6a4.5 4.5 0 119 0 4.5 4.5 0 01-9 0zM3.751 20.105a8.25 8.25 0 0116.498 0 .75.75 0 01-.437.695A18.683 18.683 0 0112 22.5c-2.786 0-5.433-.608-7.812-1.7a.75.75 0 01-.437-.695z"
                                  clip-rule="evenodd"/>
                        </svg>
                    </div>

                    <div class="space-y-2">
                        <p class="text-xl">Wahyu Triono</p>
                        <p class="text-[#014F31] font-bold text-3xl">Rp. 100.000</p>
                        <p class="text-xl italic">2 Hari yang lalu</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
