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
                        <h4 class="text-center align-baseline"><strong>Seleciona o teu plano nutricional
                                {{ $cliente[0]->nome }}
                                {{ $cliente[0]->apelido }}
                            </strong></h4>
                    </div>
                    <hr>


                    <form method="post" action="{{ route('app.dadosPlanNutrie', ['id' => $socioID]) }}">
                        @csrf
                        <label for="plano">Seleciona o Plano:</label>
                        <select name="plano" id="plano">
                            @for ($i = 0; $i < count($nutriPlanos); $i++)
                                <option value="{{ $nutriPlanos[$i]->id }}">{{ $nutriPlanos[$i]->created_at }}</option>
                            @endfor
                        </select>
                        <button type="submit">Selecionar</button>
                    </form>
                </div>
            </div>
        </div>
        <div style="text-align: right; margin-top: 15px;">
            <a href="{{ route('app.nutriSearch', ['id' => $socioID]) }}" class="link-body-emphasis"
                style="text-decoration: none;">
                <i class="bi bi-reply-all-fill"></i>Voltar</a>
        </div>
    </div>

@endsection
