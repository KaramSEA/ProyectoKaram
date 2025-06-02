<?php

namespace App\Mail;

use App\Models\SolicitudRestaurante;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RespuestaSolicitudHalal extends Mailable
{
    use Queueable, SerializesModels;

    public $solicitud;

    public function __construct(SolicitudRestaurante $solicitud)
    {
        $this->solicitud = $solicitud;
    }

    public function build()
    {
        return $this->subject('Respuesta a tu solicitud HalalAppetit')
                    ->view('emails.respuesta_solicitud');
    }
}
