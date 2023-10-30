@extends('layouts.page2')

@section('content')
    <style>
        .mar_top {
            margin-top: 80px;
        }

        .mar-left {
            margin-left: 50px;
        }
    </style>


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


                        <div class="mar_top col-md-6">

                            <div class="mb-5">
                                <div class="dropdown mar-left">
                                    <button class="btn btn-outline-success ms-3 dropdown-toggle w-75" type="button"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="bi bi-person-arms-up"></i><i class="bi bi-activity"></i> TREINO
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li class="text-center">
                                            @if ($profile === 'Administrador' || $profile === 'Nutricionista' || $profile === 'Personal Trainer')
                                                <div><a href="{{ route('app.selectPlantrainer', ['id' => encrypt($nomeSocios->id)]) }}"
                                                        class=" btn btn-light">Ver
                                                        Plano Treino
                                                    </a></div>
                                            @endif
                                        </li>
                                        <li class="text-center">
                                            @if ($profile === 'Personal Trainer')
                                                <div><a href="{{ route('app.planTrain', ['id' => encrypt($nomeSocios->id)]) }}"
                                                        class="btn btn-light">Inserir
                                                        Plano Treino
                                                    </a></div>
                                            @endif
                                        </li>
                                    </ul>
                                </div>
                            </div>

                            <div class="mb-5">
                                <div class="dropdown mar-left">
                                    <button class="btn btn-outline-success ms-3 dropdown-toggle w-75" type="button"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="bi bi-graph-up-arrow"></i> EVOLUÇÃO
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li class="text-center">
                                            @if ($profile === 'Nutricionista')
                                                <div><a href="{{ route('app.formNutrie', ['id' => encrypt($nomeSocios->id)]) }}"
                                                        class="btn btn-light">Inserir
                                                        dados biométricos</a></div>
                                            @endif
                                        </li>
                                        <li class="text-center">
                                            @if ($profile === 'Administrador' || $profile === 'Nutricionista' || $profile === 'Personal Trainer')
                                                <div><a href="{{ route('app.dadosBIOConsult', ['id' => encrypt($nomeSocios->id)]) }}"
                                                        class="btn btn-light">Ver
                                                        dados biométricos</a></div>
                                            @endif
                                        </li>
                                        <li class="text-center">
                                            @if ($profile === 'Administrador' || $profile === 'Nutricionista' || $profile === 'Personal Trainer')
                                                <div> <a href="{{ route('app.evolnutri', ['id' => encrypt($nomeSocios->id)]) }}"
                                                        class="btn btn-light">
                                                        Evolução</a></div>
                                            @endif
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="mb-3">
                                <div class="dropdown mar-left">
                                    <button class="btn btn-outline-success ms-3 dropdown-toggle w-75" type="button"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="bi bi-basket"></i><i class="bi bi-stars"></i> NUTRIÇÃO
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li class="text-center">
                                            @if ($profile === 'Nutricionista')
                                                <div><a href="{{ route('app.planNutrie', ['id' => encrypt($nomeSocios->id)]) }}"
                                                        class="btn btn-light">Inserir
                                                        Plano Nutricional
                                                    </a></div>
                                            @endif
                                        </li>
                                        <li class="text-center">
                                            @if ($profile === 'Administrador' || $profile === 'Nutricionista' || $profile === 'Personal Trainer')
                                                <div><a href="{{ route('app.selectPlanNutrie', ['id' => encrypt($nomeSocios->id)]) }}"
                                                        class="btn btn-light">Ver
                                                        Plano Nutricional
                                                    </a></div>
                                            @endif
                                        </li>
                                        <li class="text-center">
                                            @if ($profile === 'Nutricionista')
                                                <a href="{{ route('app.editNutricao', ['profile' => encrypt($profile), 'id' =>encrypt($nomeSocios->id)]) }}"
                                                    class="btn btn-light">Editar Plano de Nutrição</a>
                                            @endif
                                        </li>

                                    </ul>
                                </div>

                            </div>
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
