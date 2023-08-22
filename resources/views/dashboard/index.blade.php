@extends('layouts.dashboard.main')

@section('content')
    <div class="flex justify-between items-center">
        <h1 class="font-bold text-2xl text-[#014F31]">Data Muzakki</h1>
        <button
            class="flex gap-2 hover:bg-[#1D8E48] items-center bg-[#014F31] rounded-2xl p-2 px-4 text-white fill-white stroke-white">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m6-6H6" />
            </svg>

            <p class="font-semibold">Tambah Data</p>
        </button>
    </div>

    <div class="container mx-auto bg-white">
        <div class="flex flex-col">
            <div class="w-full">
                <div class="p-4 border-b border-gray-200 shadow">
                    <!-- <table> -->
                    <table id="dataTable" class="p-4">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="p-8 text-xs text-gray-500">
                                    ID
                                </th>
                                <th class="p-8 text-xs text-gray-500">
                                    Name
                                </th>
                                <th class="p-8 text-xs text-gray-500">
                                    Email
                                </th>
                                <th class="p-8 text-xs text-gray-500">
                                    Created_at
                                </th>
                                <th class="px-6 py-2 text-xs text-gray-500">
                                    Edit
                                </th>
                                <th class="px-6 py-2 text-xs text-gray-500">
                                    Delete
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white">
                            <tr class="whitespace-nowrap">
                                <td class="px-6 py-4 text-sm text-center text-gray-500">
                                    1
                                </td>
                                <td class="px-6 py-4 text-center">
                                    <div class="text-sm text-gray-900">
                                        Jon doe 1
                                    </div>
                                </td>
                                <td class="px-6 py-4 text-center">
                                    <div class="text-sm text-gray-500">jhondoe@example.com</div>
                                </td>
                                <td class="px-6 py-4 text-sm text-center text-gray-500">
                                    2021-1-12
                                </td>
                                <td class="px-6 py-4 text-center">
                                    <a href="#" class="px-4 py-1 text-sm text-white bg-blue-400 rounded">Edit</a>
                                </td>
                                <td class="px-6 py-4 text-center">
                                    <a href="#" class="px-4 py-1 text-sm text-white bg-red-400 rounded">Delete</a>
                                </td>
                            </tr>
                            <tr class="whitespace-nowrap">
                                <td class="px-6 py-4 text-sm text-center text-gray-500">
                                    2
                                </td>
                                <td class="px-6 py-4 text-center">
                                    <div class="text-sm text-gray-900">
                                        Jon doe 2
                                    </div>
                                </td>
                                <td class="px-6 py-4 text-center">
                                    <div class="text-sm text-gray-500">jhondoe@example.com</div>
                                </td>
                                <td class="px-6 py-4 text-sm text-center text-gray-500">
                                    2021-1-12
                                </td>
                                <td class="px-6 py-4 text-center">
                                    <a href="#" class="px-4 py-1 text-sm text-white bg-blue-400 rounded">Edit</a>
                                </td>
                                <td class="px-6 py-4 text-center">
                                    <a href="#" class="px-4 py-1 text-sm text-white bg-red-400 rounded">Delete</a>
                                </td>
                            </tr>
                            <tr class="whitespace-nowrap">
                                <td class="px-6 py-4 text-sm text-center text-gray-500">
                                    3
                                </td>
                                <td class="px-6 py-4 text-center">
                                    <div class="text-sm text-gray-900">
                                        Jon doe 3
                                    </div>
                                </td>
                                <td class="px-6 py-4 text-center">
                                    <div class="text-sm text-gray-500">jhondoe@example.com</div>
                                </td>
                                <td class="px-6 py-4 text-sm text-center text-gray-500">
                                    2021-1-12
                                </td>
                                <td class="px-6 py-4 text-center">
                                    <a href="#" class="px-4 py-1 text-sm text-white bg-blue-400 rounded">Edit</a>
                                </td>
                                <td class="px-6 py-4 text-center">
                                    <a href="#" class="px-4 py-1 text-sm text-white bg-red-400 rounded">Delete</a>
                                </td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            $('#dataTable').DataTable();

        });
    </script>
@endpush
