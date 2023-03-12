@extends('plantilla.layout')

@section('usuario')
    <li><a class="nav-link" href="{{ route('sistema.gerente') }}">Inicio</a></li>
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false"><i class="bi bi-person-circle"></i> Gerente</a>
        <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="{{ route('principal') }}">Salir</a></li>
        </ul>
    </li>
@endsection

@section('contenido')
    <div class="container">
        <br>
        <div class="row container_galery">
            <h3 class="label fw-bold" style="color: #af9495">Editar Servicio</h3>
        </div>
        <hr>
        <form action="{{ route('sistema.gerente') }}">
            <div>
                <div class="row container_galery">
                    <div class="mb-3">
                        <small>NOMBRE</small>
                        <input type="text" class="form-control" value="Musica">
                    </div>
                    <div class="mb-3">
                        <small>COSTO</small>
                        <input type="text" class="form-control" value="$">
                    </div>
                    <div class="mb-3">
                        <small>DESCRIPCIÓN</small>
                        <textarea class="form-control" rows="3">Servicio de musica a elección del usuario.</textarea>
                    </div>
                </div>
            </div>
            <hr>
            <div>
                <div class="row container_galery">
                    <button type="submit" class="btn emp_button">Guardar</button>
                </div>
            </div>
        </form>
    </div>
@endsection