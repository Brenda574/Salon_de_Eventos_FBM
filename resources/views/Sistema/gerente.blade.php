@extends('plantilla.layout')

@section('usuario')
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false"><i class="bi bi-person-circle"></i> Gerente</a>
        <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="{{ route('principal') }}">Salir</a></li>
        </ul>
    </li>
@endsection

@section('contenido')
    <div class="p-5 text-center emp_ban">
        <h1 class="mb-3">PORTAL DE GERENTE</h1>
    </div>
    <div class="container container_galery">
        <div class="accordion accordion-flush" id="accordionFlushExample">
            <div class="accordion-item">
                <h3 class="accordion-header" id="flush-headingOne">
                    <button class="accordion-button plegable collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                        <H3>Usuarios</H3>
                    </button>
                </h3>
                <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <button type="submit" class="btn emp_button_c">Nuevo</button>
                        </div>
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nombre(s)</th>
                                    <th scope="col">Apellio(s)</th>
                                    <th scope="col">Usuario</th>
                                    <th scope="col">Contraseña</th>
                                    <th scope="col">Rol</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>Maria</td>
                                    <td>López</td>
                                    <td>Cliente1</td>
                                    <td>Cliente</td>
                                    <td>Cliente</td>
                                    <td>
                                        <a href="#" class="text-decoration-none texto-color" title="Detalles"><i class="bi bi-card-heading"></i></a>
                                        <a href="#" class="text-decoration-none texto-color" title="Editar"><i class="bi bi-pencil-square"></i></a>
                                        <a href="#" class="text-decoration-none texto-color" title="Eliminar"><i class="bi bi-trash3-fill"></i></a>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">2</th>
                                    <td>Jorge</td>
                                    <td>Cruz</td>
                                    <td>Empleado1</td>
                                    <td>Empleado</td>
                                    <td>Empleado</td>
                                    <td>
                                        <a href="#" class="text-decoration-none texto-color" title="Detalles"><i class="bi bi-card-heading"></i></a>
                                        <a href="#" class="text-decoration-none texto-color" title="Editar"><i class="bi bi-pencil-square"></i></a>
                                        <a href="#" class="text-decoration-none texto-color" title="Eliminar"><i class="bi bi-trash3-fill"></i></a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="flush-headingTwo">
                    <button class="accordion-button plegable collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                        <H3>Paquetes</H3>
                    </button>
                </h2>
                <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <a href="{{ route('paquete.create') }}" class="btn emp_button_c">Nuevo</a>
                        </div>
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Titulo</th>
                                    <th scope="col">Capacidad</th>
                                    <th scope="col">Costo</th>
                                    <th scope="col">Descripcion</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>Boda</td>
                                    <td>150 a 200</td>
                                    <td>$10,000</td>
                                    <td>Paquete para bodas, con servicios completos.</td>
                                    <td>
                                        <a href="{{ route('paquete.show') }}" class="text-decoration-none texto-color" title="Detalles"><i class="bi bi-card-heading"></i></a>
                                        <a href="{{ route('paquete.edit') }}" class="text-decoration-none texto-color" title="Editar"><i class="bi bi-pencil-square"></i></a>
                                        <a href="#" class="text-decoration-none texto-color" title="Eliminar"><i class="bi bi-trash3-fill"></i></a>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">2</th>
                                    <td>Eventos Empresariales</td>
                                    <td>50 a 100</td>
                                    <td>$8,000</td>
                                    <td>Paquete para eventos empresariales con servicios incluidos.</td>
                                    <td>
                                        <a href="{{ route('paquete.show') }}" class="text-decoration-none texto-color" title="Detalles"><i class="bi bi-card-heading"></i></a>
                                        <a href="{{ route('paquete.edit') }}" class="text-decoration-none texto-color" title="Editar"><i class="bi bi-pencil-square"></i></a>
                                        <a href="#" class="text-decoration-none texto-color" title="Eliminar"><i class="bi bi-trash3-fill"></i></a>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">3</th>
                                    <td>Eventos especiales</td>
                                    <td>150 a 200</td>
                                    <td>$10,000</td>
                                    <td>Paquete para eventos especiales como cumpleaños, bautizos, eventos familiares, entre otros. Con servicios incluidos.</td>
                                    <td>
                                        <a href="{{ route('paquete.show') }}" class="text-decoration-none texto-color" title="Detalles"><i class="bi bi-card-heading"></i></a>
                                        <a href="{{ route('paquete.edit') }}" class="text-decoration-none texto-color" title="Editar"><i class="bi bi-pencil-square"></i></a>
                                        <a href="#" class="text-decoration-none texto-color" title="Eliminar"><i class="bi bi-trash3-fill"></i></a>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">4</th>
                                    <td>Graduaciones</td>
                                    <td>150 a 250</td>
                                    <td>$10,200</td>
                                    <td>Paquete para graducaiones de cualquier nivel educativo, con servicios incluidos.</td>
                                    <td>
                                        <a href="{{ route('paquete.show') }}" class="text-decoration-none texto-color" title="Detalles"><i class="bi bi-card-heading"></i></a>
                                        <a href="{{ route('paquete.edit') }}" class="text-decoration-none texto-color" title="Editar"><i class="bi bi-pencil-square"></i></a>
                                        <a href="#" class="text-decoration-none texto-color" title="Eliminar"><i class="bi bi-trash3-fill"></i></a>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">5</th>
                                    <td>XV años</td>
                                    <td>150 a 200</td>
                                    <td>$10,000</td>
                                    <td>Paquete para XV años con servicios incluidos.</td>
                                    <td>
                                        <a href="{{ route('paquete.show') }}" class="text-decoration-none texto-color" title="Detalles"><i class="bi bi-card-heading"></i></a>
                                        <a href="{{ route('paquete.edit') }}" class="text-decoration-none texto-color" title="Editar"><i class="bi bi-pencil-square"></i></a>
                                        <a href="#" class="text-decoration-none texto-color" title="Eliminar"><i class="bi bi-trash3-fill"></i></a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="flush-headingThree">
                    <button class="accordion-button plegable collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                        <H3>Servicios</H3>
                    </button>
                </h2>
                <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <a href="{{ route('servicio.create') }}" class="btn emp_button_c">Nuevo</a>
                        </div>
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Costo</th>
                                    <th scope="col">Descripcion</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>Musica</td>
                                    <td>$</td>
                                    <td>Servicio de musica a elección del usuario.</td>
                                    <td>
                                        <a href="{{ route('servicio.show') }}" class="text-decoration-none texto-color" title="Detalles"><i class="bi bi-card-heading"></i></a>
                                        <a href="{{ route('servicio.edit') }}" class="text-decoration-none texto-color" title="Editar"><i class="bi bi-pencil-square"></i></a>
                                        <a href="" class="text-decoration-none texto-color" title="Eliminar"><i class="bi bi-trash3-fill"></i></a>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">2</th>
                                    <td>Banquete</td>
                                    <td>$</td>
                                    <td>Servicio de banquete a elección del usuario.</td>
                                    <td>
                                        <a href="#" class="text-decoration-none texto-color" title="Detalles"><i class="bi bi-card-heading"></i></a>
                                        <a href="#" class="text-decoration-none texto-color" title="Editar"><i class="bi bi-pencil-square"></i></a>
                                        <a href="#" class="text-decoration-none texto-color" title="Eliminar"><i class="bi bi-trash3-fill"></i></a>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">3</th>
                                    <td>Jardin y capilla</td>
                                    <td>$</td>
                                    <td>Servicio de jardin y capilla para bodas.</td>
                                    <td>
                                        <a href="#" class="text-decoration-none texto-color" title="Detalles"><i class="bi bi-card-heading"></i></a>
                                        <a href="#" class="text-decoration-none texto-color" title="Editar"><i class="bi bi-pencil-square"></i></a>
                                        <a href="#" class="text-decoration-none texto-color" title="Eliminar"><i class="bi bi-trash3-fill"></i></a>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">4</th>
                                    <td>Mobiliario y decoración</td>
                                    <td>$</td>
                                    <td>Sillas, mesas e inmobiliario necesario para el evento.</td>
                                    <td>
                                        <a href="#" class="text-decoration-none texto-color" title="Detalles"><i class="bi bi-card-heading"></i></a>
                                        <a href="#" class="text-decoration-none texto-color" title="Editar"><i class="bi bi-pencil-square"></i></a>
                                        <a href="#" class="text-decoration-none texto-color" title="Eliminar"><i class="bi bi-trash3-fill"></i></a>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">5</th>
                                    <td>Organización</td>
                                    <td>$</td>
                                    <td>Servicio de organización para el evento.</td>
                                    <td>
                                        <a href="#" class="text-decoration-none texto-color" title="Detalles"><i class="bi bi-card-heading"></i></a>
                                        <a href="#" class="text-decoration-none texto-color" title="Editar"><i class="bi bi-pencil-square"></i></a>
                                        <a href="#" class="text-decoration-none texto-color" title="Eliminar"><i class="bi bi-trash3-fill"></i></a>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">6</th>
                                    <td>Catering</td>
                                    <td>$</td>
                                    <td>Servicio de meseros para organización y suministro de alimentos.</td>
                                    <td>
                                        <a href="#" class="text-decoration-none texto-color" title="Detalles"><i class="bi bi-card-heading"></i></a>
                                        <a href="#" class="text-decoration-none texto-color" title="Editar"><i class="bi bi-pencil-square"></i></a>
                                        <a href="#" class="text-decoration-none texto-color" title="Eliminar"><i class="bi bi-trash3-fill"></i></a>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">7</th>
                                    <td>Fotografia</td>
                                    <td>$</td>
                                    <td>Servicio de fotografia para los eventos.</td>
                                    <td>
                                        <a href="#" class="text-decoration-none texto-color" title="Detalles"><i class="bi bi-card-heading"></i></a>
                                        <a href="#" class="text-decoration-none texto-color" title="Editar"><i class="bi bi-pencil-square"></i></a>
                                        <a href="#" class="text-decoration-none texto-color" title="Eliminar"><i class="bi bi-trash3-fill"></i></a>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">8</th>
                                    <td>Ambientación</td>
                                    <td>$</td>
                                    <td>Servicio de ambientacion para el evento.</td>
                                    <td>
                                        <a href="#" class="text-decoration-none texto-color" title="Detalles"><i class="bi bi-card-heading"></i></a>
                                        <a href="#" class="text-decoration-none texto-color" title="Editar"><i class="bi bi-pencil-square"></i></a>
                                        <a href="#" class="text-decoration-none texto-color" title="Eliminar"><i class="bi bi-trash3-fill"></i></a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
