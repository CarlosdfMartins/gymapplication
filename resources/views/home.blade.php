@extends('layouts.page2')

@section('content')

    @php
        $profile = decrypt($profile);
    @endphp

    <div class="container-fluid mt-5 mb-5">
        <div class="row justify-content-center pb-5">
            <div class="col-lg-8 col-md-10">
                <div class="card p-4">

                    @if ($profile === 'Administrador')
                        <div class="row">
                            <h3>Administrador {{ session('nome') }} </h3>
                        </div>
                    @endif

                    @if ($profile === 'Nutricionista')
                        <div class="row">
                            <h3>Nutricionista {{ session('nome') }} </h3>
                        </div>
                    @endif

                    @if ($profile === 'Personal Trainer')
                        <div class="row">
                            <h3>Personal Trainer {{ session('nome') }} </h3>
                        </div>
                    @endif

                    <hr>

                    <div class="card p-4 mx-auto mt-4 mb-3" style="width: 18rem;">
                        <img src="..." class="card-img-top" alt="...">

                        <ul class="list-group list-group-flush">
                            @if ($profile === 'Nutricionista')
                                <li class="list-group-item">
                                    <div class="text-center my-3 form-group">
                                        <a href="{{ route('app.nutrition') }}" class="btn btn-light">NUTRIÇÃO</a>
                                    </div>
                                </li>
                            @endif
                            @if ($profile === 'Personal Trainer')
                                <li class="list-group-item">
                                    <div class="text-center my-3 form-group">
                                        <a href="{{ route('app.training') }}" class="btn btn-light">TREINO</a>
                                    </div>
                                </li>
                            @endif
                            @if ($profile === 'Administrador')
                                <li class="list-group-item">
                                    <div class="text-center form-group">
                                        <a href="{{ route('app.pesquiCola') }}" class="btn btn-light">PESQUISAR
                                            COLABORADOR</a>
                                        <hr>
                                        <a href="{{ route('app.formSearch') }}" class="btn btn-light">PESQUISAR
                                            CLIENTES</a>
                                        <hr>
                                        <a href="{{ route('app.form') }}" class="btn btn-light">INSERIR NOVOS
                                           UTILIZADORES</a>
                                    </div>
                                </li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
