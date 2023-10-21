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
                            <div class="card-body">
                                <h3 class="card-title">TREINO</h3>
                                <p class="card-text">Entra aqui para acederes ao teu plano de treino</p>
                                <a href="{{ route('app.trainSocio',['id' => $nomeSocios]) }}" class="btn btn-light">ENTRAR</a>
                            </div>
                        </div>

                        <div class="mx-2"></div>

                        <div class="card" style="width: 18rem;">
                            <img src="..." class="card-img-top" alt="...">
                            <div class="card-body">
                                <h3 class="card-title">EVOLUÇÃO</h3>
                                <p class="card-text">Entra aqui para veres a tua Evolução</p>
                                <a href="{{ route('app.evolBioSocio',['id' => $nomeSocios]) }}" class="btn btn-light">ENTRAR</a>
                            </div>
                        </div>

                        <div class="mx-2"></div>

                        <div class="card" style="width: 18rem;">
                            <img src="..." class="card-img-top" alt="...">
                            <div class="card-body">
                                <h3 class="card-title">NUTRIÇÃO</h3>
                                <p class="card-text">Entra aqui para acederes ao teu plano de Nutrição</p>
                                <a href="{{ route('app.nutriSocio',['id' => $nomeSocios]) }}" class="btn btn-light">ENTRAR</a>
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
