<?php

namespace App\Notifications;

use App\Models\Carta;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class CartaSubidaNotification extends Notification
{

    public $carta;

    public function __construct(Carta $carta)
    {
        $this->carta = $carta;
    }

    public function via($notifiable)
    {
        return ['database']; // También puedes añadir 'mail'
    }

    public function toDatabase($notifiable)
    {
        return [
            'mensaje' => 'El restaurante ' . $this->carta->restaurante->nombre . ' ha subido una nueva carta o promoción.',
            'restaurante_id' => $this->carta->restaurante->id,
            'restaurante_slug' => $this->carta->restaurante->slug,
        ];
    }

    // Opcional si quieres notificación por email
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Nueva carta o promoción en tu restaurante favorito')
            ->line('El restaurante ' . $this->carta->restaurante->nombre . ' ha subido una nueva carta.')
            ->action('Ver restaurante', route('restaurantes.show', $this->carta->restaurante->slug));
    }
}
