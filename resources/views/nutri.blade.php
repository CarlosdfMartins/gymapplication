@extends('layouts.page2')

@section('content')
    <div class="container-fluid mt-5 mb-5">
        <div class="row justify-content-center pb-5">
            <div class="col-lg-8 col-md-10">
                <div class="card p-4">

                    <h2>NUTRIÇÃO</h2>


                    <div class="text-left my-3 form-group">
                        <form method="get" action="{{ route('app.formNutriConsult') }}" class="d-flex" role="nutSearch">
                            @csrf
                            <input class="form-control me-2" name="nutSearch" type="text" placeholder="Pesquisar sócio"
                                aria-label="nutSearch">
                            <button class="btn btn-outline-success" type="submit">Procurar</button>
                        </form>
                    </div>


                </div>
            </div>
        </div>
    </div>
@endsection
