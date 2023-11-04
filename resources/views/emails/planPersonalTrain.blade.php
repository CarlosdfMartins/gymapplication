@extends('layouts.page3Mail')


@section('content')

    {{-- email informing you that the training plan is now available --}}

    <h4>Plano de Nutrição</h4>

    <p>Olá <strong>{{ $socioName }}</strong>,</p>

    <p>O seu plano de treino já está disponivel na sua aplicação.</p>
    <p>Para ter acesso ao seu plano, basta fazer login na GymApp e procurar na área de Treino.</p>
    <p>Qualquer dúvida não hesite em contactar o seu Personal Trainer.</p>

    <p>Obrigado,</p>
    {{ $personal_trainer }}
@endsection
