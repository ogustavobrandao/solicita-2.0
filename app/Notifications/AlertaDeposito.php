<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class AlertaDeposito extends Notification
{
    use Queueable;

    public $documentoRequisitado;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($documento)
    {
        $this->documento = $documento;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Declaração de depósito')
            ->markdown('mails.alerta_deposito', ['status' => $this->documento->status, 'discente' => $notifiable->name, 'justificativa' => $this->documento->anotacoes]);
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
