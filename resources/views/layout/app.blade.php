<!DOCTYPE html>
<html lang="en" data-bs-theme="projeto">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name', 'FreedomFrames') }}</title>
        @vite(['resources/sass/app.scss', 'resources/css/app.css', 'resources/js/app.js'])
        <link rel="stylesheet" href="{{ asset('fontawesome-free-6.5.2-web/css/all.min.css') }}">
        <link rel="stylesheet" href="//cdn.datatables.net/2.0.8/css/dataTables.dataTables.min.css">
    </head>
    <body>
    <div id="app">
        <div class="bg-image"></div>
        <div class="content">
            @include('partials.navbar') <!-- Inclui a view parcial do menu -->
            <div class="container-md bg-dark object-fit-fill border rounded pt-4">
                @yield('content')
            </div>
        </div>
    </div>
        @vite(['resources/js/app.js', 'resources/js/tables.js'])
        <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
        <script src="//cdn.datatables.net/2.0.8/js/dataTables.min.js"></script>
    </body>
</html>
