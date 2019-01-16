<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body id="admin">
    <div class="container-fluid">
        <div class="row">
            @include('admin.layout.aside')

            <div class="col-12 col-lg-9 ml-lg-auto pt-3 px-4">
                <div class="container-fluid">

                    @include('includes.flash_messages')
                    @include('includes.error_form')

                    @yield('content')
                </div>
            </div>
        </div>
    </div>


        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
