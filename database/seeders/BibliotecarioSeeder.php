<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BibliotecarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user_id = DB::table('users')->where('name', 'bibliotecario UFAPE')->pluck('id');
        DB::table('bibliotecarios')->insert([
            'matricula' => '12345678900',
            'crb' => 'CRB123',
            'user_id' => $user_id[0],
            'biblioteca_id' => 2,
        ]);

        $user_id = DB::table('users')->where('name', 'bibliotecario UPE')->pluck('id');
        DB::table('bibliotecarios')->insert([
            'matricula' => '12345678912',
            'crb' => 'CRB',
            'user_id' => $user_id[0],
            'biblioteca_id' => 1,
        ]);
    }
}
