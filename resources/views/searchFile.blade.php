@extends('layouts.page2')


@section('content')

    {{-- search for client --}}

    <div class="container-fluid mt-5 mb-5">
        <div class="row justify-content-center pb-5">
            <div class="col-lg-8 col-md-10">
                <div class="socpesq card p-4">
                    <div>
                        <h4><strong>Pesquisar Sócio</strong></h4>
                    </div>
                    <hr>
                    <div class="container">
                        <div class="row">
                            <div class="col">
                                <div class="text-left my-3 form-group">
                                    <form method="get" action="{{ route('app.formConsult') }}" class="d-flex"
                                        role="search">
                                        @csrf
                                        <input class="form-control me-2" name="search" type="text"
                                            placeholder="Pesquisar" aria-label="Search">
                                        <button class="btn btn-outline-success ms-3"><i class="bi bi-search"></i></button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div style="text-align: right; margin-top: 10px;">
                            <a onclick="retrocederPagina()" class="link-body-emphasis"
                                style="cursor: pointer; text-decoration: none;">
                                <i class="bi bi-reply-all-fill"></i> Voltar</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
