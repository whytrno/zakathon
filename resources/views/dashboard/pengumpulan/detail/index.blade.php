@extends('layouts.dashboard.main')

@section('content')
    <div class="flex justify-between items-center">
        <div>
            <h1 class="font-bold text-2xl text-[#014F31]">Data Pengumpulan</h1>
            <h1 class="font-bold text-2xl text-[#014F31]">Periode :
                {{ $data->bulan }}/{{ $data->tahun }}</h1>
        </div>
        <a href="{{ route('pengumpulan.index') }}"
           class="flex gap-2 hover:bg-[#1D8E48] items-center bg-[#014F31] rounded-2xl p-2 px-4 text-white fill-white stroke-white">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                 stroke="currentColor"
                 class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5"/>
            </svg>

            Kembali
        </a>
    </div>

    <div class="bg-white p-5 rounded-[12px]">
        <table id="dataTable">
            <thead class="bg-gray-50">
            <tr>
                <th class="p-8 text-xs text-gray-500">
                    No.
                </th>
                <th class="p-8 text-xs text-gray-500">
                    Asnaf
                </th>
                <th class="p-8 text-xs text-gray-500">
                    Target
                </th>
                <th class="p-8 text-xs text-gray-500">
                    Jumlah
                </th>
                <th class="p-8 text-xs text-gray-500">
                    %
                </th>
            </tr>
            </thead>
            <tbody class="bg-white">
            @foreach ($jenis_dana_detail as $jd)
                <tr class="whitespace-nowrap">
                    <td class="px-6 py-4 text-sm text-center text-gray-500">
                        {{ $loop->iteration }}
                    </td>
                    <td class="px-6 py-4 text-center">
                        {{ ucwords($jd) }}
                    </td>
                    <td class="px-6 py-4 text-center">
                        Rp. {{ number_format($data->{'target_' . $jd}, 0, ',', '.') }}
                    </td>
                    <td class="px-6 py-4 text-center">
                        Rp. {{ number_format($data->totalRealisasi($jd), 0, ',', '.') }}
                    </td>
                    <td class="px-6 py-4 text-center">
                        {{ $data->persenRealisasi($jd) }}%
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="grid grid-cols-5 w-full">
            <p class="font-bold col-span-2 px-6 py-4 text-center">
                Total:
            </p>
            <p class="px-6 py-4 text-center">
                Rp. {{ number_format($data->totalTarget(), 0, ',', '.') }}
            </p>
            <p class="px-6 py-4 text-center">
                Rp. {{ number_format($data->totalRealisasi(), 0, ',', '.') }}
            </p>
            <p class="px-6 py-4 text-center">
                {{ $data->persenRealisasi() }}%
            </p>
        </div>
    </div>

    <div class="bg-white p-5 rounded-[12px] space-y-5">
        <div class="flex justify-between items-center">
            <h1 class="font-bold text-xl text-[#014F31]">Riwayat Pendistribusian</h1>

            <a href="{{ route('pengumpulan.detail.create', $data->id) }}"
               class="flex gap-2 hover:bg-[#1D8E48] items-center bg-[#014F31] rounded-2xl p-2 px-4 text-white fill-white stroke-white">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                     stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m6-6H6"/>
                </svg>

                Tambah Data
            </a>
        </div>
        <table id="dataTable2">
            <thead class="bg-gray-50">
            <tr>
                <th class="p-8 text-xs text-gray-500">
                    No.
                </th>
                <th class="p-8 text-xs text-gray-500">
                    No. Pendistribusian
                </th>
                <th class="p-8 text-xs text-gray-500">
                    Nama
                </th>
                <th class="p-8 text-xs text-gray-500">
                    Jenis Dana
                </th>
                <th class="p-8 text-xs text-gray-500">
                    Jumlah Dana
                </th>
                <th class="p-8 text-xs text-gray-500">
                    Status
                </th>
                <th class="p-8 text-xs text-gray-500">
                    Aksi
                </th>
            </tr>
            </thead>
            <tbody class="bg-white">
            @foreach ($data->detail as $detail)
                <tr class="whitespace-nowrap">
                    <td class="px-6 py-4 text-sm text-center text-gray-500">
                        {{ $loop->iteration }}
                    </td>
                    <td onclick="toggleModal({{ $detail->id }})"
                        class="px-6 py-4 text-center text-blue-700 hover:text-blue-300 cursor-pointer">
                        {{ $detail->no_pengumpulan }}
                    </td>
                    <td class="px-6 py-4 text-center">
                        {{ $detail->muzakki->user->nama }}
                    </td>
                    <td class="px-6 py-4 text-center">
                        {{ ucwords($detail->jenis_dana) }}
                    </td>
                    <td class="px-6 py-4 text-center">
                        Rp. {{ number_format($detail->jumlah, 0, ',', '.') }}
                    </td>
                    <td class="px-6 py-4 text-center">
                        {{ucwords($detail->status)}}
                    </td>
                    <td class="px-6 py-4 flex justify-center gap-2">
                        <a href="{{ route('pengumpulan.detail.print', [$id, $detail->id]) }}"
                           class="flex items-center justify-center bg-blue-500 p-2 rounded-full">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                 stroke="currentColor" class="w-4 h-4 stroke-white">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      d="M6.72 13.829c-.24.03-.48.062-.72.096m.72-.096a42.415 42.415 0 0110.56 0m-10.56 0L6.34 18m10.94-4.171c.24.03.48.062.72.096m-.72-.096L17.66 18m0 0l.229 2.523a1.125 1.125 0 01-1.12 1.227H7.231c-.662 0-1.18-.568-1.12-1.227L6.34 18m11.318 0h1.091A2.25 2.25 0 0021 15.75V9.456c0-1.081-.768-2.015-1.837-2.175a48.055 48.055 0 00-1.913-.247M6.34 18H5.25A2.25 2.25 0 013 15.75V9.456c0-1.081.768-2.015 1.837-2.175a48.041 48.041 0 011.913-.247m10.5 0a48.536 48.536 0 00-10.5 0m10.5 0V3.375c0-.621-.504-1.125-1.125-1.125h-8.25c-.621 0-1.125.504-1.125 1.125v3.659M18 10.5h.008v.008H18V10.5zm-3 0h.008v.008H15V10.5z"/>
                            </svg>
                        </a>

                        <a href="{{ route('pengumpulan.detail.edit', [$id, $detail->id]) }}"
                           class="flex items-center justify-center bg-blue-500 p-2 rounded-full">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                 stroke-width="1.5" stroke="currentColor" class="w-4 h-4 stroke-white">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L6.832 19.82a4.5 4.5 0 01-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 011.13-1.897L16.863 4.487zm0 0L19.5 7.125"/>
                            </svg>
                        </a>

                        <form action="{{ route('pengumpulan.detail.delete', [$id, $detail->id]) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="confirm('Apakah anda yakin ingin menghapus data ini?')"
                                    class="flex items-center justify-center bg-red-500 p-2 rounded-full">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                     stroke-width="1.5" stroke="currentColor" class="w-4 h-4 stroke-white">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                          d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0"/>
                                </svg>
                            </button>
                        </form>
                    </td>
                </tr>

                <div id="detailModal{{ $detail->id }}"
                     class="hidden fixed h-full top-0 left-0 w-full flex items-center justify-center z-10">
                    <div class="w-2/5 bg-white shadow-xl rounded-[12px] p-7 space-y-5 border border-gray-300">
                        <div class="border-b-2 border-gray-800 flex justify-between pb-2">
                            <h2 class="text-xl font-semibold">Detail Data Riwayat Pendistribusian</h2>
                            <svg onclick="toggleModal({{ $detail->id }})" xmlns="http://www.w3.org/2000/svg"
                                 fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                 class="w-6 h-6 stroke-red-700 cursor-pointer">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                            </svg>
                        </div>

                        <div class="grid grid-cols-2 gap-5">
                            <div class="">
                                <p class="font-semibold">Nama Muzakki: </p>
                                <p>{{ ucwords($detail->muzakki->user->nama) }}</p>
                            </div>
                            <div class="">
                                <p class="font-semibold">Jenis Muzakki: </p>
                                <p>{{ ucwords($detail->muzakki->jenis) }}</p>
                            </div>
                            <div class="">
                                <p class="font-semibold">Via: </p>
                                <p>{{ ucwords($detail->via) }}</p>
                            </div>
                            @if(isset($data->rekening->bank))
                                <div class="{{ $detail->via == 'online' ? '' : 'hidden' }}">
                                    <p class="font-semibold">Bank: </p>
                                    <p>{{ ucwords($detail->rekening->bank) }}</p>
                                </div>
                                <div class="{{ $detail->via == 'online' ? '' : 'hidden' }}">
                                    <p class="font-semibold">No. Rekening: </p>
                                    <p>{{ ucwords($detail->rekening->no_rek) }}</p>
                                </div>
                                <div class="{{ $detail->via == 'online' ? '' : 'hidden' }}">
                                    <p class="font-semibold">Atas Nama: </p>
                                    <p>{{ ucwords($detail->rekening->pemilik_rekening) }}</p>
                                </div>
                            @endif
                            <div class="">
                                <p class="font-semibold">Jenis Dana: </p>
                                <p>{{ ucwords($detail->jenis_dana) }}</p>
                            </div>
                            <div class="">
                                <p class="font-semibold">Jumlah Dana: </p>
                                <p>Rp. {{ number_format($detail->jumlah, 0, ',', '.') }}</p>
                            </div>
                            <a target="_blank"
                               href="{{ asset('uploads/pengumpulan/bukti_pembayaran/' . $detail->bukti_pembayaran) }}"
                               class="col-span-2 flex justify-center">
                                <div class="space-y-3">
                                    <p class="font-semibold text-center">Bukti Pembayaran</p>

                                    <img class="object-contain h-60 w-full"
                                         src="{{ asset('uploads/pengumpulan/bukti_pembayaran/' . $detail->bukti_pembayaran) }}"
                                         alt="">
                                </div>
                            </a>
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
            $('#dataTable2').DataTable();
        });
    </script>
@endpush
