@extends('plantilla.layout')

@section('usuario')
    <li><a class="nav-link" href="{{ route('sistema.gerente') }}">Inicio</a></li>
@endsection

@section('contenido')
    <div class="container">
        <br>
        <div class="row container_galery">
            <h3 class="label fw-bold" style="color: #af9495">Editar Usuario</h3>
        </div>
        <hr>
        <form action="{{ route('usuario.update', $usuario->id) }}" method="post">
            @method('PUT')
            @csrf
            <div>
                <div class="row container_galery">
                    <div class="mb-3">
                        <div class="row">
                            <div class="col">
                                <small>NOMBRE(S)</small>
                                <input type="text" class="form-control" value="{{ $usuario->nombre }}" name="nombre"
                                    id="nombre">
                            </div>
                            <div>
                                <small>USUARIO</small>
                                <input type="text" class="form-control" value="{{ $usuario->usuario }}" name="usuario"
                                    id="usuario">
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="row">
                            <div class="col">
                                <small>CONTRASEÑA</small>
                                <input type="text" class="form-control" value="{{ $usuario->clave }}" name="clave"
                                    id="clave">
                            </div>
                            <div class="col">
                                <div class="mb-3">
                                    <small>ROL</small>
                                    <select class="form-select" aria-label="Default select example" aria-placeholder="ROL"
                                        value="{{ $usuario->rol }}" name="rol" id="rol">
                                        <option selected value="1">Cliente</option>
                                        <option value="2">Empleado</option>
                                        <option value="3">Gerente</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="row container_galery">
                            <button type="submit" class="btn emp_button">Guardar</button>
                        </div>
                    </div>
                </div>
        </form>
    </div>
@endsection
