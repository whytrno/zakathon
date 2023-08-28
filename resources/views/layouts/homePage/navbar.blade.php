<div class="flex py-2 px-20 justify-between shadow-xl">
    <div>
        <img src="{{asset('logo.png')}}" alt="" class="h-24">
    </div>
    <div class="flex gap-10 items-center">
        <a href="{{route('home-page.index')}}"
           class="font-bold border-b-2 h-min border-[#014F31] text-[#014F31] text-lg">Home</a>
        <a href="{{route('home-page.donasi')}}" class="font-bold text-[#014F31] text-lg">Donasi</a>
        <a href="{{route('login')}}" class="font-bold text-[#014F31] text-lg">Bayar Zakat</a>
        <a href="{{route('login')}}"
           class="py-2 px-10 bg-[#014F31] text-white text-lg rounded-[12px]">Login</a>
    </div>
</div>
