@extends('layouts.dashboard.main')

@section('content')
    <div class="flex justify-between items-center">
        <h1 class="font-bold text-2xl text-[#014F31]">Data Program Donasi</h1>
        <div class="flex gap-4">
            <a href="{{ route('donasi.create') }}"
               class="flex gap-2 hover:bg-[#1D8E48] items-center bg-[#014F31] rounded-2xl p-2 px-4 text-white fill-white stroke-white">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                     stroke="currentColor"
                     class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m6-6H6"/>
                </svg>

                Tambah Data
            </a>
        </div>
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

            <form action="{{route('donasi.rekap')}}" class="space-y-5">
                @csrf
                <div class="grid grid-cols-2 gap-5">
                    <div class="space-y-2">
                        <p>Judul <label class="text-red-700">*</label></p>
                        <input type="text" value="{{ old('judul') }}" name="judul"
                               class="w-full bg-[#F6F8FA] rounded-[12px] py-2 px-4">
                        @error('judul')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="flex justify-end gap-3">
                    <button type="submit" class="bg-[#014F31] py-2 px-4 rounded-[12px] text-white hover:bg-[#1D8E48]">
                        Rekap
                    </button>
                </div>
            </form>
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
                    Judul
                </th>
                <th class="p-8 text-xs text-gray-500">
                    Deskripsi
                </th>
                <th class="p-8 text-xs text-gray-500">
                    Target Donasi
                </th>
                <th class="p-8 text-xs text-gray-500 text-center">
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
                    <td onclick="toggleModal({{$data->id}})"
                        class="px-6 py-4 text-cente text-blue-700 hover:text-blue-300 cursor-pointer">
                        {{ ucwords($data->judul) }}
                    </td>
                    <td class="px-6 py-4 text-center">
                        {{substr($data->deskripsi_singkat, 0, 20) . '...'}}
                    </td>
                    <td class="px-6 py-4 text-center">
                        Rp. {{ number_format($data->target_donasi, 0, ',', '.') }}
                    </td>
                    <td class="px-6 py-4 text-center relative">
                        <div id="statusModal"
                             class="hidden absolute bottom-0 right-0 mb-14 space-y-1 bg-white shadow-xl rounded-[12px] p-3">
                            <a href="{{route('donasi.changeStatus', [$data->id, 'belum diajukan'])}}"
                               class="cursor-pointer block">
                                <p class="hover:bg-purple-400 py-1 px-3 bg-purple-200 text-black/70 rounded-xl font-semibold">
                                    Belum Diajukan</p>
                            </a>

                            <a href="{{route('donasi.changeStatus', [$data->id, 'diajukan'])}}"
                               class="cursor-pointer block">
                                <p class="hover:bg-green-400 py-1 px-3 bg-green-200 text-black/70 rounded-xl font-semibold">
                                    Diajukan</p>
                            </a>

                            <a href="{{route('donasi.changeStatus', [$data->id, 'disetujui'])}}"
                               class="cursor-pointer block">
                                <p class="hover:bg-blue-400 py-1 px-3 bg-blue-200 text-black/70 rounded-xl font-semibold">
                                    Disetujui</p>
                            </a>

                            <a href="{{route('donasi.changeStatus', [$data->id, 'revisi'])}}"
                               class="cursor-pointer block">
                                <p class="hover:bg-red-400 py-1 px-3 bg-red-200 text-black/70 rounded-xl font-semibold">
                                    Revisi</p>
                            </a>
                        </div>
                        @switch($data->status)
                            @case('belum diajukan')
                                <p onclick="toggleStatusModal()"
                                   class="cursor-pointer hover:bg-purple-400 py-1 px-3 bg-purple-200 text-black/70 rounded-xl font-semibold">
                                    Belum Diajukan</p>
                                @break
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
                            @case('revisi')
                                <p onclick="toggleStatusModal()"
                                   class="cursor-pointer hover:bg-red-400 py-1 px-3 bg-red-200 text-black/70 rounded-xl font-semibold">
                                    Revisi</p>
                                @break
                        @endswitch
                    </td>
                    <td class="px-6 py-4 flex justify-center gap-2">
                        <a href="{{ route('donasi.detail.index', $data->id) }}"
                           class="flex items-center justify-center bg-[#014F31] p-2 rounded-full">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                 stroke-width="1.5" stroke="currentColor" class="w-4 h-4 stroke-white">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z"/>
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                            </svg>
                        </a>
                        <a href="{{ route('donasi.edit', $data->id) }}"
                           class="flex items-center justify-center bg-blue-500 p-2 rounded-full">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                 stroke-width="1.5" stroke="currentColor" class="w-4 h-4 stroke-white">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L6.832 19.82a4.5 4.5 0 01-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 011.13-1.897L16.863 4.487zm0 0L19.5 7.125"/>
                            </svg>
                        </a>

                        <form action="{{ route('donasi.delete', $data->id) }}" method="POST">
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

                <div id="detailModal{{ $data->id }}"
                     class="hidden fixed h-full top-0 left-0 w-full flex items-center justify-center z-10">
                    <div
                        class="w-1/2 scroll-auto h-96 overflow-auto bg-white shadow-xl rounded-[12px] p-7 space-y-5 border border-gray-300">
                        <div class="border-b-2 border-gray-800 flex justify-between pb-2">
                            <h2 class="text-xl font-semibold">Detail Data Pendistribusian</h2>
                            <svg onclick="toggleModal({{ $data->id }})" xmlns="http://www.w3.org/2000/svg"
                                 fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                 class="w-6 h-6 stroke-red-700 cursor-pointer">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                            </svg>
                        </div>

                        <div class="space-y-5">
                            <div class="">
                                <p class="font-semibold">Nama Program: </p>
                                <p>{{ ucwords($data->judul) }}</p>
                            </div>
                            <div class="">
                                <p class="font-semibold">Deskripsi: </p>
                                <p>{{ $data->deskripsi_singkat }}</p>
                            </div>
                            <div class="">
                                <p class="font-semibold">Target Donasi: </p>
                                <p>Rp. {{ number_format($data->target_donasi, 0, ',', '.') }}</p>
                            </div>
                            <a target="_blank"
                               href="{{ asset('uploads/donasi/' . $data->banner) }}"
                               class="col-span-2 flex justify-center">
                                <div class="space-y-3">
                                    <p class="font-semibold">Banner:</p>

                                    <img class="object-contain h-60 w-full"
                                         src="{{ asset('uploads/donasi/' . $data->banner) }}"
                                         alt="">
                                </div>
                            </a>
                            <div class="">
                                <p class="font-semibold">Deskripsi: </p>
                                <div>
                                    {!! $data->deskripsi !!}
                                </div>
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
