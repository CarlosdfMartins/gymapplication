@extends('Nutricao.layoutNutri')

@section('content')
    <style>
        .dados-planos {
            display: flex;
            margin-left: 2px;
            margin-bottom: 5px;
            margin-top: 15px;
        }

        .planosN {
            display: flex;
            margin-left: 20px;
            margin-bottom: 10px;

        }
    </style>

    <div class="container-fluid mt-10 mb-8">
        <div class="row justify-content-center pb-4">
            <div class="col-lg-16 col-md-50">

                <div class="row">

                    <div>
                        <h4 class="text-center align-baseline"><strong>Plano Nutricional de {{ $cliente[0]->nome }}
                                {{ $cliente[0]->apelido }}
                            </strong></h4>
                    </div>
                    <hr>


                    @foreach ($nutriPlanos as $plano)
                        <div class="dados-planos">
                            <div>
                                <p><strong>Hora:</strong>
                                    {{ \Illuminate\Support\Carbon::parse($plano->hora_PA)->format('G:i') }}</p>
                            </div>
                            <div>
                                <p class="planosN"><strong>Pequeno-Almoço:</strong></p>
                                <p>{{ $plano->pequeno_almoco }}</p>
                            </div>
                        </div>
                        <hr>
                        <div class="dados-planos">
                            <div>
                                <p><strong>Hora:</strong>
                                    {{ \Illuminate\Support\Carbon::parse($plano->hora_1LM)->format('G:i') }}</p>
                            </div>
                            <div>
                                <p class="planosN"><strong>1º Lanche Matinal:</strong></p>
                                <p>{{ $plano->laMati1 }}</p>
                            </div>
                        </div>
                        <hr>
                        <div class="dados-planos">
                            <div>
                                <p><strong>Hora:</strong>
                                    {{ \Illuminate\Support\Carbon::parse($plano->hora_2LM)->format('G:i') }}</p>
                            </div>
                            <div>
                                <p class="planosN"><strong>2º Lanche Matinal:</strong></p>
                                <p>{{ $plano->laMati2 }}</p>
                            </div>
                        </div>
                        <hr>
                        <div class="dados-planos">
                            <div>
                                <p><strong>Hora:</strong>
                                    {{ \Illuminate\Support\Carbon::parse($plano->hora_A)->format('G:i') }}</p>
                            </div>
                            <div>
                                <p class="planosN"><strong>Almoço:</strong></p>
                                <p>{{ $plano->almoco }}</p>
                            </div>
                        </div>
                        <hr>
                        <div class="dados-planos">
                            <div>
                                <p><strong>Hora:</strong>
                                    {{ \Illuminate\Support\Carbon::parse($plano->hora_L1)->format('G:i') }}</p>
                            </div>
                            <div>
                                <p class="planosN"><strong>1º Lanche:</strong></p>
                                <p>{{ $plano->lanche1 }}</p>
                            </div>
                        </div>
                        <hr>
                        <div class="dados-planos">
                            <div>
                                <p><strong>Hora:</strong>
                                    {{ \Illuminate\Support\Carbon::parse($plano->hora_L2)->format('G:i') }}</p>
                            </div>
                            <div>
                                <p class="planosN"><strong>2º Lanche:</strong></p>
                                <p>{{ $plano->lanche2 }}</p>
                            </div>
                        </div>
                        <hr>
                        <div class="dados-planos">
                            <div>
                                <p><strong>Hora:</strong>
                                    {{ \Illuminate\Support\Carbon::parse($plano->hora_L3)->format('G:i') }}
                                </p>
                            </div>
                            <div>
                                <p class="planosN"><strong>3º Lanche:</strong></p>
                                <p>{{ $plano->lanche3 }}</p>
                            </div>
                        </div>
                        <hr>
                        <div class="dados-planos">
                            <div>
                                <p><strong>Hora:</strong>
                                    {{ \Illuminate\Support\Carbon::parse($plano->hora_JA)->format('G:i') }}</p>
                            </div>
                            <div>
                                <p class="planosN"><strong>Jantar:</strong></p>
                                <p>{{ $plano->jantar }}</p>
                            </div>
                        </div>
                        <hr>
                        <div class="dados-planos">
                            <div>
                                <p><strong>Hora:</strong>
                                    {{ \Illuminate\Support\Carbon::parse($plano->hora_C)->format('G:i') }}</p>
                            </div>
                            <div>
                                <p class="planosN"><strong>Ceia:</strong></p>
                                <p>{{ $plano->ceia }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div style="text-align: right; margin-top: 10px;">
                <a onclick="retrocederPagina()" class="link-body-emphasis"
                style="cursor: pointer; text-decoration: none;">
                    <i class="bi bi-reply-all-fill"></i> Voltar</a>
            </div>
        </div>
    @endsection
