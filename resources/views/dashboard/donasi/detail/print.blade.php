<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="flex justify-center">
<div class="p-10 w-3/4">
    <div class="border-[3px] border-blue-800 p-10 text-black/80 space-y-14">
        <div class="grid grid-cols-3 border-b-2 border-blue-800 pb-2 items-end">
            <div class="col-span-1">
                <img class="h-24" src="{{asset('logo.png')}}" alt="">
            </div>
            <div class="w-full col-span-1 flex justify-center">
                <h1 class="border-b-[3px] w-min border-blue-800 text-2xl font-bold text-blue-800">
                    KUITANSI</h1>
            </div>
            <div class="flex justify-end">
                <div class="col-span-1 w-min justify-end flex gap-3 border-2 border-blue-800 px-1 py-2">
                    <p class="font-semibold text-blue-800">No:</p>
                    <p>{{$data->no_pendistribusian}}</p>
                </div>
            </div>
        </div>
        <div class="space-y-4">
            <div class="grid grid-cols-12">
                <div class="col-span-3 mb-4 text-blue-800">
                    <p class="font-semibold">Dibayarkan Kepada</p>
                    <p class="italic font-bold">paid to</p>
                </div>
                <div class="col-span-9 flex gap-2">
                    <p>:</p>
                    <p class="border-b border-blue-800 h-min">{{$data->mustahiq->user->nama}}
                        ({{$data->mustahiq->user->alamat}}
                        )</p>
                </div>
                <div class="col-span-3 mb-4 text-blue-800">
                    <p class="font-semibold">Jumlah</p>
                    <p class="italic font-bold">amount</p>
                </div>
                <div class="col-span-9 flex gap-2">
                    <p>:</p>
                    <p class="italic border-blue-800 bg-gray-300 w-full px-2 h-min py-2">{{ucwords($data->terbilang)}}</p>
                </div>
                <div class="col-span-3 mb-4 text-blue-800">
                    <p class="font-semibold">Untuk pembayaran</p>
                    <p class="italic font-bold">payment for</p>
                </div>
                <div class="col-span-9 flex gap-2">
                    <p>:</p>
                    <p class="border-b border-blue-800 h-min w-full">{{$data->pendistribusian->program}}</p>
                </div>
            </div>

            <div class="grid grid-cols-2">
                <div class="flex gap-4 items-center">
                    <h1 class="italic text-xl font-bold text-blue-800">Rp</h1>
                    <p class="w-3/4 p-2 text-right bg-gray-300">{{ number_format($data->jumlah, 0, ',', '.') }}</p>
                </div>
                <div class="flex justify-end gap-1">
                    <div class="flex">
                        <p class="border-b-2 border-blue-800">Banyumas</p>
                        <p>,</p>
                    </div>
                    <p class="border-b-2 border-blue-800">{{$data->created_at}}</p>
                </div>
            </div>
        </div>
        <div class="grid grid-cols-3 text-blue-800">
            <div>
                <p class="font-bold">BADAN AMIL ZAKAT NASIONAL</p>
                <p class="font-bold">Kabupaten Banyumas</p>
                <p>jl. Masjid No.9 Purwokerto, Kel. Sokanegara,
                    Telp. 0281631698 Fax.</p>
            </div>
            <div class="flex justify-center items-end">
                <div class="w-3/4 text-center">
                    <p class="w-full border-b-2 border-blue-800 text-black/80">{{$data->mustahiq->user->nama}}</p>
                    <p>Penerima</p>
                </div>
            </div>
            <div class="flex justify-center items-end">
                <div class="w-3/4 text-center">
                    <p class="w-full border-b-2 border-blue-800 text-black/80">{{auth()->user()->nama}}</p>
                    <p>Petugas</p>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
