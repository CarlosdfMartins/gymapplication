@extends('layouts.page2')


@section('content')
    <script src="{{ asset('assets/bootstrap/bootstrap.bundle.min.js') }}"></script>

    {{-- edit nutrition plan --}}

    <div class="container-fluid mt-5 mb-5">
        <div class="row justify-content-center pb-5">
            <div class="col-lg-8 col-md-10">
                <div class="card p-4">


                    <h3>Editar Plano de Nutrição</h3>

                    <hr>

                    @if ($planosNutricionais->count() > 0)
                        <form action="{{ route('app.editNutricao', ['profile' => $profile, 'id' => $id]) }}" method="GET">
                            <div class=" row mb-3">
                                <div class="col-md-6 col-sm-12">
                                    <label for="plano_id">Selecione um Plano Nutricional:</label>
                                    <div class="d-flex">
                                        <select class="form-select W-50" name="plano_id" id="plano_id">
                                            @foreach ($planosNutricionais as $plano)
                                                <option value="{{ $plano->id }}">{{ $plano->id }}</option>
                                            @endforeach
                                        </select>
                                        <button type="submit" class="btn btn-light">Escolher</button>
                                    </div>
                                </div>


                            </div>
                        </form>
                    @else
                        <p>Nenhum plano nutricional encontrado.</p>
                    @endif

                    @if ($dados)
                        <form action="{{ route('app.updatePNutricao', ['profile' => $profile, 'id' => $dados->id]) }}"
                            method="POST">
                            @csrf
                            @method('PUT')


                            <div class="row mt-2">
                                <div class="col-lg-2 col-md-4">
                                    <label for="time" class="form-label">Hora</label>
                                    <input type="time" class="form-control" name = "planTime1" id="planTime"
                                        value="{{ $dados->hora_PA }}">
                                </div>
                                <div class="col-lg-10 col-md-8">
                                    <label for="exampleFormControlTextarea1" class="form-label">Pequeno-Almoço</label>
                                    <textarea class="form-control" name="pequeno_almoco" rows="4" value="{{ $dados->pequeno_almoco }}">{{ $dados->pequeno_almoco }}</textarea>
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col-lg-2 col-md-4">
                                    <label for="time" class="form-label">Hora</label>
                                    <input type="time" class="form-control" name = "planTime2" id="planTime"
                                        value="{{ $dados->hora_1LM }}">
                                </div>
                                <div class="col-lg-10 col-md-8">
                                    <label for="exampleFormControlTextarea1" class="form-label">Lanche Matinal</label>
                                    <textarea class="form-control" name="lancheMatinal" rows="2" value="{{ $dados->laMati1 }}">{{ $dados->laMati1 }}</textarea>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-lg-2 col-md-4">
                                    <label for="time" class="form-label">Hora</label>
                                    <input type="time" class="form-control" name = "planTime3" id="planTime"
                                        value="{{ $dados->hora_2LM }}">
                                </div>
                                <div class="col-lg-10 col-md-8">
                                    <label for="exampleFormControlTextarea1" class="form-label">2º Lanche
                                        Matinal</label>
                                    <textarea class="form-control" name="lancheMatinal2" rows="2" value="{{ $dados->laMati2 }}">{{ $dados->laMati2 }}</textarea>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-lg-2 col-md-4">
                                    <label for="time" class="form-label">Hora</label>
                                    <input type="time" class="form-control" name = "planTime4" id="planTime"
                                        value="{{ $dados->hora_A }}">
                                </div>
                                <div class="col-lg-10 col-md-8">
                                    <label for="exampleFormControlTextarea1" class="form-label">Almoço</label>
                                    <textarea class="form-control" name="almoco" rows="4" value="{{ $dados->almoco }}">{{ $dados->almoco }}</textarea>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-lg-2 col-md-4">
                                    <label for="time" class="form-label">Hora</label>
                                    <input type="time" class="form-control" name = "planTime5" id="planTime"
                                        value="{{ $dados->hora_L1 }}">
                                </div>
                                <div class="col-lg-10 col-md-8">
                                    <label for="exampleFormControlTextarea1" class="form-label">1º
                                        Lanche 1º</label>
                                    <textarea class="form-control" name="lanche1" rows="2" value="{{ $dados->lanche1 }}">{{ $dados->lanche1 }}</textarea>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-lg-2 col-md-4">
                                    <label for="time" class="form-label">Hora</label>
                                    <input type="time" class="form-control" name = "planTime6" id="planTime"
                                        value="{{ $dados->hora_L2 }}">
                                </div>
                                <div class="col-lg-10 col-md-8">
                                    <label for="exampleFormControlTextarea1" class="form-label">2º
                                        Lanche 2º</label>
                                    <textarea class="form-control" name="lanche2" rows="2" value="{{ $dados->lanche2 }}">{{ $dados->lanche2 }}</textarea>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-lg-2 col-md-4">
                                    <label for="time" class="form-label">Hora</label>
                                    <input type="time" class="form-control" name = "planTime7" id="planTime"
                                        value="{{ $dados->hora_L3 }}">
                                </div>
                                <div class="col-lg-10 col-md-8">
                                    <label for="exampleFormControlTextarea1" class="form-label">3º
                                        Lanche 3º</label>
                                    <textarea class="form-control" name="lanche3" rows="2" value="{{ $dados->lanche3 }}">{{ $dados->lanche3 }}</textarea>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-lg-2 col-md-4">
                                    <label for="time" class="form-label">Hora</label>
                                    <input type="time" class="form-control" name = "planTime8" id="planTime"
                                        value="{{ $dados->hora_JA }}">
                                </div>
                                <div class="col-lg-10 col-md-8">
                                    <label for="exampleFormControlTextarea1" class="form-label">Jantar</label>
                                    <textarea class="form-control" name="jantar" rows="4" value="{{ $dados->hora_jantar }}">{{ $dados->hora_jantar }}</textarea>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-lg-2 col-md-4">
                                    <label for="time" class="form-label">Hora</label>
                                    <input type="time" class="form-control" name = "planTime9" id="planTime"
                                        value="{{ $dados->hora_C }}">
                                </div>
                                <div class="col-lg-10 col-md-8">
                                    <label for="exampleFormControlTextarea1" class="form-label">Ceia</label>
                                    <textarea class="form-control" name="ceia" rows="2" value="{{ $dados->ceia }}">{{ $dados->ceia }}</textarea>
                                </div>
                            </div>
                            <div class="mb-2 my-4">
                                <a href="{{ route('app.nutrition') }}" class="btn btn-light ">Cancelar</a>
                                <button type="submit" class="btn btn-light ">Gravar</button>
                            </div>
                        </form>
                    @endif
                </div>

            </div>
        @endsection
