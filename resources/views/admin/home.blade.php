@extends('admin.layout.app')

@section('content')
    <div id="component-admin-home">
        <h1 class="pb-4 pt-3">Tableau de bord</h1>
        <hr>
        <div class="row mt-5">
            <div class="col-12 col-sm-6 col-lg-4 col-xl-3 mb-4">
                <div class="numbers text-center p-4 bg-light d-flex flex-column justify-content-center">
                    <h2 class="mt-0">Nombre de locaux</h2>
                    <p class="lead mb-0">{{$locals}}</p>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-lg-4 col-xl-3 mb-4">
                <div class="numbers text-center p-4 bg-light d-flex flex-column justify-content-center">
                    <h2 class="mt-0">Nombre de locaux loués</h2>
                    <p class="lead mb-0">{{$bookings}}</p>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-lg-4 col-xl-3 mb-4">
                <div class="numbers text-center p-4 bg-light d-flex flex-column justify-content-center">
                    <h2 class="mt-0">Nombre de villes</h2>
                    <p class="lead mb-0">{{$cities}}</p>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-lg-4 col-xl-3 mb-4">
                <div class="numbers text-center p-4 bg-light d-flex flex-column justify-content-center">
                    <h2 class="mt-0">Nombre d'utilisateurs</h2>
                    <p class="lead mb-0">{{$users}}</p>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-lg-4 col-xl-3 mb-4">
                <div class="numbers text-center p-4 bg-light d-flex flex-column justify-content-center">
                    <h2 class="mt-0">Nombre de modules</h2>
                    <p class="lead mb-0">{{$modules}}</p>
                </div>
            </div>
        </div>
    </div>
@endsection
