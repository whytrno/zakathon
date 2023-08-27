<div class="z-10 flex justify-center fixed bottom-0 w-full ">
    <div
        class="lg:w-2/5 w-full lg:mx-20 lg:px-0 px-10 bg-white bg-[#FBFBFB] border-4 drop-shadow-xl rounded-t-3xl flex justify-around py-4 relative gap-48">
        <a href="{{ route('home.history') }}" class="cursor-pointer group">
            <div class="flex justify-center">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                     class="w-8 h-8 fill-[#014F31] group-hover:fill-[#1D8E48]">
                    <path
                        d="M11.25 4.533A9.707 9.707 0 006 3a9.735 9.735 0 00-3.25.555.75.75 0 00-.5.707v14.25a.75.75 0 001 .707A8.237 8.237 0 016 18.75c1.995 0 3.823.707 5.25 1.886V4.533zM12.75 20.636A8.214 8.214 0 0118 18.75c.966 0 1.89.166 2.75.47a.75.75 0 001-.708V4.262a.75.75 0 00-.5-.707A9.735 9.735 0 0018 3a9.707 9.707 0 00-5.25 1.533v16.103z"/>
                </svg>
            </div>

            <p class="text-sm font-semibold text-[#014F31] group-hover:text-[#1D8E48]">History</p>
        </a>

        <a href="{{ route('home.index') }}"
           class="absolute -top-10 rounded-full bg-[#014F31] px-4 py-4 space-y-2 cursor-pointer">
            <div class="justify-center flex drop-shadow-xl">
                <svg width="40" height="40" viewBox="0 0 55 55" fill="none"
                     xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M45.8342 38.9583C47.1481 38.9583 48.2557 39.4167 49.1571 40.3333C50.0585 41.25 50.5016 42.3195 50.4863 43.5417L32.0842 50.4167L16.0425 45.8333V25.2083H20.5113L37.1717 31.3729C38.3634 31.8465 38.9592 32.7021 38.9592 33.9396C38.9592 34.6576 38.6995 35.284 38.18 35.8188C37.6606 36.3535 37.0036 36.6361 36.2092 36.6667H29.7925L25.7821 35.1313L25.0259 37.2854L29.7925 38.9583H45.8342ZM36.6675 7.40209C38.287 5.52293 40.3495 4.58334 42.855 4.58334C44.9328 4.58334 46.6898 5.34723 48.1259 6.87501C49.562 8.40279 50.3259 10.1597 50.4175 12.1458C50.4175 13.7195 49.6536 15.5986 48.1259 17.7833C46.5981 19.9681 45.0932 21.7938 43.6113 23.2604C42.1293 24.7271 39.8148 26.9042 36.6675 29.7917C33.4897 26.9042 31.1522 24.7271 29.655 23.2604C28.1578 21.7938 26.6529 19.9681 25.1404 17.7833C23.6279 15.5986 22.887 13.7195 22.9175 12.1458C22.9175 10.0681 23.6585 8.31112 25.1404 6.87501C26.6224 5.4389 28.4099 4.67501 30.5029 4.58334C32.9474 4.58334 35.0023 5.52293 36.6675 7.40209ZM2.25586 25.2083H11.4592V50.4167H2.25586V25.2083Z"
                        fill="white"/>
                </svg>
            </div>

            <p class="text-sm text-white">Bayar Zakat</p>
        </a>

        <a href="{{ route('home.profile') }}" class="cursor-pointer group">
            <div class="flex justify-center">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                     class="w-8 h-8 fill-[#014F31] group-hover:fill-[#1D8E48]">
                    <path fill-rule="evenodd"
                          d="M18.685 19.097A9.723 9.723 0 0021.75 12c0-5.385-4.365-9.75-9.75-9.75S2.25 6.615 2.25 12a9.723 9.723 0 003.065 7.097A9.716 9.716 0 0012 21.75a9.716 9.716 0 006.685-2.653zm-12.54-1.285A7.486 7.486 0 0112 15a7.486 7.486 0 015.855 2.812A8.224 8.224 0 0112 20.25a8.224 8.224 0 01-5.855-2.438zM15.75 9a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0z"
                          clip-rule="evenodd"/>
                </svg>
            </div>

            <p class="text-sm font-semibold text-[#014F31] group-hover:text-[#1D8E48]">Profile</p>
        </a>
    </div>
</div>
