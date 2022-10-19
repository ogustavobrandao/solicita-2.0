<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class AlertaNadaConsta extends Notification
{
    use Queueable;

    protected $status;

    protected $anotacoes;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($status, $anotacoes)
    {
        $this->status = $status;
        $this->anotacoes = $anotacoes;
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
            ->subject('Declaração de nada consta')
            ->markdown('mails.alerta_nada_consta', ['status' => $this->status, 'discente' => $notifiable->name, 'justificativa' => $this->anotacoes]);
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
