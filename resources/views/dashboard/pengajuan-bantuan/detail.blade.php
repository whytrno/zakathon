@extends('layouts.dashboard.main')

@section('content')
    <div class="flex justify-between items-center">
        <h1 class="font-bold text-2xl text-[#014F31]">Data Pengajuan
            Bantuan {{ucwords(str_replace('_', ' ', $jenis))}}</h1>
    </div>

    <div>
        <h1 class="text-xl font-semibold">Nama Pemohon: {{$data->nama_pemohon}}</h1>
    </div>

    @foreach($files as $key => $file)
        @php
            $nama = str_replace(' ', '_', $key);
        @endphp
        <p class="text-lg font-bold">{{ucwords($nama)}}</p>
        <img src="{{asset('uploads/pengajuan-bantuan/' . $file)}}" alt="">
    @endforeach
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
