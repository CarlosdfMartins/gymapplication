@extends('layouts.page2')


@section('content')
    <script src="{{ asset('assets/bootstrap/bootstrap.bundle.min.js') }}"></script>


    <div class="container-fluid mt-5 mb-5">
        <div class="row justify-content-center pb-5">
            <div class="col-lg-8 col-md-10">
                <div class="card p-4">


                    <h3>Editar o Socio</h3>

                    <hr>
                    
                    <form action="{{ route('app.update', ['profile' => $profile, 'id' => $dados->id]) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="row mb-3">
                            <div class="col-md-6 col-sm-12">
                                <label for="nome" class="form-label">Nome:</label>
                                <input type="text" id="nome" name="nome" class="form-control"
                                    value="{{ $dados->nome }}">
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <label for="apelido" class="form-label">Apelido:</label>
                                <input type="text" id="apelido" name="apelido" class="form-control"
                                    value="{{ $dados->apelido }}">
                            </div>
                        </div>
                        <div class=" row mb-3">
                            <div class="col-md-6 col-sm-12">
                                <label for="email" class="form-label">Email:</label>
                                <input type="email" id="email" name="email" class="form-control"
                                    value="{{ $dados->email }}">
                            </div>

                            <div class="col-md-6 col-sm-12">
                                <label for="telefone" class="form-label">Telefone:</label>
                                <input type="text" id="telefone" name="telefone" class="form-control"
                                    value="{{ $dados->telefone }}">
                            </div>
                        </div>
                        <div class=" row mb-3">
                            <div class="col-md-6 col-sm-12">
                                <label for="sexo" class="form-label">Sexo:</label>
                                <select id="sexo" name="sexo" class="form-select">
                                    <option value="H" {{ $dados->sexo === 'masculino' ? 'selected' : '' }}>
                                        Masculino
                                    </option>
                                    <option value="M" {{ $dados->sexo === 'feminino' ? 'selected' : '' }}>
                                        Feminino
                                    </option>
                                </select>
                            </div>

                            <div class="col-md-6 col-sm-12">
                                <label for="data_nascimento" class="form-label">Data de Nascimento:</label>
                                <input type="date" id="data_nascimento" name="data_nascimento" class="form-control"
                                    value="{{ $dados->data_nascimento }}">
                            </div>
                        </div>
                        <div class="mb-3 my-4">
                            <button type="submit" class="btn btn-light">Atualizar Perfil</button>
                        </div>
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
