@extends('plantilla.layout')

@section('usuario')
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Gerente</a>
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
                                <th scope="col">Nombre</th>
                                <th scope="col">Apellios</th>
                                <th scope="col">Usuario</th>
                                <th scope="col">Contraseña</th>
                                <th scope="col">Rol</th>
                                <th scope="col">Acciones</th>
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
                                    <a href="#" class="text-decoration-none texto-color"><i class="bi bi-card-heading"></i></a>
                                    <a href="#" class="text-decoration-none texto-color"><i class="bi bi-pencil-square"></i></a>
                                    <a href="#" class="text-decoration-none texto-color"><i class="bi bi-trash3-fill"></i></a>
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
                                    <a href="#" class="text-decoration-none texto-color"><i class="bi bi-card-heading"></i></a>
                                    <a href="#" class="text-decoration-none texto-color"><i class="bi bi-pencil-square"></i></a>
                                    <a href="#" class="text-decoration-none texto-color"><i class="bi bi-trash3-fill"></i></a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header" id="flush-headingTwo">
                <button class="accordion-button plegable collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                    <H3>Paquetes</H3>
                </button>
              </h2>
              <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                <div class="accordion-body">
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <button type="submit" class="btn emp_button_c">Nuevo</button>
                    </div>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Apellios</th>
                                <th scope="col">Usuario</th>
                                <th scope="col">Contraseña</th>
                                <th scope="col">Rol</th>
                                <th scope="col">Acciones</th>
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
                                    <a href="#" class="text-decoration-none texto-color"><i class="bi bi-card-heading"></i></a>
                                    <a href="#" class="text-decoration-none texto-color"><i class="bi bi-pencil-square"></i></a>
                                    <a href="#" class="text-decoration-none texto-color"><i class="bi bi-trash3-fill"></i></a>
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
                                    <a href="#" class="text-decoration-none texto-color"><i class="bi bi-card-heading"></i></a>
                                    <a href="#" class="text-decoration-none texto-color"><i class="bi bi-pencil-square"></i></a>
                                    <a href="#" class="text-decoration-none texto-color"><i class="bi bi-trash3-fill"></i></a>
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
                        <button type="submit" class="btn emp_button_c">Nuevo</button>
                    </div>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Apellios</th>
                                <th scope="col">Usuario</th>
                                <th scope="col">Contraseña</th>
                                <th scope="col">Rol</th>
                                <th scope="col">Acciones</th>
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
                                    <a href="#" class="text-decoration-none texto-color"><i class="bi bi-card-heading"></i></a>
                                    <a href="#" class="text-decoration-none texto-color"><i class="bi bi-pencil-square"></i></a>
                                    <a href="#" class="text-decoration-none texto-color"><i class="bi bi-trash3-fill"></i></a>
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
                                    <a href="#" class="text-decoration-none texto-color"><i class="bi bi-card-heading"></i></a>
                                    <a href="#" class="text-decoration-none texto-color"><i class="bi bi-pencil-square"></i></a>
                                    <a href="#" class="text-decoration-none texto-color"><i class="bi bi-trash3-fill"></i></a>
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