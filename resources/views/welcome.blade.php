<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Koloretako</title>

    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <link href="{{ asset('/css/styles.css') }}" rel="stylesheet">

</head>

<body>
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
                </ul>
            </div>
        </div>
    </nav>

    <h1 class="text-center text-uppercase my-5">Tableau des scores</h1>

    <div class="container">
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead class="thead-light">
                    <tr>
                        <th scope="col" width="100px">Classement</th>
                        <th scope="col">Pseudo</th>
                        <th scope="col">Niveau atteint</th>
                        <th scope="col">Durée</th>
                        {{-- <th scope="col">Difficulté</th> --}}
                    </tr>
                </thead>
                <tbody>
                    @foreach ($leaderboards as $key => $value)
                        <tr>
                            <th scope="row">
                                @if ($key+1 == 1 || $key+1 ==  2 || $key+1 == 3)
                                    <i class="fas fa-trophy fa-3x my-2"><span class="podium">{{ $key+1 }}</span></i>
                                @else
                                    <span>{{ $key+1 }}</span>
                                @endif
                            </th>
                            <td>{{ $value->pseudo }}</td>
                            <td>{{ $value->score }}</td>
                            <td>{{ $value->duration }}s</td>
                            {{-- @if ($value->mode == 1)
                                {{ $mode = "easy" }}
                            @elseif ($value->mode == 2)
                                {{ $mode = "medium" }}
                            @elseif ($value->mode == 3)
                                {{ $mode = "hard" }}
                            @elseif ($value->mode == 4)
                                {{ $mode = "legend" }} --}}
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>

</html>
