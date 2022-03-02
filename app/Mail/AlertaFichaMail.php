<?php

namespace App\Mail;

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

    public function __construct(User $usuarioBibliotecario, User $usuarioSolicitante)
    {
        $this->usuarioBibliotecario = $usuarioBibliotecario;
        $this->usuarioSolicitante = $usuarioSolicitante;
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
        $this->subject("Alerta ficha catalográfica");
        $this->to($usuarioBibliotecario->email, $usuarioBibliotecario->name);
        return $this->markdown('mails.alerta_ficha', compact("usuarioSolicitante","usuarioBibliotecario"));
    }
}
