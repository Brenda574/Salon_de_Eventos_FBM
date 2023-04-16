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
            <h3 class="label fw-bold" style="color: #af9495">Nuevo Paquete</h3>
        </div>
        <hr>
        <form action="{{ route('paquete.store') }}" method="post">
            @csrf
            <div>
                <div class="row container_galery">
                    <div class="mb-3">
                        <small>TITULO</small>
                        <input type="text" class="form-control" name="nombre" id="nombre">
                    </div>
                    <div class="mb-3">
                        <small>CAPACIDAD MAX</small>
                        <input type="text" class="form-control" name="capacidad" id="capacidad">
                    </div>
                    <div class="mb-3">
                        <small>COSTO</small>
                        <input type="text" class="form-control" name="costo" id="costo">
                    </div>
                    <div class="mb-3">
                        <small>DESCRIPCIÓN</small>
                        <textarea class="form-control" rows="3" name="descripcion" id="descripcion"></textarea>
                    </div>
                    <div class="mb-3">
                        <small>RUTA DE IMAGEN</small>
                        <input type="text" class="form-control" name="ruta_img" id="ruta_img">
                    </div>
                </div>
            </div>
            <hr>
            <div>
                <div class="container_galery">
                    <div class="d-grid gap-2 col-6 mx-auto">
                        <select class="form-select estatus_ac" aria-label="Default select example" id="estatus" name="estatus">
                            <option selected>Inactivo</option>
                            <option value="1">Activo</option>
                        </select>
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
