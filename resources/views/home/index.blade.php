@extends('layouts.main')

@section('content')
    <div class="flex flex-col justify-center items-center h-full space-y-[40px] mb-40 mt-10">
        <div class="lg:w-2/5 px-20 lg:px-0 space-y-4">
            <div class="flex justify-center">
                <img src="{{ asset('images/banner.png') }}" alt="banner">
            </div>
            <h1 class="text-center font-bold text-md">TUNAIKAN ZAKAT, INFAQ & SEDEKAH<br>DENGAN AMAN & MUDAH</h1>
            <form action="" class="space-y-8">
                <div class="bg-[#FBFBFB] rounded-[12px] drop-shadow-xl py-8 space-y-4 px-6 ">
                    @csrf
                    <div class="space-y-2">
                        <p>Nama Lengkap</p>
                        <input type="text" name="" id="" placeholder="Masukkan Nama Lengkap"
                            class="rounded-[12px] px-4 py-2 shadow-lg w-full">
                    </div>
                    <div class="space-y-2">
                        <p>Email</p>
                        <input type="email" name="" id="" placeholder="Masukkan Email"
                            class="rounded-[12px] px-4 py-2 shadow-lg w-full">
                    </div>
                    <div class="space-y-2 ">
                        <p>Jenis Dana</p>
                        <select class="w-full rounded-[12px] px-4 py-2 shadow-lg w-full" name="" id="">
                            <option value="zakat">Zakat</option>
                            <option value="infaq">Infaq</option>
                            <option value="sedekah">Sedekah</option>
                        </select>
                    </div>

                    <div class="space-y-2">
                        <p>Nominal</p>
                        <div class="flex rounded-[12px] shadow-lg w-full ">
                            <div class="flex items-center justify-center bg-[#1D8E4880] px-2 py-2 rounded-[12px]">
                                <p class="rounded-[12px] px-2 text-white">RP.</p>
                            </div>
                            <input type="number" name="" id="" class="rounded-r-[12px] px-4 py-2 w-full"
                                placeholder="Masukkan Jumlah Nominal">
                        </div>
                    </div>

                    <div class="space-y-2">
                        <p>Upload Bukti Pembarayan</p>
                        <div onclick="document.getElementById('choseFile').click()"
                            class="flex justify-center rounded-[12px] shadow-lg w-full border-dashed border-2 border-black py-6 cursor-pointer">
                            <div class="space-y-2">
                                <div class="flex justify-center">
                                    <svg width="68" height="43" viewBox="0 0 68 43" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M57.12 18.2674C57.5556 17.263 57.8 16.1647 57.8 15.0194C57.8 10.0442 53.2313 6.00777 47.6 6.00777C45.5069 6.00777 43.5519 6.571 41.9369 7.52849C38.9938 3.02266 33.5006 0 27.2 0C17.8075 0 10.2 6.72119 10.2 15.0194C10.2 15.2729 10.2106 15.5263 10.2212 15.7798C4.27125 17.6291 0 22.6418 0 28.5369C0 35.9997 6.85313 42.0544 15.3 42.0544H54.4C61.9119 42.0544 68 36.6756 68 30.0389C68 24.2282 63.325 19.3751 57.12 18.2674ZM41.7988 24.0311H34.85V34.5447C34.85 35.3708 34.085 36.0466 33.15 36.0466H28.05C27.115 36.0466 26.35 35.3708 26.35 34.5447V24.0311H19.4013C17.8819 24.0311 17.1275 22.4165 18.2006 21.4684L29.3994 11.5743C30.0581 10.9923 31.1419 10.9923 31.8006 11.5743L42.9994 21.4684C44.0725 22.4165 43.3075 24.0311 41.7988 24.0311Z"
                                            fill="#E5E7EB" />
                                    </svg>
                                </div>


                                <p class="text-[#7BB1F9]">Jelajahi file</p>
                            </div>
                        </div>
                    </div>
                    <input type="file" class="hidden" id="choseFile">
                    <button class="rounded-[12px] w-full py-2 text-[#FFFFFF] bg-[#1D8E48] ">Kirim</button>

                </div>

            </form>
        </div>
    </div>

    <div class="z-10 flex justify-center fixed bottom-0 w-full ">
        <div
            class="lg:w-2/5 mx-20 lg:px-0 px-10 bg-white bg-[#FBFBFB] border-4 drop-shadow-xl rounded-t-3xl flex justify-around py-4 relative gap-48">
            <div class="cursor-pointer">
                <div class="flex justify-center">
                    <svg width="35" height="35" viewBox="0 0 55 55" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M6.87496 0C3.07826 0 0 3.07828 0 6.875V42.9688C0 46.7655 3.23983 48.663 6.87496 49.8438L25.7811 55V5.15625C17.1668 2.84625 6.87496 0 6.87496 0ZM48.1251 0C48.1251 0 38.1771 2.73969 29.1348 5.15625H29.219V55C38.8732 52.4236 48.1251 49.8438 48.1251 49.8438C51.6537 48.9311 55.0001 46.7655 55.0001 42.9688V6.875C55.0001 3.07828 51.9218 0 48.1251 0Z"
                            fill="#014F31" />
                    </svg>
                </div>

                <p class="text-sm text-black">History</p>
            </div>

            <div class="absolute -top-10 rounded-full bg-[#014F31] px-4 py-4 space-y-2 cursor-pointer">
                <div class="justify-center flex drop-shadow-xl">
                    <svg width="40" height="40" viewBox="0 0 55 55" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M45.8342 38.9583C47.1481 38.9583 48.2557 39.4167 49.1571 40.3333C50.0585 41.25 50.5016 42.3195 50.4863 43.5417L32.0842 50.4167L16.0425 45.8333V25.2083H20.5113L37.1717 31.3729C38.3634 31.8465 38.9592 32.7021 38.9592 33.9396C38.9592 34.6576 38.6995 35.284 38.18 35.8188C37.6606 36.3535 37.0036 36.6361 36.2092 36.6667H29.7925L25.7821 35.1313L25.0259 37.2854L29.7925 38.9583H45.8342ZM36.6675 7.40209C38.287 5.52293 40.3495 4.58334 42.855 4.58334C44.9328 4.58334 46.6898 5.34723 48.1259 6.87501C49.562 8.40279 50.3259 10.1597 50.4175 12.1458C50.4175 13.7195 49.6536 15.5986 48.1259 17.7833C46.5981 19.9681 45.0932 21.7938 43.6113 23.2604C42.1293 24.7271 39.8148 26.9042 36.6675 29.7917C33.4897 26.9042 31.1522 24.7271 29.655 23.2604C28.1578 21.7938 26.6529 19.9681 25.1404 17.7833C23.6279 15.5986 22.887 13.7195 22.9175 12.1458C22.9175 10.0681 23.6585 8.31112 25.1404 6.87501C26.6224 5.4389 28.4099 4.67501 30.5029 4.58334C32.9474 4.58334 35.0023 5.52293 36.6675 7.40209ZM2.25586 25.2083H11.4592V50.4167H2.25586V25.2083Z"
                            fill="white" />
                    </svg>
                </div>

                <p class="text-sm text-white">Bayar Zakat</p>
            </div>
            <div class="cursor-pointer">
                <div class="flex justify-center">
                    <svg width="35" height="35" viewBox="0 0 55 55" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <g clip-path="url(#clip0_183_72)">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M27.5 49.8438C31.4225 49.8495 35.2768 48.8177 38.6719 46.8531V39.5312C38.6719 37.48 37.857 35.5127 36.4065 34.0622C34.9561 32.6117 32.9888 31.7969 30.9375 31.7969H24.0625C22.0112 31.7969 20.0439 32.6117 18.5935 34.0622C17.143 35.5127 16.3281 37.48 16.3281 39.5312V46.8531C19.7232 48.8177 23.5775 49.8495 27.5 49.8438ZM43.8281 39.5312V42.7522C46.8005 39.5701 48.7784 35.5889 49.5186 31.2978C50.2588 27.0068 49.729 22.593 47.9944 18.599C46.2598 14.605 43.3959 11.2049 39.7549 8.81665C36.1139 6.42838 31.8544 5.15604 27.5 5.15604C23.1456 5.15604 18.8861 6.42838 15.2451 8.81665C11.6041 11.2049 8.74023 14.605 7.00562 18.599C5.27102 22.593 4.74124 27.0068 5.48142 31.2978C6.22159 35.5889 8.19945 39.5701 11.1719 42.7522V39.5312C11.1718 36.8736 11.9928 34.2809 13.5224 32.1077C15.0521 29.9344 17.2158 28.2867 19.7175 27.39C18.4195 25.897 17.5783 24.0621 17.2943 22.1042C17.0103 20.1462 17.2955 18.148 18.1159 16.3477C18.9363 14.5474 20.2572 13.0211 21.9211 11.9508C23.585 10.8805 25.5216 10.3114 27.5 10.3114C29.4784 10.3114 31.415 10.8805 33.0789 11.9508C34.7428 13.0211 36.0637 14.5474 36.8841 16.3477C37.7045 18.148 37.9897 20.1462 37.7057 22.1042C37.4217 24.0621 36.5805 25.897 35.2825 27.39C37.7842 28.2867 39.9479 29.9344 41.4776 32.1077C43.0072 34.2809 43.8282 36.8736 43.8281 39.5312ZM27.5 55C34.7935 55 41.7882 52.1027 46.9454 46.9454C52.1027 41.7882 55 34.7935 55 27.5C55 20.2065 52.1027 13.2118 46.9454 8.05456C41.7882 2.89731 34.7935 0 27.5 0C20.2065 0 13.2118 2.89731 8.05456 8.05456C2.89731 13.2118 0 20.2065 0 27.5C0 34.7935 2.89731 41.7882 8.05456 46.9454C13.2118 52.1027 20.2065 55 27.5 55ZM32.6562 20.625C32.6562 21.9925 32.113 23.304 31.146 24.271C30.179 25.238 28.8675 25.7812 27.5 25.7812C26.1325 25.7812 24.821 25.238 23.854 24.271C22.887 23.304 22.3438 21.9925 22.3438 20.625C22.3438 19.2575 22.887 17.946 23.854 16.979C24.821 16.012 26.1325 15.4688 27.5 15.4688C28.8675 15.4688 30.179 16.012 31.146 16.979C32.113 17.946 32.6562 19.2575 32.6562 20.625Z"
                                fill="#014F31" />
                        </g>
                        <defs>
                            <clipPath id="clip0_183_72">
                                <rect width="55" height="55" fill="white" />
                            </clipPath>
                        </defs>
                    </svg>
                </div>

                <p class="text-sm text-black">Profile</p>
            </div>
        </div>


    </div>
@endsection
