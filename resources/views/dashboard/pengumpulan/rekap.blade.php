<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>LAPORAN BULAN {{strtoupper($bulan)}} TAHUN {{$tahun}}</title>
</head>
<body>
<div class="flex flex-col items-center p-10 space-y-5">
    <div class="font-bold space-y-5 text-center">
        <div>
            <p>LAPORAN BULANAN PENGUMPULAN</p>
            <p>BAZNAS KABUPATEN BANYUMAS</p>
            <p>TAHUN {{$tahun}}</p>
        </div>

        <p>PERIODE BULAN : {{strtoupper($bulan)}}</p>
    </div>

    <div class="grid grid-cols-1 w-full gap-10">
        <div class="flex flex-col w-full">
            <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                    <div class="overflow-hidden">
                        <table
                            class="min-w-full border text-center text-sm font-light dark:border-neutral-500">
                            <thead class="border-b font-medium dark:border-neutral-500">
                            <tr class="bg-[#014F31] text-white">
                                <th
                                    scope="col"
                                    class="border-r py-2 dark:border-neutral-500">
                                    No.
                                </th>
                                <th
                                    scope="col"
                                    class="border-r py-2 dark:border-neutral-500">
                                    ASNAF
                                </th>
                                <th
                                    scope="col"
                                    class="border-r py-2 dark:border-neutral-500">
                                    TARGET
                                </th>
                                <th
                                    scope="col"
                                    class="border-r py-2 dark:border-neutral-500">
                                    JUMLAH
                                </th>
                                <th
                                    scope="col"
                                    class="border-r py-2 dark:border-neutral-500">
                                    %
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($jenis_dana_detail as $index => $jd)
                                <tr class="border-b dark:border-neutral-500">
                                    <td
                                        class="whitespace-nowrap border-r py-4 font-medium dark:border-neutral-500">
                                        {{ $loop->iteration }}
                                    </td>
                                    <td
                                        class="whitespace-nowrap border-r py-4 dark:border-neutral-500">
                                        {{ ucwords($jd) }}
                                    </td>
                                    <td
                                        class="whitespace-nowrap border-r py-4 dark:border-neutral-500">
                                        Rp. {{ number_format($dataPerAsnaf['asnaf'][$index - 1]['target'], 0, ',', '.') }}
                                    </td>
                                    <td
                                        class="whitespace-nowrap border-r py-4 dark:border-neutral-500">
                                        Rp. {{ number_format($dataPerAsnaf['asnaf'][$index - 1]['jumlah_realisasi'], 0, ',', '.') }}
                                    </td>
                                    <td
                                        class="whitespace-nowrap border-r py-4 dark:border-neutral-500">
                                        {{ $dataPerAsnaf['asnaf'][$index - 1]['persen'] }}%
                                    </td>
                                </tr>
                            @endforeach
                            <tr class="border-b dark:border-neutral-500 font-medium">
                                <td colspan="2"
                                    class="whitespace-nowrap border-r py-4 dark:border-neutral-500">JUMLAH
                                </td>
                                <td
                                    class="whitespace-nowrap border-r py-4 dark:border-neutral-500">
                                    Rp. {{ number_format($dataPerAsnaf['jumlah']['target'], 0, ',', '.') }}
                                </td>
                                <td
                                    class="whitespace-nowrap border-r py-4 dark:border-neutral-500">
                                    Rp. {{ number_format($dataPerAsnaf['jumlah']['jumlah_realisasi'], 0, ',', '.') }}
                                </td>
                                <td
                                    class="whitespace-nowrap border-r py-4 dark:border-neutral-500">
                                    {{ $dataPerAsnaf['jumlah']['persen'] }}%
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        {{--        <div class="flex justify-center items-center">--}}
        {{--            <canvas id="chartPerAsnaf"></canvas>--}}
        {{--        </div>--}}
    </div>

    {{--    <div class="grid grid-cols-1 w-full gap-10">--}}
    {{--        <div class="flex items-center">--}}
    {{--            <div class="flex flex-col w-full">--}}
    {{--                <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">--}}
    {{--                    <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">--}}
    {{--                        <div class="overflow-hidden">--}}
    {{--                            <table--}}
    {{--                                class="min-w-full border text-center text-sm font-light dark:border-neutral-500">--}}
    {{--                                <thead class="border-b font-medium dark:border-neutral-500">--}}
    {{--                                <tr class="bg-[#014F31] text-white">--}}
    {{--                                    <th--}}
    {{--                                        scope="col"--}}
    {{--                                        class="border-r py-2 dark:border-neutral-500">--}}
    {{--                                        No.--}}
    {{--                                    </th>--}}
    {{--                                    <th--}}
    {{--                                        scope="col"--}}
    {{--                                        class="border-r py-2 dark:border-neutral-500">--}}
    {{--                                        PROGRAM--}}
    {{--                                    </th>--}}
    {{--                                    <th--}}
    {{--                                        scope="col"--}}
    {{--                                        class="border-r py-2 dark:border-neutral-500">--}}
    {{--                                        TARGET--}}
    {{--                                    </th>--}}
    {{--                                    <th--}}
    {{--                                        scope="col"--}}
    {{--                                        class="border-r py-2 dark:border-neutral-500">--}}
    {{--                                        VOL <br> KEL | ORG--}}
    {{--                                    </th>--}}
    {{--                                    <th--}}
    {{--                                        scope="col"--}}
    {{--                                        class="border-r py-2 dark:border-neutral-500">--}}
    {{--                                        JUMLAH--}}
    {{--                                    </th>--}}
    {{--                                    <th--}}
    {{--                                        scope="col"--}}
    {{--                                        class="border-r py-2 dark:border-neutral-500">--}}
    {{--                                        %--}}
    {{--                                    </th>--}}
    {{--                                </tr>--}}
    {{--                                </thead>--}}
    {{--                                <tbody>--}}
    {{--                                @foreach ($dataPerProgram as $index => $data)--}}
    {{--                                    <tr class="border-b dark:border-neutral-500">--}}
    {{--                                        <td--}}
    {{--                                            class="whitespace-nowrap border-r py-4 font-medium dark:border-neutral-500">--}}
    {{--                                            {{ $loop->iteration }}--}}
    {{--                                        </td>--}}
    {{--                                        <td--}}
    {{--                                            class="whitespace-nowrap border-r py-4 dark:border-neutral-500">--}}
    {{--                                            {{ ucwords($data->program) }}--}}
    {{--                                        </td>--}}
    {{--                                        <td--}}
    {{--                                            class="whitespace-nowrap border-r py-4 dark:border-neutral-500">--}}
    {{--                                            Rp. {{ number_format($data->totalTarget(), 0, ',', '.') }}--}}
    {{--                                        </td>--}}
    {{--                                        <td--}}
    {{--                                            class="whitespace-nowrap border-r py-4 dark:border-neutral-500">--}}
    {{--                                            <p>{{ $data->totalVol()[0] }} | {{ $data->totalVol()[1] }}</p>--}}
    {{--                                        </td>--}}
    {{--                                        <td--}}
    {{--                                            class="whitespace-nowrap border-r py-4 dark:border-neutral-500">--}}
    {{--                                            <p>Rp. {{ number_format($data->totalRealisasi(), 0, ',', '.') }}</p>--}}
    {{--                                        </td>--}}
    {{--                                        <td--}}
    {{--                                            class="whitespace-nowrap border-r py-4 dark:border-neutral-500">--}}
    {{--                                            <p>{{ $data->persenRealisasi() }}%</p>--}}
    {{--                                        </td>--}}
    {{--                                    </tr>--}}
    {{--                                @endforeach--}}
    {{--                                <tr class="border-b dark:border-neutral-500 font-medium">--}}
    {{--                                    <td colspan="2"--}}
    {{--                                        class="whitespace-nowrap border-r py-4 dark:border-neutral-500">JUMLAH--}}
    {{--                                    </td>--}}
    {{--                                    <td--}}
    {{--                                        class="whitespace-nowrap border-r py-4 dark:border-neutral-500">--}}
    {{--                                        Rp. {{ number_format($dataPerAsnaf['jumlah']['target'], 0, ',', '.') }}--}}
    {{--                                    </td>--}}
    {{--                                    <td--}}
    {{--                                        class="whitespace-nowrap border-r py-4 dark:border-neutral-500">--}}
    {{--                                        {{ $dataPerAsnaf['jumlah']['vol'][0] }}--}}
    {{--                                        | {{ $dataPerAsnaf['jumlah']['vol'][1] }}--}}
    {{--                                    </td>--}}
    {{--                                    <td--}}
    {{--                                        class="whitespace-nowrap border-r py-4 dark:border-neutral-500">--}}
    {{--                                        Rp. {{ number_format($dataPerAsnaf['jumlah']['jumlah_realisasi'], 0, ',', '.') }}--}}
    {{--                                    </td>--}}
    {{--                                    <td--}}
    {{--                                        class="whitespace-nowrap border-r py-4 dark:border-neutral-500">--}}
    {{--                                        {{ $dataPerAsnaf['jumlah']['persen'] }}%--}}
    {{--                                    </td>--}}
    {{--                                </tr>--}}
    {{--                                </tbody>--}}
    {{--                            </table>--}}
    {{--                        </div>--}}
    {{--                    </div>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--        </div>--}}

    {{--        --}}{{--        <div class="flex justify-center items-center">--}}
    {{--        --}}{{--            <canvas id="chartPerProgram"></canvas>--}}
    {{--        --}}{{--        </div>--}}
    {{--    </div>--}}

    {{--    <div class="grid grid-cols-1 w-full gap-10">--}}
    {{--        <div class="flex flex-col w-full">--}}
    {{--            <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">--}}
    {{--                <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">--}}
    {{--                    <div class="overflow-hidden">--}}
    {{--                        <table--}}
    {{--                            class="min-w-full border text-center text-sm font-light dark:border-neutral-500">--}}
    {{--                            <thead class="border-b font-medium dark:border-neutral-500">--}}
    {{--                            <tr class="bg-[#014F31] text-white">--}}
    {{--                                <th--}}
    {{--                                    scope="col"--}}
    {{--                                    class="border-r py-2 dark:border-neutral-500">--}}
    {{--                                    No.--}}
    {{--                                </th>--}}
    {{--                                <th--}}
    {{--                                    scope="col"--}}
    {{--                                    class="border-r py-2 dark:border-neutral-500">--}}
    {{--                                    JENIS BANTUAN--}}
    {{--                                </th>--}}
    {{--                                <th--}}
    {{--                                    scope="col"--}}
    {{--                                    class="border-r py-2 dark:border-neutral-500">--}}
    {{--                                    VOL <br> KEL | ORG--}}
    {{--                                </th>--}}
    {{--                                <th--}}
    {{--                                    scope="col"--}}
    {{--                                    class="border-r py-2 dark:border-neutral-500">--}}
    {{--                                    JUMLAH--}}
    {{--                                </th>--}}
    {{--                                <th--}}
    {{--                                    scope="col"--}}
    {{--                                    class="border-r py-2 dark:border-neutral-500">--}}
    {{--                                    %--}}
    {{--                                </th>--}}
    {{--                            </tr>--}}
    {{--                            </thead>--}}
    {{--                            <tbody>--}}
    {{--                            @foreach ($dataPerBantuan as $index => $data)--}}
    {{--                                <tr class="border-b dark:border-neutral-500">--}}
    {{--                                    <td--}}
    {{--                                        class="whitespace-nowrap border-r py-4 font-medium dark:border-neutral-500">--}}
    {{--                                        {{ $loop->iteration }}--}}
    {{--                                    </td>--}}
    {{--                                    <td--}}
    {{--                                        class="whitespace-nowrap border-r py-4 dark:border-neutral-500">--}}
    {{--                                        {{ ucwords($index) }}--}}
    {{--                                    </td>--}}
    {{--                                    <td--}}
    {{--                                        class="whitespace-nowrap border-r py-4 dark:border-neutral-500">--}}
    {{--                                        <p>{{ $data['vol'][0] }} | {{ $data['vol'][1] }}</p>--}}
    {{--                                    </td>--}}
    {{--                                    <td--}}
    {{--                                        class="whitespace-nowrap border-r py-4 dark:border-neutral-500">--}}
    {{--                                        <p>Rp. {{ number_format($data['jumlah_realisasi'], 0, ',', '.') }}</p>--}}
    {{--                                    </td>--}}
    {{--                                    <td--}}
    {{--                                        class="whitespace-nowrap border-r py-4 dark:border-neutral-500">--}}
    {{--                                        <p>{{ $data['persen'] }}%</p>--}}
    {{--                                    </td>--}}
    {{--                                </tr>--}}
    {{--                            @endforeach--}}
    {{--                            <tr class="border-b dark:border-neutral-500 font-medium">--}}
    {{--                                <td colspan="2"--}}
    {{--                                    class="whitespace-nowrap border-r py-4 dark:border-neutral-500">JUMLAH--}}
    {{--                                </td>--}}
    {{--                                <td--}}
    {{--                                    class="whitespace-nowrap border-r py-4 dark:border-neutral-500">--}}
    {{--                                    {{ $dataPerAsnaf['jumlah']['vol'][0] }} | {{ $dataPerAsnaf['jumlah']['vol'][1] }}--}}
    {{--                                </td>--}}
    {{--                                <td--}}
    {{--                                    class="whitespace-nowrap border-r py-4 dark:border-neutral-500">--}}
    {{--                                    Rp. {{ number_format($dataPerAsnaf['jumlah']['jumlah_realisasi'], 0, ',', '.') }}--}}
    {{--                                </td>--}}
    {{--                                <td--}}
    {{--                                    class="whitespace-nowrap border-r py-4 dark:border-neutral-500">--}}
    {{--                                    100%--}}
    {{--                                </td>--}}
    {{--                            </tr>--}}
    {{--                            </tbody>--}}
    {{--                        </table>--}}
    {{--                    </div>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--        </div>--}}

    {{--        --}}{{--        <div class="flex justify-center items-center">--}}
    {{--        --}}{{--            <canvas id="chartPerJenisBantuan"></canvas>--}}
    {{--        --}}{{--        </div>--}}
    {{--    </div>--}}
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    {{--var dataPerAsnaf = {--}}
    {{--    labels: {!! json_encode($asnafForChart['nama']) !!},--}}
    {{--    datasets: [{--}}
    {{--        data: {!! json_encode($asnafForChart['persen']) !!},--}}
    {{--        backgroundColor: {!! json_encode($asnafForChart['warna']) !!},--}}
    {{--    }],--}}
    {{--};--}}

    {{--var chartPerAsnafContainer = document.getElementById('chartPerAsnaf').getContext('2d');--}}
    {{--var chartPerAsnaf = new Chart(chartPerAsnafContainer, {--}}
    {{--    type: 'bar',--}}
    {{--    data: dataPerAsnaf,--}}
    {{--    options: {--}}
    {{--        indexAxis: 'y',--}}
    {{--        plugins: {--}}
    {{--            legend: {--}}
    {{--                display: false--}}
    {{--            }--}}
    {{--        }--}}
    {{--    },--}}
    {{--});--}}

    {{--// PROGRAM--}}
    {{--var dataPerProgram = {--}}
    {{--    labels: {!! json_encode($programForChart['nama']) !!},--}}
    {{--    datasets: [{--}}
    {{--        data: {!! json_encode($programForChart['persen']) !!},--}}
    {{--        backgroundColor: {!! json_encode($programForChart['warna']) !!},--}}
    {{--    }],--}}
    {{--};--}}

    {{--var chartPerProgramContainer = document.getElementById('chartPerProgram').getContext('2d');--}}
    {{--var chartPerProgram = new Chart(chartPerProgramContainer, {--}}
    {{--    type: 'bar',--}}
    {{--    data: dataPerProgram,--}}
    {{--    options: {--}}
    {{--        indexAxis: 'y',--}}
    {{--        plugins: {--}}
    {{--            legend: {--}}
    {{--                display: false--}}
    {{--            }--}}
    {{--        }--}}
    {{--    },--}}
    {{--});--}}

</script>

</body>
</html>
