<?php

namespace App\Mail;

use App\Models\Unidade;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AlertaFichaMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    private $usuarioBibliotecario;
    private $usuarioSolicitante;
    private $unidade;

    public function __construct(User $usuarioBibliotecario, User $usuarioSolicitante, $unidade)
    {
        $this->usuarioBibliotecario = $usuarioBibliotecario;
        $this->usuarioSolicitante = $usuarioSolicitante;
        $this->unidade = $unidade;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $usuarioBibliotecario = $this->usuarioBibliotecario;
        $usuarioSolicitante = $this->usuarioSolicitante;
        $unidade = $this->unidade;
        $this->subject("Alerta ficha catalográfica");
        $this->to($usuarioBibliotecario->email, $usuarioBibliotecario->name);
        return $this->markdown('mails.alerta_ficha', compact("usuarioSolicitante","usuarioBibliotecario", 'unidade'));
    }
}
