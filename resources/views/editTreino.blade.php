@extends('layouts.page2')


@section('content')
    <script src="{{ asset('assets/bootstrap/bootstrap.bundle.min.js') }}"></script>


    <div class="container-fluid mt-5 mb-5">
        <div class="row justify-content-center pb-5">

            <div class="card p-4">


                <h3>Editar Plano de Treino</h3>

                <hr>
                <div class="container text-center">
                    <div class="row">
                        <div class="col-6">
                            @if ($plansTrain->count() > 0)
                                <form action="{{ route('app.editTreino', ['profile' => $profile, 'id' => $id]) }}"
                                    method="GET">
                                    <div class=" row mb-3">
                                        <div class="col-md-6 col-sm-12">
                                            <label for="planoPT_id">Selecione um Plano Treino:</label>
                                            <div class="d-flex">
                                                <select class="form-select W-50" name="planoPT_id" id="planoPT_id">
                                                    @foreach ($plansTrain as $plano)
                                                        <option value="{{ $plano->id }}">{{ $plano->nome }}</option>
                                                    @endforeach
                                                </select>
                                                <button type="submit" class="btn btn-light">Escolher</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                        </div>
                    </div>
                </div>
            @else
                <p>Nenhum plano nutricional encontrado.</p>
                @endif

                @if ($dados)
                    <form action="{{ route('app.updatePTreino', ['profile' => $profile, 'id' => $id]) }}" method="post">
                        @csrf
                        @method('PUT')


                        <div class="container text-center">
                            <div class="row">
                                <div class="col-6">
                                    <input type="text" name="nome" id="nome" class="form-control p-1 mb-1"
                                        placeholder="Qual o nome do plano de teino" value="{{ $dados->nome }}">
                                    <input type="text" name="tipoTreino" id="" class="form-control p-1"
                                        placeholder="Qual o tipo de treino" value="{{ $dados->tipo_treino }}">
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row row-cols-7 row-cols-lg-7 g-2 g-lg-1">
                            <div class="col-3">
                                <div class="p-1">Exercício</div>
                                <textarea class="form-control" name="exercicio[]" rows="1" value="{{ $dados->exercicio }}">{{ $dados->exercicio }}</textarea>
                            </div>
                            <div class="col">
                                <div class="p-1">Séries</div>
                                <input type="number" name="serie[]" class="form-control text-center"
                                    value="{{ $dados->series }}">
                            </div>
                            <div class="col">
                                <div class="p-1">Reps</div>
                                <input type="number" name="reps[]"
                                    class="form-control text-center" value="{{ $dados->reps }}">
                            </div>
                            <div class="col">
                                <div class="p-1">CAD.</div>
                                <input type="text" name="CAD[]" class="form-control text-center"
                                    value="{{ $dados->CAD }}" novalidate>
                            </div>
                            <div class="col">
                                <div class="p-1">Int.%</div>
                                <input type="number" min="0" max="100" step="0.01" name="Int[]"
                                    class="form-control text-center" placeholder="%" value="{{ $dados->intense }}">
                            </div>
                            <div class="col">
                                <div class="p-1">Pausa seg.</div>
                                <input type="text" name="pausa[]" class="form-control text-center"
                                    value="{{ $dados->pausa }}"novalidate>
                            </div>
                            <div class="col-3">
                                <div class="p-1">OBS</div>
                                <textarea class="form-control" name="OBS[]" rows="1" value="{{ $dados->OBS }}">{{ $dados->OBS }}</textarea>
                            </div>
                        </div>

                        <hr>

                        <div class="row row-cols-7 row-cols-lg-7 g-2 g-lg-1">
                            <div class="col-3">
                                <div class="p-1">Exercício</div>
                                <textarea class="form-control" name="exercicio[]" rows="1" value="{{ $dados->exercicio }}">{{ $dados->exercicio }}</textarea>
                            </div>
                            <div class="col">
                                <div class="p-1">Séries</div>
                                <input type="number" name="serie[]" class="form-control text-center" value="{{ $dados->series }}">
                            </div>
                            <div class="col">
                                <div class="p-1">Reps</div>
                                <input type="number" name="reps[]" class="form-control text-center" value="{{ $dados->reps }}">
                            </div>
                            <div class="col">
                                <div class="p-1">CAD.</div>
                                <input type="text" name="CAD[]" class="form-control text-center" value="{{ $dados->CAD }}" novalidate>
                            </div>
                            <div class="col">
                                <div class="p-1">Int.%</div>
                                <input type="number" min="0" max="100" step="0.01" name="Int[]"
                                    class="form-control text-center" value="{{ $dados->intense }}" placeholder="%">
                            </div>
                            <div class="col">
                                <div class="p-1">Pausa seg.</div>
                                <input type="text" name="pausa[]" class="form-control text-center" value="{{ $dados->pausa }}" novalidate>
                            </div>
                            <div class="col-3">
                                <div class="p-1">OBS</div>
                                <textarea class="form-control" name="OBS[]" rows="1" value="{{ $dados->OBS }}">{{ $dados->OBS }}</textarea>
                            </div>
                        </div>
                        <hr>

                        <div class="row row-cols-7 row-cols-lg-7 g-2 g-lg-1">
                            <div class="col-3">
                                <div class="p-1">Exercício</div>
                                <textarea class="form-control" name="exercicio[]" rows="1"  value="{{ $dados->exercicio }}">{{ $dados->exercicio }}</textarea>
                            </div>
                            <div class="col">
                                <div class="p-1">Séries</div>
                                <input type="number" name="serie[]" class="form-control text-center" value="{{ $dados->series }}">
                            </div>
                            <div class="col">
                                <div class="p-1">Reps</div>
                                <input type="number" name="reps[]" class="form-control text-center" value="{{ $dados->reps }}">
                            </div>
                            <div class="col">
                                <div class="p-1">CAD.</div>
                                <input type="text" name="CAD[]" class="form-control text-center" value="{{ $dados->CAD }}" novalidate>
                            </div>
                            <div class="col">
                                <div class="p-1">Int.%</div>
                                <input type="number" min="0" max="100" step="0.01" name="Int[]"
                                    class="form-control text-center" value="{{ $dados->intense }}" placeholder="%">
                            </div>
                            <div class="col">
                                <div class="p-1">Pausa seg.</div>
                                <input type="text" name="pausa[]" class="form-control text-center"  value="{{ $dados->pausa }}" novalidate>
                            </div>
                            <div class="col-3">
                                <div class="p-1">OBS</div>
                                <textarea class="form-control" name="OBS[]" rows="1" value="{{ $dados->OBS }}">{{ $dados->OBS }}</textarea>
                            </div>
                        </div>

                        <hr>

                        <div class="row row-cols-7 row-cols-lg-7 g-2 g-lg-1">
                            <div class="col-3">
                                <div class="p-1">Exercício</div>
                                <textarea class="form-control" name="exercicio[]" rows="1"  value="{{ $dados->exercicio }}">{{ $dados->exercicio }}</textarea>
                            </div>
                            <div class="col">
                                <div class="p-1">Séries</div>
                                <input type="number" name="serie[]" class="form-control text-center" value="{{ $dados->series }}">
                            </div>
                            <div class="col">
                                <div class="p-1">Reps</div>
                                <input type="number" name="reps[]" class="form-control text-center" value="{{ $dados->reps }}">
                            </div>
                            <div class="col">
                                <div class="p-1">CAD.</div>
                                <input type="text" name="CAD[]" class="form-control text-center" value="{{ $dados->CAD }}" novalidate>
                            </div>
                            <div class="col">
                                <div class="p-1">Int.%</div>
                                <input type="number" min="0" max="100" step="0.01" name="Int[]"
                                    class="form-control text-center" value="{{ $dados->intense }}" placeholder="%">
                            </div>
                            <div class="col">
                                <div class="p-1">Pausa seg.</div>
                                <input type="text" name="pausa[]" class="form-control text-center"  value="{{ $dados->pausa }}" novalidate>
                            </div>
                            <div class="col-3">
                                <div class="p-1">OBS</div>
                                <textarea class="form-control" name="OBS[]" rows="1" value="{{ $dados->OBS }}">{{ $dados->OBS }}</textarea>
                            </div>
                        </div>
                        <hr>

                        <div class="row row-cols-7 row-cols-lg-7 g-2 g-lg-1">
                            <div class="col-3">
                                <div class="p-1">Exercício</div>
                                <textarea class="form-control" name="exercicio[]" rows="1"  value="{{ $dados->exercicio }}">{{ $dados->exercicio }}</textarea>
                            </div>
                            <div class="col">
                                <div class="p-1">Séries</div>
                                <input type="number" name="serie[]" class="form-control text-center" value="{{ $dados->series }}">
                            </div>
                            <div class="col">
                                <div class="p-1">Reps</div>
                                <input type="number" name="reps[]" class="form-control text-center" value="{{ $dados->reps }}">
                            </div>
                            <div class="col">
                                <div class="p-1">CAD.</div>
                                <input type="text" name="CAD[]" class="form-control text-center" value="{{ $dados->CAD }}" novalidate>
                            </div>
                            <div class="col">
                                <div class="p-1">Int.%</div>
                                <input type="number" min="0" max="100" step="0.01" name="Int[]"
                                    class="form-control text-center" value="{{ $dados->intense }}" placeholder="%">
                            </div>
                            <div class="col">
                                <div class="p-1">Pausa seg.</div>
                                <input type="text" name="pausa[]" class="form-control text-center"  value="{{ $dados->pausa }}" novalidate>
                            </div>
                            <div class="col-3">
                                <div class="p-1">OBS</div>
                                <textarea class="form-control" name="OBS[]" rows="1" value="{{ $dados->OBS }}">{{ $dados->OBS }}</textarea>
                            </div>
                        </div>
                        <hr>

                        <div class="mb-2 my-4">
                            <a href="{{ route('app.formConsult') }}" class="btn btn-light ">Sair</a>
                            <button type="submit" class="btn btn-light ">Gravar alteração no plano</button>
                        </div>
                    </form>
                @endif
                <div style="text-align: right; margin-top: 10px;">
                    <a onclick="retrocederPagina()" class="link-body-emphasis" style="cursor: pointer; text-decoration: none;">
                        <i class="bi bi-reply-all-fill"></i> Voltar</a>
                </div>
            </div>
        </div>
    </div>


@endsection
