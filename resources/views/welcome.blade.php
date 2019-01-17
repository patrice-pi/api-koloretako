@extends('layouts.app')

@section('content')

    <h1 class="text-center text-uppercase my-5">Tableau des scores</h1>

    <div id="leaderboard">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-8 mb-4">
                    <h2 class="mode1">Mode Facile</h2>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col" width="100px">Classement</th>
                                    <th scope="col">Pseudo</th>
                                    <th scope="col">Niveau atteint</th>
                                    <th scope="col">Durée</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($leaderboard_easy as $key => $value)
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
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-12 col-lg-8 ml-auto mb-4">
                    <h2 class="mode2">Mode Intermédiaire</h2>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col" width="100px">Classement</th>
                                    <th scope="col">Pseudo</th>
                                    <th scope="col">Niveau atteint</th>
                                    <th scope="col">Durée</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($leaderboard_medium as $key => $value)
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
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-12 col-lg-8 mb-4">
                    <h2 class="mode3">Mode Difficile</h2>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col" width="100px">Classement</th>
                                    <th scope="col">Pseudo</th>
                                    <th scope="col">Niveau atteint</th>
                                    <th scope="col">Durée</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($leaderboard_hard as $key => $value)
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
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-12 col-lg-8 ml-auto mb-4">
                    <h2 class="mode4">Mode Légende</h2>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col" width="100px">Classement</th>
                                    <th scope="col">Pseudo</th>
                                    <th scope="col">Niveau atteint</th>
                                    <th scope="col">Durée</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($leaderboard_legend as $key => $value)
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
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
