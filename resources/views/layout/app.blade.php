<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>{{ config('app.name', 'FreedomFrames') }}</title>
        @vite('resources/sass/app.scss')
    </head>

    <body>
        <div id="app">
            @yield('content')
        </div>

        @vite('resources/js/app.js')
    </body>
</html>
