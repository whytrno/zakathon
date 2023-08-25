<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"
        integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js"></script>
</head>

<body>
    <style>
        @keyframes slideRight {
            0% {
                transform: translateX(0);
                opacity: 1;
            }

            100% {
                transform: translateX(100%);
                opacity: 0;
            }
        }

        .animated-element {
            animation: slideRight 3s ease-in-out forwards;
        }
    </style>

    @include('layouts.dashboard.alert')
    <div class="flex">
        @include('layouts.dashboard.sidebar')
        <div class="w-[77%]">
            @include('layouts.dashboard.navbar')
            <div class="bg-[#F6F8FA] py-8 px-10 rounded-xl min-h-full w-full space-y-10">
                @yield('content')
            </div>

            @stack('outside-countainer')
        </div>
    </div>
</body>

<script>
    const alert = document.getElementById("alert");

    setTimeout(() => {
        alert.remove();
    }, 3000);
</script>

@stack('scripts')

</html>
