@extends('plantilla.layout')

@section('usuario')
    <li><a class="nav-link" href="{{ route('sistema.gerente') }}">Inicio</a></li>
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
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="row">
                            <div class="col">
                                <small>USUARIO</small>
                                <input type="text" class="form-control" value="{{ $usuario->usuario }}" name="usuario"
                                    id="usuario">
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="row">
                            <div class="col">
                                <small>CORREO</small>
                                <input type="email" class="form-control" id="correo" name="correo"
                                    value="{{ $usuario->correo }}" name="correo" id="correo">
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <small>ROL</small>
                                    <select class="form-select" aria-label="Default select example" aria-placeholder="ROL"
                                        value="{{ $usuario->rol }}" name="rol" id="rol">
                                        <option value="Cliente">Cliente</option>
                                        <option value="Empleado">Empleado</option>
                                        <option value="Gerente">Gerente</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col">
                                <br>
                                <a class="btn emp_button_c" data-bs-toggle="collapse" href="#collapseExample" role="button"
                                    aria-expanded="false" aria-controls="collapseExample">
                                    Cambiar Clave
                                </a>
                                <br>
                                <br>
                                <div class="collapse" id="collapseExample">
                                    <div class="card card-body">
                                        <small>NUEVA CONTRASEÑA</small>
                                        <input type="password" class="form-control" value="" name="clave"
                                            id="clave">
                                    </div>
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
            </div>
        </form>
    </div>
@endsection
