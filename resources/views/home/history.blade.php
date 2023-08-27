@extends('layouts.main')

@section('content')
    <div class="flex flex-col justify-center items-center h-full space-y-[40px] mb-40 mt-10">
        <div class="lg:w-2/5 px-20 lg:px-0 space-y-5">
            <h1 class="text-xl font-bold pb-2 border-b-2 w-full">Riwayat Pengumpulan</h1>

            <div class="flex flex-col gap-4">
                @foreach($data as $d)
                    <div
                        class="border-2 flex justify-between items-center rounded-[12px] font-semibold shadow-lg px-5 py-3">
                        <div class="space-y-2">
                            <p class="font-bold">Pembayaran</p>
                            <p>{{ucwords($d->jenis_dana)}}</p>
                        </div>
                        <div class="space-y-2">
                            <p class="text-center p-2 bg-blue-200 rounded-full">{{ucwords($d->status)}}</p>
                            <p>{{$d->created_at}}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
