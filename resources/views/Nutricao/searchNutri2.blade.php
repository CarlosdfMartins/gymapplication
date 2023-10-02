@extends('layouts.page2')

@section('content')
    <div class="container-fluid mt-5 mb-5">
        <div class="row justify-content-center pb-5">
            <div class="col-lg-8 col-md-10">
                <div class="card p-4">

                    <h2>NUTRIÇÃO</h2>

                    <hr>

                    <table class="table">
                        <thead>
                            <tr>
                                <th>Nº Sócio</th>
                                <th>Nome</th>
                                <th>Telefone</th>
                                <th>Email</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($nomeSocios as $nsocios)
                                <tr onclick="window.location.href='{{ route('app.nutriSearch', ['id' => $nsocios->id]) }}';"
                                    style="cursor: pointer;">
                                    <td>{{ $nsocios->id }}</td>
                                    <td>{{ $nsocios->nome }} {{ $nsocios->apelido }}</td>
                                    <td>{{ $nsocios->telefone }}</td>
                                    <td>{{ $nsocios->email }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="row">
                    <div class="col">

                        <p class="mb-5"> Total: <strong>{{ count($nomeSocios) }}</strong></p>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
