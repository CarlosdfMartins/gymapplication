<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name') }}</title>

    <p>Olá,<strong>{{ $name }}</strong></p>

    <p>clique no link abaixo para defenir a sua password.</p>
    <p><a href="{{ route('app.resetpass', ['token' => $token]) }}">Defina aqui a sua password</a></p>


    <p>Obrigado, <br>
        {{ config('app.name') }}</p>

    </body>

</html>
