@extends('layouts.page2')

@section('content')
    <div class="container-fluid mt-5 mb-5">
        <div class="row justify-content-center pb-5">
            <div class="col-lg-8 col-md-10">
                <div class="card p-4">

                    <h1>TREINO</h1>

                    <div class="text-center my-3 form-group">
                        <a class="btn btn-primary btn-sm" href="{{ route('app.nutrition') }}" role="button">Nutrição</a>
                        <a class="btn btn-primary btn-sm" href="{{ route('app.evolution') }}" role="button">Evolução</a>
                    </div>


                </div>
            </div>
        </div>
    </div>
@endsection
