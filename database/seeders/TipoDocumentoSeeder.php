<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TipoDocumentoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $documentos = ['Dissertacao', 'Monografia', 'ProgramaEduc', 'Tese'];

        for ($i = 0; $i < sizeof($documentos); $i++) {
            DB::table('tipo_documentos')->insert([
                'tipo' => $documentos[$i],
            ]);
        }
    }
}
