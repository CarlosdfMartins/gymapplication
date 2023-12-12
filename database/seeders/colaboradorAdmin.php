<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\ServiceEnc\Enc;

class colaboradorAdmin extends Seeder
{
    /**
     * Run the database seeds.
     */
    protected $Enc;

    public function __construct()
    {
        $this->Enc = new Enc();
    }


    public function run(): void
    {
        DB::table('colaboradores')->insert([
            [
                'profile' => $this->Enc->encriptar('Administrador'),
                'nome' => $this->Enc->encriptar('Carlos'),
                'apelido' => $this->Enc->encriptar('Martins'),
                'email' => 'medjai_85@hotmail.com',
                'telefone' => $this->Enc->encriptar('911111111'),
                'password' => password_hash('AAAaaa111', PASSWORD_DEFAULT),
                'created_at' => date('Y-m-d H:i:s'),
            ]
        ]);
    }
}
