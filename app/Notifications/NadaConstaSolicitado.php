<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NadaConstaSolicitado extends Notification
{
    use Queueable;

    public $dicente;
    public $unidade;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($discente, $unidade)
    {
        $this->discente = $discente;
        $this->unidade = $unidade;
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
            ->subject('Comprovante de nada consta solicitado')
            ->markdown('mails.nada_consta_solicitado', ['biblioteca' => $notifiable->nome, 'discente' => $this->discente->name, 'unidade' => $this->unidade->nome]);
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
