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
    <ul class="nav justify-content-end">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="{{route('app.home')}}">Home</a>
        </li>
        <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{route('app.exit')}}">Log Out</a>
          </li>
      </ul>

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
