@extends('layouts.page1')

@section('styles')
    <style>
        body {
            background-image: url('assets/images/GYM.jpg');
            background-size: cover;
            background-repeat: no-repeat;
        }
    </style>

    <h1 class="messageOne text-center my-5">Seja bem-vindo á sua aplicação desportiva</h1>

    <div class="text-center my-3 form-group">
        <button type="button" class="btn btn-danger">
            <a href="{{ route('login') }}" class="messageTwo text-center my-5">Clique aqui para iniciar</a>
        </button>
    </div>
@endsection
