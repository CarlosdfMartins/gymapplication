@extends('layouts.page2')


@section('content')

    <script src="{{ asset('assets/bootstrap/bootstrap.bundle.min.js') }}"></script>
    

    <div class="container-fluid mt-5 mb-5">
        <div class="row justify-content-center pb-5">
            <div class="col-lg-8 col-md-10">
                <div class="card p-4">
                    <div>
                        <h4><strong>Inserir dados do utilizador</strong></h4>
                    </div>
                    <hr>
                    <div class="container">
                        <div class="row">
                            <div class="col">
                                <form action="{{ route('app.form') }}" method="post">
                                    @csrf

                                    <div class="row mb-3">
                                        <div class="col-md-6 col-sm-12">
                                            <label for="text-name" class="form-label">Nome</label>
                                            <input type="text" name="text-name" value="{{ old('text-name') }}"
                                                class="form-control" required>
                                            </label>
                                        </div>

                                        <div class="col-md-6 col-sm-12">
                                            <label for="text-apelido" class="form-label">Apelido</label>
                                            <input type="text" name="text-apelido" value="{{ old('text-apelido') }}"
                                                class="form-control" required>
                                            </label>
                                        </div>
                                    </div>

                                    <div class=" row mb-3">
                                        <div class="col-md-6 col-sm-12">
                                            <label for="text-email" class="form-label">E-mail</label>
                                            <input type="email" name="text-email" class="form-control" placeholder="@"
                                                required>
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <label for="text-phone" class="form-label">Telefone</label>
                                            <input type="text" name="text-phone" class="form-control" required>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-md-6 col-sm-12">
                                            <div>Sexo</div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="sexo" value="H"
                                                    required>
                                                <label class="form-check-label" for="Man">Homem</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="sexo" value="M"
                                                    required>
                                                <label class="form-check-label" for="Woman">Mulher</label>
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-sm-12">
                                            <label for="text-birthdate" class="form-label">Data Nascimento</label>
                                            <input type="date" name="text-birthdate" class="form-control" required>
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-sm-12 mb-2">Defenir perfil do utilizador</div>
                                    <select class="form-select" id="text-profile" name="text-profile"
                                        aria-label="Default select example" required>
                                        <option selected></option>
                                        <option value="Administrador">Administrador</option>
                                        <option value="Socio">Sócio</option>
                                        <option value="Nutricionista">Nutricionista</option>
                                        <option value="Personal Trainer">Personal Trainer</option>
                                    </select>

                                    <div class="row mb-3">
                                        <div class="col-md-6 col-sm-12">
                                            <label for="text-name" class="form-label my-2">Personal Trainer</label>
                                            <select class="form-select" id="PT" name="ptrainer"
                                                style="display: none;">
                                                @foreach ($personalTrainers as $personalTrainer)
                                                    <option value="{{ $personalTrainer->id }}">
                                                        {{ $personalTrainer->nome }} {{ $personalTrainer->apelido }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="col-md-6 col-sm-12">
                                            <label for="text-name" class="form-label my-2">Nutricionista</label>
                                            <select class="form-select" id="NUT" name="nutri"
                                                style="display: none;">
                                                @foreach ($nutricionistas as $nutricionista)
                                                    <option value="{{ $nutricionista->id }}">
                                                        {{ $nutricionista->nome }} {{ $nutricionista->apelido }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="mb-3 my-4">
                                            <a href="{{ route('app.home') }}" class="btn btn-light ">Cancelar</a>
                                            <button type="submit" class="btn btn-light ">Gravar</button>
                                        </div>
                                </form>
                                <div style="text-align: right; margin-top: 10px;">
                                    <a onclick="retrocederPagina()" class="link-body-emphasis"
                                        style="cursor: pointer; text-decoration: none;">
                                        <i class="bi bi-reply-all-fill"></i> Voltar</a>
                                </div>
                                {{-- função de erros --}}
                                @if ($errors->any())
                                    <div class="alert alert-danger p-2">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif

                                {{-- adicionar opções de PT e Nutri --}}
                                <script>
                                    document.addEventListener("DOMContentLoaded", function() {
                                        var profile = document.getElementById("text-profile");
                                        var personalTrainer = document.getElementById("PT");
                                        var nutricionista = document.getElementById("NUT");


                                        profile.addEventListener("change", function() {
                                            if (profile.value === "Socio") {
                                                personalTrainer.style.display = "block";
                                                nutricionista.style.display = "block";
                                            } else {
                                                personalTrainer.style.display = "none";
                                                nutricionista.style.display = "none";
                                            }
                                        });
                                    });
                                </script>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
