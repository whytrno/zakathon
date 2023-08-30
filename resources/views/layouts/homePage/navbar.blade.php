<div class="relative">
    <div class="flex py-2 lg:px-20 px-10 justify-between items-center shadow-xl">
        <div>
            <img src="{{asset('logo.png')}}" alt="" class="lg:h-24 h-20">
        </div>
        <div class="lg:hidden" onclick="toggleMobileMenu()">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                 stroke="currentColor"
                 class="w-10 h-10">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5"/>
            </svg>
        </div>
        <div class="hidden lg:flex gap-10 items-center">
            @php
                $menuActive = [
                    'home' => true,
                    'donasi' => false,
                    'pengajuan' => false,
                ];

                if (Str::contains(url()->current(), 'home')) {
                    $menuActive['home'] = true;
                    $menuActive['donasi'] = false;
                } elseif (Str::contains(url()->current(), 'donasi')) {
                    $menuActive['home'] = false;
                    $menuActive['donasi'] = true;
                } elseif (Str::contains(url()->current(), 'pengajuan')) {
                    $menuActive['home'] = false;
                    $menuActive['pengajuan'] = true;
                } else {
                    $menuActive['home'] = true;
                }
            @endphp
            <a href="{{route('home-page.index')}}"
               class="font-bold text-[#014F31] text-lg {{$menuActive['home'] ? 'border-b-2 h-min border-[#014F31] ' : ''}}">Home</a>
            <a href="{{route('home-page.donasi')}}"
               class="font-bold text-[#014F31] text-lg {{$menuActive['donasi'] ? 'border-b-2 h-min border-[#014F31] ' : ''}}">Donasi</a>
            <a href="{{route('home-page.pengajuan-bantuan')}}"
               class="font-bold text-[#014F31] text-lg {{$menuActive['pengajuan'] ? 'border-b-2 h-min border-[#014F31] ' : ''}}">Pengajuan
                Bantuan</a>
            <a href="{{route('login')}}" class="font-bold text-[#014F31] text-lg">Bayar Zakat</a>
            <a href="{{route('login')}}"
               class="py-2 px-10 bg-[#014F31] text-white text-lg rounded-[12px]">Login</a>
        </div>
    </div>

    <div id="mobileMenu" class="hidden w-1/2 shadow-xl absolute top-24 h-full right-0">
        <div class="flex flex-col p-10 space-y-5 bg-white border-2">
            <a href="{{route('home-page.index')}}"
               class="font-bold border-b-2 h-min border-[#014F31] text-[#014F31] text-lg">Home</a>
            <a href="{{route('home-page.donasi')}}" class="font-bold text-[#014F31] text-lg">Donasi</a>
            <a href="{{route('login')}}" class="font-bold text-[#014F31] text-lg">Bayar Zakat</a>
            <a href="{{route('login')}}"
               class="py-2 px-10 bg-[#014F31] text-center text-white text-lg rounded-[12px]">Login</a>
        </div>
    </div>
</div>
