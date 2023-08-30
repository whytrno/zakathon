<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"
            integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    <script type="text/javascript"
            src="https://app.sandbox.midtrans.com/snap/snap.js"
            data-client-key="{{config('midtrans.client_key')}}"></script>
</head>

<body class="space-y-10">
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

@include('layouts.homePage.navbar')

<div class="lg:px-40 px-10">
    @yield('content')
</div>

@include('layouts.homePage.footer')

@stack('scripts')
<script>
    function toggleMobileMenu() {
        $('#mobileMenu').toggleClass('hidden');
    }
</script>
</body>

</html>
