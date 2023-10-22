@extends('layouts.page2')

@section('content')
    <div class="container-fluid mt-5 mb-5">
        <div class="row justify-content-center pb-5">
            <div class="col-lg-8 col-md-10">
                <div class="card p-4">

                    <h1>Sócio Home</h1>

                    <hr>
                    <div class="d-flex justify-content-between">
                        <div class="card" style="width: 18rem;">
                            <img src="assets/images/FIT.jpg" class="card-img-top" alt="Treino">
                            <div class="card-body text-center">
                                <h3 class="card-title">TREINO</h3>
                                <p class="card-text">Clica e entrar para
                                    acederes ao teu plano de treino.</p>
                                <a href="{{ route('app.selectPlantrainer', ['id' => $nomeSocios]) }}"
                                    class="btn btn-light">ENTRAR</a>
                            </div>
                        </div>

                        <div class="mx-2"></div>

                        <div class="card" style="width: 18rem;">
                            <img src="..." class="card-img-top" alt="...">
                            <div class="card-body text-center">
                                <h3 class="card-title">NUTRIÇÃO</h3>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk
                                    of the card's content.</p>
                                <a href="{{ route('app.nutriSocio',['id' => $nomeSocios]) }}" class="btn btn-light">ENTRAR</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
