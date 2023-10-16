<?php

namespace App\Http\Controllers;

use App\Models\Exercise;
use App\Models\TrainPlan;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class PersonalTrainerContr extends Controller
{
    public function planTrain($id)
    {
        $socioID = $id;

        $planoTreino = new TrainPlan();

        $planoTreino->socio_id = $socioID;
        $planoTreino->save();

        return redirect()->route('app.morePlanTrain', ['id' => $socioID, 'plan_ID' => $planoTreino->id]);
    }


    public function morePlanTrain($id, $plan_ID)
    {
        $socioID = $id;

        $planoTreino = TrainPlan::find($plan_ID);

        $cliente = DB::table('socios')
            ->select('id', 'nome', 'apelido')
            ->where('id', '=', $id)
            ->get();

        return view('PersonalTrain.formPlanPT', ['id' => $socioID, 'cliente' => $cliente, 'plan_ID' => $planoTreino]);
    }


    public function storePlanTrain(Request $request, $id, $plan_ID)
    {
        $socioID = $id;
        $plan_ID = $plan_ID;

        $exercicios = $request->input('exercicio', []);
        $series = $request->input('serie', []);
        $reps = $request->input('reps', []);
        $CADs = $request->input('CAD', []);
        $ints = $request->input('Int', []);
        $pausas = $request->input('pausa', []);
        $OBSs = $request->input('OBS', []);

        foreach ($exercicios as $key => $exercicio) {
            $exercicioAtual = new Exercise();
            $exercicioAtual->nome = $request->input('nome');
            $exercicioAtual->tipo_treino = $request->input('tipoTreino');
            $exercicioAtual->exercicio = $exercicio;
            $exercicioAtual->series = $series[$key];
            $exercicioAtual->reps = $reps[$key];
            $exercicioAtual->CAD = $CADs[$key];
            $exercicioAtual->intense = $ints[$key];
            $exercicioAtual->pausa = $pausas[$key];
            $exercicioAtual->OBS = $OBSs[$key];
            $exercicioAtual->train_plan_id = $plan_ID;
            $exercicioAtual->socio_id = $socioID;
            $exercicioAtual->save();
        }

        return redirect()->route('app.morePlanTrain', ['id' => $socioID, 'plan_ID' => $plan_ID]);
    }


   public function dadosPlanTrain($id)
{
    $socioID = $id;

    $planoID = request()->input('exercicio');
    $exercicios = Exercise::where('train_plan_id', $planoID)->get();

    return view('PersonalTrain.dataPlanTrain', ['exercicios' => $exercicios, 'socioID' => $socioID]);
}




    public function selectPlantrainer($id)
{
    $cliente = $this->getClienteDetails($id);

    // Obtenha IDs únicos de planos associados ao sócio
    $uniquePlanIds = Exercise::select('train_plan_id')->distinct()->where('socio_id', $id)->pluck('train_plan_id');

    // Obtenha os detalhes dos exercícios para os planos únicos
    $exercicios = Exercise::whereIn('train_plan_id', $uniquePlanIds)->get();

    $socioID = $id;

    return view('PersonalTrain.selectPlanPT', [
        'socioID' => $socioID,
        'cliente' => $cliente,
        'exercicios' => $exercicios,
    ]);
}


    public function getClienteDetails($id)
    {
        $cliente = Cache::remember('cliente_' . $id, now()->addMinutes(120), function () use ($id) {
            return DB::table('Socios')
                ->select('id', 'nome', 'apelido')
                ->where('id', '=', $id)
                ->get();
        });

        return $cliente;
    }
}
