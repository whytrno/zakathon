@extends('layouts.dashboard.main')

@section('content')
    <div class="flex justify-between items-center">
        <h1 class="font-bold text-2xl text-[#014F31]">Data Muzakki</h1>
        <a href="{{ route('mustahiq.create') }}"
            class="flex gap-2 hover:bg-[#1D8E48] items-center bg-[#014F31] rounded-2xl p-2 px-4 text-white fill-white stroke-white">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m6-6H6" />
            </svg>

            Tambah Data
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
                        Tanggal Registrasi
                    </th>
                    <th class="p-8 text-xs text-gray-500">
                        NIM
                    </th>
                    <th class="p-8 text-xs text-gray-500">
                        Mustahiq
                    </th>
                    <th class="p-8 text-xs text-gray-500">
                        Asnaf
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
                        <td class="px-6 py-4 text-center">
                            {{ $data->user->created_at }}
                        </td>
                        <td onclick="toggleModal({{ $data->id }})"
                            class="px-6 py-4 text-center text-blue-700 hover:text-blue-300 cursor-pointer">
                            {{ $data->nim }}
                        </td>
                        <td class="px-6 py-4 text-center">
                            {{ $data->user->nama }}
                        </td>
                        <td class="px-6 py-4 text-center">
                            {{ $data->asnaf }}
                        </td>
                        <td class="px-6 py-4 flex justify-center gap-2">
                            <a href="{{ route('mustahiq.edit', $data->id) }}"
                                class="flex items-center justify-center bg-blue-500 p-2 rounded-full">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-4 h-4 stroke-white">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L6.832 19.82a4.5 4.5 0 01-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 011.13-1.897L16.863 4.487zm0 0L19.5 7.125" />
                                </svg>
                            </a>

                            <form action="{{ route('mustahiq.delete', $data->user->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="confirm('Apakah anda yakin ingin menghapus data ini?')"
                                    class="flex items-center justify-center bg-red-500 p-2 rounded-full">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-4 h-4 stroke-white">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                    </svg>
                                </button>
                            </form>
                        </td>
                    </tr>

                    <div id="detailModal{{ $data->id }}"
                        class="hidden fixed h-full top-0 left-0 w-full flex items-center justify-center z-10">
                        <div class="w-2/5 bg-white shadow-xl rounded-[12px] p-7 space-y-5 border border-gray-300">
                            <div class="border-b-2 border-gray-800 flex justify-between pb-2">
                                <h2 class="text-xl font-semibold">Detail Data Muzakki</h2>
                                <svg onclick="toggleModal({{ $data->id }})" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                    class="w-6 h-6 stroke-red-700 cursor-pointer">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </div>

                            <div class="grid grid-cols-2 gap-5">
                                <div class="">
                                    <p class="font-semibold">Jenis Mustahiq: </p>
                                    <p>{{ ucwords($data->jenis) }}</p>
                                </div>
                                <div class="">
                                    <p class="font-semibold">{{ $data->jenis == 'perorangan' ? 'Nama:' : 'Nama Lembaga:' }}
                                    </p>
                                    <p>{{ ucwords($data->user->nama) }}</p>
                                </div>
                                <div class="{{ $data->jenis == 'perorangan' ? '' : 'hidden' }}">
                                    <p class="font-semibold">Tempat Lahir: </p>
                                    <p>{{ $data->tempat_lahir }}</p>
                                </div>
                                <div class="{{ $data->jenis == 'perorangan' ? '' : 'hidden' }}">
                                    <p class="font-semibold">Tanggal Lahir: </p>
                                    <p>{{ $data->tanggal_lahir }}</p>
                                </div>
                                <div class="">
                                    <p class="font-semibold">Email: </p>
                                    <p>{{ $data->user->email }}</p>
                                </div>
                                <div class="">
                                    <p class="font-semibold">Pemilik Rekening: </p>
                                    <p>{{ $data->pemilik_rekening }}</p>
                                </div>
                                <div class="">
                                    <p class="font-semibold">Bank: </p>
                                    <p>{{ $data->bank }}</p>
                                </div>
                                <div class="">
                                    <p class="font-semibold">No. Rekening: </p>
                                    <p>{{ $data->no_rek }}</p>
                                </div>
                                <div class="">
                                    <p class="font-semibold">Asnaf: </p>
                                    <p>{{ ucwords($data->asnaf) }}</p>
                                </div>
                                <div class="{{ $data->jenis == 'perorangan' ? '' : 'hidden' }}">
                                    <p class="font-semibold">NIK: </p>
                                    <p>{{ $data->user->nik }}</p>
                                </div>
                                <div class="{{ $data->jenis == 'perorangan' ? '' : 'hidden' }}">
                                    <p class="font-semibold">Pekerjaan: </p>
                                    <p>{{ ucwords($data->pekerjaan) }}</p>
                                </div>
                                <div class="{{ $data->jenis == 'perorangan' ? 'hidden' : '' }}">
                                    <p class="font-semibold">Jumlah Anggota: </p>
                                    <p>{{ ucwords($data->jumlah_anggota) }}</p>
                                </div>
                                <div class=" {{ $data->jenis == 'perorangan' ? '' : 'hidden' }}">
                                    <p class="font-semibold">Jenis Kelamin: </p>
                                    <p>{{ ucwords($data->user->jenis_kelamin) }}</p>
                                </div>
                                <div class="">
                                    <p class="font-semibold">Telepon: </p>
                                    <p>{{ $data->user->telepon }}</p>
                                </div>
                                <div class="">
                                    <p class="font-semibold">Alamat: </p>
                                    <p>{{ $data->user->alamat }}</p>
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

        $(document).ready(function() {
            $('#dataTable').DataTable();
        });
    </script>
@endpush
