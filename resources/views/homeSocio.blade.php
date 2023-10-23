@extends('layouts.page2')

@section('content')
    @php
        $profile = decrypt($nomeSocios);
    @endphp
    
    <div class="container-fluid mt-5 mb-5">
        <div class="row justify-content-center pb-5">
            <div class="col-lg-8 col-md-10">
                <div class="card p-4">


                    <div class="row">
                        <h3>Sócio {{ session('nome') }} </h3>
                    </div>

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
                            <img src="assets/images/FIT.jpg" class="card-img-top" alt="Treino">
                            <div class="card-body text-center">
                                <h3 class="card-title">EVOLUÇÃO</h3>
                                <p class="card-text">Clica aqui para acederes à tua área de treino e assim
                                    usufruíres do teu plano de treino e da tua evolução.</p>
                                <a href="{{ route('app.evolBio', ['id' => $nomeSocios]) }}" class="btn btn-light">ENTRAR</a>
                            </div>
                        </div>
                        <div class="mx-2"></div>

                        <div class="card" style="width: 18rem;">
                            <img src="..." class="card-img-top" alt="...">
                            <div class="card-body text-center">
                                <h3 class="card-title">NUTRIÇÃO</h3>
                                <p class="card-text">Some quick example text to build on the card title and make
                                    up the bulk of the card's content.</p>
                                <a href="{{ route('app.selectPlanNutrie', ['id' => $nomeSocios]) }}"
                                    class="btn btn-light">ENTRAR</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
