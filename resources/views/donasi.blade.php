@extends('layouts.homePage.main')

@section('content')
    <div class="space-y-10 lg:px-20 px-10">
        <div class="space-y-2 text-[#014F31]">
            <h1 class="text-3xl font-bold">OPEN DONASI</h1>
            <p class="text-2xl font-semibold">Ayoo bantu sodara kita yang membutuhkan</p>
        </div>

        <div class="grid lg:grid-cols-3 grid-cols-1 gap-7">
            @foreach($data as $d)
                <a href="{{route('home-page.donasi.detail', $d->id)}}" class="rounded-[12px] shadow-xl">
                    @php
                        $banner = 'images/donasi-banner.png';

                        if($d->banner) {
                            $banner = 'uploads/donasi/'.$d->banner;
                        }
                    @endphp
                    <img src="{{asset($banner)}}"
                         class="rounded-t-[12px] h-60 w-full object-cover" alt="">
                    <div class="p-5 space-y-5">
                        <div class="space-y-2">
                            <h1 class="font-bold">{{ucwords($d->judul)}}</h1>
                            <p>{{substr($d->deskripsi_singkat, 0, 40) . '...'}}</p>
                        </div>
                        <div class="space-y-3">
                            <div class="relative">
                                <div class="w-full rounded-full py-1 bg-gray-400"></div>
                                <div class="w-[40%] absolute top-0 left-0 rounded-full py-1 bg-[#014F31]"></div>
                            </div>
                            <div class="flex justify-between">
                                <div>
                                    <h1 class="font-semibold">Terkumpul</h1>
                                    <p>Rp. {{ number_format($d->terkumpul(), 0, ',', '.') }}</p>
                                </div>
                                <div>
                                    <h1 class="font-semibold">Donatur</h1>
                                    <p>{{$d->jumlahDonatur()}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
@endsection
