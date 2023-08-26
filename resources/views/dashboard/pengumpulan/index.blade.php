@extends('layouts.dashboard.main')

@section('content')
    <div class="flex justify-between items-center">
        <h1 class="font-bold text-2xl text-[#014F31]">Data Pengumpulan</h1>
        <button onclick="toggleModal('create')"
            class="flex gap-2 hover:bg-[#1D8E48] items-center bg-[#014F31] rounded-2xl p-2 px-4 text-white fill-white stroke-white">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m6-6H6" />
            </svg>

            <a class="font-semibold">Tambah Data</a>
        </button>
    </div>

    @push('outside-countainer')
        <div id="createModal"
            class="hidden fixed top-0 items-center h-full left-0 w-full flex items-center justify-center z-10">
            <div class="w-2/5 bg-white shadow-xl rounded-[12px] p-7 space-y-5 border border-gray-300">
                <div class="border-b-2 border-gray-800 flex justify-between pb-2">
                    <h2 class="text-xl font-semibold">Tambah Rencana Kerja dan Anggaran Tahunan</h2>
                    <svg onclick="toggleModal('create')" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke-width="1.5" stroke="currentColor" class="w-6 h-6 stroke-red-700 cursor-pointer">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </div>

                <form action="{{ route('pengumpulan.store') }}" class="space-y-6" method="POST">
                    @csrf
                    <div class="grid grid-cols-2 gap-5">
                        <div class="space-y-4">
                            <div class="space-y-2">
                                <p>Bulan <label class="text-red-700">*</label></p>
                                <select name="bulan" class="w-full bg-[#F6F8FA] rounded-[12px] py-2 px-4" required>
                                    <option value="januari">Januari</option>
                                    <option value="februari">Februari</option>
                                    <option value="maret">Maret</option>
                                    <option value="april">April</option>
                                    <option value="mei">Mei</option>
                                    <option value="juni">Juni</option>
                                    <option value="juli">Juli</option>
                                    <option value="agustus">Agustus</option>
                                    <option value="september">September</option>
                                    <option value="oktober">Oktober</option>
                                    <option value="november">November</option>
                                    <option value="desember">Desember</option>
                                </select>
                                @error('bulan')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="space-y-2">
                                <p>Periode/Tahun <label class="text-red-700">*</label></p>
                                <input type="number" value="{{ old('tahun') }}" name="tahun"
                                    class="w-full bg-[#F6F8FA] rounded-[12px] py-2 px-4" required>
                                @error('tahun')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="space-y-4">
                            <div class="space-y-2">
                                <p>Total Target <label class="text-red-700">*</label></p>
                                <input type="number" value="{{ old('total_target') }}" name="total_target"
                                    class="w-full bg-[#F6F8FA] rounded-[12px] py-2 px-4" required>
                                @error('total_target')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="flex justify-end gap-3">
                        <button type="submit" class="bg-[#014F31] py-2 px-4 rounded-[12px] text-white">Tambah</button>
                        <button onclick="toggleModal('create')" type="button"
                            class="border border-gray-800 py-2 px-4 rounded-[12px] text-gray-800">Batal</button>
                    </div>
                </form>

            </div>
        </div>
    @endpush

    <div class="bg-white p-5 rounded-[12px]">
        <table id="dataTable">
            <thead class="bg-gray-50">
                <tr>
                    <th class="p-8 text-xs text-gray-500">
                        No.
                    </th>
                    <th class="p-8 text-xs text-gray-500">
                        Bulan
                    </th>
                    <th class="p-8 text-xs text-gray-500">
                        Tahun
                    </th>
                    <th class="p-8 text-xs text-gray-500">
                        Total Target
                    </th>
                    <th class="p-8 text-xs text-gray-500">
                        Total Realisasi
                    </th>
                    <th class="p-8 text-xs text-gray-500">
                        Pencapaian
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
                        <td class="px-6 py-4 text-center">
                            {{ $data->bulan }}
                        </td>
                        <td class="px-6 py-4 text-center">
                            {{ $data->tahun }}
                        </td>
                        <td class="px-6 py-4 text-center">
                            {{ $data->target_zakat + $data->target_infak + $data->target_csr + $data->target_dskl }}
                        </td>

                        <td class="px-6 py-4 text-center">
                            {{ $data->getTotalRealisasi() }}
                        </td>
                        <td class="px-6 py-4 text-center">

                            {{ $data->getPersentasePencapaian() }}
                        </td>
                        <td class="px-6 py-4 text-center">
                            {{ $data->status }}
                        </td>
                        <td class="px-6 py-4 flex justify-center gap-2" >
                            <button onclick="toggleModal('edit', {{ $data->id }})" href="{{ route('pengumpulan.detail', ['id' => $data->id]) }}"
                                class="flex items-center justify-center bg-[#F6CD35] p-2 rounded-full">
                                <svg width="19" height="19" viewBox="0 0 19 19" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M16.625 7.125V2.8667C16.625 2.55164 16.4999 2.24994 16.2773 2.02691L14.5977 0.347715C14.3751 0.125059 14.073 0 13.7579 0H3.5625C2.90678 0 2.375 0.531777 2.375 1.1875V7.125C1.06318 7.125 0 8.18818 0 9.5V13.6562C0 13.9843 0.265703 14.25 0.59375 14.25H2.375V17.8125C2.375 18.4682 2.90678 19 3.5625 19H15.4375C16.0932 19 16.625 18.4682 16.625 17.8125V14.25H18.4062C18.7343 14.25 19 13.9843 19 13.6562V9.5C19 8.18818 17.9368 7.125 16.625 7.125ZM14.25 16.625H4.75V13.0625H14.25V16.625ZM14.25 8.3125H4.75V2.375H11.875V4.15625C11.875 4.4843 12.1407 4.75 12.4688 4.75H14.25V8.3125ZM16.0312 10.9844C15.5396 10.9844 15.1406 10.5854 15.1406 10.0938C15.1406 9.60168 15.5396 9.20312 16.0312 9.20312C16.5229 9.20312 16.9219 9.60168 16.9219 10.0938C16.9219 10.5854 16.5229 10.9844 16.0312 10.9844Z"
                                        fill="white" />
                                </svg>

                            </button>
                            <button type="submit"
                                class="flex items-center justify-center bg-[#4D8AFF] p-2 rounded-full">
                                <a href="{{ route('pengumpulan.detail', ['id' => $data->id]) }}">
                                    <svg width="19" height="19" viewBox="0 0 14 14" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M5.89022 10.7003C3.13764 10.7003 0.90625 8.50773 0.90625 5.79876C0.90625 3.08979 3.13764 0.892849 5.89022 0.892849C8.64281 0.892849 10.8746 3.08979 10.8746 5.79876C10.8746 8.50773 8.64281 10.7003 5.89022 10.7003ZM13.8671 13.2385L10.2528 9.68053C11.199 8.65208 11.7805 7.2954 11.7805 5.79869C11.7805 2.59519 9.14348 0 5.89027 0C2.63705 0 0 2.59519 0 5.79869C0 8.99781 2.63705 11.593 5.89027 11.593C7.29588 11.593 8.58509 11.1072 9.59772 10.2976L13.2264 13.8687C13.4036 14.0438 13.6903 14.0438 13.8671 13.8687C14.0443 13.698 14.0443 13.4136 13.8671 13.2385Z"
                                        fill="white" />
                                </svg>
                                    </a>

                            </button>

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@endsection

@push('scripts')
    <script>
        function toggleModal(type, id = null) {
            if (type == 'create') {
                $('#createModal').toggleClass('hidden');
            } else if (type == 'detail') {
                $('#detailModal' + id).toggleClass('hidden');
            } else if (type == 'edit') {
                $('#editModal' + id).toggleClass('hidden');
            }
        }

        $(document).ready(function() {
            $('#dataTable').DataTable();
        });
    </script>
@endpush
