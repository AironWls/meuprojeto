<nav class="navbar navbar-expand-lg bg-body-tertiary mb-3">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">{{ env('APP_NAME') }} <i class="fa-solid fa-plane-departure"></i></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('welcome') }}">Home <i class="fa-solid fa-home"></i></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('users.index') }}"> Usuários <i class="fa-solid fa-users"></i></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('profiles.index') }}">Perfis <i class="fa-solid fa-id-badge"></i></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('roles.index') }}">Roles <i class="fa-solid fa-gear"></i></a>
                </li>
                <li class="nav-item">
                    <button id="btnLogout" type="button" class="nav-link" >Sair <i class="fa-solid fa-right-from-bracket"></i></button>
                </li>
            </ul>
        </div>
    </div>
</nav>
