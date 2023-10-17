@extends('PersonalTrain.layoutPT')


@section('content')
    <h4 class="mb-3">Plano Treino:</h4>

    <div class="container">
        <div class="row-3">
            <div class="col">
                <form action="{{ route('app.storePlanTrain', ['id' => $id, 'plan_ID' => $plan_ID]) }}" method="post">

                    @csrf

                    <div class="container text-center">
                        <div class="row">
                            <div class="col-6">
                                <input type="text" name="nome" id="nome" class="form-control p-1 mb-1"
                                    placeholder="Qual o nome do plano de teino">
                                <input type="text" name="tipoTreino" id="" class="form-control p-1"
                                    placeholder="Qual o tipo de treino">
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row row-cols-7 row-cols-lg-7 g-2 g-lg-1">
                        <div class="col-3">
                            <div class="p-1">Exercício</div>
                            <textarea class="form-control" name="exercicio[]" rows="1"></textarea>
                        </div>
                        <div class="col">
                            <div class="p-1">Séries</div>
                            <input type="number" name="serie[]" class="form-control text-center">
                        </div>
                        <div class="col">
                            <div class="p-1">Reps</div>
                            <input type="number" name="reps[]" class="form-control text-center">
                        </div>
                        <div class="col">
                            <div class="p-1">CAD.</div>
                            <input type="text" name="CAD[]" class="form-control text-center" novalidate>
                        </div>
                        <div class="col">
                            <div class="p-1">Int.%</div>
                            <input type="number" min="0" max="100" step="0.01" name="Int[]"
                                class="form-control text-center" placeholder="%">
                        </div>
                        <div class="col">
                            <div class="p-1">Pausa seg.</div>
                            <input type="text" name="pausa[]" class="form-control text-center" novalidate>
                        </div>
                        <div class="col-3">
                            <div class="p-1">OBS</div>
                            <textarea class="form-control" name="OBS[]" rows="1"></textarea>
                        </div>
                    </div>

                    <hr>

                    <div class="row row-cols-7 row-cols-lg-7 g-2 g-lg-1">
                        <div class="col-3">
                            <div class="p-1">Exercício</div>
                            <textarea class="form-control" name="exercicio[]" rows="1"></textarea>
                        </div>
                        <div class="col">
                            <div class="p-1">Séries</div>
                            <input type="number" name="serie[]" class="form-control text-center">
                        </div>
                        <div class="col">
                            <div class="p-1">Reps</div>
                            <input type="number" name="reps[]" class="form-control text-center">
                        </div>
                        <div class="col">
                            <div class="p-1">CAD.</div>
                            <input type="text" name="CAD[]" class="form-control text-center" novalidate>
                        </div>
                        <div class="col">
                            <div class="p-1">Int.%</div>
                            <input type="number" min="0" max="100" step="0.01" name="Int[]"
                                class="form-control text-center" placeholder="%">
                        </div>
                        <div class="col">
                            <div class="p-1">Pausa seg.</div>
                            <input type="text" name="pausa[]" class="form-control text-center" novalidate>
                        </div>
                        <div class="col-3">
                            <div class="p-1">OBS</div>
                            <textarea class="form-control" name="OBS[]" rows="1"></textarea>
                        </div>
                    </div>
                    <hr>

                    <div class="row row-cols-7 row-cols-lg-7 g-2 g-lg-1">
                        <div class="col-3">
                            <div class="p-1">Exercício</div>
                            <textarea class="form-control" name="exercicio[]" rows="1"></textarea>
                        </div>
                        <div class="col">
                            <div class="p-1">Séries</div>
                            <input type="number" name="serie[]" class="form-control text-center">
                        </div>
                        <div class="col">
                            <div class="p-1">Reps</div>
                            <input type="number" name="reps[]" class="form-control text-center">
                        </div>
                        <div class="col">
                            <div class="p-1">CAD.</div>
                            <input type="text" name="CAD[]" class="form-control text-center" novalidate>
                        </div>
                        <div class="col">
                            <div class="p-1">Int.%</div>
                            <input type="number" min="0" max="100" step="0.01" name="Int[]"
                                class="form-control text-center" placeholder="%">
                        </div>
                        <div class="col">
                            <div class="p-1">Pausa seg.</div>
                            <input type="text" name="pausa[]" class="form-control text-center" novalidate>
                        </div>
                        <div class="col-3">
                            <div class="p-1">OBS</div>
                            <textarea class="form-control" name="OBS[]" rows="1"></textarea>
                        </div>
                    </div>

                    <hr>

                    <div class="row row-cols-7 row-cols-lg-7 g-2 g-lg-1">
                        <div class="col-3">
                            <div class="p-1">Exercício</div>
                            <textarea class="form-control" name="exercicio[]" rows="1"></textarea>
                        </div>
                        <div class="col">
                            <div class="p-1">Séries</div>
                            <input type="number" name="serie[]" class="form-control text-center">
                        </div>
                        <div class="col">
                            <div class="p-1">Reps</div>
                            <input type="number" name="reps[]" class="form-control text-center">
                        </div>
                        <div class="col">
                            <div class="p-1">CAD.</div>
                            <input type="text" name="CAD[]" class="form-control text-center" novalidate>
                        </div>
                        <div class="col">
                            <div class="p-1">Int.%</div>
                            <input type="number" min="0" max="100" step="0.01" name="Int[]"
                                class="form-control text-center" placeholder="%">
                        </div>
                        <div class="col">
                            <div class="p-1">Pausa seg.</div>
                            <input type="text" name="pausa[]" class="form-control text-center" novalidate>
                        </div>
                        <div class="col-3">
                            <div class="p-1">OBS</div>
                            <textarea class="form-control" name="OBS[]" rows="1"></textarea>
                        </div>
                    </div>
                    <hr>

                    <div class="row row-cols-7 row-cols-lg-7 g-2 g-lg-1">
                        <div class="col-3">
                            <div class="p-1">Exercício</div>
                            <textarea class="form-control" name="exercicio[]" rows="1"></textarea>
                        </div>
                        <div class="col">
                            <div class="p-1">Séries</div>
                            <input type="number" name="serie[]" class="form-control text-center">
                        </div>
                        <div class="col">
                            <div class="p-1">Reps</div>
                            <input type="number" name="reps[]" class="form-control text-center">
                        </div>
                        <div class="col">
                            <div class="p-1">CAD.</div>
                            <input type="text" name="CAD[]" class="form-control text-center" novalidate>
                        </div>
                        <div class="col">
                            <div class="p-1">Int.%</div>
                            <input type="number" min="0" max="100" step="0.01" name="Int[]"
                                class="form-control text-center" placeholder="%">
                        </div>
                        <div class="col">
                            <div class="p-1">Pausa seg.</div>
                            <input type="text" name="pausa[]" class="form-control text-center" novalidate>
                        </div>
                        <div class="col-3">
                            <div class="p-1">OBS</div>
                            <textarea class="form-control" name="OBS[]" rows="1"></textarea>
                        </div>
                    </div>
                    <hr>

                    <div class="mb-2 my-4">
                        <a href="{{ route('app.formConsult') }}" class="btn btn-light ">Sair</a>
                        <button type="submit" class="btn btn-light ">Grava mais um treino</button>

                    </div>

                </form>
            </div>
        </div>
    </div>


    <div style="text-align: right; margin-top: 10px;">
        <a onclick="retrocederPagina()" class="link-body-emphasis" style="cursor: pointer; text-decoration: none;">
            <i class="bi bi-reply-all-fill"></i> Voltar</a>
    </div>
@endsection
