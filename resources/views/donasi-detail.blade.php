@extends('layouts.homePage.main')

@section('content')
    <div class="lg:space-y-20 space-y-10 lg:px-20 px-10">
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
            <p class="text-2xl">{{$data->deskripsi_singkat}}</p>
        </div>

        <div class="space-y-8">
            <div class="space-y-3">
                <div class="flex justify-between">
                    <p>Rp. {{ number_format($data->terkumpul(), 0, ',', '.') }}</p>
                    <p>Rp. {{ number_format($data->target_donasi, 0, ',', '.') }}</p>
                </div>
                <div class="relative">
                    <div class="w-full rounded-full py-1 bg-gray-400"></div>
                    <div class="w-[{{$data->persen()}}%] absolute top-0 left-0 rounded-full py-1 bg-[#014F31]"></div>
                </div>
                <div class="flex justify-between">
                    <div>
                        <h1 class="font-semibold">Terkumpul</h1>
                        <p>Rp. {{ number_format($data->terkumpul(), 0, ',', '.') }}</p>
                    </div>
                    <div>
                        <h1 class="font-semibold">Donatur</h1>
                        <p class="float-right">{{$data->jumlahDonatur()}} orang</p>
                    </div>
                </div>
            </div>

            <button onclick="toggleDonate()" id="donate"
                    class="bg-[#01502D] rounded-[12px] text-lg py-2 w-full text-center font-semibold text-white">Donasi
                Sekarang
            </button>
        </div>

        <div class="space-y-8">
            <div class="flex gap-10 text-2xl font-bold text-[#014F31]">
                <button id="buttonDetail" class="border-b-2 border-[#014F31]" onclick="toggleDetail()">Detail</button>
                <button id="buttonDonatur" class="text-[#014F31]/70" onclick="toggleDonatur()">Donatur
                </button>
            </div>

            <div id="detail" class="text-lg space-y-3">
                <div>
                    {!! $data->deskripsi !!}
                </div>
            </div>

            <div id="donatur" class="hidden space-y-3">
                @if(count($data->transaksi) == 0)
                    <div class="space-y-2">
                        <p class="text-[#014F31] w-full py-10 font-bold text-3xl text-center">Belum Ada Donatur</p>
                    </div>
                @endif
                @foreach($data->transaksi as $donatur)
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
                            <p class="text-xl">{{$donatur->nama}}</p>
                            <p class="text-[#014F31] font-bold text-3xl">{{$donatur->jumlah}}</p>
                            <p class="text-xl italic">2 Hari yang lalu</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <div id="donateModal"
             class="fixed hidden h-full -top-20 left-0 w-full flex items-center justify-center z-10">
            <div
                class="w-1/3  bg-white shadow-xl rounded-[12px] p-7 space-y-5 border border-gray-300">
                <div class="border-b-2 border-gray-800 flex justify-between pb-2">
                    <h2 class="text-xl font-semibold">Donasi Sekarang</h2>
                    <svg onclick="toggleDonate()" xmlns="http://www.w3.org/2000/svg"
                         fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                         class="w-6 h-6 stroke-red-700 cursor-pointer">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </div>

                <form action="{{route('home-page.donasi.bantu', $id)}}" method="POST" class="space-y-5">
                    @csrf
                    <div class="space-y-5">
                        <div class="space-y-2 col-span-2">
                            <p>Nama <label class="text-red-700">(Dapat dikosongkan)</label></p>
                            <input type="text" value="{{ old('nama') }}" name="nama"
                                   class="w-full bg-[#F6F8FA] rounded-[12px] py-2 px-4">
                            @error('nama')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="space-y-2 col-span-2">
                            <p>Telepon <label class="text-red-700">(Dapat dikosongkan)</label></p>
                            <input type="number" value="{{ old('telepon') }}" name="telepon"
                                   class="w-full bg-[#F6F8FA] rounded-[12px] py-2 px-4">
                            @error('telepon')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="space-y-2 col-span-2">
                            <p>Email <label class="text-red-700">(Dapat dikosongkan)</label></p>
                            <input type="email" value="{{ old('email') }}" name="email"
                                   class="w-full bg-[#F6F8FA] rounded-[12px] py-2 px-4">
                            @error('email')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="space-y-2">
                            <p>Nominal</p>
                            <div class="flex rounded-[12px] w-full bg-[#F6F8FA]">
                                <div class="flex items-center justify-center bg-[#1D8E4880] px-2 py-2 rounded-[12px]">
                                    <p class="rounded-[12px] px-2 text-white">RP.</p>
                                </div>
                                <input type="number" name="jumlah" id=""
                                       class=" bg-[#F6F8FA] rounded-r-[12px] px-4 py-2 w-full"
                                       placeholder="Masukkan Jumlah Nominal">
                            </div>
                            @error('jumlah')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="flex justify-end gap-3">
                        <button type="submit" class="bg-[#014F31] py-2 px-4 rounded-[12px] text-white">Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('scripts')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
            crossorigin="anonymous"></script>

    <script>
        function toggleDetail() {
            $('#detail').removeClass('hidden');
            $('#donatur').addClass('hidden');
            $('#buttonDetail').removeClass('text-[#014F31]/70');
            $('#buttonDetail').addClass('border-b-2 border-[#014F31]');
            $('#buttonDonatur').removeClass('border-b-2 border-[#014F31]');
            $('#buttonDonatur').addClass('text-[#014F31]/70');
        }

        function toggleDonate() {
            $('#donateModal').toggleClass('hidden');
        }

        function toggleDonatur() {
            $('#detail').addClass('hidden');
            $('#donatur').removeClass('hidden');
            $('#buttonDetail').addClass('text-[#014F31]/70');
            $('#buttonDetail').removeClass('border-b-2 border-[#014F31]');
            $('#buttonDonatur').addClass('border-b-2 border-[#014F31]');
            $('#buttonDonatur').removeClass('text-[#014F31]/70');
        }
    </script>
    @if(!is_null($snapToken))
        <script type="text/javascript">
            // For example trigger on button clicked, or any time you need
            var payButton = document.getElementById('pay-button');
            // payButton.addEventListener('click', function () {
            // Trigger snap popup. @TODO: Replace TRANSACTION_TOKEN_HERE with your transaction token
            window.snap.pay('{{$snapToken}}', {
                onSuccess: function (result) {
                    /* You may add your own implementation here */
                    // alert("payment success!");
                    // console.log(result);
                    window.location.href = '/donasi/' + '{{$id}}'
                    // toggleSucces()
                },
                onPending: function (result) {
                    /* You may add your own implementation here */
                    alert("wating your payment!");
                    console.log(result);
                },
                onError: function (result) {
                    /* You may add your own implementation here */
                    alert("payment failed!");
                    console.log(result);
                },
                onClose: function () {
                    /* You may add your own implementation here */
                    alert('you closed the popup without finishing the payment');
                }
                // })
            });
        </script>
    @endif
@endpush
