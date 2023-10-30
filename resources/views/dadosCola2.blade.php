@extends('layouts.page2')

@section('content')
    <div class="container-fluid mt-5 mb-5">
        <div class="row justify-content-center pb-5">
            <div class="col-lg-8 col-md-10">
                <div class="card p-4">


                    <h4 class="text-center">Dados alterados com sucesso <i class="bCheck bi bi-check-square-fill"></i></h4>

                    <div style="text-align: right; margin-top: 10px;">
                        <a onclick="retrocederPagina()" class="link-body-emphasis"
                            style="cursor: pointer; text-decoration: none;">
                            <i class="bi bi-sign-turn-left-fill"></i> Voltar</a>
                        |
                        <a onclick="avançarPagina()" class="link-body-emphasis"
                            style="cursor: pointer; text-decoration: none;">
                            Avançar <i class="bi bi-sign-turn-right-fill"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <script>
        function avançarPagina() {
            window.location.href = "{{ route('app.consultColabor') }}";
        }
    </script>
@endsection
