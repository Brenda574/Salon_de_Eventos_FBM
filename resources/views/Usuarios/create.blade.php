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
            <h3 class="label fw-bold" style="color: #af9495">Nuevo Usuario</h3>
        </div>
        <hr>
        <form action="{{ route('usuario.store') }}" method="post">
            @csrf
            <div>
                <div class="row container_galery">
                    <div class="mb-3">
                        <div class="row">
                            <div class="col">
                                <small>NOMBRE</small>
                                <input type="text" class="form-control" name="nombre" id="nombre" aria-describedby="validationServer03Feedback" required value="{{old('nombre')}}">
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
                                <input type="text" class="form-control" name="usuario" id="usuario" required value="{{old('usuario')}}">
                                @if($errors->first('usuario')) 
                                <div class="text-danger text-opacity-75">Este usuario ya se encuentra registrado</div> @else  
                                @endif
                            </div>
                            <div class="col">
                                <small>CORREO</small>
                                <input type="email" class="form-control" id="correo" name="correo" required value="{{old('correo')}}">
                                @if($errors->first('usuario'))
                                <div class="text-danger text-opacity-75">Este correo ya se encuentra registrado</div> @else  
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="row">
                            <div class="col">
                                <small>CONTRASEÑA</small>
                                <input type="password" class="form-control" id="clave" name="clave" required value="{{old('clave')}}">
                                @if($errors->first('usuario'))
                                <div class="text-danger text-opacity-75">Clave demasiado corta</div> @else  
                                @endif
                            </div>
                            
                            <div class="col">
                                <div class="mb-3">
                                    <small>ROL</small>
                                    <select class="form-select" aria-label="Default select example" aria-placeholder="ROL"
                                        id="rol" name="rol" required value="{{old('rol')}}">
                                        <option selected></option>
                                        <option value="Cliente">Cliente</option>
                                        <option value="Empleado">Empleado</option>
                                        <option value="Gerente">Gerente</option>
                                    </select>
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
        </form>
    </div>
@endsection
