<!-- resources/views/partials/navbar.blade.php -->
<nav class="navbar navbar-expand-lg bg-body-secondary rounded-5 my-4 mx-2 shadow" >
    <div class="container-fluid">
        <a class="navbar-brand" href="#">
        <img height="80" width="80" src="{{ asset('images/logocalendario.svg') }}" />
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-center" id="navbarText">
            <ul class="navbar-nav flex-fill justify-content-between" >
                <li class="nav-item p-2 mx-3">
                    <a class="nav-link ps-5 fs-4 text-primary-emphasis" href="#">Calendário</a>
                </li>
                <li class="nav-item p-2 mx-3">
                    <a class="nav-link fs-4 text-primary-emphasis" href="#">Solicitações</a>
                </li>
                <li class="nav-item dropdown p-2 mx-3">
          <a class="nav-link dropdown-toggle pe-5 fs-4 text-primary-emphasis" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Administrador
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">Controle</a></li>
            <li><a class="dropdown-item" href="#">op1</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </li>
            </ul>
            <div class="d-flex justify-content-right">
                <span class="p-1 navbar-text my-auto ms-5 ps-5  fs-5 text-end text-primary-emphasis">Nome</span>
                <i class="p-1 fa-solid fa-circle-user" style="font-size: 80px;"></i>
            </div>
        </div>

    </div>
</nav>