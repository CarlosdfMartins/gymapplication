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

<body class="layout-4">
    <div class="col p-3 text-end">
        @if (strtolower(session('profile')) == 'socio')
            <a href="{{ route('app.homeSocio', ['id' => encrypt($socioID)]) }}" class="link-body-emphasis"
                style="text-decoration: none;">
                <i class="bi bi-house-fill"></i>
            </a>
        @else
            <a href="{{ route('app.home') }}" class="link-body-emphasis" style="text-decoration: none;">
                <i class="bi bi-house-fill"></i>
            </a>
        @endif
        <span class="opacity-50"><i class="bi bi-three-dots-vertical"></i></span>
        <span class="mx-2 link-dark"><i class="bi bi-person link-success "></i> {{ session('nome') }} </span>
        <a href="{{ route('app.exit') }}" class="link-danger"><i class="bi bi-box-arrow-right me-2"></i></a>
    </div>

    <div class="container-fluid mt-5 mb-5">
        <div class="row justify-content-center pb-7">
            <div class="col-lg-10 col-md-6">
                <div class="card p-5">


                    @yield('styles')
                    @yield('content')




                </div>
            </div>
        </div>
        <script>
            function retrocederPagina() {
                window.history.back();
            }
        </script>
        <script src="{{ asset('assets/bootstrap/bootstrap.bundle.min.js') }}"></script>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</body>

</html>
