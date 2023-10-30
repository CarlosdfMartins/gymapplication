@extends('layouts.page2')

@section('content')
    <div class="container-fluid mt-5 mb-5">
        <div class="row justify-content-center pb-5">
            <div class="col-lg-12 col-md-10">
                <div class="card p-4">

                    <h3>Colaboradores</h3>

                    <hr>
                    @if (isset($message))
                        <div class="container">
                            <p>{{ $message }}</p>
                            <a href="{{ route('app.pesquiCola') }}" class="link-body-emphasis" style="text-decoration: none;">
                                <i class="bi bi-reply-all-fill"></i> Voltar
                            </a>
                        </div>
                    @else
                        <table Class="table table-hover">
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
                                    <tr>
                                        <td class="text-center"
                                            onclick="window.location.href='{{ route('app.searchCola', ['id' => encrypt($colaborador->id)]) }}';"
                                            style="cursor: pointer;">{{ $colaborador->id }}</td>
                                        <td class="text-center"
                                            onclick="window.location.href='{{ route('app.searchCola', ['id' => encrypt($colaborador->id)]) }}';"
                                            style="cursor: pointer;">{{ $colaborador->nome }} {{ $colaborador->apelido }}
                                        </td>
                                        <td class="text-center"
                                            onclick="window.location.href='{{ route('app.searchCola', ['id' => encrypt($colaborador->id)]) }}';"
                                            style="cursor: pointer;">{{ $colaborador->telefone }}</td>
                                        <td class="text-center"
                                            onclick="window.location.href='{{ route('app.searchCola', ['id' => encrypt($colaborador->id)]) }}';"
                                            style="cursor: pointer;">{{ $colaborador->email }}</td>
                                        <td class="text-center"
                                            onclick="window.location.href='{{ route('app.searchCola', ['id' => encrypt($colaborador->id)]) }}';"
                                            style="cursor: pointer;">{{ $colaborador->profile }}</td>
                                        <td class="text-center">
                                            <a class="link-body-emphasis"
                                                href="{{ route('app.edit', ['id' => encrypt($colaborador->id), 'profile' => encrypt($colaborador->profile)]) }}">
                                                <i class="bipencil bi-pencil-square"></i>
                                            </a>
                                        </td>
                                        <td><a class="link-body-emphasis" class="link-body-emphasis" href=""
                                                data-bs-toggle="modal"
                                                data-bs-target="#confirmDeleteMO{{ $colaborador->id }}"><i
                                                    class="bitrash3 bi-trash3-fill"></i></td>
                                    </tr>


                                    <div class="modal fade" id="confirmDeleteMO{{ $colaborador->id }}" tabindex="-1"
                                        role="dialog" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="confirmDeleteModalLabel">Confirmação de
                                                        Exclusão</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    Tem certeza que deseja apagar este colaborador?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-warning"
                                                        data-bs-dismiss="modal">Cancelar</button>
                                                    <a class="btn btn-danger"
                                                        href="{{ route('app.delete', ['id' => $colaborador->id, 'profile' => $colaborador->profile]) }}">Apagar</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </tbody>
                        </table>
                        <div style="text-align: right; margin-top: 10px;">
                            <a onclick="retrocederPagina()" class="link-body-emphasis"
                                style="cursor: pointer; text-decoration: none;">
                                <i class="bi bi-reply-all-fill"></i> Voltar</a>
                        </div>
                </div>

            </div>

            <div class="row">
                <div class="col">

                    <p class="mb-5"> Total: <strong>{{ count($colaboradores) }}</strong></p>

                </div>
            </div>
            @endif

        </div>
    </div>
@endsection
