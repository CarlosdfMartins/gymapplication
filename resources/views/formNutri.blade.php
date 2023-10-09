@extends('layouts.page2')


@section('content')
    <div class="container-fluid mt-5 mb-5">
        <div class="row justify-content-center pb-5">
            <div class="col-lg-8 col-md-10">

                <div class="card p-3">

                    <div>
                        <h4><strong>Inserir dados Biométricos de {{ $cliente[0]->nome }} {{ $cliente[0]->apelido }}
                            </strong></h4>
                    </div>

                    <hr>

                    <div class="container">
                        <div class="row">
                            <div class="col">
                                <form action="{{ route('app.storeFormNutri', ['id' => $socioID]) }}" method="post">
                                    @csrf

                                    <div class="row mb-3">
                                        <div class="col-md-4 col-sm-12">
                                            <label for="text-name" class="form-label">Peso</label>
                                            <input type="number" step="0.01" name="text_peso" id="text_peso"
                                                value="{{ old('text_peso') }}" class="form-control" required>
                                        </div>

                                        <div class="col-md-4 col-sm-12">
                                            <label for="text-apelido" class="form-label">Altura</label>
                                            <input type="number" step="0.01" name="text_altura" id="text_altura"
                                                value="{{ old('text_altura') }}" class="form-control" required>
                                        </div>

                                        <div class="col-md-4 col-sm-12">
                                            <label for="imc" class="form-label">IMC</label>
                                            <input type="text" name="text_IMC" id="text_IMC"
                                                value="{{ old('text_IMC') }}" class="form-control" novalidate>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-3 col-sm-12">
                                                <label for="text-MassaGorda" class="form-label">Massa Gorda</label>
                                                <input type="number" step="0.01" name="text_MassaGorda"
                                                    id="text-MassaGorda" value="{{ old('text_MassaGorda') }}"
                                                    class="form-control">
                                            </div>
                                            <div class="col-md-3 col-sm-12">
                                                <label for="text-MGordaPERC" class="form-label">(%)</label>
                                                <input type="number" min="0" max="100" step="0.01"
                                                    name="text_MGordaPERC" id="text-MGordaPERC"
                                                    value="{{ old('text_MGordaPERC') }}" class="form-control">
                                            </div>

                                            <div class="col-md-3 ">
                                                <label for="text-apelido" class="form-label">Massa Magra</label>
                                                <input type="number" step="0.01" name="text_MassaMagra"
                                                    value="{{ old('text_MassaMagra') }}" class="form-control">
                                            </div>
                                            <div class="col-md-3 ">
                                                <label for="text_MassaMagra" class="form-label">(%)</label>
                                                <input type="number" step="0.01" name="text_MMagraPERC"
                                                    value="{{ old('text_MassaMagra') }}" class="form-control">
                                            </div>
                                        </div>

                                        <div class="col-md-4 col-sm-12">
                                            <label for="text-apelido" class="form-label">FFM</label>
                                            <input type="number" step="0.01" name="text_FFM"
                                                value="{{ old('text_FFM') }}" class="form-control">
                                        </div>

                                        <div class="col-md-4 col-sm-12">
                                            <label for="text-apelido" class="form-label">TBW</label>
                                            <input type="number" step="0.01" name="text_TBW"
                                                value="{{ old('text_TBW') }}" class="form-control">
                                        </div>

                                        <div class="col-md-4 col-sm-12">
                                            <label for="text-apelido" class="form-label">Visceral Fat Rating</label>
                                            <input type="number" step="0.01" name="text_VisFatRating"
                                                value="{{ old('text_VisFatRating') }}" class="form-control">
                                        </div>

                                        <div class="col-md-4 col-sm-12">
                                            <label for="text-apelido" class="form-label">Peito</label>
                                            <input type="number" step="0.01" name="text_Peito"
                                                value="{{ old('text_Peito') }}" class="form-control">
                                        </div>

                                        <div class="col-md-4 col-sm-12">
                                            <label for="text-apelido" class="form-label">Abdomen</label>
                                            <input type="number" step="0.01" name="text_Abdomen"
                                                value="{{ old('text_Abdomen') }}" class="form-control">
                                        </div>

                                        <div class="col-md-4 col-sm-12">
                                            <label for="text-apelido" class="form-label">Anca</label>
                                            <input type="number" step="0.01" name="text_Anca"
                                                value="{{ old('text_Anca') }}" class="form-control">
                                        </div>

                                        <div class="mb-2 my-4">
                                            <a href="{{ route('app.nutriSearch', ['id' => $socioID]) }}"
                                                class="btn btn-light ">Cancelar</a>
                                            <button type="submit" class="btn btn-light ">Gravar</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    </div>

    <script>
        // Script para calcular o IMC
        document.getElementById('text_altura').addEventListener('input', atualizarIMC);
        document.getElementById('text_peso').addEventListener('input', atualizarIMC);

        function atualizarIMC() {
            var altura = parseFloat(document.getElementById('text_altura').value);
            var peso = parseFloat(document.getElementById('text_peso').value);

            if (!isNaN(altura) && !isNaN(peso) && altura > 0 && peso > 0) {
                var imc = (peso / (altura * altura));
                // Limita o número para duas casas decimais
                imc = parseFloat(imc.toFixed(2));
                document.getElementById('text_IMC').value = imc;
            } else {
                document.getElementById('text_IMC').value = '';
            }
        }
    </script>
@endsection
