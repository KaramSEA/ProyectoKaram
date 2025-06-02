<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NuevoRestauranteNotificacion extends Notification
{
    public $restaurante;

    public function __construct($restaurante)
    {
        $this->restaurante = $restaurante;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Nuevo restaurante publicado: ' . $this->restaurante->nombre)
            ->greeting('¡Hola!')
            ->line('Se ha añadido un nuevo restaurante a HalAppetit:')
            ->line('📍 ' . $this->restaurante->nombre)
            ->line('📍 Dirección: ' . $this->restaurante->direccion)
            ->line('🍽️ Tipo de comida: ' . $this->restaurante->tipo_comida)
            ->action('Ver Restaurante', url('/restaurantes/' . $this->restaurante->slug))
            ->line('Gracias por confiar en HalAppetit.');
    }
}
