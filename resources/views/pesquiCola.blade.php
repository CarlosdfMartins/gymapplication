@extends('layouts.page2')

@section('content')
    <div class="container-fluid mt-5 mb-5">
        <div class="row justify-content-center pb-5">
            <div class="col-lg-8 col-md-10">
                <div class="card p-4">

                    <h3>Pequisar</h3>
                    <hr>


                    <div class="text-left my-3 form-group">
                        <form action="{{ route('app.consultColabor') }}" method="get">
                            @csrf
                            <div class="d-flex">
                                <input type="text" name="searchColabor" id="searchColabor" class="form-control"
                                    placeholder="Pesquisar colaborador">
                                <button class="btn btn-outline-primary ms-3"><i class="bi bi-search"></i></button>
                        </form>
                    </div>


                </div>
            </div>
        </div>
    </div>
@endsection
