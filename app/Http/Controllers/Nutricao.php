<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Cache;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Mail\PlanNutricionMail;
use App\Models\formPlanNutricion;
use App\Models\NutricaoModel;
use App\Models\Socios;
use App\ServiceEnc\Enc;


class Nutricao extends Controller
{
    protected $Enc;

    public function __construct()
    {
        $this->Enc = new Enc();
    }
    //========================================================================================================================

    private function desencriptarSocio($socio)
    {
        $socio->nome = $this->Enc->desencriptar($socio->nome);
        $socio->apelido = $this->Enc->desencriptar($socio->apelido);
        $socio->telefone = $this->Enc->desencriptar($socio->telefone);


        return $socio;
    }
    //========================================================================================================================

    public function evolnutri($id)
    {

        $id = decrypt($id);

        $cliente = $this->getClienteDetails($id);

        $dados = NutricaoModel::where('socio_id', $id)->get()->toArray();

        $socioID = $id;


        return view('Nutricao.evolNutrie', ['socioID' => $socioID, 'dados' => $dados, 'cliente' =>  $cliente]);
    }
    //========================================================================================================================
    //======================================||  Nutrition Plan   ||===========================================================
    //========================================================================================================================

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


            return redirect()->route('app.nutriSearch', ['id' => encrypt($id)]);
        }
    }
    //========================================================================================================================

    public function selectPlanNutrie($id)
    {
        $id = decrypt($id);
        $cliente = $this->getClienteDetails($id);

        $nutriPlanos = formPlanNutricion::where('socio_id', $id)->get();
        $profile = Session::get('profile');
        $socioID = $id;

        return view('nutricao.selectPlanNutrie', ['socioID' => $socioID, 'nutriPlanos' => $nutriPlanos, 'cliente' =>  $cliente, 'profile' => $profile]);
    }
    //========================================================================================================================

    public function dadosPlanNutrie(Request $request, $id)
    {
        $id = decrypt($id);
        $planoId = $request->input('plano');
        $cliente = $this->getClienteDetails($id);

        $nutriPlanos = formPlanNutricion::where(['socio_id' => $id, 'id' => $planoId])->get();

        $socioID = $id;

        return view('nutricao.dataPlanNutri', ['socioID' => $socioID, 'nutriPlanos' => $nutriPlanos, 'cliente' =>  $cliente]);
    }
    //========================================================================================================================
    //======================================|| Biometric Data ||==============================================================
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
        $id = decrypt($id);

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

        return redirect()->route('app.nutriSearch', ['id' => encrypt($id), 'bioNutri' => encrypt($bioNutri)]);
    }
    //========================================================================================================================

    public function dadosBIO($id)
    {
        $id = decrypt($id);

        $cliente = $this->getClienteDetails($id);

        $biodados = NutricaoModel::where('socio_id', $id)->get();

        $socioID = $id;

        return view('nutricao.bioDATANutri', ['socioID' => $socioID, 'biodados' => $biodados, 'cliente' =>  $cliente]);
    }
    //========================================================================================================================
    //======================================|| Presents the Form with the Member's data ||====================================
    //========================================================================================================================

    public function formNutriSearch($id)
    {
        $id = decrypt($id);

        $profile = Session::get('profile');
        $nomeSocios = $this->desencriptarSocio(Socios::findOrFail($id));
        $nutri = $nomeSocios->nutri;
        $pTrain = $nomeSocios->pTrain;

        if ($pTrain) {
            $pTrain->nome = $this->Enc->desencriptar($pTrain->nome);
            $pTrain->apelido = $this->Enc->desencriptar($pTrain->apelido);
        }
        if ($nutri) {
            $nutri->nome = $this->Enc->desencriptar($nutri->nome);
            $nutri->apelido = $this->Enc->desencriptar($nutri->apelido);
        }
        return view('nutricao.dadosNutri', [
            'nomeSocios' => $nomeSocios,
            'profile' => $profile,
        ]);
    }
    //========================================================================================================================
    //===================|| Presents table of Members surveyed by PT and Nutritionist ||======================================
    //========================================================================================================================

    public function formNutriConsult(Request $request)
    {


        $nutSearch = $this->Enc->encriptar($request->input('nutSearch'));

        $cSearch = $this->Enc->desencriptar($nutSearch);

        if (empty($cSearch)) {
            $nomeSocios = Socios::all();

            $nomeSocios = $nomeSocios->map(function ($socio) {
                $socio->nome = $this->Enc->desencriptar($socio->nome);
                $socio->apelido = $this->Enc->desencriptar($socio->apelido);
                $socio->telefone = $this->Enc->desencriptar($socio->telefone);

                return $socio;
            });
            return view('nutricao.searchNutri2', ['nomeSocios' => $nomeSocios]);
        } else {
            $nomeSocios = Socios::where('nome', 'like', "%$nutSearch%")
                ->orWhere('id', 'like', "%$nutSearch%")
                ->orWhere('apelido', 'like', "%$nutSearch%")
                ->orWhere('telefone', 'like', "%$nutSearch%")
                ->orWhere('email', 'like', "%$nutSearch%")
                ->orWhere('data_nascimento', 'like', "%$nutSearch%")
                ->get();

            if (!$nutSearch) {
                return view('nutricao.searchNutri2')->with('message', 'Nenhum perfil encontrado.');
            }
            $nomeSocios = $nomeSocios->map(function ($socio) {
                $socio->nome = $this->Enc->desencriptar($socio->nome);
                $socio->apelido = $this->Enc->desencriptar($socio->apelido);
                $socio->telefone = $this->Enc->desencriptar($socio->telefone);

                return $socio;
            });
        }


        return view('nutricao.searchNutri2', ['nomeSocios' => $nomeSocios]);
    }
    //========================================================================================================================

    public function nutriSocio($id)
    {
        $nomeSocios = $id;
        return redirect()->Route('app.selectPlanNutrie', ['id' => $nomeSocios]);
    }
    //========================================================================================================================

    public function trainSocio($id)
    {
        $nomeSocios = $id;

        return redirect()->route('app.selectPlantrainer', ['id' => $nomeSocios]);
    }
    //========================================================================================================================

    public function evolBio($id)
    {
        $nomeSocios = $id;

        return view('evolBio', ['nomeSocios' => $nomeSocios]);
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

}
