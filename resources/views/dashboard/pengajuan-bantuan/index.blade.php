@extends('layouts.dashboard.main')

@section('content')
    <div class="flex justify-between items-center">
        <h1 class="font-bold text-2xl text-[#014F31]">Data Pengajuan
            Bantuan {{ucwords(str_replace('_', ' ', $jenis))}}</h1>
    </div>

    <div id="rekapModal"
         class="hidden fixed h-full top-0 left-0 w-full flex items-center justify-center z-10">
        <div class="w-2/5 bg-white shadow-xl rounded-[12px] p-7 space-y-5 border border-gray-300">
            <div class="border-b-2 border-gray-800 flex justify-between pb-2">
                <h2 class="text-xl font-semibold">Buat Rekap Data Pendistribusian</h2>
                <svg onclick="rekapModal()" xmlns="http://www.w3.org/2000/svg"
                     fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                     class="w-6 h-6 stroke-red-700 cursor-pointer">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </div>

            {{--            <form action="{{route('pengajuan-bantuan.rekap')}}" class="space-y-5">--}}
            {{--                @csrf--}}
            {{--                <div class="grid grid-cols-2 gap-5">--}}
            {{--                    <div class="space-y-2">--}}
            {{--                        <p>Tahun <label class="text-red-700">*</label></p>--}}
            {{--                        <input type="number" value="{{ old('tahun') }}" name="tahun"--}}
            {{--                               class="w-full bg-[#F6F8FA] rounded-[12px] py-2 px-4">--}}
            {{--                        @error('tahun')--}}
            {{--                        <span class="text-red-500 text-sm">{{ $message }}</span>--}}
            {{--                        @enderror--}}
            {{--                    </div>--}}
            {{--                </div>--}}

            {{--                <div class="flex justify-end gap-3">--}}
            {{--                    <button type="submit" class="bg-[#014F31] py-2 px-4 rounded-[12px] text-white hover:bg-[#1D8E48]">--}}
            {{--                        Rekap--}}
            {{--                    </button>--}}
            {{--                </div>--}}
            {{--            </form>--}}
        </div>
    </div>

    <div class="bg-white p-5 rounded-[12px]">
        <table id="dataTable">
            <thead class="bg-gray-50">
            <tr>
                <th class="p-8 text-xs text-gray-500">
                    No.
                </th>
                <th class="p-8 text-xs text-gray-500">
                    No. Permohonan
                </th>
                <th class="p-8 text-xs text-gray-500">
                    Nama Pemohon
                </th>
                <th class="p-8 text-xs text-gray-500">
                    Jenis Bantuan
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
            @foreach ($datas as $data)
                <tr class="whitespace-nowrap">
                    <td class="px-6 py-4 text-sm text-center text-gray-500">
                        {{ $loop->iteration }}
                    </td>
                    <td
                        class="px-6 py-4 text-center">
                        {{ $data->no_permohonan }}
                    </td>
                    <td onclick="toggleModal({{$data->id}})"
                        class="px-6 py-4 text-center">
                        {{ $data->nama_pemohon }}
                    </td>
                    <td class="px-6 py-4 text-sm text-center text-gray-500">
                        {{ $data->jenis_bantuan }}
                    </td>
                    <td class="px-6 py-4 text-center relative">
                        <div id="statusModal"
                             class="hidden absolute bottom-0 right-0 mb-14 space-y-1 bg-white shadow-xl rounded-[12px] p-3">
                            <a href="{{route('pengajuan-bantuan.changeStatus', [$jenis, $data->id, 'diajukan'])}}"
                               class="cursor-pointer block">
                                <p class="hover:bg-green-400 py-1 px-3 bg-green-200 text-black/70 rounded-xl font-semibold">
                                    Diajukan</p>
                            </a>

                            <a href="{{route('pengajuan-bantuan.changeStatus', [$jenis, $data->id, 'disetujui'])}}"
                               class="cursor-pointer block">
                                <p class="hover:bg-blue-400 py-1 px-3 bg-blue-200 text-black/70 rounded-xl font-semibold">
                                    Disetujui</p>
                            </a>

                            <a href="{{route('pengajuan-bantuan.changeStatus', [$jenis, $data->id, 'ditolak'])}}"
                               class="cursor-pointer block">
                                <p class="hover:bg-red-400 py-1 px-3 bg-red-200 text-black/70 rounded-xl font-semibold">
                                    Revisi</p>
                            </a>
                        </div>
                        @switch($data->status)
                            @case('diajukan')
                                <p onclick="toggleStatusModal()"
                                   class="cursor-pointer hover:bg-green-400 py-1 px-3 bg-green-200 text-black/70 rounded-xl font-semibold">
                                    Diajukan</p>
                                @break
                            @case('disetujui')
                                <p onclick="toggleStatusModal()"
                                   class="cursor-pointer hover:bg-blue-400 py-1 px-3 bg-blue-200 text-black/70 rounded-xl font-semibold">
                                    Disetujui</p>
                                @break
                            @case('ditolak')
                                <p onclick="toggleStatusModal()"
                                   class="cursor-pointer hover:bg-red-400 py-1 px-3 bg-red-200 text-black/70 rounded-xl font-semibold">
                                    Ditolak</p>
                                @break
                        @endswitch
                    </td>
                    <td class="px-6 py-4 flex justify-center gap-2">
                        <a href="{{ route('pengajuan-bantuan.detail', [$jenis, $data->id]) }}"
                           class="flex items-center justify-center bg-[#014F31] p-2 rounded-full">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                 stroke-width="1.5" stroke="currentColor" class="w-4 h-4 stroke-white">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z"/>
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                            </svg>
                        </a>
                    </td>
                </tr>
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

        function rekapModal() {
            $('#rekapModal').toggleClass('hidden');
        }

        function toggleStatusModal() {
            $('#statusModal').toggleClass('hidden');
        }

        $(document).ready(function () {
            $('#dataTable').DataTable();
        });
    </script>
@endpush
