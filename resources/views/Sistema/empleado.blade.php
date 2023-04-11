@extends('plantilla.layout')

@section('authenticacion')
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false"><i class="bi bi-person-circle"></i> {{Auth::user()->nombre}}</a>
        <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="{{ route('logout') }}">Cerrar sesión</a></li>
        </ul>
    </li>
@endsection

@section('contenido')
    <div class="p-5 text-center emp_ban">
        <h1 class="mb-3">PORTAL DE EMPLEADOS</h1>
    </div>
    <div class="container container_galery">
        <h3>Registro de Eventos</h3>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Evento</th>
                    <th scope="col">Cliente</th>
                    <th scope="col">Fecha</th>
                    <th scope="col">Confirmación</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td>Boda Premium</td>
                    <td>Cliente 1</td>
                    <td>20/03/2023</td>
                    <td><input class="form-check-input" type="checkbox" value="" checked disabled></td>
                    <td><a href="{{ route('evento.show') }}" class="btn emp_button_plus"><i class="bi bi-three-dots-vertical"></i></a></td>
                </tr>
                <tr>
                    <th scope="row">2</th>
                    <td>Evento Empresarial</td>
                    <td>Cliente 2</td>
                    <td>08/09/2023</td>
                    <td><input class="form-check-input" type="checkbox" value="" disabled></td>
                    <td><a href="{{ route('evento.show') }}" class="btn emp_button_plus"><i class="bi bi-three-dots-vertical"></i></a></td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection
