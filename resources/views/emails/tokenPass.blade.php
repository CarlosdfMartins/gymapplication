@extends('layouts.page3Mail')


@section('content')

{{-- email for when you receive the token and define your password --}}

    <p>Olá, <strong>{{ $name }} {{ $apelido }}</strong></p>

    <p>clique no link abaixo para defenir a sua password.</p>
    <p><a href="{{ route('app.resetpass', ['token' => encrypt($token)]) }}">Defina aqui a sua password</a></p>


    <p>Obrigado, <br>
        {{ config('app.name') }}</p>
@endsection
