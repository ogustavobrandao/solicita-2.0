<?php

namespace App\Console\Commands;

use App\Models\Aluno;
use Illuminate\Console\Command;

class cpfSemPontuacao extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'cpf:numero';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
        $alunos = Aluno::all();

        foreach($alunos as $aluno){
            if(!Aluno::where('cpf', str_replace(['.','-'], '', $aluno->cpf))->first()){
                $aluno->update(['cpf' => str_replace(['.','-'], '', $aluno->cpf)]);
            }
        }
    }
}
