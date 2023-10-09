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
        <a href="{{ route('app.home') }}" class="link-body-emphasis" style="text-decoration: none;"><i
                class="bi bi-house-fill"></i></a>
        <span class="opacity-50"><i class="bi bi-three-dots-vertical"></i></span>
        <span class="mx-2 link-dark"><i class="bi bi-person link-success "></i> {{ session('nome') }} </span>
        <a href="{{ route('app.exit') }}" class="link-danger"><i class="bi bi-box-arrow-right me-2"></i></a>
    </div>

    <div class="container-fluid mt-5 mb-5">
        <div class="row justify-content-center pb-5">
            <div class="col-lg-8 col-md-10">
                <div class="card p-4">

                    <div class="row">
                        <h3>{{ $cliente[0]->nome }} {{ $cliente[0]->apelido }}</h3>
                        <hr>

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
