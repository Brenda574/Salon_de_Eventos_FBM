<?php

namespace App\Mail;

use App\Models\Evento;
use App\Models\Usuario;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ConfirmacionEventoMail extends Mailable
{
    use Queueable, SerializesModels;

    public $cliente;
    public $gerente;
    public $evento;

    /**
     * Create a new message instance.
     */
    public function __construct(Usuario $cliente, Usuario $gerente, Evento $evento)
    {
        $this->cliente = $cliente;
        $this->gerente = $gerente;
        $this->evento = $evento;
    }

    /**
     * Build the message.
     */
    public function build()
    {
        return $this->markdown('emails.confirmacion')
            ->subject('Confirmación de Evento');
    }
}
