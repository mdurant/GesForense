<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\HtmlString;

class TwoFactorCode extends Notification
{
    use Queueable;

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
                    ->subject('[Codigo 2FA - Licrim]')
                    ->greeting('Hello '. $notifiable->name)
                    ->line('Un intento de inicio de sesión en nuestras plataformas requiere una verificación adicional.')
                    ->line('Para completar el inicio de sesión, introduzca el código de verificación en el portal de acceso.')
                    ->line(new HtmlString('<strong> <h1>'.$notifiable->two_factor_code.'</strong></h1>'))
                    ->line('Fecha: '.now()->format('d-m-Y'). ' /  Hora: ' .now()->format('H:i:s'))
                    ->line('Este código expira en 10 minutos.')
                    ->line('Si no ha intentado iniciar sesión, ignore este mensaje');
    }
}
