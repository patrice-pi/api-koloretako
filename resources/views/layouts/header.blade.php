<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand text-uppercase" href="/">Koloretako</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="/the-team">L'équipe</a>
                </li>
                <!-- Si le user n'est pas connecté -->
                @if(Auth::guest())
                  <li class="nav-item">
                    <a class="nav-link btn-primary btn-sm btn mx-2" href="{{ route('login') }}">Se connecter</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link btn-primary btn-sm btn mx-2" href="{{ route('register') }}">S'inscrire</a>
                  </li>
                  <!-- Si le user est connecté -->
                @elseif(Auth::check())
                  <li class="nav-item active">
                      <a class="nav-link" href="/leaderboard">Tableau des scores <span class="sr-only">(current)</span></a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link btn-primary btn-sm btn mx-2 text-white" href="{{ route('user') }}">Profil</a>
                  </li>
                  <!-- Si le user est un admin -->
                  @if(Auth::user()->admin)
                    <li class="nav-item">
                      <a class="nav-link btn-primary btn-sm btn mx-2 text-white" href="{{ route('admin_home') }}">Administration</a>
                    </li>
                  @endif
                  <li class="nav-item">
                    <a class="nav-link btn-danger btn-sm btn mx-2 text-white" href="{{ route('logout') }}">Se déconnecter</a>
                  </li>
                @endif
            </ul>
        </div>
    </div>
</nav>
