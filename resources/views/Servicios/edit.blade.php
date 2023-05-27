@extends('plantilla.layout')

@section('usuario')
    <li><a class="nav-link" href="{{ route('sistema.gerente') }}">Inicio</a></li>
@endsection

@section('contenido')
    <div class="container">
        <br>
        <div class="row container_galery">
            <h3 class="label fw-bold" style="color: #af9495">Editar Servicio</h3>
        </div>
        <hr>
        <form action="{{ route('servicio.update', $servicio->id) }}" method="POST">
            @method('PUT')
            @csrf
            <div>
                <div class="row container_galery">
                    <div class="mb-3">
                        <small>NOMBRE</small>
                        <input type="text" class="form-control" value="{{ $servicio->nombre }}" name="nombre" id="nombre">
                    </div>
                    <div class="mb-3">
                        <small>COSTO</small>
                        <input type="text" class="form-control" value="{{ $servicio->costo }}" name="costo" id="costo">
                    </div>
                    <div class="mb-3">
                        <small>DESCRIPCIÓN</small>
                        <textarea class="form-control" rows="3" name="descripcion" id="descripcion">{{ $servicio->descripcion }}</textarea>
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