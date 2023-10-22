<?php

namespace App\Http\Controllers;


use App\Mail\PlanPersonalTrain;
use Illuminate\Support\Facades\Mail;
use App\Models\Socios;
use App\Models\Exercise;
use App\Models\TrainPlan;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;

class PersonalTrainerContr extends Controller
{
    public function planTrain($id)
    {
        $id = decrypt($id);

        $socioID = $id;
        $planoTreino = new TrainPlan();
        $planoTreino->socio_id = $socioID;
        $planoTreino->save();

        $sendPlan = Exercise::where('socio_id', $id)->get();
        $socio = Socios::find($id);

        if ($sendPlan && $socio) {
            Mail::to($socio->email)->send(new PlanPersonalTrain($planoTreino));
        }

        return redirect()->route('app.morePlanTrain', ['id' => encrypt($socioID), 'plan_ID' =>$planoTreino->id]);
    }


    public function morePlanTrain($id, $plan_ID)
    {

        $id = decrypt($id);

        $socioID = $id;

        $planoTreino = TrainPlan::find($plan_ID);
        $nomeSocios = Socios::findOrFail($id);
        $cliente = DB::table('socios')
            ->select('id', 'nome', 'apelido')
            ->where('id', '=', $id)
            ->get();

        return view('PersonalTrain.formPlanPT', ['id' => encrypt($socioID), 'nomeSocios' => $nomeSocios, 'cliente' => $cliente, 'plan_ID' => $planoTreino]);
    }


    public function storePlanTrain(Request $request, $id, $plan_ID)
    {
        $id = decrypt($id);
        $id = decrypt($id);

        $plan_ID = $plan_ID;

        $ultimoIDTreino = Exercise::max('id_treino');
        $proximoIDTreino = $ultimoIDTreino + 1;

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
            $exercicioAtual->id_treino = $proximoIDTreino;
            $exercicioAtual->exercicio = $exercicio;
            $exercicioAtual->series = $series[$key];
            $exercicioAtual->reps = $reps[$key];
            $exercicioAtual->CAD = $CADs[$key];
            $exercicioAtual->intense = $ints[$key];
            $exercicioAtual->pausa = $pausas[$key];
            $exercicioAtual->OBS = $OBSs[$key];
            $exercicioAtual->train_plan_id = $plan_ID;
            $exercicioAtual->socio_id = $id;
            $exercicioAtual->save();
        }

        return redirect()->route('app.morePlanTrain', ['id' => encrypt($id), 'plan_ID' => $plan_ID]);
    }


    public function dadosPlanTrain($id)
    {
        $id = decrypt($id);
        $socioID = $id;

        $planoID = request()->input('exercicio');
        $exercicios = Exercise::where('train_plan_id', $planoID)->get();

        return view('PersonalTrain.dataPlanTrain', ['exercicios' => $exercicios, 'socioID' => $socioID]);
    }


    public function selectPlantrainer($id)
    {
        $id = decrypt($id);

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
