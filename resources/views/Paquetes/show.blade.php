@extends('plantilla.layout')

@section('usuario')
    <li><a class="nav-link" href="{{ route('sistema.gerente') }}">Inicio</a></li>
@endsection

@section('authenticacion')
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false"><i class="bi bi-person-circle"></i> {{Auth::user()->nombre}}</a>
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
                <h3 class="label fw-bold">{{ $paquete->id }}</h3>
            </div>
            <div class="col">
                <small>Titulo</small>
                <h3 class="label fw-bold" style="color: #af9495">{{ $paquete->nombre }}</h3>
            </div>
        </div>
        <hr>
        <div>
            <div class="row container_galery">
                <p class="label fw-bold">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-card-heading" viewBox="0 0 16 16">
                        <path d="M14.5 3a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h13zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13z"/>
                        <path d="M3 8.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5zm0-5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5v-1z"/>
                    </svg> Detalles
                </p>
                <div class="row">
                    <div class="col text-center">
                        <small>Capacidad Maxima</small>
                        <p class="label fw-bold">{{ $paquete->capacidad_maxima }}</p>
                    </div>
                    <div class="col text-center">
                        <small>Costo</small>
                        <p class="label fw-bold">${{ $paquete->costo }}</p>
                    </div>
                    <div class="col text-center">
                        <small>Descripción</small>
                        <p class="label fw-bold">{{ $paquete->descripcion }}</p>
                    </div>
                    <div class="col text-center">
                        <small>Estatus</small>
                        @if ($paquete->estatus == "Activo")
                            <p class="label fw-bold" style="color:rgb(67, 148, 101)">{{ $paquete->estatus }}</p>
                        @else
                            <p class="label fw-bold" style="color:rgb(151, 72, 72)">{{ $paquete->estatus }}</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <div>
            <div class="container_galery">
                <div>
                    <img src="{{ $paquete->ruta_imagen }}" class="rounded mx-auto d-block" alt="" />
                </div>
            </div>
        </div>
    </div>
@endsection
