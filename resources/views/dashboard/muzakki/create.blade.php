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
            <h2 class="text-xl font-semibold">Tambah Data Muzakki</h2>
        </div>

        <form action="{{ route('muzakki.store') }}" class="space-y-6" method="POST">
            @csrf
            <div class="grid grid-cols-2 gap-5">
                <div class="space-y-2">
                    <p>Jenis Muzakki <label class="text-red-700">*</label></p>
                    <select onchange="toggleJenis('create', null)" name="jenis"
                        class="jenis w-full bg-[#F6F8FA] rounded-[12px] py-2 px-4" required>
                        <option value="perorangan" {{ old('jenis') == 'perorangan' ? 'selected' : '' }}>Perorangan
                        </option>
                        <option value="lembaga upz" {{ old('jenis') == 'lembaga upz' ? 'selected' : '' }}>Lembaga
                            UPZ</option>
                        <option value="lembaga non upz" {{ old('jenis') == 'lembaga non upz' ? 'selected' : '' }}>
                            Lembaga non UPZ</option>
                    </select>
                    @error('jenis')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                {{-- Perorangan --}}
                <div class="nik space-y-2">
                    <p>NIK <label class="text-red-700">*</label></p>
                    <input type="number" value="{{ old('nik') }}" name="nik"
                        class="w-full bg-[#F6F8FA] rounded-[12px] py-2 px-4">
                    @error('nik')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                {{-- End Perorangan --}}

                {{-- Lembaga --}}
                <div class="nik-pimpinan hidden space-y-2">
                    <p>NIK Pimpinan <label class="text-red-700">*</label></p>
                    <input type="number" value="{{ old('nik_pimpinan') }}" name="nik_pimpinan"
                        class="w-full bg-[#F6F8FA] rounded-[12px] py-2 px-4">
                    @error('nik')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                {{-- End Lembaga --}}

                <div class="space-y-2">
                    <p>Email <label class="text-red-700">*</label></p>
                    <input type="email" value="{{ old('email') }}" name="email"
                        class="w-full bg-[#F6F8FA] rounded-[12px] py-2 px-4">
                    @error('email')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <div class="space-y-2">
                    <p>Password <label class="text-red-700">*</label></p>
                    <input type="password" value="{{ old('password') }}" name="password"
                        class="w-full bg-[#F6F8FA] rounded-[12px] py-2 px-4">
                    @error('password')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <div class="space-y-2">
                    <p class="nama">Nama <label class="text-red-700"> *</label></p>
                    <input type="text" value="{{ old('nama') }}" name="nama"
                        class="w-full bg-[#F6F8FA] rounded-[12px] py-2 px-4">
                    @error('nama')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                {{-- Lembaga --}}
                <div class="nama-pimpinan hidden space-y-2">
                    <p>Nama Pimpinan <label class="text-red-700"> *</label></p>
                    <input type="text" value="{{ old('nama_pimpinan') }}" name="nama_pimpinan"
                        class="w-full bg-[#F6F8FA] rounded-[12px] py-2 px-4">
                    @error('nama_pimpinan')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <div class="nama-cp hidden space-y-2">
                    <p>Nama CP <label class="text-red-700"> *</label></p>
                    <input type="text" value="{{ old('nama_cp') }}" name="nama_cp"
                        class="w-full bg-[#F6F8FA] rounded-[12px] py-2 px-4">
                    @error('nama_cp')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <div class="telp-cp hidden space-y-2">
                    <p>Telp CP <label class="text-red-700"> *</label></p>
                    <input type="text" value="{{ old('telp_cp') }}" name="telp_cp"
                        class="w-full bg-[#F6F8FA] rounded-[12px] py-2 px-4">
                    @error('telp_cp')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                {{-- End Lembaga --}}

                <div class="jenis-kelamin space-y-2">
                    <p>Jenis Kelamin <label class="text-red-700">*</label></p>
                    <select name="jenis_kelamin" class="w-full bg-[#F6F8FA] rounded-[12px] py-2 px-4">
                        <option value="laki laki" {{ old('jenis_kelamin') == 'laki laki' ? 'selected' : '' }}>Laki
                            Laki</option>
                        <option value="perempuan" {{ old('jenis_kelamin') == 'perempuan' ? 'selected' : '' }}>
                            Perempuan</option>
                    </select>
                    @error('jenis_kelamin')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <div class="telepon space-y-2">
                    <p>Telepon <label class="text-red-700">*</label></p>
                    <input type="number" value="{{ old('telepon') }}" name="telepon"
                        class="w-full bg-[#F6F8FA] rounded-[12px] py-2 px-4">
                    @error('telepon')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <div class="alamat space-y-2">
                    <p>Alamat <label class="text-red-700">*</label></p>
                    <input type="text" value="{{ old('alamat') }}" name="alamat"
                        class="w-full bg-[#F6F8FA] rounded-[12px] py-2 px-4">
                    @error('alamat')
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
