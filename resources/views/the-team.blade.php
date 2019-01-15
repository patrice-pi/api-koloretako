<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

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

    <h1 class="text-center text-uppercase my-5">L'équipe</h1>

    <div class="" id="team">
        <div class="container">
            <div class="d-flex flex-row flex-wrap align-items-center justify-content-center">
                <div class="col-12 col-md-6 col-lg-4 mb-4 order-2 order-lg-1">
                    <img src="/images/user-red.png" class="img-fluid mx-auto d-block" width="230px" alt="" />
                    <h3>Quentin</h3>
                    <h4>Développeur</h4>
                </div>
                <div class="col-12 col-md-6 col-lg-4 mb-4 order-1 order-lg-2">
                    <img src="/images/user-black.png" class="img-fluid mx-auto d-block" width="230px" alt="" />
                    <h3>Patrice</h3>
                    <h4>Directeur Technique</h4>
                </div>
                <div class="col-12 col-md-6 col-lg-4 mb-4 order-3">
                    <img src="/images/user-blue.png" class="img-fluid mx-auto d-block" width="230px" alt="" />
                    <h3>Mohamed</h3>
                    <h4>Développeur</h4>
                </div>
                <div class="col-12 col-md-6 col-lg-4 mb-4 order-4">
                    <img src="/images/user-yellow.png" class="img-fluid mx-auto d-block" width="230px" alt="" />
                    <h3>Simon</h3>
                    <h4>Développeur</h4>
                </div>
                <div class="col-12 col-md-6 col-lg-4 mb-4 order-5">
                    <img src="/images/user-green.png" class="img-fluid mx-auto d-block" width="230px" alt="" />
                    <h3>Pierre-Edouard</h3>
                    <h4>Développeur</h4>
                </div>
            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>

</html>
