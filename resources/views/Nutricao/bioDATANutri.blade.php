@extends('Nutricao.layoutNutri')

@section('content')
    <div class="container-fluid mt-10 mb-8">
        <div class="row justify-content-center pb-4">
            <div class="col-lg-16 col-md-50">

                <div class="row">

                    <div>
                        <table>
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
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
