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

<body style="min-height: 100vh; margin: 0; display: flex; flex-direction: column; background: linear-gradient(rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.3)), url('{{ asset("assets/images/img_Slide4_1.jpg") }}') center center/cover fixed no-repeat; color: #fff;">

    <div class="container text-center flex-grow-1">
        <h1 class="titulo my-5">{{ config('app.name') }}</h1>

        @yield('styles')
        @yield('content')
    </div>

    <div class="footername text-center">
        <small>Created by Carlos Martins &copy; {{ date('Y') }}</small>
    </div>

</body>

</html>

