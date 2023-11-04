@extends('Nutricao.layoutNutri')

@section('content')
    {{-- Gráfico para apresentação da evolução com base nos dados Biométricos --}}

    <div class="container-fluid mt-10 mb-8">
        <div class="row justify-content-center pb-4">
            <div class="col-lg-16 col-md-50">
                <div class="row">
                    <div>
                        <h4 class="text-center align-baseline"><strong>Evolução
                            </strong></h4>
                    </div>
                    <hr>

                    <canvas id="graficoEvolucaoNutricional" width="800" height="400"></canvas>
                </div>
            </div>
        </div>
        <div style="text-align: right; margin-top: 10px;">
            <a onclick="retrocederPagina()" class="link-body-emphasis" style="cursor: pointer; text-decoration: none;">
                <i class="bi bi-reply-all-fill"></i> Voltar</a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    {{-- JavaScript that presents the graphs, taken from the Chart.js Library --}}

    <script>
        const dados = @json($dados);

        const pesos = dados.map(entry => entry.peso_kg);
        const massG = dados.map(entry => entry.m_Gorda_kg);
        const massM = dados.map(entry => entry.m_Magra_kg);
        const imc = dados.map(entry => entry.IMC);


        const datasPesagem = dados.map(entry => entry.created_at);
        const labels = datasPesagem.map(date => new Date(date).toLocaleDateString());

        const data = {
            labels: labels,
            datasets: [{
                    label: 'Peso kg',
                    data: pesos,
                    borderColor: 'LightSeaGreen',
                    backgroundColor: 'rgba(32,178,170, 0.5)',
                    tension: 0.4,
                },
                {
                    label: 'Massa Gorda kg',
                    data: massG,
                    borderColor: 'Red',
                    backgroundColor: 'rgba(255,0,0, 0.5)',
                    tension: 0.2,
                },
                {
                    label: 'Massa Magra kg',
                    data: massM,
                    borderColor: 'Goldenrod',
                    backgroundColor: 'rgba(218,165,32, 0.5)',
                    tension: 0.2,
                },
                {
                    label: 'IMC',
                    data: imc,
                    borderColor: 'DeepSkyBlue',
                    backgroundColor: 'rgba(0,191,255, 0.5)',
                    tension: 0.2,
                }
            ]
        };

        const config = {
            type: 'line',
            data: data,
            options: {
                animations: {
                    y: {
                        easing: 'easeInOutElastic',
                        from: (ctx) => {
                            if (ctx.type === 'data') {
                                if (ctx.mode === 'default' && !ctx.dropped) {
                                    ctx.dropped = true;
                                    return 0;
                                }
                            }
                        }
                    }
                }
            }
        };


        const ctx = document.getElementById('graficoEvolucaoNutricional').getContext('2d');
        const myChart = new Chart(ctx, config);
    </script>
@endsection
