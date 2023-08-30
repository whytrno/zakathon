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
        {{--        tampilkan seluruh file--}}
        <p>{{$key}}, {{$file}}</p>
        {{--        <embed src="{{asset('uploads/pengajuan-bantuan/'. $file)}}" type="" nodownload>--}}
        <iframe src="https://sumanbogati.github.io/tiny.pdf" style="width:600px; height:500px;"></iframe>

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
