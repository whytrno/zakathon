@extends('layouts.dashboard.main')

@push('heads')
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
          integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin=""/>
    <!-- Make sure you put this AFTER Leaflet's CSS -->
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
            integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
@endpush

@section('content')
    <div class="space-y-2">
        <div class="flex justify-between items-center">
            <h1 class="font-bold text-2xl text-[#014F31]">Peta Pendistribusian</h1>
        </div>
        <p class="font-semibold text-xl">Legenda:</p>
        <div class="flex gap-5">
            <div class="flex gap-2 items-center font-semibold">
                <div class="h-8 w-8 bg-black/20 rounded-[12px]"></div>
                <p>Belum ada pendistribusian</p>
            </div>
            <div class="flex gap-2 items-center font-semibold">
                <div class="h-8 w-8 bg-purple-700/70 rounded-[12px]"></div>
                <p>Sudah ada program tapi belum ada pendistribusian</p>
            </div>
            <div class="flex gap-2 items-center font-semibold">
                <div class="h-8 w-8 bg-blue-700/70 rounded-[12px]"></div>
                <p>Sudah ada pendistribusian</p>
            </div>
        </div>
    </div>
    <div id="map" class="h-[800px]"></div>
@endsection

@push('scripts')
    <script type="text/javascript" src="{{asset('geojs/kabupaten.js')}}"></script>
    <script>
        var map = L.map('map').setView([-3.8773357308247474, 110.85111662359851], 6);
        L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '© OpenStreetMap'
        }).addTo(map);

        function style(feature) {
            return {
                fillColor: '#000000',
                weight: 2,
                opacity: 1,
                color: 'white',
                dashArray: '3',
                fillOpacity: 0.5
            };
        }

        var geojson = L.geoJson(statesData, {
            style: function (feature) {
                switch (feature.properties.name) {
                    @foreach($activeKabupaten as $kab)
                    case '{{$kab[0]}}':
                        @if($kab[2] == 0)
                            return {
                            fillColor: 'purple',
                            weight: 2,
                            opacity: 1,
                            color: 'white',
                            dashArray: '3',
                            fillOpacity: 0.4
                        };
                        @else
                            return {
                            fillColor: 'blue',
                            weight: 2,
                            opacity: 1,
                            color: 'white',
                            dashArray: '3',
                            fillOpacity: 0.4
                        };
                    @endif
                    @endforeach
                    default:
                        return {
                            fillColor: '#000000',
                            weight: 2,
                            opacity: 1,
                            color: 'black',
                            dashArray: '3',
                            fillOpacity: 0.1
                        };
                }
            },
            onEachFeature: function (feature, layer) {
                @foreach($activeKabupaten as $kab)
                if (feature.properties.name == '{{$kab[0]}}') {
                    layer.bindPopup('Kabupaten: ' + feature.properties.name +
                        '<br>Terdapat {{$kab[4]}} program pada kabupaten ini' +
                        '<br>Target distribusi: Rp. {{number_format($kab[1], 0, ',', '.')}}' +
                        '<br>Total terealisasi: Rp. {{number_format($kab[2], 0, ',', '.')}}' +
                        '<br>Persentase realisasi: {{number_format($kab[3], 2)}}%');
                }
                @endforeach
            }
        }).addTo(map);

        // var geojson = L.geoJson(statesData, {
        //     style: function (feature) {
        //         return {
        //             fillColor: '#000000',
        //             weight: 2,
        //             opacity: 1,
        //             color: 'black',
        //             dashArray: '3',
        //             fillOpacity: 0.1
        //         };
        //     },
        //     onEachFeature: function (feature, layer) {
        //         if (feature.properties && feature.properties.name) {
        //             layer.bindPopup('Kabupaten: ' + feature.properties.name +
        //                 '<br>Belum ada pendistribusian');
        //         }
        //     }
        // }).addTo(map);

        // L.geoJson(statesData, {style: style}).addTo(map);

        // var geojson = L.geoJson(statesData, {
        //     style: function (feature) {
        //         switch (feature.properties.name) {
        //             case 'BANYUMAS':
        //                 return {
        //                     fillColor: '#000000',
        //                     weight: 2,
        //                     opacity: 1,
        //                     fillOpacity: 0.7
        //                 };
        //         }
        //     },
        //     onEachFeature: function (feature, layer) {
        //         if (feature.properties && feature.properties.name) {
        //             layer.bindPopup("Kabupaten: " + feature.properties.name);
        //         }
        //     }
        // }).addTo(map);
    </script>
@endpush
