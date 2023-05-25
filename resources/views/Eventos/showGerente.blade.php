@extends('plantilla.layout')

@section('usuario')
    <li><a class="nav-link" href="{{ route('sistema.gerente') }}">Inicio</a></li>
@endsection

@section('contenido')
    <div class="container">
        <br>
        <div class="row container_galery">
            <div class="col-1">
                <small>ID</small>
                <h3 class="label fw-bold">{{ $evento->id }}</h3>
            </div>
            <div class="col">
                <small>EVENTO</small>
                <h3 class="label fw-bold" style="color: #af9495">{{ $evento->nombre_evento }}</h3>
            </div>
        </div>
        <hr>
        <div>
            <div class="row container_galery">
                <p class="label fw-bold">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-card-heading" viewBox="0 0 16 16">
                        <path
                            d="M14.5 3a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h13zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13z" />
                        <path
                            d="M3 8.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5zm0-5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5v-1z" />
                    </svg> Detalles
                </p>
                <div class="row">
                    <div class="col text-center">
                        <small>PAQUETE</small>
                        <p class="label fw-bold">{{ $evento->paquete_id }}</p>
                    </div>
                    <div class="col text-center">
                        <small>CLIENTE</small>
                        <p class="label fw-bold">{{ $evento->usuario_id }}</p>
                    </div>
                    <div class="col text-center">
                        <small>FEHCA</small>
                        <p class="label fw-bold">{{ $evento->fecha }}</p>
                    </div>
                    <div class="col text-center">
                        <small>HORA INICIO</small>
                        <p class="label fw-bold">{{ $evento->hora_inicio }}</p>
                    </div>
                    <div class="col text-center">
                        <small>HORA FINAL</small>
                        <p class="label fw-bold">{{ $evento->hora_final }}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col text-center">
                        <small>NO. INVITADOS</small>
                        <p class="label fw-bold">{{ $evento->num_invitados }}</p>
                    </div>
                    <div class="col text-center">
                        <small>PROPOSITO</small>
                        <p class="label fw-bold">{{ $evento->proposito }}</p>
                    </div>
                    <div class="col text-center">
                        <small>COSTO</small>
                        <p class="label fw-bold">${{ $evento->costo }}</p>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <div>
            <div class="row container_galery">
                <H5>Servicios</H5>
                <table id="tabla-servicios" class="table table-hover" name="servicios">
                    <tbody>
                        <tr>
                            <td class="text-center">#</td>
                            <td class="text-center">Servicio</td>
                            <td class="text-center">Costo</td>
                        </tr>
                    </tbody>
                    @foreach ($evento->servicios as $item)
                        @foreach ($servicios as $servicio)
                            @if ($item->pivot->servicio_id == $servicio->id)
                                <tr>
                                    <td class="text-center">{{ $servicio->id }}</td>
                                    <td class="text-center">{{ $servicio->nombre }}</td>
                                    <td class="text-center">${{ $servicio->costo }}</td>
                                </tr>
                            @endif
                        @endforeach
                    @endforeach
                </table>
            </div>
        </div>
        <hr>
        <div>
            <div class="row container_galery">
                @if ($evento->estatus == "Confirmado")
                <p class="label fw-bold">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-cash-coin" viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                            d="M11 15a4 4 0 1 0 0-8 4 4 0 0 0 0 8zm5-4a5 5 0 1 1-10 0 5 5 0 0 1 10 0z" />
                        <path
                            d="M9.438 11.944c.047.596.518 1.06 1.363 1.116v.44h.375v-.443c.875-.061 1.386-.529 1.386-1.207 0-.618-.39-.936-1.09-1.1l-.296-.07v-1.2c.376.043.614.248.671.532h.658c-.047-.575-.54-1.024-1.329-1.073V8.5h-.375v.45c-.747.073-1.255.522-1.255 1.158 0 .562.378.92 1.007 1.066l.248.061v1.272c-.384-.058-.639-.27-.696-.563h-.668zm1.36-1.354c-.369-.085-.569-.26-.569-.522 0-.294.216-.514.572-.578v1.1h-.003zm.432.746c.449.104.655.272.655.569 0 .339-.257.571-.709.614v-1.195l.054.012z" />
                        <path
                            d="M1 0a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h4.083c.058-.344.145-.678.258-1H3a2 2 0 0 0-2-2V3a2 2 0 0 0 2-2h10a2 2 0 0 0 2 2v3.528c.38.34.717.728 1 1.154V1a1 1 0 0 0-1-1H1z" />
                        <path d="M9.998 5.083 10 5a2 2 0 1 0-3.132 1.65 5.982 5.982 0 0 1 3.13-1.567z" />
                    </svg> Pagos
                </p>
                <div class="row">
                    <div class="col-2 text-center">
                        <small>#</small>
                        @foreach ($abonos as $abono)
                            @if ($abono->evento_id == $evento->id)
                                <p class="label fw-bold">{{ $abono->id }}</p>
                            @endif
                        @endforeach
                    </div>
                    <div class="col text-center">
                        <small>CANTIDAD</small>
                        @foreach ($abonos as $abono)
                            @if ($abono->evento_id == $evento->id)
                                <p class="label fw-bold">${{ $abono->monto }}</p>
                            @endif
                        @endforeach
                    </div>
                    <div class="col text-center">
                        <small>DIFERENCIA</small>
                        <?php
                        $diferencia = 0;
                        $pagado = 0;
                        
                        foreach ($abonos as $abono) {
                            if ($abono->evento_id == $evento->id) {
                                $pagado += $abono->monto;
                            }
                        }
                        $diferencia = $evento->costo - $pagado;
                        ?>
                        <p class="label fw-bold" style="color: orange">${{ $diferencia }}</p>
                    </div>
                </div>
                @else
                    @if ($evento->estatus == "Pendiente")
                    <form action="{{ route('evento.update.autorizar', $evento->id) }}" method="post" id="evento">
                        @method('PUT')
                        @csrf
                        <p class="label fw-bold text-center">
                            <input type="hidden" name="estatus" id="estatus" value="Pendiente">
                            <input type="submit" id="confirmar" class="btn emp_button_c" onclick="confirmar_estatus()" form="evento" value="Autorizar Evento">
                            <input type="submit" id="rechazar" class="btn emp_button" onclick="rechazar_estatus()" form="evento" value="Rechazar Evento">
                        </p>
                    </form>
                    @else
                    <p class="label fw-bold text-center" style="color: rgb(156, 156, 42)">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-hourglass-top" viewBox="0 0 16 16">
                            <path d="M2 14.5a.5.5 0 0 0 .5.5h11a.5.5 0 1 0 0-1h-1v-1a4.5 4.5 0 0 0-2.557-4.06c-.29-.139-.443-.377-.443-.59v-.7c0-.213.154-.451.443-.59A4.5 4.5 0 0 0 12.5 3V2h1a.5.5 0 0 0 0-1h-11a.5.5 0 0 0 0 1h1v1a4.5 4.5 0 0 0 2.557 4.06c.29.139.443.377.443.59v.7c0 .213-.154.451-.443.59A4.5 4.5 0 0 0 3.5 13v1h-1a.5.5 0 0 0-.5.5zm2.5-.5v-1a3.5 3.5 0 0 1 1.989-3.158c.533-.256 1.011-.79 1.011-1.491v-.702s.18.101.5.101.5-.1.5-.1v.7c0 .701.478 1.236 1.011 1.492A3.5 3.5 0 0 1 11.5 13v1h-7z"/>
                        </svg> EVENTO SIN CONFIRMAR
                    </p>
                    @endif
                @endif
            </div>
        </div>
        @if ($evento->estatus == "Confirmado")
        <hr>
        <div>
            <div class="row container_galery">
                <p class="label fw-bold">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-images" viewBox="0 0 16 16">
                        <path d="M4.502 9a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3z" />
                        <path
                            d="M14.002 13a2 2 0 0 1-2 2h-10a2 2 0 0 1-2-2V5A2 2 0 0 1 2 3a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2v8a2 2 0 0 1-1.998 2zM14 2H4a1 1 0 0 0-1 1h9.002a2 2 0 0 1 2 2v7A1 1 0 0 0 15 11V3a1 1 0 0 0-1-1zM2.002 4a1 1 0 0 0-1 1v8l2.646-2.354a.5.5 0 0 1 .63-.062l2.66 1.773 3.71-3.71a.5.5 0 0 1 .577-.094l1.777 1.947V5a1 1 0 0 0-1-1h-10z" />
                    </svg> Galeria
                </p>
                <div class="row">
                    <div class="lightbox-gallery">
                        @foreach ($evento->imagenes as $imagen)
                            <div class="image-container">
                                <div>
                                    <img src="{{ asset('imagenes/' . $imagen->ruta_imagen) }}" alt="{{ $imagen->nombre }}">
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        @endif
    </div>

    <script>
        function confirmar_estatus() {
            document.querySelector('#estatus').value = "Confirmado";
        }

        function rechazar_estatus() {
            document.querySelector('#estatus').value = "SinConfirmar";
        }
    </script>
@endsection
