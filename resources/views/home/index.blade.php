@extends('layouts.main')

@section('content')
    <div class="flex flex-col justify-center items-center h-full space-y-[40px] mb-40 mt-10">
        <div class="lg:w-1/2 lg:px-20 px-10 w-full lg:px-0 space-y-4">
            <div class="flex justify-center">
                <img src="{{ asset('images/banner.png') }}" alt="banner">
            </div>
            <h1 class="text-center font-bold text-md">TUNAIKAN ZAKAT, INFAQ & SEDEKAH<br>DENGAN AMAN & MUDAH</h1>
            <form action="{{route('home.bayar-zakat')}}" class="space-y-8" method="POST"
                  enctype="multipart/form-data">
                @csrf
                <div class="bg-[#FBFBFB] rounded-[12px] drop-shadow-xl py-8 space-y-4 px-6 ">
                    @csrf
                    <div class="space-y-2">
                        <p>Nama Lengkap</p>
                        <input type="text" readonly value="{{$user->nama}}" id=""
                               placeholder="Masukkan Nama Lengkap"
                               class="rounded-[12px] px-4 py-2 shadow-lg w-full bg-gray-200">
                    </div>
                    <div class="space-y-2">
                        <p>Jenis</p>
                        <input type="text" readonly value="{{ucwords($user->muzakki->jenis)}}" id=""
                               class="rounded-[12px] px-4 py-2 shadow-lg w-full bg-gray-200">
                    </div>
                    <div class="space-y-2 ">
                        <p>Jenis Dana</p>
                        <select name="jenis_dana" class="w-full rounded-[12px] px-4 py-2 shadow-lg w-full" name=""
                                id="">
                            @foreach($jenis_dana as $jd)
                                <option value="{{$jd}}">{{ucwords($jd)}}</option>
                            @endforeach
                        </select>
                        @error('jenis_dana')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    {{--                    <div class="bank space-y-2 ">--}}
                    {{--                        <p>Pilih Bank <label class="text-red-700">*</label></p>--}}
                    {{--                        <select name="rekening_id" class="-full rounded-[12px] px-4 py-2 shadow-lg w-full">--}}
                    {{--                            <option value="" selected>Pilih Rekening</option>--}}
                    {{--                            @foreach($rekening as $r)--}}
                    {{--                                <option value="{{$r->id}}">{{$r->bank}} - {{$r->no_rek}}--}}
                    {{--                                    - {{$r->pemilik_rekening}}</option>--}}
                    {{--                            @endforeach--}}
                    {{--                        </select>--}}
                    {{--                        @error('rekening_id')--}}
                    {{--                        <span class="text-red-500 text-sm">{{ $message }}</span>--}}
                    {{--                        @enderror--}}
                    {{--                    </div>--}}

                    <div class="space-y-2">
                        <p>Nominal</p>
                        <div class="flex rounded-[12px] shadow-lg w-full ">
                            <div class="flex items-center justify-center bg-[#1D8E4880] px-2 py-2 rounded-[12px]">
                                <p class="rounded-[12px] px-2 text-white">RP.</p>
                            </div>
                            <input type="number" name="jumlah" id="" class="rounded-r-[12px] px-4 py-2 w-full"
                                   placeholder="Masukkan Jumlah Nominal">
                        </div>
                        @error('jumlah')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>


                    {{--                    <div class="space-y-2 col-span-2">--}}
                    {{--                        <p>Upload Bukti Pembayaran <label class="text-red-700">*</label></p>--}}
                    {{--                        <div onclick="document.getElementById('file').click()" id="file-container"--}}
                    {{--                             class="cursor-pointer hover:text-[#014F31] hover:border-[#014F31] hover:fill-[#014F31] flex flex-col items-center rounded-[12px] py-8 justyfy-center border-dashed border-2 text-gray-300 fill-gray-300">--}}
                    {{--                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"--}}
                    {{--                                 class="w-16 h-16">--}}
                    {{--                                <path fill-rule="evenodd"--}}
                    {{--                                      d="M10.5 3.75a6 6 0 00-5.98 6.496A5.25 5.25 0 006.75 20.25H18a4.5 4.5 0 002.206-8.423 3.75 3.75 0 00-4.133-4.303A6.001 6.001 0 0010.5 3.75zm2.03 5.47a.75.75 0 00-1.06 0l-3 3a.75.75 0 101.06 1.06l1.72-1.72v4.94a.75.75 0 001.5 0v-4.94l1.72 1.72a.75.75 0 101.06-1.06l-3-3z"--}}
                    {{--                                      clip-rule="evenodd"/>--}}
                    {{--                            </svg>--}}
                    {{--                            <p id="file-name" class="font-semibold">Lampirkan file Anda di sini atau jelajahi file</p>--}}
                    {{--                        </div>--}}
                    {{--                        <div class="text-black/30">--}}
                    {{--                            <p>Jenis file yang diterima: png | jpg | jpeg</p>--}}
                    {{--                            <p>Ukuran maksimal file : 2MB</p>--}}
                    {{--                        </div>--}}
                    {{--                        <input type="file" name="bukti_pembayaran_file" id="file" class="hidden" accept="image/*">--}}
                    {{--                        @error('bukti_pembayaran_file')--}}
                    {{--                        <span class="text-red-500 text-sm">{{ $message }}</span>--}}
                    {{--                        @enderror--}}
                    {{--                    </div>--}}

                    <button class="rounded-[12px] w-full py-2 text-[#FFFFFF] bg-[#1D8E48]">Bayar
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection


@push('scripts')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
            crossorigin="anonymous"></script>

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
                    window.location.href = '/home/history'
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
    <script>
        $(document).ready(function () {
            $('#file').on('change', function () {
                var fileName = this.files[0].name;
                console.log(fileName)

                $('#file-container').removeClass('text-gray-300 fill-gray-300')
                    .addClass('border-[#014F31] text-[#014F31] fill-[#014F31] border-2');

                var fileText = document.getElementById('file-name');
                fileText.textContent = fileName;
            });
        })

        const showModalButton = document.getElementById('showModal');
        const closeModalButton = document.getElementById('closeModal');
        const modal = document.getElementById('modal');

        showModalButton.addEventListener('click', () => {
            modal.classList.remove('hidden');
        });

        closeModalButton.addEventListener('click', () => {
            modal.classList.add('hidden');
        });
    </script>
@endpush
