@extends('layouts.page2')

@section('content')
    <div class="container-fluid mt-5 mb-5">
        <div class="row justify-content-center pb-5">
            <div class="col-lg-8 col-md-10">
                <div class="card p-4">

                    <div class="row">
                        <div class="col-md-6">
                            <h4>Dados do Cliente </h4>
                            <hr>
                            <p><strong>Nrº sócio: </strong>{{ $nomeSocios->id }}</p>
                            <p><strong>Nome: </strong>{{ $nomeSocios->nome }} {{ $nomeSocios->apelido }}
                            </p>
                            <p><strong>Data nascimento:</strong> {{ $nomeSocios->data_nascimento }} </p>
                            <p><strong>Telefone:</strong> {{ $nomeSocios->telefone }}</p>
                            <p><strong>E-mail:</strong> {{ $nomeSocios->email }}</p>
                            <p><strong>Personal Trainer:</strong> {{ optional($nomeSocios->pTrain)->nome }}
                                {{ optional($nomeSocios->pTrain)->apelido }}</p>
                            <p><strong>Nutricionista:</strong> {{ optional($nomeSocios->nutri)->nome }}
                                {{ optional($nomeSocios->nutri)->apelido }}</p>
                        </div>
                        <hr>




                        <div class=" my-3 form-group">
                            <a class="btn btn-primary btn-sm" href="{{ route('app.training') }}" role="button">Treino</a>
                            <a class="btn btn-primary btn-sm" href="{{ route('app.evolution') }}"
                                role="button">Evolução</a>
                        </div>
                        <div><a href="{{ route('app.formNutrie', ['id' => $nomeSocios->id]) }}" role="button">Inserir
                                dados biométricos</a></div>

                        <div><a href="{{ route('app.dadosBIOConsult', ['id' => $nomeSocios->id]) }}" role="button">Ver
                                dados biométricos</a></div>

                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
