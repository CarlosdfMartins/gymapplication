@extends('layouts.page2')

@section('content')
    <div class="container-fluid mt-5 mb-5">
        <div class="row justify-content-center pb-5">
            <div class="col-lg-8 col-md-10">
                <div class="card p-4">

                    {{-- @if ($profile === 'Nutricionista')
                        <div class="text-center my-3 form-group">
                            <a href="{{ route('app.nutrition') }}" class="btn btn-light">NUTRIÇÃO</a>
                        </div>
                    @endif

                    @if ($profile === 'Personal Trainer')
                        <div class="text-center my-3 form-group">
                            <a href="{{ route('app.training') }}" class="btn btn-light">TREINO</a>
                        </div>
                    @endif

                    @if ($profile === 'Administrador' || $profile === 'Nutricionista' || $profile === 'Personal Trainer')
                        <div class="text-center my-3 form-group">
                            <a href="{{ route('app.pesquiCola') }}" class="btn btn-light">COLABORADORES</a>
                            <a href="{{ route('app.formSearch') }}" class="btn btn-light">SÓCIOS</a>
                            <a href="{{ route('app.form') }}" class="btn btn-light">NOVOS UTILIZADORES</a>
                        </div>
                    @endif --}}


                    <div class="row justify-content-center mt-4">
                    <div class="card" style="width: 20rem;">
                        @if ($profile === 'Administrador')
                        <img src="..." class="card-img-top" alt="escritório">
                        @endif
                        @if ($profile === 'Personal Trainer')
                        <img src="..." class="card-img-top" alt="treino">
                        @endif
                        @if ($profile === 'Nutricionista')
                        <img src="..." class="card-img-top" alt="roda do alimentos">
                        @endif


                        <ul class="list-group list-group-flush text-center">
                            @if ($profile === 'Administrador')
                                <li class="list-group-item"> <a href="{{ route('app.pesquiCola') }}"
                                        class="btn btn-light">COLABORADORES</a></li>
                                <li class="list-group-item"><a href="{{ route('app.formSearch') }}"
                                        class="btn btn-light">SÓCIOS</a></li>
                                <li class="list-group-item"><a href="{{ route('app.form') }}" class="btn btn-light">NOVOS
                                        UTILIZADORES</a></li>
                            @endif
                            @if ($profile === 'Personal Trainer')
                                <li class="list-group-item"><a href="{{ route('app.training') }}"
                                        class="btn btn-light">TREINO</a></li>
                            @endif
                            @if ($profile === 'Nutricionista')
                                <li class="list-group-item">
                                    <a href="{{ route('app.nutrition') }}" class="btn btn-light">NUTRIÇÃO</a>
                                </li>
                            @endif
                        </ul>
                    </div>
                </div>

















                    <div style="text-align: right; margin-top: 10px;">
                        <a onclick="retrocederPagina()" class="link-body-emphasis"
                            style="cursor: pointer; text-decoration: none;">
                            <i class="bi bi-reply-all-fill"></i> Voltar</a>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
