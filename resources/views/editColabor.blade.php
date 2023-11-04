@extends('layouts.page2')


@section('content')
    <script src="{{ asset('assets/bootstrap/bootstrap.bundle.min.js') }}"></script>

    {{-- edit employee data --}}

    <div class="container-fluid mt-5 mb-5">
        <div class="row justify-content-center pb-5">
            <div class="col-lg-8 col-md-10">
                <div class="card p-4">


                    <h3>Editar o Colaborador</h3>

                    <hr>

                    <form action="{{ route('app.update', ['profile' => encrypt($profile), 'id' => encrypt($dados->id)]) }}"
                        method="post">
                        @csrf
                        @method('PUT')

                        <div class="row mb-3">
                            <div class="col-md-6 col-sm-12">
                                <label class="form-label" for="nome">Nome:</label>
                                <input class="form-control" type="text" id="nome" name="nome"
                                    value="{{ $dados->nome }}">
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <label class="form-label" for="apelido">Apelido:</label>
                                <input class="form-control" type="text" id="apelido" name="apelido"
                                    value="{{ $dados->apelido }}">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 col-sm-12">
                                <label class="form-label" for="email">Email:</label>
                                <input class="form-control" type="email" id="email" name="email"
                                    value="{{ $dados->email }}">
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <label class="form-label" for="telefone">Telefone:</label>
                                <input class="form-control" type="text" id="telefone" name="telefone"
                                    value="{{ $dados->telefone }}">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 col-sm-12">
                                <label class="form-label" for="sexo">Sexo:</label>
                                <select class="form-select" id="sexo" name="sexo">
                                    <option value="H" {{ $dados->sexo === 'masculino' ? 'selected' : '' }}>Masculino
                                    </option>
                                    <option value="M" {{ $dados->sexo === 'feminino' ? 'selected' : '' }}>Feminino
                                    </option>
                                </select>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <label class="form-label" for="data_nascimento">Data de Nascimento:</label>
                                <input class="form-control" type="date" id="data_nascimento" name="data_nascimento"
                                    value="{{ $dados->data_nascimento }}">
                            </div>
                        </div>

                        <div class="mb-3 my-4">
                            <button type="submit" class="btn btn-light">Atualizar Perfil</button>
                        </div>
                    </form>
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
