<!-- resources/views/partials/navbar.blade.php -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">
        <svg height="200" width="300" xmlns="http://www.w3.org/2000/svg" fill="white">
        <image height="200" width="300" href="{{ asset('images/logocalendario.svg') }}" />
        </svg>


        
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="#">Calendário</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Solicitações</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Administrador</a>
                </li>
            </ul>
        </div>
        <div class="d-flex align-items-center">
            <span class="navbar-text me-2">Nome</span>
            <img src="{{ asset('images\icon-usr.svg') }}" alt="User Icon" style="width: 30px; height: 30px;" fill="black">
        </div>
    </div>
</nav>