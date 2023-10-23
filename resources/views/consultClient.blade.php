@extends('layouts.page2')

@section('content')
    <div class="container-fluid mt-5 mb-5">
        <div class="row justify-content-center pb-5">
            <div class="col-lg-12 col-md-10">
                <div class="card p-4">

                    <h3>Sócios</h3>

                    <hr>
                    @if (isset($message))
                        <div class="container">
                            <p>{{ $message }}</p>
                            <a href="{{ route('app.formSearch') }}" class="link-body-emphasis" style="text-decoration: none;">
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
                            </thead>
                            <tbody>
                                @foreach ($socios as $socio)
                                    <tr>
                                        <td class="text-center"
                                            onclick="window.location.href='{{ route('app.nutriSearch', ['id' => encrypt($socio->id)]) }}';"
                                            style="cursor: pointer;">{{ $socio->id }}</td>
                                        <td class="text-center"
                                            onclick="window.location.href='{{ route('app.nutriSearch', ['id' =>  encrypt($socio->id)]) }}';"
                                            style="cursor: pointer;">{{ $socio->nome }} {{ $socio->apelido }}</td>
                                        <td class="text-center"
                                            onclick="window.location.href='{{ route('app.nutriSearch', ['id' => encrypt($socio->id)]) }}';"
                                            style="cursor: pointer;">{{ $socio->telefone }}</td>
                                        <td class="text-center"
                                            onclick="window.location.href='{{ route('app.nutriSearch', ['id' =>  encrypt($socio->id)]) }}';"
                                            style="cursor: pointer;">{{ $socio->email }}</td>
                                        <td>
                                            <a class="link-body-emphasis"
                                                href="{{ route('app.edit', ['id' => encrypt($socio->id), 'profile' => encrypt($socio->profile)]) }}">
                                                <i class="bi bi-pencil-square"></i>
                                            </a>
                                        </td>
                                        <td>
                                            <a class="link-body-emphasis" href="" data-bs-toggle="modal"
                                                data-bs-target="#confirmDeleteModal{{ $socio->id }}">
                                                <i class="bi bi-trash3-fill"></i>
                                            </a>
                                        </td>
                                    </tr>

                                    {{-- Modal --}}
                                    <div class="modal fade" id="confirmDeleteModal{{ $socio->id }}" tabindex="-1"
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
                                                    Tem certeza que deseja apagar este sócio?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Cancelar</button>
                                                    <a class="btn btn-danger"
                                                        href="{{ route('app.delete', ['id' => $socio->id, 'profile' => $socio->profile]) }}">Apagar</a>
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

                <div class="row">
                    <div class="col">

                        <p class="mb-5"> Total: <strong>{{ count($socios) }}</strong></p>

                    </div>
                </div>
                @endif
            </div>
        </div>
    @endsection
