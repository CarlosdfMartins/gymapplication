@extends('layouts.page2')

@section('content')
    <div class="container-fluid mt-5 mb-5">
        <div class="row justify-content-center pb-5">
            <div class="col-lg-8 col-md-10">
                <div class="card p-4">

                    <h1>Train Socio</h1>

                    <hr>
                    <div class="d-flex justify-content-between">
                        <div class="card" style="width: 18rem;">
                            <img src="assets/images/FIT.jpg" class="card-img-top" alt="Treino">
                            <div class="card-body">
                                <div class="text-center">
                                    <a href="{{ route('app.selectPlantrainer', ['id' => $nomeSocios]) }}" class="btn btn-light btn-lg">Plano de Treino</a>
                                    <p class="card-text"></p>
                                </div>
                            </div>
                        </div>
                        <div class="mx-2"></div>

                        <div class="card" style="width: 18rem;">
                            <img src="..." class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Evolução</h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk
                                    of the card's content.</p>
                                <a href="{{ route('app.evolnutri', ['id' => $nomeSocios]) }}" class="btn btn-light btn-lg">Evolução</a>
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
