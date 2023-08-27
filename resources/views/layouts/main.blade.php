<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"
            integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
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

@include('layouts.alert')
@yield('content')

@if (auth()->user())
    @include('layouts.navbar')
@endif
</body>

<script>
    const alert = document.getElementById("alert");

    setTimeout(() => {
        alert.remove();
    }, 3000);
</script>
@stack('scripts')

</html>
