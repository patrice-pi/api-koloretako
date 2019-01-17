

<nav class="col-12 col-lg-3 bg-light sidebar position-relative position-lg-fixed">
    <div class="sidebar-sticky p-4">

        <div class="d-block text-center text-lg-left" style="max-width: 300px; margin: auto;">
            <img src="/img/logo-localup.png" class="img-fluid border-bottom border-primary pb-3 mb-3" alt="">
        </div>

        <ul class="nav flex-row flex-lg-column justify-content-center justify-content-lg-start">
            <li class="nav-item">
                <a class="nav-link" href="{{route('admin_home')}}">
                    <i class="fas fa-home"></i> Tableau de bord
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin_users') }}">
                    <i class="fas fa-users"></i> Gérer les utilisateurs
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin_locals') }}">
                    <i class="fas fa-cube"></i> Gérer les locaux
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('admin_modules')}}">
                    <i class="fas fa-plus-square"></i> Gérer les modules
                </a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="{{ route('admin_cities') }}">
                    <i class="fas fa-university"></i> Gérer les villes
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin_reduction_index') }}">
                    <i class="fas fa-percent"></i> Gérer les pourcentage de réductions
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin_local_types') }}">
                    <i class="fas fa-bullseye"></i> Gérer les types de local
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin_level_rates') }}">
                    <i class="fas fa-angle-double-up"></i> Gérer les ratios de niveaux
                </a>
            </li>
        </ul>
        <a class="nav-link btn btn-danger mt-4" target="_blank" href="{{ route('home') }}">
            Voir le site
        </a>
    </div>
</nav>
