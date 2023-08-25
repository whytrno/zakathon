@extends('layouts.dashboard.main')

@section('content')
    <div class="flex justify-between items-center">
        <a href="{{ route('muzakki.index') }}"
            class="flex gap-2 hover:bg-[#1D8E48] items-center bg-[#014F31] rounded-2xl p-2 px-4 text-white fill-white stroke-white">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
            </svg>
            Kembali
        </a>
    </div>

    <div class="bg-white shadow-xl rounded-[12px] p-7 space-y-5 border border-gray-300">
        <div class="border-b-2 border-gray-800 flex justify-between pb-2">
            <h2 class="text-xl font-semibold">Ubah Data Muzakki</h2>
        </div>

        <form action="{{ route('mustahiq.update', $data->id) }}" class="space-y-6" method="POST">
            @csrf
            <div class="grid grid-cols-2 gap-5">
                <div class="space-y-2">
                    <p>Jenis Mustahiq <label class="text-red-700">*</label></p>
                    <select onchange="toggleJenis()" name="jenis"
                        class="jenis w-full bg-[#F6F8FA] rounded-[12px] py-2 px-4" required>
                        <option value="{{ $data->jenis }}" selected>{{ ucwords($data->jenis) }}</option>
                        <option disabled>=====================</option>
                        <option value="perorangan">Perorangan
                        </option>
                        <option value="lembaga upz">Kelompok</option>
                    </select>
                    @error('jenis')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <div class="space-y-2">
                    <p class="nama">Nama <label class="text-red-700"> *</label></p>
                    <input type="text" value="{{ $data->user->nama }}" name="nama"
                        class="w-full bg-[#F6F8FA] rounded-[12px] py-2 px-4">
                    @error('nama')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <div class="tempat_lahir space-y-2 {{ $data->jenis != 'perorangan' ? 'hidden' : '' }}">
                    <p>Tempat Lahir <label class="text-red-700">*</label></p>
                    <input type="text" value="{{ $data->tempat_lahir }}" name="tempat_lahir"
                        class="w-full bg-[#F6F8FA] rounded-[12px] py-2 px-4">
                    @error('tempat_lahir')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <div class="tanggal_lahir space-y-2 {{ $data->jenis != 'perorangan' ? 'hidden' : '' }}">
                    <p>Tanggal Lahir <label class="text-red-700">*</label></p>
                    <input type="date" value="{{ $data->tanggal_lahir }}" name="tanggal_lahir"
                        class="w-full bg-[#F6F8FA] rounded-[12px] py-2 px-4">
                    @error('tanggal_lahir')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <div class="space-y-2">
                    <p class="email">Email <label class="text-red-700"> *</label></p>
                    <input type="text" value="{{ $data->user->email }}" name="email"
                        class="w-full bg-[#F6F8FA] rounded-[12px] py-2 px-4">
                    @error('email')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <div class="space-y-2">
                    <p>Pemilik Rekening <label class="text-red-700">*</label></p>
                    <input type="text" value="{{ $data->pemilik_rekening }}" name="pemilik_rekening"
                        class="w-full bg-[#F6F8FA] rounded-[12px] py-2 px-4" required>
                    @error('pemilik_rekening')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <div class="space-y-2">
                    <p>Bank <label class="text-red-700">*</label></p>
                    <select name="bank" class="jenis w-full bg-[#F6F8FA] rounded-[12px] py-2 px-4" required>
                        <option value="{{ $data->bank }}" selected>{{ ucwords($data->bank) }}</option>
                        <option disabled>=======================</option>
                        @foreach ($banks as $bank)
                            <option value="{{ $bank }}">
                                {{ ucfirst($bank) }}
                            </option>
                        @endforeach
                    </select>
                    @error('bank')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <div class="space-y-2">
                    <p>No. Rekening <label class="text-red-700">*</label></p>
                    <input type="number" value="{{ $data->no_rek }}" name="no_rek"
                        class="w-full bg-[#F6F8FA] rounded-[12px] py-2 px-4" required>
                    @error('no_rek')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <div class="space-y-2">
                    <p>Asnaf <label class="text-red-700">*</label></p>
                    <select name="asnaf" class="jenis w-full bg-[#F6F8FA] rounded-[12px] py-2 px-4" required>
                        <option value="{{ $data->asnaf }}" selected>{{ ucwords($data->asnaf) }}</option>
                        <option disabled>=======================</option>
                        @foreach ($asnafs as $asnaf)
                            <option value="{{ $asnaf }}">
                                {{ ucfirst($asnaf) }}
                            </option>
                        @endforeach
                    </select>
                    @error('asnaf')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>


                {{-- Perorangan --}}
                <div class="nik space-y-2 {{ $data->jenis != 'perorangan' ? 'hidden' : '' }}">
                    <p>NIK<label class="text-red-700">*</label></p>
                    <input type="number" value="{{ $data->user->nik }}" name="nik"
                        class="w-full bg-[#F6F8FA] rounded-[12px] py-2 px-4">
                    @error('nik')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <div class="space-y-2 {{ $data->jenis != 'perorangan' ? 'hidden' : '' }}">
                    <p>Pekerjaan <label class="text-red-700">*</label></p>
                    <select name="pekerjaan" class="jenis w-full bg-[#F6F8FA] rounded-[12px] py-2 px-4">
                        <option value="{{ $data->pekerjaan }}" selected>{{ ucwords($data->pekerjaan) }}</option>
                        <option disabled>=======================</option>
                        @foreach ($pekerjaans as $pekerjaan)
                            <option value="{{ $pekerjaan }}">
                                {{ ucfirst($pekerjaan) }}
                            </option>
                        @endforeach
                    </select>
                    @error('pekerjaan')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                {{-- End Perorangan --}}

                {{-- Kelompok --}}
                <div class="space-y-2 {{ $data->jenis != 'perorangan' ? '' : 'hidden' }}">
                    <p>Jumlah Anggota <label class="text-red-700">*</label></p>
                    <input type="number" value="{{ $data->jumlah_anggota }}" name="jumlah_anggota"
                        class="w-full bg-[#F6F8FA] rounded-[12px] py-2 px-4">
                    @error('jumlah_anggota')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                {{-- End Lembaga --}}

                <div class="jenis_kelamin space-y-2 {{ $data->jenis != 'perorangan' ? 'hidden' : '' }}">
                    <p>Jenis Kelamin <label class="text-red-700">*</label></p>
                    <select name="jenis_kelamin" class="w-full bg-[#F6F8FA] rounded-[12px] py-2 px-4">
                        <option value="laki laki" {{ $data->user->jenis_kelamin == 'laki laki' ? 'selected' : '' }}>Laki
                            Laki</option>
                        <option value="perempuan" {{ $data->jenis_kelamin == 'perempuan' ? 'selected' : '' }}>
                            Perempuan</option>
                    </select>
                    @error('jenis_kelamin')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <div class="telepon space-y-2">
                    <p>Telepon <label class="text-red-700">*</label></p>
                    <input type="number" value="{{ $data->user->telepon }}" name="telepon"
                        class="w-full bg-[#F6F8FA] rounded-[12px] py-2 px-4">
                    @error('telepon')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <div class="alamat space-y-2 {{ $data->jenis != 'perorangan' ? 'col-span-2' : '' }}">
                    <p>Alamat <label class="text-red-700">*</label></p>
                    <input type="text" value="{{ $data->user->alamat }}" name="alamat"
                        class="w-full bg-[#F6F8FA] rounded-[12px] py-2 px-4">
                    @error('alamat')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="flex justify-end gap-3">
                <button type="submit" class="bg-[#014F31] py-2 px-4 rounded-[12px] text-white">Ubah</button>
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
