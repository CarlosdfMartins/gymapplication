<?php

namespace App\Http\Controllers;

use App\Models\Socios;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;


class Admin extends Controller
{
    public function principalAdmin()
    {
        return view('home');
    }
    //========================================================================================================================

    public function home()
    {
        $profile = Session::get('profile');

        return view('home', ['profile' => encrypt($profile)]);
    }
    //========================================================================================================================

    public function homeSocio($id)
    {
        $nomeSocios = $id;

        return view('homeSocio', ['nomeSocios' => $nomeSocios]);
    }
    //========================================================================================================================

    public function logOut()
    {
        session()->forget('email');
        return redirect()->route('login');
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
}
