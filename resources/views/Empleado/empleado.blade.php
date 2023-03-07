@extends('plantilla.layout')

@section('usuario')
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Empleado</a>
        <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">Salir</a></li>
        </ul>
    </li>
@endsection

@section('contenido')
    <div>
        <h3>Eventos</h3>
    </div>
@endsection
