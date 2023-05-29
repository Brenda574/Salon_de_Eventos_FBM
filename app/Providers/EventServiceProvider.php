<?php

namespace App\Providers;

use App\Models\Paquete;
use App\Models\Servicio;
use App\Models\Usuario;
use App\Models\Evento;
use App\Models\Abono;
use App\Models\Gasto;
use App\Models\ImagenPaquete;
use App\Models\Imagen;
use App\Models\ImagenServicio;
use App\Observers\ObserverUsuario;
use App\Observers\ObserverPaquete;
use App\Observers\ObserverServicio;
use App\Observers\ObserverEvento;
use App\Observers\ObserverAbono;
use App\Observers\ObserverGasto;
use App\Observers\ObserverImagenPaquete;
use App\Observers\ObserverImagen;
use App\Observers\ObserverImagenServicio;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
    ];

    /**
     * Register any events for your application.
     */
    public function boot(): void
    {
        Usuario::observe(ObserverUsuario::class);
        Evento::observe(ObserverEvento::class);
        Paquete::observe(ObserverPaquete::class);
        Abono::observe(ObserverAbono::class);
        Servicio::observe(ObserverServicio::class);
        Imagen::observe(ObserverImagen::class);
        ImagenPaquete::observe(ObserverImagenPaquete::class);
        ImagenServicio::observe(ObserverImagenServicio::class);
        Gasto::observe(ObserverGasto::class);
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     */
    public function shouldDiscoverEvents(): bool
    {
        return false;
    }
}
