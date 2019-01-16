@extends('layouts.app')

@section('content')
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
@endsection
