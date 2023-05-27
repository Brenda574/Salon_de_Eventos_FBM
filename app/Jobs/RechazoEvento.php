<?php

namespace App\Jobs;

use App\Mail\RechazoEventoMail;
use Illuminate\Bus\Queueable;
use App\Models\Usuario;
use App\Models\Evento;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class RechazoEvento implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    public $cliente;
    public $gerente;
    public $evento;
    public $descripcion;
    /**
     * Create a new job instance.
     */
    public function __construct(Usuario $cliente, Usuario $gerente, Evento $evento, $descripcion)
    {
        $this->cliente = $cliente;
        $this->gerente = $gerente;
        $this->evento = $evento;
        $this->descripcion = $descripcion;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {

        Mail::to($this->cliente->correo)->send(new RechazoEventoMail($this->cliente, $this->gerente, $this->evento, $this->descripcion));
    }
}
