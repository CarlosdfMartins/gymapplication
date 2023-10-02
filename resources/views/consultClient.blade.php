@extends('layouts.page2')

@section('content')
    <div class="container-fluid mt-5 mb-5">
        <div class="row justify-content-center pb-5">
            <div class="col-lg-12 col-md-10">
                <div class="card p-4">

                    @if ($socios->count() === 0)
                        <p>Sem resultados para apresentar.</p>
                    @else
                        <table Class="table">
                            <thead>
                                <tr>
                                    <th class=text-center>Nº Sócio</th>
                                    <th class=text-center>Nome</th>
                                    <th class=text-center>Telefone</th>
                                    <th class=text-center>Email</th>

                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($socios as $socio)
                                    <tr onclick="window.location.href='{{ route('app.nutriSearch', ['id' => $socio->id]) }}';"
                                        style="cursor: pointer;">
                                        <td class=text-center>{{ $socio->id }}</td>
                                        <td class=text-center>{{ $socio->nome }} {{ $socio->apelido }}</td>
                                        <td class=text-center>{{ $socio->telefone }}</td>
                                        <td class=text-center>{{ $socio->email }}</td>
                                        <td>Editar</td>
                                        <td>Eliminar</td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    @endif
                </div>

                <div class="row">
                    <div class="col">

                        <p class="mb-5"> Total: <strong>{{ count($socios) }}</strong></p>

                    </div>
                </div>
            </div>
        </div>
    @endsection
