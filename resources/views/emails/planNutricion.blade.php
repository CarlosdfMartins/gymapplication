
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Plano de Nutrição</title>
</head>
<body>
    <h1>Plano de Nutrição</h1>

    <p>Olá {{ $socioName }},</p>

    <p>Aqui está o seu plano de nutrição:</p>

    <ul>
        <li><strong>Hora:</strong> {{ $planNutri->hora_PA }}</li>
        <li><strong>Pequeno Almoço:</strong> {{ $planNutri->pequeno_almoco }}</li>

    </ul>

    <p>Obrigado,</p>
    {{ $nutricionista }}
</body>
</html>

