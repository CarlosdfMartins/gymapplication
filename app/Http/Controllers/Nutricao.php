<?php

namespace App\Http\Controllers;

use App\Mail\PlanNutricionMail;
use Illuminate\Support\Facades\Mail;
use App\Models\formPlanNutricion;
use Illuminate\Support\Facades\Cache;
use App\Models\NutricaoModel;
use App\Models\Socios;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class Nutricao extends Controller
{

    public function evolnutri($id)
    {

        $cliente = $this->getClienteDetails($id);

        $dados = NutricaoModel::where('socio_id', $id)->get()->toArray();

        $socioID = $id;


        return view('Nutricao.evolNutrie', ['socioID' => $socioID, 'dados' => $dados, 'cliente' =>  $cliente]);
    }


    public function planNutrie($id)
    {
        $cliente = DB::table('Socios')
            ->select('id', 'nome', 'apelido')
            ->where('id', '=', $id)
            ->get();

        $socioID = $id;

        return view('Nutricao.formPlanNutri', ['socioID' => $socioID, 'cliente' =>  $cliente]);
    }

    //========================================================================================================================

    public function storePlanNutrie(Request $request, $id)
    {
        $planNutri = new formPlanNutricion();
        $planNutri->hora_PA = $request->input('planTime1');
        $planNutri->pequeno_almoco = $request->input('pequeno_almoco');
        $planNutri->hora_1LM = $request->input('planTime2');
        $planNutri->laMati1 = $request->input('lancheMatinal');
        $planNutri->hora_2LM = $request->input('planTime3');
        $planNutri->laMati2 = $request->input('lancheMatinal2');
        $planNutri->hora_A = $request->input('planTime4');
        $planNutri->almoco = $request->input('almoco');
        $planNutri->hora_L1 = $request->input('planTime5');
        $planNutri->lanche1 = $request->input('lanche1');
        $planNutri->hora_L2 = $request->input('planTime6');
        $planNutri->lanche2 = $request->input('lanche2');
        $planNutri->hora_L3 = $request->input('planTime7');
        $planNutri->lanche3 = $request->input('lanche3');
        $planNutri->hora_JA = $request->input('planTime8');
        $planNutri->jantar = $request->input('jantar');
        $planNutri->hora_C = $request->input('planTime9');
        $planNutri->ceia = $request->input('ceia');
        $planNutri->socio_id = $id;
        $planNutri->save();

        $sendPlan = formPlanNutricion::where('socio_id', $id)->first();
        $socio = Socios::find($id);

        if ($sendPlan && $socio) {
         
            Mail::to($socio->email)->send(new PlanNutricionMail($sendPlan));


            return redirect()->route('app.nutriSearch', ['id' => $id]);
        }
    }
    public function dadosPlanNutrie($id)
    {
        $cliente = $this->getClienteDetails($id);

        $nutriPlanos = formPlanNutricion::where('socio_id', $id)->get();

        $socioID = $id;

        return view('nutricao.dataPlanNutri', ['socioID' => $socioID, 'nutriPlanos' => $nutriPlanos, 'cliente' =>  $cliente]);
    }
    //========================================================================================================================

    public function formNutrie($id)
    {
        $cliente = DB::table('Socios')
            ->select('id', 'nome', 'apelido')
            ->where('id', '=', $id)
            ->get();

        $socioID = $id;

        return view('formNutri', ['socioID' => $socioID, 'cliente' =>  $cliente]);
    }

    //========================================================================================================================

    public function storeFormNutri(Request $request, $id)
    {
        $bioNutri = new NutricaoModel();
        $bioNutri->peso_kg = $request->input('text_peso');
        $bioNutri->altura_cm = $request->input('text_altura');
        $bioNutri->IMC = $request->input('text_IMC');
        $bioNutri->m_Gorda_kg = $request->input('text_MassaGorda');
        $bioNutri->m_Gorda_Percen = $request->input('text_MGordaPERC');
        $bioNutri->m_Magra_kg = $request->input('text_MassaMagra');
        $bioNutri->m_Magra_Percen = $request->input('text_MMagraPERC');
        $bioNutri->ffm = $request->input('text_FFM');
        $bioNutri->TBW = $request->input('text_TBW');
        $bioNutri->Vis_Fat_R = $request->input('text_VisFatRating');
        $bioNutri->Peito = $request->input('text_Peito');
        $bioNutri->Abdomen = $request->input('text_Abdomen');
        $bioNutri->Anca = $request->input('text_Anca');
        $bioNutri->socio_id = $id;

        $bioNutri->save();

        return redirect()->route('app.nutriSearch', ['id' => $id, 'bioNutri' => $bioNutri]);
    }

    //========================================================================================================================

    public function formNutriSearch($id)
    {
        $nomeSocios = Socios::findOrFail($id);

        return view('nutricao.dadosNutri', [
            'nomeSocios' => $nomeSocios,
        ]);
    }

    //========================================================================================================================

    public function formNutriConsult(Request $request)
    {

        $nutSearch = $request->input('nutSearch');

        $nomeSocios = Socios::where('nome', 'like', "%$nutSearch%")
            ->orWhere('id', 'like', "%$nutSearch%")
            ->orWhere('apelido', 'like', "%$nutSearch%")
            ->orWhere('telefone', 'like', "%$nutSearch%")
            ->orWhere('email', 'like', "%$nutSearch%")
            ->orWhere('data_nascimento', 'like', "%$nutSearch%")
            ->get();

        return view('nutricao.searchNutri2', ['nomeSocios' => $nomeSocios]);
    }

    //========================================================================================================================

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

    //========================================================================================================================

    public function dadosBIO($id)
    {
        $cliente = $this->getClienteDetails($id);

        $biodados = NutricaoModel::where('socio_id', $id)->get();

        $socioID = $id;

        return view('nutricao.bioDATANutri', ['socioID' => $socioID, 'biodados' => $biodados, 'cliente' =>  $cliente]);
    }
}
