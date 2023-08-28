@extends('layouts.main')

@section('content')
    <div class="flex flex-col justify-center items-center h-full space-y-[40px] mb-40 mt-10">
        <div class="lg:w-1/2 px-20 lg:px-0 space-y-10">
            <a href="{{ route('home.profile') }}" class="flex gap-6 border-b-2 pb-6">
                <svg width="16" height="25" viewBox="0 0 16 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                          d="M5.13436 12.03L14.3904 3.63C15.2214 2.8 15.2214 1.46 14.3904 0.63C13.5604 -0.21 12.2134 -0.21 11.3824 0.63L0.615361 10.39C0.165361 10.84 -0.0326391 11.44 0.00436089 12.03C-0.0326391 12.62 0.165361 13.22 0.615361 13.67L11.3824 23.43C12.2134 24.27 13.5604 24.27 14.3904 23.43C15.2214 22.6 15.2214 21.26 14.3904 20.43L5.13436 12.03Z"
                          fill="#131314"/>
                </svg>
                <p>Akun Saya</p>
            </a>
            <form method="POST" action="{{route('home.update-profile') }}" class="space-y-6">
                @csrf
                <div class="space-y-2">
                    <p class="font-bold">Nama Lengkap</p>
                    <input name="nama" type="text" value="{{$data->nama}}" placeholder="Masukkan Nama"
                           class="rounded-[12px] px-4 py-2 shadow-lg w-full">
                    @error('nama')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <div class="space-y-2">
                    <p class="font-bold">Email</p>
                    <input name="email" type="text" value="{{$data->email}}" placeholder="Masukkan Email"
                           class="rounded-[12px] px-4 py-2 shadow-lg w-full">
                    @error('email')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <div class="space-y-2">
                    <p class="font-bold">NIK</p>
                    <input name="nik" type="number" value="{{$data->nik}}" placeholder="NIK 16 digit"
                           class="rounded-[12px] px-4 py-2 shadow-lg w-full">
                    @error('nik')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <div class="space-y-2">
                    <p class="font-bold"> Jenis Kelamin</p>
                    <select name="jenis_kelamin" id="jenis_kelamin" class="rounded-[12px] px-4 py-2 shadow-lg w-full">
                        <option value="{{$data->jenis_kelamin}}" selected>{{ucwords($data->jenis_kelamin)}}</option>
                        <option disabled>==========================</option>
                        <option value="laki laki">Laki Laki</option>
                        <option value="perempuan">Perempuan</option>
                    </select>
                    @error('jenis_kelamin')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <div class="space-y-2">
                    <p class="font-bold">Jenis</p>
                    <select name="jenis" id="jenis" class="rounded-[12px] px-4 py-2 shadow-lg w-full">
                        <option value="{{$data->muzakki->jenis}}" selected>{{ucwords($data->muzakki->jenis)}}</option>
                        <option disabled>==========================</option>
                        <option value="perorangan">Perorangan</option>
                        <option value="lembaga non upz">Lembaga</option>
                    </select>
                    @error('jenis')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <div class="space-y-2">
                    <p class="font-bold">Alamat</p>
                    <input name="alamat" type="text" value="{{$data->alamat}}" placeholder="Masukkan Alamat"
                           class="rounded-[12px] px-4 py-2 shadow-lg w-full">
                    @error('alamat')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <div class="space-y-2">
                    <p class="font-bold">Nomor Telepon</p>
                    <input name="telepon" type="number" value="{{$data->telepon}}" placeholder="Nomor Telepon"
                           class="rounded-[12px] px-4 py-2 shadow-lg w-full">
                    @error('telepon')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <div class="space-y-2">
                    <p class="font-bold">Password (Kosongkan jika tidak ingin mengubah)</p>
                    <input name="password" type="text" placeholder="Masukkan Password"
                           class="rounded-[12px] px-4 py-2 shadow-lg w-full">
                    @error('password')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <div class="py-8">
                    <button class="rounded-[12px] bg-[#1D8E48] text-center w-full py-2 text-[#FFFFFF] ">Simpan</button>
                </div>
            </form>
        </div>
    </div>
@endsection
