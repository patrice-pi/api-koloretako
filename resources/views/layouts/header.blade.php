
{{-- <div class="modal fade" id="modalConnect" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-body">
        @if(Auth::guest())
          <a href="{{ route('login') }}" class="btn btn-primary btn-block">Se connecter</a>
          <a href="{{ route('register') }}" class="btn btn-primary btn-block">S'inscrire</a>
        @elseif(Auth::check())
          <a href="{{ route('user') }}" class="btn btn-primary btn-block">Profil</a>
          @if(Auth::user()->admin)
            <a href="{{ route('admin_home') }}" class="btn btn-primary btn-block">Administration</a>
          @endif
          <a href="{{ route('logout') }}" class="btn btn-primary btn-block">Se déconnecter</a>
        @endif
      </div>
    </div>
  </div>
</div>
@include('includes.flash_messages') --}}


<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand text-uppercase" href="/">Koloretako</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="/">Tableau des scores <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/the-team">L'équipe</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/game">Le jeu</a>
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
                  {{-- <li class="nav-item">
                    <a class="nav-link btn-primary btn-sm btn mx-2" href="{{ route('user') }}">Profil</a>
                  </li> --}}
                  <!-- Si le user est un admin -->
                  @if(Auth::user()->admin)
                    <li class="nav-item">
                      <a class="nav-link btn-primary btn-sm btn mx-2" href="{{ route('admin_home') }}">Administration</a>
                    </li>
                  @endif
                  <li class="nav-item">
                    <a class="nav-link btn-danger btn-sm btn mx-2" href="{{ route('logout') }}">Se déconnecter</a>
                  </li>
                @endif
            </ul>
        </div>
    </div>
</nav>
