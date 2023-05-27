<?php

namespace App\Jobs;


use Illuminate\Bus\Queueable;
use App\Mail\confirmacionEventoMail;
use App\Models\Usuario;
use App\Models\Evento;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class AutorizarEvento implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    public $cliente;
    public $gerente;
    public $evento;
    /**
     * Create a new job instance.
     */
    public function __construct(Usuario $cliente, Usuario $gerente, Evento $evento)
    {
        $this->cliente = $cliente;
        $this->gerente = $gerente;
        $this->evento = $evento;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {

        Mail::to($this->cliente->correo)->send(new ConfirmacionEventoMail($this->cliente, $this->gerente, $this->evento));
    }
}
