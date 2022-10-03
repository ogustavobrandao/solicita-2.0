<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([

          'name'=>'Administrador',
          'email'=>'admin@admin.com',
          'password'=>Hash::make('12345678'),
          'tipo'=>'administrador',
          'email_verified_at'=>'2020-01-01'
        ]);


        DB::table('users')->insert([

          'name'=>'aluno',
          'email'=>'aluno@aluno.com',
          'password'=>Hash::make('12345678'),
          'tipo'=>'aluno',
            'email_verified_at'=>'2020-01-01'
        ]);

        DB::table('users')->insert([

            'name'=>'servidor',
            'email'=>'servidor@servidor.com',
            'password'=>Hash::make('12345678'),
            'tipo'=>'servidor',
            'email_verified_at'=>'2020-01-01'
        ]);

        DB::table('users')->insert([

          'name'=>'bibliotecario UFAPE',
          'email'=>'bibliotecario@bibliotecario.com',
          'password'=>Hash::make('12345678'),
          'tipo'=>'bibliotecario',
          'email_verified_at'=>'2020-01-01'
        ]);

        DB::table('users')->insert([

          'name'=>'bibliotecario UPE',
          'email'=>'bibliotecarioupe@bibliotecarioupe.com',
          'password'=>Hash::make('123456'),
          'tipo'=>'bibliotecario',
          'email_verified_at'=>'2020-01-01'
        ]);
    }
}
