<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Colaboradores;
use App\Models\Socios;

class Main extends Controller
{
    public function index()
    {
        return view('index');
    }

    //==============================================================================

    public function login(Request $request)
    {

        // validations error rules

        $erro = '';

        if ($request->get('erro') == 1) {
            $erro = 'pass ou user invalidos';
        }

        if ($request->get('erro') == 2) {
            $erro = 'É preciso fazer login para aceder a essa rota';
        }

        return view('login', ['erro' => $erro]);
    }

    //==============================================================================

    public function confirmation(Request $request)
    {

        //validation rules
        $regras = [
            'user' => 'email',
            'pass' => 'required',
        ];

        //validation feedback message
        $feedback = [
            'user.email' => 'preenchimento obrigatório do email',
            'pass.required' => 'preenchimento obrigatório da password',
        ];

        $request->validate($regras, $feedback);

        // retrieve login form parameters
        $email = $request->input('user');
        $password = $request->input('pass');

        $socio = Socios::where('email', $email)->first();
        $colaborador = Colaboradores::whereIn('profile', ['Nutricionista', 'Personal Trainer', 'Administrador'])
            ->where('email', $email)
            ->first();

        if ($socio && $password === $socio->password) {
            session_start();
            $_SESSION['nome'] = $socio->nome;
            $_SESSION['email'] = $socio->email;
            return redirect()->route('app.admin');
        } elseif ($colaborador && $password === $colaborador->password) {
            session_start();
            $_SESSION['nome'] = $colaborador->nome;
            $_SESSION['email'] = $colaborador->email;
            return redirect()->route('app.admin');
        } else {
            return redirect()->route('login', ['erro' => 1]);
        }
    }

    //==============================================================================

    public function nutri()
    {
        return view('nutri');
    }

    //==============================================================================

    public function train()
    {
        return view('train');
    }

    //==============================================================================
    
    public function evol()
    {
        return view('evol');
    }

    //==============================================================================

}
