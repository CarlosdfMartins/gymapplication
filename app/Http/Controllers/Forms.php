<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\Mail\email_define_password;
use App\Models\Socios;
use App\Models\Colaboradores;
use App\Models\PasswordReset;
use App\Models\Exercise;
use App\Models\formPlanNutricion;



class Forms extends Controller
{
    use SoftDeletes;

    public function __construct()
    {
        $this->middleware('log.App');
    }
    //========================================================================================================================

    public function frm()
    {
        $nutricionistas = DB::table('colaboradores')
            ->select('id', 'nome', 'apelido')
            ->where('profile', 'Nutricionista')
            ->get();

        $personalTrainer = DB::table('colaboradores')
            ->select('id', 'nome', 'apelido')
            ->where('profile', 'Personal Trainer')
            ->get();

        return view('form', [
            'nutricionistas' => $nutricionistas,
            'personalTrainers' => $personalTrainer
        ]);
    }
    //========================================================================================================================

    public function sendForm(Request $request)
    {
        $request->validate([
            'text-name' => 'required|min:2|max:50',
            'text-apelido' => 'required|min:2|max:50',
            'text-phone' => 'required',
            'text-email' => 'email',
            'sexo' => 'required',
            'text-birthdate' => 'required',
            'text-profile' => 'required',
        ], [
            'text-name.required' => 'preenchimento obrigatório de nome',
            'text-name.min' => 'nome deve ter no mínimo 2 caracteres',
            'text-name.max' => 'nome deve ter no máximo 50 caracteres',
            'text-apelido.required' => 'preenchimento obrigatório do apelido',
            'text-apelido.min' => 'apelido deve ter no mínimo 2 caracteres',
            'text-apelido.max' => 'apelido deve ter no máximo 50 caracteres',
            'text-phone.required' => 'preenchimento obrigatório do telefone',
            'text-email.email' => 'preenchimento obrigatório do email',
            'sexo.required' => 'preenchimento obrigatório do sexo',
            'text-birthdate.required' => 'preenchimento obrigatório da data Nascimento',
            'text-profile.required' => 'preenchimento obrigatório do perfil.',
        ]);

        $passRandom = Str::random(8);
        $token = Str::random(64);
        $profile = $request->input('text-profile');

        if ($profile === 'Socio') {
            $person = new Socios();
            $person->NUT_id = $request->input('nutri');
            $person->PT_id = $request->input('ptrainer');
        } elseif (in_array($profile, ['Nutricionista', 'Personal Trainer', 'Administrador'])) {
            $person = new Colaboradores();
        }

        if ($person) {
            $person->nome = $request->input('text-name');
            $person->apelido = $request->input('text-apelido');
            $person->telefone = $request->input('text-phone');
            $person->password = $passRandom;
            $person->profile = $request->input('text-profile');
            $person->email = $request->input('text-email');
            $person->sexo = $request->input('sexo');
            $person->data_nascimento = $request->input('text-birthdate');

            if ($profile === 'Socio') {
                $person->save();
            } else {
                $person->save();
            }
        }

        $definePass = new PasswordReset();
        $definePass->email = $request->input('text-email');
        $definePass->token = $token;
        $definePass->expires_at = now()->addHours(48);

        // Define o relacionamento com base no perfil
        if ($profile === 'Socio') {
            $definePass->socio_id = $person->id;
        } elseif (in_array($profile, ['Nutricionista', 'Personal Trainer', 'Administrador'])) {
            $definePass->colaborador_id = $person->id;
        }

        $definePass->save();

        $name = $request->input('text-name');
        $apelido = $request->input('text-apelido');

        Mail::to($person->email)->send(new email_define_password($token, $name, $apelido));


        return view('home');
    }
    //========================================================================================================================

    public function search()
    {
        return view('searchFile');
    }
    //========================================================================================================================

    public function consult(Request $request)
    {
        $search = $request->input('search');

        $socios = Socios::where('nome', 'like', "%$search%")
            ->orWhere('id', 'like', "%$search%")
            ->orWhere('email', 'like', "%$search%")
            ->orWhere('apelido', 'like', "%$search%")
            ->orWhere('telefone', 'like', "%$search%")
            ->orWhere('data_nascimento', 'like', "%$search%")
            ->get();

        if ($socios->isEmpty()) {
            return view('consultClient')->with('message', 'Nenhum perfil encontrado.');
        }

        return view('consultClient', ['socios' => $socios]);
    }
    //========================================================================================================================

    public function pesquiCola()
    {
        return view('pesquiCola');
    }
    //========================================================================================================================

    public function searchCola($id)
    {
        $colaboradores = Colaboradores::findOrFail($id);

        return view('dadosCola', [
            'colaboradores' => $colaboradores,

        ]);
    }
    //========================================================================================================================

    public function consultColabor(Request $request)
    {
        $search = $request->input('searchColabor');

        $colaboradores = Colaboradores::where('nome', 'like', "%$search%")
            ->orWhere('id', 'like', "%$search%")
            ->orWhere('email', 'like', "%$search%")
            ->orWhere('apelido', 'like', "%$search%")
            ->orWhere('telefone', 'like', "%$search%")
            ->orWhere('data_nascimento', 'like', "%$search%")
            ->orWhere('profile', 'like', "%$search%")
            ->get();

        if ($colaboradores->isEmpty()) {
            return view('consultCola')->with('message', 'Nenhum perfil encontrado.');
        }

        return view('consultCola', ['colaboradores' => $colaboradores]);
    }
    //========================================================================================================================

    public function menuEdit($profile, $id)
    {
        $profile = $profile;
        $id = $id;

        return view('menuEdit', ['profile' => $profile, 'id' => $id]);
    }
    //========================================================================================================================

    public function editTreino($profile, $id)
    {
        $profile = $profile;
        $id = $id;

        return view('editTreino', ['profile' => $profile, 'id' => $id]);
    }
    //========================================================================================================================

    public function editNutricao(Request $request, $profile, $id)
    {
        $profile = $profile;
        $id = $id;

        $planosNutricionais = formPlanNutricion::where('socio_id', $id)->get();

        $plano_id = $request->input('plano_id');


        if ($plano_id) {
            $dados = formPlanNutricion::find($plano_id);
        } else {
            $dados = $planosNutricionais->first();
        }
        return view('editNutricao', compact('profile', 'id', 'dados', 'planosNutricionais'));
    }

    //========================================================================================================================

    public function edit($profile, $id)
    {

        if ($profile === 'Socio') {
            $dados = Socios::find($id);
            return view('editSocio', compact('profile', 'dados'));
        } elseif (in_array($profile, ['Nutricionista', 'Personal Trainer', 'Administrador'])) {
            $dados = Colaboradores::find($id);
            return view('editColabor', compact('profile', 'dados'));
        } else {
            abort(404);
        }
    }
    //========================================================================================================================

    public function updatePNutricao(Request $request, $profile, $id){


        $dadosPNutricional = $request->only(['hora_PA', 'pequeno_almoco', 'hora_1LM', 'laMati1', 'hora_2LM', 'laMati2',
        'hora_A', 'almoco', 'hora_L1', 'lanche1', 'hora_L2', 'lanche2', 'hora_L3', 'lanche3',
        'hora_JA', 'jantar', 'hora_C', 'ceia']);

        $planoNutricional = formPlanNutricion::find($id);
        $planoNutricional->update($dadosPNutricional);



        return view('Nutri', ['profile' => $profile, 'id' => $id]);


    }



    public function update(Request $request, $profile, $id)
    {
        $request->validate([
            'nome' => 'string|max:200',
            'email' => 'email',
            'telefone' => 'string|max:20',
            'sexo' => 'in:H,M',
            'data_nascimento' => 'date',
            'apelido' => 'string|max:50',

        ]);

        $dadosAtualizados = $request->only(['nome', 'email', 'telefone', 'sexo', 'data_nascimento', 'apelido', 'profile']);


        if ($profile === 'Socio') {
            $socio = Socios::find($id);
            $socio->update($dadosAtualizados);
            return view('Nutricao.dadosNutri', ['profile' => $profile, 'nomeSocios' => $socio]);
        } elseif (in_array($profile, ['Nutricionista', 'Personal Trainer', 'Administrador'])) {
            $colaborador = Colaboradores::find($id);
            $colaborador->update($dadosAtualizados);
            return view('dadosCola', ['profile' => $profile, 'colaboradores' => $colaborador]);
        }
    }
    //========================================================================================================================

    public function delete($id)
    {
        $colaborador = Colaboradores::find($id);
        $socio = Socios::find($id);

        if ($socio) {
            $socio->delete();
            return redirect()->route('app.formSearch')->with('success', 'Socio removido com sucesso.');
        } elseif ($colaborador) {
            $colaborador->delete();
            return redirect()->route('app.pesquiCola')->with('success', 'Colaborador removido com sucesso.');
        } elseif (!$socio) {
            return redirect()->route('app.formSearch')->with('error', 'Registro não encontrado.');
        } else {
            return redirect()->route('app.pesquiCola')->with('error', 'Registro não encontrado.');
        }
    }
    //========================================================================================================================
}
