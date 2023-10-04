@extends('layouts.page2')

@section('content')
    <div class="container-fluid mt-5 mb-5">
        <div class="row justify-content-center pb-5">
            <div class="col-lg-12 col-md-10">
                <div class="card p-4">

                    <h3>Colaboradores</h3>

                    <hr>

                    <table Class="table">
                        <thead>
                            <tr>
                                <th class="text-center">Nº Sócio</th>
                                <th class="text-center">Nome</th>
                                <th class="text-center">Telefone</th>
                                <th class="text-center">Email</th>
                                <th class="text-center">Perfil</th>
                            </thead>

                        <tbody>
                            @foreach ($colaboradores as $colaborador)
                                <tr onclick="window.location.href='{{ route('app.searchCola', ['id' => $colaborador->id]) }}';"
                                    style="cursor: pointer;">
                                    <td class="text-center">{{ $colaborador->id }}</td>
                                    <td class="text-center">{{ $colaborador->nome }} {{ $colaborador->apelido }}</td>
                                    <td class="text-center">{{ $colaborador->telefone }}</td>
                                    <td class="text-center">{{ $colaborador->email }}</td>
                                    <td class="text-center">{{ $colaborador->profile }}</td>
                                    <td class="link-body-emphasis">
                                        <a
                                            href="{{ route('app.edit', ['id' => $colaborador->id, 'profile' => $colaborador->profile]) }}">
                                            <i class="bi bi-pencil-square"></i>
                                        </a>
                                    </td>
                                    <td class="link-body-emphasis"><i class="bi bi-trash3"></i></td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>

                </div>



            </div>
        </div>
    @endsection
