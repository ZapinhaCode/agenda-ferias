<!DOCTYPE html>
<html lang="en" data-bs-theme="projeto">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name', 'FreedomFrames') }}</title>
        @vite(['resources/sass/app.scss', 'resources/css/app.css', 'resources/js/app.js'])
        <link rel="stylesheet" href="{{ asset('fontawesome-free-6.5.2-web/css/all.min.css') }}">
        <link rel="icon" href="{{ asset('fav-icon/freedomframes.ico') }}">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.11.6/umd/popper.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/js/bootstrap.min.js" crossorigin="anonymous"></script>
    </head>

    <body>
        
        <div id="app">
            @include('partials.modais.modalFerias')
            @include('partials.modais.modalSugerirAlteracao')
            <div class="bg-image"></div>
            <div class="content">
                @include('partials.navbar') <!-- Inclui a view parcial do menu -->
                <div class="container-md bg-dark object-fit-fill border rounded pt-4">
                    @yield('content')

                    <div class="overlay">
                        <div class="spinner-border text-primary" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @vite(['resources/js/app.js', 'resources/js/tables.js'])
        <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
        <script src="//cdn.datatables.net/2.0.8/js/dataTables.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="{{ asset('js/funcoes.js') }}"></script>
        <script src="{{ asset('js/mascaras.js') }}"></script>
    </body>
</html>