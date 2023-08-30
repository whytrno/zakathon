<div class="w-[23%] py-6 space-y-10">
    <div class="flex justify-center items-center">
        <img src="{{ asset('logo.png') }}" alt="" class="w-32">
    </div>
    <div class="flex flex-col gap-8 px-5">
        @php
            $menuActive = [
                'pengumpulan' => true,
                'pendistribusian' => false,
                'pemberdayaan' => false,
                'donasi' => false,
                'lainnya' => false,
                'user' => false,
                'peta' => false
            ];

            if (Str::contains(url()->current(), 'pendistribusian')) {
                $menuActive['pengumpulan'] = false;
                $menuActive['pendistribusian'] = true;
            } elseif (Str::contains(url()->current(), 'user')) {
                $menuActive['pengumpulan'] = false;
                $menuActive['user'] = true;
            } elseif (Str::contains(url()->current(), 'donasi')) {
                $menuActive['pengumpulan'] = false;
                $menuActive['donasi'] = true;
            } elseif (Str::contains(url()->current(), 'program-lainnya')) {
                $menuActive['pengumpulan'] = false;
                $menuActive['lainnya'] = true;
            } elseif (Str::contains(url()->current(), 'peta')) {
                $menuActive['pengumpulan'] = false;
                $menuActive['peta'] = true;
            } else {
                $menuActive['pengumpulan'] = true;
            }
        @endphp

        {{--        <a href="{{route('dashboard.index')}}"--}}
        {{--           class="flex gap-3 items-center px-6 cursor-pointer {{ $menuActive['dashboard'] ? 'items-center hover:bg-[#1D8E48] cursor-pointer bg-[#014F31] px-6 py-3 rounded-full' : 'group' }}">--}}
        {{--            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"--}}
        {{--                 class="w-8 h-8 {{ $menuActive['dashboard'] ? 'stroke-white fill-white' : 'group-hover:stroke-[#1D8E48] group-hover:fill-[#1D8E48] stroke-[#014F31] fill-[#014F31]' }}">--}}
        {{--                <path--}}
        {{--                    d="M11.47 3.84a.75.75 0 011.06 0l8.69 8.69a.75.75 0 101.06-1.06l-8.689-8.69a2.25 2.25 0 00-3.182 0l-8.69 8.69a.75.75 0 001.061 1.06l8.69-8.69z"/>--}}
        {{--                <path--}}
        {{--                    d="M12 5.432l8.159 8.159c.03.03.06.058.091.086v6.198c0 1.035-.84 1.875-1.875 1.875H15a.75.75 0 01-.75-.75v-4.5a.75.75 0 00-.75-.75h-3a.75.75 0 00-.75.75V21a.75.75 0 01-.75.75H5.625a1.875 1.875 0 01-1.875-1.875v-6.198a2.29 2.29 0 00.091-.086L12 5.43z"/>--}}
        {{--            </svg>--}}

        {{--            <p--}}
        {{--                class="font-bold {{ $menuActive['dashboard'] ? 'text-white' : 'text-black/70 group-hover:text-[#1D8E48]' }}">--}}
        {{--                Dashboard</p>--}}
        {{--        </a>--}}

        <a href="{{ route('pengumpulan.index') }}"
           class="flex gap-3 items-center px-6 cursor-pointer {{ $menuActive['pengumpulan'] ? 'items-center hover:bg-[#1D8E48] cursor-pointer bg-[#014F31] px-6 py-3 rounded-full' : 'group' }}">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                 class="w-8 h-8 {{ $menuActive['pengumpulan'] ? 'stroke-white fill-white' : 'group-hover:stroke-[#1D8E48] group-hover:fill-[#1D8E48] stroke-[#014F31] fill-[#014F31]' }}">
                <path
                    d="M18.375 2.25c-1.035 0-1.875.84-1.875 1.875v15.75c0 1.035.84 1.875 1.875 1.875h.75c1.035 0 1.875-.84 1.875-1.875V4.125c0-1.036-.84-1.875-1.875-1.875h-.75zM9.75 8.625c0-1.036.84-1.875 1.875-1.875h.75c1.036 0 1.875.84 1.875 1.875v11.25c0 1.035-.84 1.875-1.875 1.875h-.75a1.875 1.875 0 01-1.875-1.875V8.625zM3 13.125c0-1.036.84-1.875 1.875-1.875h.75c1.036 0 1.875.84 1.875 1.875v6.75c0 1.035-.84 1.875-1.875 1.875h-.75A1.875 1.875 0 013 19.875v-6.75z"/>
            </svg>

            <p class="font-bold {{ $menuActive['pengumpulan'] ? 'text-white' : 'text-black/70 group-hover:text-[#1D8E48]' }}">
                Pengumpulan</p>
        </a>

        <a href="{{ route('pendistribusian.index') }}"
           class="flex gap-3 items-center px-6 cursor-pointer {{ $menuActive['pendistribusian'] ? 'items-center hover:bg-[#1D8E48] cursor-pointer bg-[#014F31] px-6 py-3 rounded-full' : 'group' }}">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                 class="w-8 h-8 {{ $menuActive['pendistribusian'] ? 'stroke-white fill-white' : 'group-hover:stroke-[#1D8E48] group-hover:fill-[#1D8E48] stroke-[#014F31] fill-[#014F31]' }}">
                <path fill-rule="evenodd"
                      d="M15.75 4.5a3 3 0 11.825 2.066l-8.421 4.679a3.002 3.002 0 010 1.51l8.421 4.679a3 3 0 11-.729 1.31l-8.421-4.678a3 3 0 110-4.132l8.421-4.679a3 3 0 01-.096-.755z"
                      clip-rule="evenodd"/>
            </svg>

            <p
                class="font-bold {{ $menuActive['pendistribusian'] ? 'text-white' : 'text-black/70 group-hover:text-[#1D8E48]' }}">
                Pendistribusian</p>
        </a>

        <a href="{{ route('donasi.index') }}"
           class="flex gap-3 items-center px-6 cursor-pointer {{ $menuActive['donasi'] ? 'items-center hover:bg-[#1D8E48] cursor-pointer bg-[#014F31] px-6 py-3 rounded-full' : 'group' }}">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                 class="w-8 h-8 {{ $menuActive['donasi'] ? 'stroke-white fill-white' : 'group-hover:stroke-[#1D8E48] group-hover:fill-[#1D8E48] stroke-[#014F31] fill-[#014F31]' }}">
                <path d="M12 7.5a2.25 2.25 0 100 4.5 2.25 2.25 0 000-4.5z"/>
                <path fill-rule="evenodd"
                      d="M1.5 4.875C1.5 3.839 2.34 3 3.375 3h17.25c1.035 0 1.875.84 1.875 1.875v9.75c0 1.036-.84 1.875-1.875 1.875H3.375A1.875 1.875 0 011.5 14.625v-9.75zM8.25 9.75a3.75 3.75 0 117.5 0 3.75 3.75 0 01-7.5 0zM18.75 9a.75.75 0 00-.75.75v.008c0 .414.336.75.75.75h.008a.75.75 0 00.75-.75V9.75a.75.75 0 00-.75-.75h-.008zM4.5 9.75A.75.75 0 015.25 9h.008a.75.75 0 01.75.75v.008a.75.75 0 01-.75.75H5.25a.75.75 0 01-.75-.75V9.75z"
                      clip-rule="evenodd"/>
                <path
                    d="M2.25 18a.75.75 0 000 1.5c5.4 0 10.63.722 15.6 2.075 1.19.324 2.4-.558 2.4-1.82V18.75a.75.75 0 00-.75-.75H2.25z"/>
            </svg>


            <p
                class="font-bold {{ $menuActive['donasi'] ? 'text-white' : 'text-black/70 group-hover:text-[#1D8E48]' }}">
                Program Donasi</p>
        </a>

        <a href="{{ route('dashboard.peta') }}"
           class="flex gap-3 items-center px-6 cursor-pointer {{ $menuActive['peta'] ? 'items-center hover:bg-[#1D8E48] cursor-pointer bg-[#014F31] px-6 py-3 rounded-full' : 'group' }}">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                 class="w-8 h-8 {{ $menuActive['peta'] ? 'stroke-white fill-white' : 'group-hover:stroke-[#1D8E48] group-hover:fill-[#1D8E48] stroke-[#014F31] fill-[#014F31]' }}">
                <path
                    d="M15.75 8.25a.75.75 0 01.75.75c0 1.12-.492 2.126-1.27 2.812a.75.75 0 11-.992-1.124A2.243 2.243 0 0015 9a.75.75 0 01.75-.75z"/>
                <path fill-rule="evenodd"
                      d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25zM4.575 15.6a8.25 8.25 0 009.348 4.425 1.966 1.966 0 00-1.84-1.275.983.983 0 01-.97-.822l-.073-.437c-.094-.565.25-1.11.8-1.267l.99-.282c.427-.123.783-.418.982-.816l.036-.073a1.453 1.453 0 012.328-.377L16.5 15h.628a2.25 2.25 0 011.983 1.186 8.25 8.25 0 00-6.345-12.4c.044.262.18.503.389.676l1.068.89c.442.369.535 1.01.216 1.49l-.51.766a2.25 2.25 0 01-1.161.886l-.143.048a1.107 1.107 0 00-.57 1.664c.369.555.169 1.307-.427 1.605L9 13.125l.423 1.059a.956.956 0 01-1.652.928l-.679-.906a1.125 1.125 0 00-1.906.172L4.575 15.6z"
                      clip-rule="evenodd"/>
            </svg>


            <p
                class="font-bold {{ $menuActive['peta'] ? 'text-white' : 'text-black/70 group-hover:text-[#1D8E48]' }}">
                Peta Pendistribusian</p>
        </a>

        <div onclick="toggleLainnyaMenu()"
             class="flex justify-between items-center cursor-pointer px-6 {{ $menuActive['lainnya'] ? 'hover:bg-[#1D8E48] bg-[#014F31] rounded-full py-3' : 'group' }}">
            <div class="flex gap-3 items-center">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                     class="w-8 h-8 {{ $menuActive['lainnya'] ? 'stroke-white fill-white' : 'group-hover:stroke-[#1D8E48] group-hover:fill-[#1D8E48] stroke-[#014F31] fill-[#014F31]' }}">
                    <path d="M21 6.375c0 2.692-4.03 4.875-9 4.875S3 9.067 3 6.375 7.03 1.5 12 1.5s9 2.183 9 4.875z"/>
                    <path
                        d="M12 12.75c2.685 0 5.19-.586 7.078-1.609a8.283 8.283 0 001.897-1.384c.016.121.025.244.025.368C21 12.817 16.97 15 12 15s-9-2.183-9-4.875c0-.124.009-.247.025-.368a8.285 8.285 0 001.897 1.384C6.809 12.164 9.315 12.75 12 12.75z"/>
                    <path
                        d="M12 16.5c2.685 0 5.19-.586 7.078-1.609a8.282 8.282 0 001.897-1.384c.016.121.025.244.025.368 0 2.692-4.03 4.875-9 4.875s-9-2.183-9-4.875c0-.124.009-.247.025-.368a8.284 8.284 0 001.897 1.384C6.809 15.914 9.315 16.5 12 16.5z"/>
                    <path
                        d="M12 20.25c2.685 0 5.19-.586 7.078-1.609a8.282 8.282 0 001.897-1.384c.016.121.025.244.025.368 0 2.692-4.03 4.875-9 4.875s-9-2.183-9-4.875c0-.124.009-.247.025-.368a8.284 8.284 0 001.897 1.384C6.809 19.664 9.315 20.25 12 20.25z"/>
                </svg>


                <p
                    class="font-bold {{ $menuActive['lainnya'] ? 'text-white' : 'text-black/70 group-hover:text-[#1D8E48]' }}">
                    Pengajuan Bantuan</p>
            </div>

            <svg id="chevronDown2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                 class="w-6 h-6 {{ $menuActive['lainnya'] ? 'stroke-white fill-white' : 'group-hover:stroke-[#1D8E48] group-hover:fill-[#1D8E48] stroke-[#014F31] fill-[#014F31]' }}">
                <path fill-rule="evenodd"
                      d="M12.53 16.28a.75.75 0 01-1.06 0l-7.5-7.5a.75.75 0 011.06-1.06L12 14.69l6.97-6.97a.75.75 0 111.06 1.06l-7.5 7.5z"
                      clip-rule="evenodd"/>
            </svg>
            <svg id="chevronUp2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                 stroke="currentColor"
                 class="hidden w-6 h-6 {{ $menuActive['lainnya'] ? 'stroke-white' : 'group-hover:stroke-[#1D8E48] stroke-[#014F31]' }}">
                <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 15.75l7.5-7.5 7.5 7.5"/>
            </svg>
        </div>

        @php
            $jenisBantuan = [
                'Bantuan/Santunan',
                'Usaha Produktif',
                'Bantuan/Santunan',
                'Bantuan Bangun/Rehab Masjid/Langgar/TPA (Tempat Pendidikan Al Qur’an)',
                'Bantuan Bangun/Rehab Rumah Layak Huni',
                'Bantuan Beasiswa',
                'Bantuan Biaya Berobat',
                ];
        @endphp

        @foreach($jenisBantuan as $jb)
            @php
                $fix_jb = str_replace(' ', '_', strtolower($jb));
                $fix_jb = str_replace('/', '_', $fix_jb);
            @endphp
            <a href="{{ route('pengajuan-bantuan.index', $fix_jb) }}"
               class="{{ $menuActive['lainnya'] ? '' : 'hidden' }} lainnya-menu flex justify-between items-center cursor-pointer px-20 group">
                <p class="font-bold text-black/70 group-hover:text-[#1D8E48]">{{$jb}}</p>
            </a>
        @endforeach

        <div onclick="toggleUserMenu()"
             class="flex justify-between items-center cursor-pointer px-6 {{ $menuActive['user'] ? 'hover:bg-[#1D8E48] bg-[#014F31] rounded-full py-3' : 'group' }}">
            <div class="flex gap-3 items-center">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                     class="w-8 h-8 {{ $menuActive['user'] ? 'stroke-white fill-white' : 'group-hover:stroke-[#1D8E48] group-hover:fill-[#1D8E48] stroke-[#014F31] fill-[#014F31]' }}">
                    <path
                        d="M4.5 6.375a4.125 4.125 0 118.25 0 4.125 4.125 0 01-8.25 0zM14.25 8.625a3.375 3.375 0 116.75 0 3.375 3.375 0 01-6.75 0zM1.5 19.125a7.125 7.125 0 0114.25 0v.003l-.001.119a.75.75 0 01-.363.63 13.067 13.067 0 01-6.761 1.873c-2.472 0-4.786-.684-6.76-1.873a.75.75 0 01-.364-.63l-.001-.122zM17.25 19.128l-.001.144a2.25 2.25 0 01-.233.96 10.088 10.088 0 005.06-1.01.75.75 0 00.42-.643 4.875 4.875 0 00-6.957-4.611 8.586 8.586 0 011.71 5.157v.003z"/>
                </svg>

                <p
                    class="font-bold {{ $menuActive['user'] ? 'text-white' : 'text-black/70 group-hover:text-[#1D8E48]' }}">
                    Data User</p>
            </div>

            <svg id="chevronDown" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                 class="w-6 h-6 {{ $menuActive['user'] ? 'stroke-white fill-white' : 'group-hover:stroke-[#1D8E48] group-hover:fill-[#1D8E48] stroke-[#014F31] fill-[#014F31]' }}">
                <path fill-rule="evenodd"
                      d="M12.53 16.28a.75.75 0 01-1.06 0l-7.5-7.5a.75.75 0 011.06-1.06L12 14.69l6.97-6.97a.75.75 0 111.06 1.06l-7.5 7.5z"
                      clip-rule="evenodd"/>
            </svg>
            <svg id="chevronUp" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                 stroke="currentColor"
                 class="hidden w-6 h-6 {{ $menuActive['user'] ? 'stroke-white' : 'group-hover:stroke-[#1D8E48] stroke-[#014F31]' }}">
                <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 15.75l7.5-7.5 7.5 7.5"/>
            </svg>
        </div>
        <a href="{{ route('muzakki.index') }}"
           class="{{ $menuActive['user'] ? '' : 'hidden' }} user-menu flex justify-between items-center cursor-pointer px-20 group">
            <p class="font-bold text-black/70 group-hover:text-[#1D8E48]">Muzakki</p>
        </a>
        <a href="{{ route('mustahiq.index') }}"
           class="{{ $menuActive['user'] ? '' : 'hidden' }} user-menu flex justify-between items-center cursor-pointer px-20 group">
            <p class="font-bold text-black/70 group-hover:text-[#1D8E48]">Mustahiq</p>
        </a>

        <a href="{{ route('logout') }}" class="flex gap-3 items-center px-6 cursor-pointer group">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                 class="w-8 h-8 group-hover:stroke-[#1D8E48] group-hover:fill-[#1D8E48] stroke-[#014F31] fill-[#014F31]">
                <path fill-rule="evenodd"
                      d="M7.5 3.75A1.5 1.5 0 006 5.25v13.5a1.5 1.5 0 001.5 1.5h6a1.5 1.5 0 001.5-1.5V15a.75.75 0 011.5 0v3.75a3 3 0 01-3 3h-6a3 3 0 01-3-3V5.25a3 3 0 013-3h6a3 3 0 013 3V9A.75.75 0 0115 9V5.25a1.5 1.5 0 00-1.5-1.5h-6zm5.03 4.72a.75.75 0 010 1.06l-1.72 1.72h10.94a.75.75 0 010 1.5H10.81l1.72 1.72a.75.75 0 11-1.06 1.06l-3-3a.75.75 0 010-1.06l3-3a.75.75 0 011.06 0z"
                      clip-rule="evenodd"/>
            </svg>

            <p class="font-bold text-black/70 group-hover:text-[#1D8E48]">Logout</p>
        </a>
    </div>
</div>

@push('scripts')
    <script>
        function toggleUserMenu() {
            $('.user-menu').toggleClass('hidden')
            $('#chevronDown').toggleClass('hidden')
            $('#chevronUp').toggleClass('hidden')
        }

        function toggleLainnyaMenu() {
            $('.lainnya-menu').toggleClass('hidden')
            $('#chevronDown2').toggleClass('hidden')
            $('#chevronUp2').toggleClass('hidden')
        }
    </script>
@endpush
