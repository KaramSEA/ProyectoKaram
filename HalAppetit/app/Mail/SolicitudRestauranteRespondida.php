<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SolicitudRestauranteRespondida extends Mailable
{
    use Queueable, SerializesModels;

    public $estado;
    public $mensaje;

    public function __construct($estado, $mensaje)
    {
        $this->estado = $estado;
        $this->mensaje = $mensaje;
    }

    public function build()
    {
        return $this->subject('Respuesta a tu solicitud en HalAppetit')
                    ->view('emails.respuesta_solicitud');
    }
}
