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
                                <small>NOMBRE</small>
                                <input type="text" class="form-control" value="{{ $usuario->nombre }}" name="nombre"
                                    id="nombre" required>
                                @if($errors->first('nombre')) 
                                <div class="text-danger text-opacity-75">Verifique que su nombre este bien escrito</div> @else  
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="row">
                            <div class="col">
                                <small>USUARIO</small>
                                <input type="text" class="form-control" value="{{ $usuario->usuario }}" name="usuario"
                                    id="usuario" required>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="row">
                            <div class="col">
                                <small>CORREO</small>
                                <input type="email" class="form-control" id="correo" name="correo"
                                    value="{{ $usuario->correo }}" name="correo" id="correo" required>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <small>ROL</small>
                                    @if ($usuario->rol == "Cliente")
                                        <select class="form-select" aria-label="Default select example" aria-placeholder="ROL"
                                            name="rol" id="rol" required>
                                                <option value="Cliente" selected>Cliente</option>
                                                <option value="Empleado">Empleado</option>
                                                <option value="Gerente">Gerente</option>
                                        </select>
                                    @endif
                                    @if ($usuario->rol == "Empleado")
                                        <select class="form-select" aria-label="Default select example" aria-placeholder="ROL"
                                            name="rol" id="rol" required>
                                                <option value="Cliente">Cliente</option>
                                                <option value="Empleado" selected>Empleado</option>
                                                <option value="Gerente">Gerente</option>
                                        </select>
                                    @endif
                                    @if ($usuario->rol == "Gerente")
                                        <select class="form-select" aria-label="Default select example" aria-placeholder="ROL"
                                            name="rol" id="rol" required>
                                                <option value="Cliente" selected>Cliente</option>
                                                <option value="Empleado">Empleado</option>
                                                <option value="Gerente" selected>Gerente</option>
                                        </select>
                                    @endif
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
                                            @if($errors->first('usuario'))
                                            <div class="text-danger text-opacity-75">Claves demasiado corta</div> @else  
                                            @endif
                                    </div>
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
        </form>
    </div>
@endsection
