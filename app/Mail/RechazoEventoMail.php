<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use App\Models\Evento;
use App\Models\Usuario;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class RechazoEventoMail extends Mailable
{
    use Queueable, SerializesModels;

    public $cliente;
    public $gerente;
    public $evento;
    public $descripcion;

    /**
     * Create a new message instance.
     */
    public function __construct(Usuario $cliente, Usuario $gerente, Evento $evento, $descripcion)
    {
        $this->cliente = $cliente;
        $this->gerente = $gerente;
        $this->evento = $evento;
        $this->descripcion = $descripcion;
    }

    /**
     * Build the message.
     */
    public function build()
    {
        return $this->markdown('emails.rechazo')
            ->subject('Rechazo de Evento');
    }
}
