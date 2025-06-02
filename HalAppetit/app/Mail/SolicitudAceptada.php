<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SolicitudAceptada extends Mailable
{
    use Queueable, SerializesModels;

    public $solicitud;

    public function __construct($solicitud)
    {
        $this->solicitud = $solicitud;
    }

    public function build()
    {
        return $this->subject('Solicitud Aceptada - HalAppetit')
                    ->view('emails.respuesta_solicitud')
                    ->with([
                        'estado' => 'aceptada',
                        'mensaje' => 'Tu restaurante ha sido aceptado y será publicado pronto en HalAppetit.',
                    ]);
    }
}
