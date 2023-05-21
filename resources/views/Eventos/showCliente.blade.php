@extends('plantilla.layout')

@section('usuario')
    <li><a class="nav-link" href="{{ route('sistema.cliente') }}">Inicio</a></li>
@endsection

@section('authenticacion')
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false"><i
                class="bi bi-person-circle"></i> {{ Auth::user()->nombre }}</a>
        <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="{{ route('logout') }}">Cerrar sesión</a></li>
        </ul>
    </li>
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
                        @foreach ($paquetes as $paquete)
                            @if ($evento->paquete_id == $paquete->id)
                                <p class="label fw-bold">{{ $paquete->nombre }}</p>
                            @endif
                        @endforeach
                    </div>
                    <div class="col text-center">
                        <small>CLIENTE</small>
                        <p class="label fw-bold">{{ Auth::user()->nombre }}</p>
                    </div>
                    <div class="col text-center">
                        <small>Fecha</small>
                        <p class="label fw-bold">{{ $evento->fecha }}</p>
                    </div>
                    <div class="col text-center">
                        <small>Hora Inicio</small>
                        <p class="label fw-bold">{{ $evento->hora_inicio }}</p>
                    </div>
                    <div class="col text-center">
                        <small>Hora Fin</small>
                        <p class="label fw-bold">{{ $evento->hora_final }}</p>
                    </div>
                    <div class="col text-center">
                        <small>Costo</small>
                        <p class="label fw-bold">${{ $evento->costo }}</p>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <div>
            <div class="row container_galery">
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
            </div>
        </div>
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
                                <div><img src="{{ asset('imagenes/' . $imagen->ruta_imagen) }}"
                                        alt="{{ $imagen->nombre }}">
                                    <div class="overlay">
                                        <form action="{{ route('eliminar_imagen', $imagen->id) }}" method="post"
                                            class="eliminar_imagen-form">
                                            @csrf
                                            <button class="btn btn-link text-decoration-none texto-color" title="Eliminar">
                                                <i class="bi bi-trash3-fill"></i></button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="d-grid gap-2 d-md-flex justify-content-center">
                        <button class="emp_button_plus btn" data-bs-toggle="modal" data-bs-target="#agregarFoto"><i
                                class="bi bi-plus-lg"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="agregarAbono" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="agregarAbonoLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Nuevo Abono</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3 row">
                        <label for="staticCosto" class="col-sm-4 col-form-label fw-bold">Diferencia: </label>
                        <div class="col-sm-8">
                            <input type="text" readonly class="form-control-plaintext" id="staticCosto"
                                value="$4,500.00">
                        </div>
                    </div>
                    <hr>
                    <div>
                        <form action="#">
                            <div class="mb-3">
                                <small>Monto</small>
                                <input class="form-control" type="text">
                            </div>
                            <div class="mb-3">
                                <small>Tipo de Pago</small>
                                <input class="form-control" list="datalistOptions">
                                <datalist id="datalistOptions">
                                    <option value="Credito">
                                    <option value="Debito">
                                    <option value="Efectivo">
                                </datalist>
                            </div>
                            <div class="d-grid gap-2 col-6 mx-auto">
                                <button type="submit" class="btn emp_button">Aceptar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="agregarFoto" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Nueva Foto</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('subir_imagen', ['idEvento' => $evento->id]) }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <input class="form-control" type="file" name="archivo" id="archivo">
                        </div>
                        <div class="d-grid gap-2 col-6 mx-auto">
                            <button type="submit" class="btn emp_button">Aceptar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
