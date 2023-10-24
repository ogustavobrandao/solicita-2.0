<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ComplementarEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    private $pdf1, $pdf2;
    public function __construct($pdf1, $pdf2)
    {
        $this->pdf1 = $pdf1;
        $this->pdf2 = $pdf2;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('TESTE')->attachData($this->pdf1->output(), 'nome-do-arquivo.pdf')->attach($this->pdf2)->view('mails.processos.abertura_complementar');
    }
}
