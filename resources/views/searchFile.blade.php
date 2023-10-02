@extends('layouts.page2')


@section('content')
    <div class="container-fluid mt-5 mb-5">
        <div class="row justify-content-center pb-5">
            <div class="col-lg-8 col-md-10">
                <div class="card p-4">
                    <div>
                        <h4><strong>Pesquisar cliente </strong></h4>
                    </div>
                    <hr>
                    <div class="container">
                        <div class="row">
                            <div class="col">

                                @csrf


                                <div class="mb-3">



                                </div>


                                <div class="text-left my-3 form-group">
                                    <form method="get" action="{{ route('app.formConsult') }}" class="d-flex" role="search">
                                        @csrf
                                        <input class="form-control me-2" name="search" type="text" placeholder="Pesquisar"
                                            aria-label="Search">
                                        <button class="btn btn-outline-info" type="submit">Procurar</button>
                                    </form>

                                </div>

                                <div class="alert alert-danger p-2 text-center"> MENSAGEM DE ERRO</div>

                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
