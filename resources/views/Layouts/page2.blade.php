<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name') }}</title>
    <link rel="shortcut icon" href="{{ asset('assets/images/FIT.jpg') }}" type="image/jpg">
    <link rel="stylesheet" href="{{ asset('assets/bootstrap/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset('assets/fontawesome/fontawesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/styles/styles.css') }}">

</head>

<body>

    <div class="col p-3 text-end">
        <a href="{{ route('app.home') }}"><i class="bi bi-house"></i></a>
        <span class="opacity-50"><i class="bi bi-three-dots-vertical"></i></span>
        <span calss="mx-2"><i class="bi bi-person"></i>  {{session('nome')}}  </span>
        <a href="{{ route('app.exit') }}"><i class="bi bi-box-arrow-right me-2"></i></a>
    </div>

    <div class="container">
        <div class="row">
            <div class="col">

                @yield('styles')
                @yield('content')

            </div>
        </div>
    </div>

</body>

</html>
