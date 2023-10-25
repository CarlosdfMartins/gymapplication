<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\PasswordReset;
use App\Mail\email_define_password;
use Illuminate\Support\Str;
use App\Models\Socios;
use App\Models\Colaboradores;


class ResetPass extends Controller
{

    public function showForgotPasswordForm()
    {
        return view('emails.showForgotPasswordForm');
    }


    public function generateNewToken(Request $request)
    {

        $email = $request->input('email');
        $socio = Socios::where('email', $email)->first();
        $colaborador_id = null;
        $socio_id = null;

        if (!$socio) {
            $colaborador = Colaboradores::where('email', $email)->first();

            if (!$colaborador) {
                $error = 'E-mail não encontrado. Por favor intoduza um e-mail válido';
                return redirect()->route('login')->with('error', $error);
            }
            $colaborador_id = $colaborador->id;
            $name = $colaborador->nome;
            $apelido = $colaborador->apelido;
        } else {
            $socio_id = $socio->id;
            $name = $socio->nome;
            $apelido = $socio->apelido;
        }

        $token = Str::random(64);

        $definePass = new PasswordReset();
        $definePass->token = $token;
        $definePass->email = $email;
        $definePass->colaborador_id = $colaborador_id;
        $definePass->socio_id = $socio_id;
        $definePass->expires_at = now()->addHours(48);
        $definePass->save();


        Mail::to($email)->send(new email_define_password(encrypt($token), $name, $apelido));

        return redirect()->route('login');
    }


    public function reset($token)
    {
        $token = decrypt($token);

        return view('emails.definePass', ['token' => $token]);
    }
    //========================================================================================================================

    public function definePass(Request $request)
    {

        $token = $request->route('token');

        $tokenVal = PasswordReset::where('token', $token)
            ->where('expires_at', '>', now())
            ->first();


        if (!$tokenVal) {
            return $request->validate([
                'token' => 'required'
            ]);
        }


        //validation

        $request->validate([
            'password' => 'required|string|min:8|confirmed|regex:/^(?=.*[A-Z])(?=.*\d)/'
        ], [
            'Password.required' => 'Necessário preencher a senha.',
            'Password.string' => 'A senha deve ser uma string.',
            'Password.min' => 'A senha deve ter pelo menos :min caracteres.',
            'Password.confirmed' => 'As senhas inseridas devem ser iguais.',
            'Password.regex' => 'A senha deve conter pelo menos um caractere maiúsculo e um número.'

        ]);

        DB::table('socios')
            ->where('id', $tokenVal->socio_id)
            ->update(['password' => bcrypt($request->input('password'))]);


        DB::table('colaboradores')
            ->where('id', $tokenVal->colaborador_id)
            ->update(['password' => bcrypt($request->input('password'))]);

        $tokenVal->update([
            'expires_at' => now(),
        ]);


        return redirect()->route('login');
    }
    //========================================================================================================================
}
