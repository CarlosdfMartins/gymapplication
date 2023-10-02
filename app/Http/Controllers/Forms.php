<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

use App\Mail\email_define_password;
use App\Models\Socios;
use App\Models\Colaboradores;
use App\Models\PasswordReset;


class Forms extends Controller
{
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

        Mail::to($person->email)->send(new email_define_password($token, $name));


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

        return view('consultClient', [
            'socios' => $socios,
        ]);
    }
}
