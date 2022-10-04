<?php

namespace Database\Seeders;

use App\Models\Curso;
use App\Models\Perfil;
use Illuminate\Database\Seeder;

class AtualizaCursosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Curso::where('nome', 'Agronomia')->update(['nome' => '(Graduação) Bacharelado em Agronomia']);
        Curso::where('nome', 'Bacharelado em Ciência da Computação')->update(['nome' => '(Graduação) Bacharelado em Ciência da Computação']);
        Curso::where('nome', 'Engenharia de Alimentos')->update(['nome' => '(Graduação) Bacharelado em Engenharia de Alimentos']);
        Curso::where('nome', 'Licenciatura em Letras')->update(['nome' => '(Graduação) Licenciatura em Letras']);
        Curso::where('nome', 'Licenciatura em Pedagogia')->update(['nome' => '(Graduação) Licenciatura em Pedagogia']);
        Curso::where('nome', 'Medicina Veterinária')->update(['nome' => '(Graduação) Bacharelado em Medicina Veterinária']);
        Curso::where('nome', 'Zootecnia')->update(['nome' => '(Graduação) Bacharelado em Zootecnia']);

        Perfil::where('default', 'Agronomia')->update(['default' => '(Graduação) Bacharelado em Agronomia']);
        Perfil::where('default', 'Bacharelado em Ciência da Computação')->update(['default' => '(Graduação) Bacharelado em Ciência da Computação']);
        Perfil::where('default', 'Engenharia de Alimentos')->update(['default' => '(Graduação) Bacharelado em Engenharia de Alimentos']);
        Perfil::where('default', 'Licenciatura em Letras')->update(['default' => '(Graduação) Licenciatura em Letras']);
        Perfil::where('default', 'Licenciatura em Pedagogia')->update(['default' => '(Graduação) Licenciatura em Pedagogia']);
        Perfil::where('default', 'Medicina Veterinária')->update(['default' => '(Graduação) Bacharelado em Medicina Veterinária']);
        Perfil::where('default', 'Zootecnia')->update(['default' => '(Graduação) Bacharelado em Zootecnia']);
    }
}
