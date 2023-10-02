<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Cache;
use App\Models\NutricaoModel;
use App\Models\Socios;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class Nutricao extends Controller
{
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

        return redirect()->route('app.home', ['id' => $id]);
    }

//========================================================================================================================

    public function formNutriSearch($id)
    {
        $nomeSocios = Socios::findOrFail($id);

        return view('nutricao.dadosNutri', ['nomeSocios' => $nomeSocios]);
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

        return view('nutricao.bioDATANutri', ['biodados' => $biodados, 'cliente' =>  $cliente]);
    }
}
