@extends('layouts.page2')

@section('content')
    <div class="container-fluid mt-5 mb-5">
        <div class="row justify-content-center pb-5">
            <div class="col-lg-8 col-md-10">
                <div class="card p-4">
                    <div class="text-center my-3 form-group">
                        <a href="{{ route('app.nutrition') }}" class="btn btn-light">NUTRIÇÃO</a>
                    </div>

                    <div class="text-center my-3 form-group">
                        <a href="{{ route('app.training') }}" class="btn btn-light">TREINO</a>
                    </div>

                    <div class="text-center my-3 form-group">
                        <a href="{{ route('app.pesquiCola') }}" class="btn btn-light">PESQUISAR COLABORADOR</a>
                        <a href="{{ route('app.formSearch') }}" class="btn btn-light">PESQUISAR CLIENTES</a>
                        <a href="{{ route('app.form') }}" class="btn btn-light">INSERIR NOVOS CLIENTES</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
