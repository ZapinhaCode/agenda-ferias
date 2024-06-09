<!-- resources/views/partials/navbar.blade.php -->
<nav class="navbar navbar-expand-lg bg-body-secondary  rounded-5 my-4 px-5 shadow row">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">
            <img height="80" width="80" src="{{ asset('images/logocalendariobranca.svg') }}" />
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse flex-fill justify-content-between text-center" id="navbarText">
            <ul class="navbar-nav flex-fill justify-content-between" >
                <li class="nav-item px-2 mx-3 col-md-auto">
                    <a class="nav-link ps-5 fs-4 text-primary-emphasis" href="{{ URL('/inicial') }}"> <i class="fa-solid fa-house" style="font-size: 20px"></i>  Tela inicial</a>
                </li>

                <li class="nav-item px-2 mx-3 col-md-auto">
                    <a class="nav-link ps-5 fs-4 text-primary-emphasis" href="#"><i class="fa-regular fa-calendar-days" style="font-size: 20px"></i>  Calendário</a>
                </li>

                <li class="nav-item px-2 mx-3 col-md-auto">
                    <a class="nav-link fs-4 text-primary-emphasis" href="{{ route('ferias.lista') }}"> <i class="fa-solid fa-envelope-circle-check" style="font-size:20px"></i>  Minhas solicitações</a>
                </li>

                <li class="nav-item dropdown px-2 mx-3 col-md-auto">
                    <a class="nav-link dropdown-toggle pe-5 fs-4 text-primary-emphasis"  href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fa-solid fa-user-tie" style="font-size: 20px"></i>  Administrador
                    </a>
            
                    <ul class="dropdown-menu dropdown-menu-lg-end">
                        <li><a class="dropdown-item" href="{{ route('adm.usuario.lista') }}"><i class="fa-solid fa-users"></i>  Funcionário(s)</a></li>
                        <li><a class="dropdown-item" href="{{ route('adm.setor.lista') }}"><i class="fa-solid fa-sitemap"></i>  Setores</a></li>
                        <li><a class="dropdown-item" href="{{ route('adm.ferias.solicitacoes') }}"><i class="fa-solid fa-calendar-check"></i>  Aprovar solicitações</a></li>
                    </ul>
                </li>
            </ul>

            <div class="d-flex col-md-auto justify-content-end">
                <span class="p-1 navbar-text my-auto  fs-5 text-end text-primary-emphasis text-wrap d-inline-block text-truncate" style="max-height: 60px; max-width: 150px;">{{ !is_null(auth()->user()) ? auth()->user()->nome : 'Nome' }}</span>
                <div class= "dropup-center dropdown">
                    <button class="btn flex" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="p-1 fa-solid fa-circle-user" style="font-size: 80px;"></i>
                    </button>

                    <ul class="dropdown-menu dropdown-menu-end">
                        @if (!is_null(auth()->user()))
                            <li>
                                <a class="dropdown-item text-center" href="{{ route('usuario.visualizaMeuPerfil', auth()->user()->id) }}">Meu perfil <i class="fa-solid fa-user"></i></a>
                            </li>
                        @endif

                        <li>
                            <a class="dropdown-item text-center" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                Logout <i class="fa-solid fa-right-from-bracket"></i>
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</nav>