<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SolicitudRechazada extends Mailable
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
                        'estado' => 'rechazada',
                        'mensaje' => 'Lamentamos informarte que tu solicitud ha sido rechazada.',
                    ]);
    }
}
