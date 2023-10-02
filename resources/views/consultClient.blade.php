@extends('layouts.page2')

@section('content')
    <div class="container-fluid mt-5 mb-5">
        <div class="row justify-content-center pb-5">
            <div class="col-lg-12 col-md-10">
                <div class="card p-4">

                    @if ($socios->count() === 0)
                        <p>Sem resultados para apresentar.</p>
                    @else
                        <table>
                            <thead>
                                <tr>
                                    <th class=text-center>Nº Sócio</th>
                                    <th class=text-center>Nome</th>
                                    <th class=text-center>Telefone</th>
                                    <th class=text-center>Email</th>
                                    <th class=text-center>Sexo</th>
                                    <th class=text-center>Data Nascimento</th>
                                    <th class=text-center>Nutricionista</th>
                                    <th class=text-center>Personal Trainer</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($socios as $socio)
                                    <tr>
                                        <td class=text-center>{{ $socio->id }}</td>
                                        <td class=text-center>{{ $socio->nome }} {{ $socio->apelido }}</td>
                                        <td class=text-center>{{ $socio->telefone }}</td>
                                        <td class=text-center>{{ $socio->email }}</td>
                                        <td class=text-center>{{ $socio->sexo }}</td>
                                        <td class=text-center>{{ $socio->data_nascimento }}</td>
                                        <td class=text-center>{{ optional($socio->nutri)->nome }}
                                            {{ optional($socio->nutri)->apelido }}</td>
                                        <td class=text-center>{{ optional($socio->pTrain)->nome }}
                                            {{ optional($socio->pTrain)->apelido }}</td>


                                        <td>Editar</td>
                                        <td>Eliminar</td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    @endif



                </div>
            </div>
            <div class="row"></div>
            <div class="col">

                <p class="mb-5"> Total: <strong>{{ count($socios) }}</strong></p>

            </div>
        </div>
    </div>
    </div>
@endsection
