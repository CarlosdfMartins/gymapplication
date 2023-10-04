@extends('layouts.page2')


@section('content')
    <script src="{{ asset('assets/bootstrap/bootstrap.bundle.min.js') }}"></script>


    <div class="container-fluid mt-5 mb-5">
        <div class="row justify-content-center pb-5">
            <div class="col-lg-8 col-md-10">
                <div class="card p-4">


                    <h1>Editar o Socio</h1>

                    <form action="{{ route('app.update', ['profile' => $profile, 'id' => $dados->id]) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="row mb-3">
                            <div class="col-md-6 col-sm-12">
                                <label for="nome">Nome:</label>
                                <input type="text" id="nome" name="nome" value="{{ $dados->nome }}">
                            </div>
                            <label for="apelido">Apelido:</label>
                            <input type="text" id="apelido" name="apelido" value="{{ $dados->apelido }}">

                            <label for="email">Email:</label>
                            <input type="email" id="email" name="email" value="{{ $dados->email }}">

                            <label for="telefone">Telefone:</label>
                            <input type="text" id="telefone" name="telefone" value="{{ $dados->telefone }}">

                            <label for="sexo">Sexo:</label>
                            <select id="sexo" name="sexo">
                                <option value="H" {{ $dados->sexo === 'masculino' ? 'selected' : '' }}>Masculino
                                </option>
                                <option value="M" {{ $dados->sexo === 'feminino' ? 'selected' : '' }}>Feminino</option>
                            </select>

                            <label for="data_nascimento">Data de Nascimento:</label>
                            <input type="date" id="data_nascimento" name="data_nascimento"
                                value="{{ $dados->data_nascimento }}">

                               <button type="submit">Atualizar Perfil</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
