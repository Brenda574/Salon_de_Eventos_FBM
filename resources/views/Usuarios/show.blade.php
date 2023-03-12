@extends('plantilla.layout')

@section('usuario')
    <li><a class="nav-link" href="{{ route('sistema.gerente') }}">Inicio</a></li>
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false"><i
                class="bi bi-person-circle"></i> Gerente</a>
        <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="{{ route('principal') }}">Salir</a></li>
        </ul>
    </li>
@endsection

@section('contenido')
    <div class="container">
        <br>
        <div class="row container_galery">
            <div class="col-1">
                <small>ID</small>
                <h3 class="label fw-bold">1</h3>
            </div>
            <div class="col-1">
                <small>Nombre</small>
                <h3 class="label fw-bold" style="color: #af9495">Maria</h3>
            </div>
            <div class="col">
                <small>Apellidos</small>
                <h3 class="label fw-bold" style="color: #af9495">López</h3>
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
                        <small>Usuario</small>
                        <p class="label fw-bold">Cliente1</p>
                    </div>
                    <div class="col text-center">
                        <small>Contraseña</small>
                        <p class="label fw-bold">Cliente</p>
                    </div>
                    <div class="col text-center">
                        <small>Rol</small>
                        <p class="label fw-bold">Cliente</p>
                    </div>
                    <div class="col text-center">
                        <small>Fecha de nacimiento</small>
                        <p class="label fw-bold">02/09/2001</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
