@extends('layouts.main')

@section('content')
    <div class="flex flex-col justify-center items-center h-full space-y-[40px] mb-40 mt-10">
        <div class="lg:w-2/5 px-20 lg:px-0">
            <h1 class="text-xl font-bold pb-2 border-b-2 w-full">Profile</h1>

            <div class="flex gap-10 items-center py-5 border-b-2">
                @if (auth()->user()->jenis_kelamin == 'laki laki')
                    <img src="{{ asset('images/man-default-profile-picture.jpg') }}" alt=""
                        class="w-32 h-32 rounded-full object-contain bg-gray-200">
                @else
                    <img src="{{ asset('images/woman-default-profile-picture.jpg') }}" alt=""
                        class="w-32 h-32 rounded-full object-contain bg-gray-200">
                @endif

                <div class="flex flex-col gap-1">
                    <h1 class="font-bold text-xl">{{ auth()->user()->nama }}</h1>
                    <p class="border-b">{{ auth()->user()->email }}</p>
                </div>
            </div>

            <div>
                <div class="flex justify-between items-center gap-3 py-5">
                    <div class="flex items-center gap-3">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                            class="w-8 h-8 fill-[#014F31] group-hover:fill-[#1D8E48]">
                            <path fill-rule="evenodd"
                                d="M18.685 19.097A9.723 9.723 0 0021.75 12c0-5.385-4.365-9.75-9.75-9.75S2.25 6.615 2.25 12a9.723 9.723 0 003.065 7.097A9.716 9.716 0 0012 21.75a9.716 9.716 0 006.685-2.653zm-12.54-1.285A7.486 7.486 0 0112 15a7.486 7.486 0 015.855 2.812A8.224 8.224 0 0112 20.25a8.224 8.224 0 01-5.855-2.438zM15.75 9a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0z"
                                clip-rule="evenodd" />
                        </svg>
                        <h1 class="text-xl font-bold">Akun Saya</h1>
                    </div>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                        stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                    </svg>
                </div>
            </div>

            <a href="{{ route('logout') }}"
                class="flex justify-center py-2 w-full rounded-[12px] bg-[#1D8E48] text-white stroke-white items-center gap-3">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15M12 9l-3 3m0 0l3 3m-3-3h12.75" />
                </svg>

                <p class="text-xl font-bold">Keluar</p>
            </a>
        </div>
    </div>
@endsection
