<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BibliotecaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('bibliotecas')->insert([
            'nome'=> 'Biblioteca UPE',
            'unidade_id' => 2,
        ]);

        DB::table('bibliotecas')->insert([
            'nome'=> 'Biblioteca UFAPE',
            'unidade_id' => 1,
        ]);
    }
}
