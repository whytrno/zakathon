@extends('layouts.dashboard.main')

@section('content')
    <div class="flex justify-between items-center">
        <a href="{{ route('pendistribusian.index') }}"
           class="flex gap-2 hover:bg-[#1D8E48] items-center bg-[#014F31] rounded-2xl p-2 px-4 text-white fill-white stroke-white">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                 stroke="currentColor"
                 class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5"/>
            </svg>
            Kembali
        </a>
    </div>

    <div class="bg-white shadow-xl rounded-[12px] p-7 space-y-5 border border-gray-300">
        <div class="border-b-2 border-gray-800 flex justify-between pb-2">
            <h2 class="text-xl font-semibold">Tambah Data Detail Pendistribusian {{ $data->program }}</h2>
        </div>

        <form action="{{ route('pendistribusian.detail.store', $id) }}" class="space-y-6" method="POST"
              enctype="multipart/form-data">
            @csrf
            <div class="grid grid-cols-2 gap-5">
                <div class="space-y-2 col-span-2">
                    <p>Nama Program <label class="text-red-700">*</label></p>
                    <input readonly type="text" value="{{ $data->program }}"
                           class="w-full bg-gray-300 rounded-[12px] py-2 px-4">
                    @error('program')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <div class="space-y-2">
                    <p>Cari Mustahiq (Nama atau NIM) <label class="text-red-700">*</label></p>
                    <input type="text" id="search" class="w-full bg-[#F6F8FA] rounded-[12px] py-2 px-4"
                           placeholder="Cari NIM atau Nama">
                </div>

                <div class="space-y-2">
                    <p>Pilih Mustahiq <label class="text-red-700">*</label></p>
                    <select name="mustahiq_id" class="w-full bg-[#F6F8FA] rounded-[12px] py-2 px-4">
                        <option value=""></option>
                    </select>
                    @error('mustahiq_id')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <div class="space-y-2">
                    <p>NIM <label class="text-red-700">*</label></p>
                    <input id="nim" readonly type="text" class="w-full bg-gray-300 rounded-[12px] py-2 px-4">
                </div>

                <div class="space-y-2">
                    <p>Nama Mustahiq <label class="text-red-700">*</label></p>
                    <input id="nama" readonly type="text" class="w-full bg-gray-300 rounded-[12px] py-2 px-4">
                </div>

                <div class="space-y-2">
                    <p>Jenis Mustahiq <label class="text-red-700">*</label></p>
                    <input id="jenis" readonly type="text" class="w-full bg-gray-300 rounded-[12px] py-2 px-4">
                </div>

                <div class="space-y-2">
                    <p>Asnaf <label class="text-red-700">*</label></p>
                    <input id="asnaf" readonly type="text" class="w-full bg-gray-300 rounded-[12px] py-2 px-4">
                </div>

                <div class="space-y-2">
                    <p>Via <label class="text-red-700">*</label></p>
                    <select onchange="toggleVia()" name="via" class="w-full bg-[#F6F8FA] rounded-[12px] py-2 px-4">
                        <option value="offline">Offline</option>
                        <option value="online">Online</option>
                    </select>
                    @error('via')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <div class="bank hidden space-y-2">
                    <p>Nama Bank <label class="text-red-700">*</label></p>
                    <input readonly id="bank" type="text" class="w-full bg-gray-300 rounded-[12px] py-2 px-4">
                </div>

                <div class="bank hidden space-y-2">
                    <p>Atas Nama <label class="text-red-700">*</label></p>
                    <input readonly id="pemilik_rekening" type="text"
                           class="w-full bg-gray-300 rounded-[12px] py-2 px-4">
                </div>

                <div class="bank hidden space-y-2">
                    <p>No. Rekening <label class="text-red-700">*</label></p>
                    <input readonly id="no_rek" type="text" class="w-full bg-gray-300 rounded-[12px] py-2 px-4">
                </div>

                <div class="space-y-2">
                    <p>Jenis Bantuan <label class="text-red-700">*</label></p>
                    <select name="jenis_bantuan" class="w-full bg-[#F6F8FA] rounded-[12px] py-2 px-4">
                        <option value="produktif">Produktif</option>
                        <option value="konsumtif">Konsumtif</option>
                    </select>
                    @error('jenis_bantuan')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <div id="jumlah" class="space-y-2 col-span-2">
                    <p>Jumlah Dana <label class="text-red-700">*</label></p>
                    <input type="number" name="jumlah" class="w-full bg-[#F6F8FA] rounded-[12px] py-2 px-4"
                           value="{{ old('jumlah') }}">
                    @error('jumlah')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <div class="space-y-2 col-span-2">
                    <p>Upload Bukti Pembayaran <label class="text-red-700">*</label></p>
                    <div onclick="document.getElementById('file').click()" id="file-container"
                         class="cursor-pointer hover:text-[#014F31] hover:border-[#014F31] hover:fill-[#014F31] flex flex-col items-center rounded-[12px] py-8 justyfy-center border-dashed border-2 text-gray-300 fill-gray-300">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                             class="w-16 h-16">
                            <path fill-rule="evenodd"
                                  d="M10.5 3.75a6 6 0 00-5.98 6.496A5.25 5.25 0 006.75 20.25H18a4.5 4.5 0 002.206-8.423 3.75 3.75 0 00-4.133-4.303A6.001 6.001 0 0010.5 3.75zm2.03 5.47a.75.75 0 00-1.06 0l-3 3a.75.75 0 101.06 1.06l1.72-1.72v4.94a.75.75 0 001.5 0v-4.94l1.72 1.72a.75.75 0 101.06-1.06l-3-3z"
                                  clip-rule="evenodd"/>
                        </svg>
                        <p id="file-name" class="font-semibold">Lampirkan file Anda di sini atau jelajahi file</p>
                    </div>
                    <div class="text-black/30">
                        <p>Jenis file yang diterima: png | jpg | jpeg</p>
                        <p>Ukuran maksimal file : 2MB</p>
                    </div>
                    <input type="file" name="bukti_pembayaran_file" id="file" class="hidden" accept="image/*">
                    @error('bukti_pembayaran_file')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="flex justify-end gap-3">
                <button type="submit" class="bg-[#014F31] py-2 px-4 rounded-[12px] text-white">Tambah</button>
            </div>
        </form>
    </div>
@endsection


@push('scripts')
    <script>
        function toggleVia() {
            $('.bank').toggleClass('hidden');
            $('#jumlah').toggleClass('col-span-2');
        }

        $(document).ready(function () {
            $('#file').on('change', function () {
                var fileName = this.files[0].name;

                $('#file-container').removeClass('text-gray-300 fill-gray-300')
                    .addClass('border-[#014F31] text-[#014F31] fill-[#014F31] border-2');

                var fileText = document.getElementById('file-name');
                fileText.textContent = fileName;
            });

            $('#search').on('keyup', function () {
                var query = $(this).val();
                if (query !== '') {
                    $.ajax({
                        url: '/dashboard/user/mustahiq/json/' + query,
                        method: 'GET',
                        data: {
                            query: query
                        },
                        success: function (data) {
                            console.log(data);
                            $('select[name="mustahiq_id"]').empty();
                            $('select[name="mustahiq_id"]').append(
                                '<option selected disabled>Pilih Mustahiq</option>'
                            );
                            $.each(data, function (key, value) {
                                $('select[name="mustahiq_id"]').append(
                                    '<option value="' + value.id + '">' + value.user
                                        .nama + '</option>'
                                );
                            });
                        }
                    });
                } else {
                    $('select[name="mustahiq_id"]').empty();
                }
            });

            $('select[name="mustahiq_id"]').change(function () {
                var selectedMustahiqId = $(this).val();

                $.ajax({
                    url: '/dashboard/user/mustahiq/json/detail/' + selectedMustahiqId,
                    method: 'GET',
                    success: function (data) {
                        $('#nim').val(data.nim);
                        $('#nama').val(data.user.nama);
                        $('#jenis').val(data.jenis);
                        $('#asnaf').val(data.asnaf);
                        $('#bank').val(data.bank);
                        $('#pemilik_rekening').val(data.pemilik_rekening);
                        $('#no_rek').val(data.no_rek);
                    }
                });
            });
        });
    </script>
@endpush
