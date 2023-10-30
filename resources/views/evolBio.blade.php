@extends('layouts.page2')

@section('content')
    <div class="container-fluid mt-5 mb-5">
        <div class="row justify-content-center pb-5">
            <div class="col-lg-8 col-md-10">
                <div class="card1 card p-4">

                    <h1>Evolução Socio</h1>

                    <hr>

                    <div class="d-flex justify-content-between">
                        <div class="card" style="width: 18rem;">
                            <img src="{{asset('assets/images/biometricos.jpg')}}" class="card-img-top" alt="...">
                            <div class="card-body text-center">
                                <h3 class="card-title">Dados Biométricos</h3>
                                <p class="card-text">Vê os teus dados Biométricos.</p>
                                <a href="{{ route('app.dadosBIOConsult', ['id' => $nomeSocios]) }}"
                                    class="btn btn-light">ENTRAR</a>
                            </div>
                        </div>
                        <div class="mx-2"></div>

                        <div class="card" style="width: 18rem;">
                            <img src="{{asset('assets/images/graficos.jpg')}}" class="card-img-top" alt="...">
                            <div class="card-body text-center">
                                <h3 class="card-title">Evolução</h3>
                                <p class="card-text">vê a tua Evolução no gráfico.</p>
                                <a href="{{ route('app.evolnutri', ['id' => $nomeSocios]) }}"
                                    class="btn btn-light">ENTRAR</a>
                            </div>
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
