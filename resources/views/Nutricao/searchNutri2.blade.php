@extends('layouts.page2')

@section('content')
    <div class="container-fluid mt-5 mb-5">
        <div class="row justify-content-center pb-5">
            <div class="col-lg-8 col-md-10">
                <div class="card p-4">

                    <h2>Sócios</h2>

                    <hr>

                    <table class="table">
                        <thead>
                            <tr>
                                <th class="text-center">Nº Sócio</th>
                                <th class="text-center">Nome</th>
                                <th class="text-center">Telefone</th>
                                <th class="text-center">Email</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($nomeSocios as $nsocios)
                                <tr onclick="window.location.href='{{ route('app.nutriSearch', ['id' => $nsocios->id]) }}';"
                                    style="cursor: pointer;">
                                    <td class="text-center">{{ $nsocios->id }}</td>
                                    <td class="text-center">{{ $nsocios->nome }} {{ $nsocios->apelido }}</td>
                                    <td class="text-center">{{ $nsocios->telefone }}</td>
                                    <td class="text-center">{{ $nsocios->email }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                        </table>
                        <div style="text-align: right; margin-top: 10px;">
                            <a onclick="retrocederPagina()" class="link-body-emphasis"
                            style="cursor: pointer; text-decoration: none;">
                                <i class="bi bi-reply-all-fill"></i> Voltar</a>
                        </div>
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
