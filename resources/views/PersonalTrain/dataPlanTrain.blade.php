@extends('PersonalTrain.layoutPT')

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
                        <h4><strong>Plano Treino </strong></h4>

                    </div>
                    <hr>

                    <p><strong>Nome:</strong> {{ $exercicios->first()->nome }}</p>
                    <p><strong>Tipo de Treino:</strong> {{ $exercicios->first()->tipo_treino }}</p>

                    <hr>
                    <table>
                        <thead>
                            <tr>
                                <th>Exercício</th>
                                <th>Séries</th>
                                <th>Reps</th>
                                <th>CAD</th>
                                <th>Intense</th>
                                <th>Pausa</th>
                                <th>OBS</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($exercicios as $exercicio)
                                <tr>
                                    <td>{{ $exercicio->exercicio }}</td>
                                    <td>{{ $exercicio->series }}</td>
                                    <td>{{ $exercicio->reps }}</td>
                                    <td>{{ $exercicio->CAD }}</td>
                                    <td>{{ $exercicio->intense }}</td>
                                    <td>{{ $exercicio->pausa }}</td>
                                    <td>{{ $exercicio->OBS }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
            <div style="text-align: right; margin-top: 10px;">
                <a onclick="retrocederPagina()" class="link-body-emphasis" style="cursor: pointer; text-decoration: none;">
                    <i class="bi bi-reply-all-fill"></i> Voltar</a>
            </div>
        </div>
    @endsection
