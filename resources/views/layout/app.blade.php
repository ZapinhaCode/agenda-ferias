<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>{{ config('app.name', 'FreedomFrames') }}</title>
        @vite('resources/sass/app.scss')
    </head>

    <body>
        <div id="app">
            @include('partials.navbar') <!-- Inclui a view parcial do menu -->
        
            @yield('content')
            

        </div>

        @vite('resources/js/app.js')
    </body>
</html>
