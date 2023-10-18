@extends('layouts.page2')

@section('content')
    <div class="container-fluid mt-5 mb-5">
        <div class="row justify-content-center pb-5">
            <div class="col-lg-8 col-md-10">
                <div class="card p-4">

                    <h3>Menu Editar</h3>

                    <hr>
                    <div class="text-center my-3 form-group">
                      
                        <a href="{{ route('app.editNutricao',['profile' => $profile, 'id' => $id ]) }}" class="btn btn-light">Editar Plano de Nutrição</a>
                        <a href="{{ route('app.edit',['profile' => $profile, 'id' => $id ]) }}" class="btn btn-light">Editar Ficha de Socio</a>
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
