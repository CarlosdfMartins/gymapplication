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
                        <h4 class="text-center align-baseline"><strong>Seleciona o teu plano treino

                            </strong></h4>
                    </div>
                    <hr>


                    <form method="post" action="{{ route('app.dadosPlanTrain', ['id' => $socioID]) }}">
                        @csrf
                        <div class="text-center">
                            <select name="exercicio" id="exercicio" class="form-control">
                                @php
                                    $uniquePlans = [];
                                @endphp

                                @foreach ($exercicios as $plano)
                                    @if (!in_array($plano->train_plan_id, $uniquePlans))
                                        <option class="text-center" value="{{ $plano->train_plan_id }}">{{ $plano->nome }}
                                        </option>
                                        @php
                                            $uniquePlans[] = $plano->train_plan_id;
                                        @endphp
                                    @endif
                                @endforeach
                            </select>

                        </div>
                        <button class="btn btn-outline-dark d-block w-50 mx-auto mt-4" type="submit">Selecionar</button>
                    </form>

                </div>
            </div>
        </div>
        <div style="text-align: right; margin-top: 10px;">
            <a onclick="retrocederPagina()" class="link-body-emphasis" style="cursor: pointer; text-decoration: none;">
                <i class="bi bi-reply-all-fill"></i> Voltar</a>
        </div>
    </div>
@endsection
