<?php

namespace Database\Seeders;

use App\Models\Unidade;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NovosCursosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $unidade_id = Unidade::where('nome', 'UFAPE - SEDE (Unidade Acadêmica de Garanhuns)')->first()->id;

        $cursos = [
            [
                'nome' => '(Mestrado) Ciências Ambientais',
                'unidade_id' => $unidade_id,
            ],
            [
                'nome' => '(Mestrado) Ciência Animal e Pastagens',
                'unidade_id' => $unidade_id,
            ],
            [
                'nome' => '(Mestrado) Produção Agrícola',
                'unidade_id' => $unidade_id,
            ],
            [
                'nome' => '(Mestrado) Profissional em Letras',
                'unidade_id' => $unidade_id,
            ],
            [
                'nome' => '(Mestrado) Sanidade e Reprodução de Animais de Produção',
                'unidade_id' => $unidade_id,
            ],
        ];

        DB::table('cursos')->insert($cursos);
    }
}
