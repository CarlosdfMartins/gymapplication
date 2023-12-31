@extends('Nutricao.layoutNutri')

@section('content')

    {{-- Presentation of Biometric data --}}

    <div class="container-fluid mt-2 mb-2">
        <div class="row justify-content-center pb-1">
            <div class="col-lg-16 col-md-50">
                <div class="row">
                    <div class="table-responsive mx-auto">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th class="text-center align-baseline">Peso (kg)</th>
                                    <th class="text-center align-baseline">Altura (cm)</th>
                                    <th class="text-center align-baseline">IMC</th>
                                    <th class="text-center align-baseline">Massa Gorda (kg)</th>
                                    <th class="text-center align-baseline">Massa Gorda (%)</th>
                                    <th class="text-center align-baseline">Massa Magra (kg)</th>
                                    <th class="text-center align-baseline">Massa Magra (%)</th>
                                    <th class="text-center align-baseline">FFM</th>
                                    <th class="text-center align-baseline">TBW</th>
                                    <th class="text-center align-baseline">Visceral Fat Rating</th>
                                    <th class="text-center align-baseline">Peito (cm)</th>
                                    <th class="text-center align-baseline">Abdomen (cm)</th>
                                    <th class="text-center align-baseline">Anca (cm)</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($biodados as $bio)
                                    <tr>
                                        <td class=text-center>{{ $bio->peso_kg }}</td>
                                        <td class=text-center>{{ $bio->altura_cm }}</td>
                                        <td class=text-center>{{ $bio->IMC }}</td>
                                        <td class=text-center>{{ $bio->m_Gorda_kg }}</td>
                                        <td class=text-center>{{ $bio->m_Gorda_Percen }}</td>
                                        <td class=text-center>{{ $bio->m_Magra_kg }}</td>
                                        <td class=text-center>{{ $bio->m_Magra_Percen }}</td>
                                        <td class=text-center>{{ $bio->ffm }}</td>
                                        <td class=text-center>{{ $bio->TBW }}</td>
                                        <td class=text-center>{{ $bio->Vis_Fat_R }}</td>
                                        <td class=text-center>{{ $bio->Peito }}</td>
                                        <td class=text-center>{{ $bio->Abdomen }}</td>
                                        <td class=text-center>{{ $bio->Anca }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <hr>
                    </div>
                </div>

                <a href="{{ route('app.evolnutri', ['id' => encrypt($socioID)]) }}" class="btn btn-outline-success ms-3"
                    style="text-decoration: none;"><i class="bi bi-graph-up-arrow"></i> Evolução</a>
            </div>

        </div>
        <div style="text-align: right; margin-top: 10px;">
            <a onclick="retrocederPagina()" class="link-body-emphasis" style="cursor: pointer; text-decoration: none;">
                <i class="bi bi-reply-all-fill"></i> Voltar</a>
        </div>
    </div>
@endsection
