@extends('Nutricao.layoutNutri')


@section('content')
    <h5><u>Plano de Nutrição:</u></h5>



    <div class="container">
        <div class="row-3">
            <form action="{{ route('app.storePlanNutrie', ['id' => $socioID]) }}" method="post">
                @csrf

                <div class="row mt-3">
                    <div class="col-lg-2 col-md-4">
                        <label for="time" class="form-label">Hora</label>
                        <input type="time" class="form-control" name = "planTime1" id="planTime">
                    </div>
                    <div class="col-lg-10 col-md-8">
                        <label for="exampleFormControlTextarea1" class="form-label">Pequeno-Almoço</label>
                        <textarea class="form-control" name="pequeno_almoco" rows="4"></textarea>
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-lg-2 col-md-4">
                        <label for="time" class="form-label">Hora</label>
                        <input type="time" class="form-control"  name = "planTime2" id="planTime">
                    </div>
                    <div class="col-lg-10 col-md-8">
                        <label for="exampleFormControlTextarea1" class="form-label">Lanche Matinal</label>
                        <textarea class="form-control" name="lancheMatinal" rows="2"></textarea>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-lg-2 col-md-4">
                        <label for="time" class="form-label">Hora</label>
                        <input type="time" class="form-control"  name = "planTime3" id="planTime">
                    </div>
                    <div class="col-lg-10 col-md-8">
                        <label for="exampleFormControlTextarea1" class="form-label">2º Lanche
                            Matinal</label>
                        <textarea class="form-control" name="lancheMatinal2" rows="2"></textarea>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-lg-2 col-md-4">
                        <label for="time" class="form-label">Hora</label>
                        <input type="time" class="form-control"  name = "planTime4" id="planTime">
                    </div>
                    <div class="col-lg-10 col-md-8">
                        <label for="exampleFormControlTextarea1" class="form-label">Almoço</label>
                        <textarea class="form-control" iname="almoco" rows="4"></textarea>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-lg-2 col-md-4">
                        <label for="time" class="form-label">Hora</label>
                        <input type="time" class="form-control"  name = "planTime5" id="planTime">
                    </div>
                    <div class="col-lg-10 col-md-8">
                        <label for="exampleFormControlTextarea1" class="form-label">1º
                            Lanche 1º</label>
                        <textarea class="form-control" name="lanche1" rows="2"></textarea>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-lg-2 col-md-4">
                        <label for="time" class="form-label">Hora</label>
                        <input type="time" class="form-control"  name = "planTime6" id="planTime">
                    </div>
                    <div class="col-lg-10 col-md-8">
                        <label for="exampleFormControlTextarea1" class="form-label">2º
                            Lanche 2º</label>
                        <textarea class="form-control" name="lanche2" rows="2"></textarea>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-lg-2 col-md-4">
                        <label for="time" class="form-label">Hora</label>
                        <input type="time" class="form-control"  name = "planTime7" id="planTime">
                    </div>
                    <div class="col-lg-10 col-md-8">
                        <label for="exampleFormControlTextarea1" class="form-label">3º
                            Lanche 3º</label>
                        <textarea class="form-control" name="lanche3" rows="2"></textarea>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-lg-2 col-md-4">
                        <label for="time" class="form-label">Hora</label>
                        <input type="time" class="form-control"  name = "planTime8" id="planTime">
                    </div>
                    <div class="col-lg-10 col-md-8">
                        <label for="exampleFormControlTextarea1" class="form-label">Jantar</label>
                        <textarea class="form-control" name="jantar" rows="4"></textarea>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-lg-2 col-md-4">
                        <label for="time" class="form-label">Hora</label>
                        <input type="time" class="form-control"  name = "planTime9" id="planTime">
                    </div>
                    <div class="col-lg-10 col-md-8">
                        <label for="exampleFormControlTextarea1" class="form-label">Ceia</label>
                        <textarea class="form-control" name="ceia" rows="2"></textarea>
                    </div>
                </div>
                <div class="mb-2 my-4">
                    <a href="{{ route('app.nutrition') }}" class="btn btn-light ">Cancelar</a>
                    <button type="submit" class="btn btn-light ">Gravar</button>
                </div>
            </form>
        </div>

    </div>

    <div style="text-align: right; margin-top: 10px;">
        <a onclick="retrocederPagina()" class="link-body-emphasis"
        style="cursor: pointer; text-decoration: none;">
            <i class="bi bi-reply-all-fill"></i> Voltar</a>
    </div>
@endsection
