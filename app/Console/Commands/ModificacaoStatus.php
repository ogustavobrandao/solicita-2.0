<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class ModificacaoStatus extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'Modificacao:status';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = "Modifica de 'Concluído - Disponível para retirada' para 'Concluído'";

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        DB::table('requisicao_documentos')->where('status','Concluído - Disponível para retirada')->update(['status'=> 'Concluído']);
        
        return 0;
    }
}
