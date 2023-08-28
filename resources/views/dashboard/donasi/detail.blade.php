@extends('layouts.dashboard.main')

@section('content')
    <div class="flex justify-between items-center">
        <h1 class="font-bold text-2xl text-[#014F31]">Detail Program Donasi {{$datas->judul}}</h1>
    </div>

    <div class="bg-white p-5 rounded-[12px]">
        <table id="dataTable">
            <thead class="bg-gray-50">
            <tr>
                <th class="p-8 text-xs text-gray-500">
                    No.
                </th>
                <th class="p-8 text-xs text-gray-500">
                    No. Donasi
                </th>
                <th class="p-8 text-xs text-gray-500">
                    Nama Donatur
                </th>
                <th class="p-8 text-xs text-gray-500">
                    Jumlah Donasi
                </th>
                <th class="p-8 text-xs text-gray-500 text-center">
                    Status
                </th>
            </tr>
            </thead>
            <tbody class="bg-white">
            @foreach ($datas->transaksi as $data)
                <tr class="whitespace-nowrap">
                    <td class="px-6 py-4 text-sm text-center text-gray-500">
                        {{ $loop->iteration }}
                    </td>
                    <td onclick="toggleModal({{ $data->id }})"
                        class="text-center text-blue-700 hover:text-blue-300 cursor-pointer">
                        {{ $data->no_donasi }}
                    </td>
                    <td
                        class="text-center px-6 py-4">
                        {{ ucwords($data->donatur->nama) }}
                    </td>
                    <td class="px-6 py-4 text-center">
                        Rp. {{ number_format($data->jumlah, 0, ',', '.') }}
                    </td>
                    <td class="px-6 py-4 text-center relative">
                        @switch($data->status)
                            @case('proses')
                                <p onclick="toggleStatusModal()"
                                   class="py-1 px-3 bg-purple-200 text-black/70 rounded-xl font-semibold">
                                    Proses</p>
                                @break
                            @case('berhasil')
                                <p onclick="toggleStatusModal()"
                                   class="py-1 px-3 bg-green-200 text-black/70 rounded-xl font-semibold">
                                    Berhasil</p>
                                @break
                            @case('gagal')
                                <p onclick="toggleStatusModal()"
                                   class="py-1 px-3 bg-blue-200 text-black/70 rounded-xl font-semibold">
                                    Gagal</p>
                                @break
                        @endswitch
                    </td>
                </tr>

                <div id="detailModal{{ $data->id }}"
                     class="hidden fixed h-full top-0 left-0 w-full flex items-center justify-center z-10">
                    <div class="w-2/5 bg-white shadow-xl rounded-[12px] p-7 space-y-5 border border-gray-300">
                        <div class="border-b-2 border-gray-800 flex justify-between pb-2">
                            <h2 class="text-xl font-semibold">Detail Data Donatur</h2>
                            <svg onclick="toggleModal({{ $data->id }})" xmlns="http://www.w3.org/2000/svg"
                                 fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                 class="w-6 h-6 stroke-red-700 cursor-pointer">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                            </svg>
                        </div>

                        <div class="gap-y-5 grid grid-cols-2">
                            <div class="">
                                <p class="font-semibold">Nama: </p>
                                <p>{{ ucwords($data->donatur->nama) }}</p>
                            </div>
                            <div class="">
                                <p class="font-semibold">Telepon: </p>
                                <p>{{ $data->donatur->telepon }}</p>
                            </div>
                            <div class="">
                                <p class="font-semibold">Email: </p>
                                <p>{{ $data->donatur->email }}</p>
                            </div>
                            <div class="">
                                <p class="font-semibold">Jumlah: </p>
                                <p>Rp. {{ number_format($data->jumlah, 0, ',', '.') }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection

@push('scripts')
    <script>
        function toggleModal(id) {
            $('#detailModal' + id).toggleClass('hidden');
        }

        $(document).ready(function () {
            $('#dataTable').DataTable();
        });
    </script>
@endpush
