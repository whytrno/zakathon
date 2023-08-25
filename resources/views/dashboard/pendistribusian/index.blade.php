@extends('layouts.dashboard.main')

@section('content')
    <div class="flex justify-between items-center">
        <h1 class="font-bold text-2xl text-[#014F31]">Data Pendistribusian</h1>
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

    @endpush
    <div class="bg-white p-5 rounded-[12px]">
         <table id="dataDistri" class="w-full">
            <thead >
                <tr>
                    <th class="p-3 text-xs text-gray-500 py-{2}">
                        No.
                    </th>
                    <th class="p-3 text-xs text-gray-500">
                        Program
                    </th>
                    <th class="p-3 text-xs text-gray-500">
                        Periode
                    </th>
                    <th class="p-3 text-xs text-gray-500">
                        Total Target
                    </th>
                    <th class="p-3 text-xs text-gray-500">
                        Vol
                        <p> Vol | Org </p>
                    </th>
                    <th class="p-3 text-xs text-gray-500">
                        Total Realisasi
                    </th>
                    <th class="p-3 text-xs text-gray-500">
                        %
                    </th>
                    <th class="p-3 text-xs text-gray-500">
                        Aksi
                    </th>
                </tr>
            </thead>
        </table>

    </div>
@endsection
