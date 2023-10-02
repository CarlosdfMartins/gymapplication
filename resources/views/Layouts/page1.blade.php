<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name') }}</title>
    <link rel="shortcut icon" href="{{ asset('assets/images/FIT.jpg') }}" type="image/jpg">
    <link rel="stylesheet" href="{{ asset('assets/bootstrap/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/fontawesome/fontawesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/styles/styles.css') }}">

</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col">
                <h1 class=" titulo text-center my-5">{{ config('app.name') }}</h1>

                @yield('styles')
                @yield('content')


            </div>
        </div>
    </div>



    <div class="center-page">
        <div class="footername text-center my-5">
            <small>Created by Carlos Martins &copy; {{ date('Y') }}</small>
        </div>
    </div>

</body>

</html>
