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
            <h2 class="text-xl font-semibold">Ubah Data Pendistribusian</h2>
        </div>

        <form action="{{ route('pengumpulan.update', $id) }}" class="space-y-6" method="POST">
            @csrf
            <div class="grid grid-cols-2 gap-5">
                <div class="space-y-2">
                    <p>Bulan <label class="text-red-700">*</label></p>
                    <select name="bulan" class="w-full bg-[#F6F8FA] rounded-[12px] py-2 px-4">
                        <option value="{{$data->bulan}}" selected>{{$data->bulanToString($data->bulan)}}</option>
                        <option disabled>=================</option>
                        @foreach ($bulan as $index => $bulan)
                            <option value="{{ $index }}">
                                {{ $bulan }}
                            </option>
                        @endforeach
                    </select>
                    @error('bulan')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <div class="space-y-2">
                    <p>Tahun <label class="text-red-700">*</label></p>
                    <input type="number" value="{{ $data->tahun }}" name="tahun"
                           class="w-full bg-[#F6F8FA] rounded-[12px] py-2 px-4">
                    @error('tahun')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <div class="space-y-2">
                    <p>Target Zakat <label class="text-red-700">*</label></p>
                    <input type="number" value="{{ $data->target_zakat }}" name="target_zakat"
                           class="w-full bg-[#F6F8FA] rounded-[12px] py-2 px-4">
                    @error('target_zakat')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <div class="space-y-2">
                    <p>Target Infak <label class="text-red-700">*</label></p>
                    <input type="number" value="{{ $data->target_infak }}" name="target_infak"
                           class="w-full bg-[#F6F8FA] rounded-[12px] py-2 px-4">
                    @error('target_infak')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <div class="space-y-2">
                    <p>Target CSR <label class="text-red-700">*</label></p>
                    <input type="number" value="{{ $data->target_csr }}" name="target_csr"
                           class="w-full bg-[#F6F8FA] rounded-[12px] py-2 px-4">
                    @error('target_csr')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <div class="space-y-2">
                    <p>Target DSKL <label class="text-red-700">*</label></p>
                    <input type="number" value="{{ $data->target_dskl }}" name="target_dskl"
                           class="w-full bg-[#F6F8FA] rounded-[12px] py-2 px-4">
                    @error('target_dskl')
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
        function toggleJenis() {
            if ($('.jenis').val() == 'perorangan') {
                $('.nik').removeClass('hidden');
                $('.nama').html('Nama <label class="text-red-700"> *</label>');
                $('.jenis-kelamin').removeClass('hidden');
                $('.telepon').removeClass('hidden');

                $('.nik-pimpinan').addClass('hidden');
                $('.nama-pimpinan').addClass('hidden');
                $('.nama-cp').addClass('hidden');
                $('.telp-cp').addClass('hidden');
                $('.alamat').removeClass('col-span-2');
            } else {
                $('.nik').addClass('hidden');
                $('.nama').html('Nama Lembaga <label class="text-red-700"> *</label>');
                $('.jenis-kelamin').addClass('hidden');
                $('.telepon').addClass('hidden');

                $('.nik-pimpinan').removeClass('hidden');
                $('.nama-pimpinan').removeClass('hidden');
                $('.nama-cp').removeClass('hidden');
                $('.telp-cp').removeClass('hidden');
                $('.alamat').addClass('col-span-2');
            }
        }
    </script>
@endpush
