@extends('layouts.page2')

@section('content')
    <div class="container-fluid mt-5 mb-5">
        <div class="row justify-content-center pb-5">
            <div class="col-lg-8 col-md-10">
                <div class="card p-4">

                    <div class="row">
                        <div class="col-md-6">
                            <h4>Dados do sócio </h4>
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
                            <a class="btn btn-outline-dark ms-3" style="text-decoration: none;"
                                href="{{ route('app.training') }}" role="button"><i class="bi bi-person-arms-up"></i>
                                Treino</a>
                            <a class="btn btn-outline-dark ms-3" style="text-decoration: none;"
                                href="{{ route('app.evolnutri', ['id' => $nomeSocios->id]) }}" role="button"><i
                                    class="bi bi-graph-up-arrow"></i> Evolução</a>
                        </div>
                        <div><a class="btn btn-outline-dark ms-3" style="text-decoration: none;"
                                href="{{ route('app.formNutrie', ['id' => $nomeSocios->id]) }}" role="button">Inserir
                                dados biométricos</a></div>

                        <div><a class="btn btn-outline-dark ms-3" style="text-decoration: none;"
                                href="{{ route('app.dadosBIOConsult', ['id' => $nomeSocios->id]) }}" role="button">Ver
                                dados biométricos</a></div>

                        <div><a class="btn btn-outline-dark ms-3" style="text-decoration: none;"
                                href="{{ route('app.planNutrie', ['id' => $nomeSocios->id]) }}" role="button">Inserir
                                Plano Nutricional
                            </a></div>

                        <div><a class="btn btn-outline-dark ms-3" style="text-decoration: none;"
                                href="{{ route('app.selectPlanNutrie', ['id' => $nomeSocios->id]) }}" role="button">Ver
                                Plano Nutricional
                            </a></div>

                            <div><a class="btn btn-outline-dark ms-3" style="text-decoration: none;"
                                href="{{ route('app.planTrain', ['id' => $nomeSocios->id]) }}" role="button">Inserir
                                Plano Treino
                            </a></div>

                            <div><a class="btn btn-outline-dark ms-3" style="text-decoration: none;"
                                href="{{ route('app.selectPlantrainer', ['id' => $nomeSocios->id]) }}" role="button">Ver
                                Plano Treino
                            </a></div>


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
