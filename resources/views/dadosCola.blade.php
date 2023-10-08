@extends('layouts.page2')

@section('content')
    <div class="container-fluid mt-5 mb-5">
        <div class="row justify-content-center pb-5">
            <div class="col-lg-8 col-md-10">
                <div class="card p-4">

                    <div class="row">
                        <div class="col-md-6">
                            <h4>Dados do Colaborador </h4>
                            <hr>
                            <p><strong>Nrº Colaborador: </strong>{{ $colaboradores->id }}</p>
                            <p><strong>Nome: </strong>{{ $colaboradores->nome }} {{ $colaboradores->apelido }}
                            </p>
                            <p><strong>Data nascimento:</strong> {{ $colaboradores->data_nascimento }} </p>
                            <p><strong>Telefone:</strong> {{ $colaboradores->telefone }}</p>
                            <p><strong>E-mail:</strong> {{ $colaboradores->email }}</p>
                            <p><strong>Perfil:</strong> {{ $colaboradores->profile }}</p>

                        <hr>
                    </div>
                    <div style="text-align: right; margin-top: 10px;">
                        <a href="{{ route('app.consultColabor') }}" class="link-body-emphasis"
                            style="text-decoration: none;">
                            <i class="bi bi-reply-all-fill"></i> Voltar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
