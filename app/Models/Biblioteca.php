<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Biblioteca extends Model
{
    use HasFactory;
    use Notifiable;

    protected $fillable = ['nome'];

    /**
     * Route notifications for the mail channel.
     *
     * @return  array<string, string>|string
     */
    public function routeNotificationForMail($notification)
    {
        // Return email address only...
        $emails = [$this->email];
        if ($this->email_nada_consta != null) {
            $emails[] = $this->email_nada_consta;
        }
        return $emails;
    }
}
