<?php

namespace App\Http\Controllers;


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
        $id = decrypt($id);
        $profile = Session::get('profile');
        $nomeSocios = $id;

        return view('homeSocio', ['nomeSocios' => encrypt($nomeSocios),'profile'=>encrypt($profile)]);
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
