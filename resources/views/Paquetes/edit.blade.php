@extends('plantilla.layout')

@section('usuario')
    <li><a class="nav-link" href="{{ route('sistema.gerente') }}">Inicio</a></li>
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Gerente</a>
        <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="{{ route('principal') }}">Salir</a></li>
        </ul>
    </li>
@endsection

@section('contenido')
    <div class="container">
        <br>
        <div class="row container_galery">
            <h3 class="label fw-bold" style="color: #af9495">Editar Paquete</h3>
        </div>
        <hr>
        <form action="{{ route('sistema.gerente') }}">
            <div>
                <div class="row container_galery">
                    <div class="mb-3">
                        <small>TITULO</small>
                        <input type="text" class="form-control" value="Boda">
                    </div>
                    <div class="mb-3">
                        <small>CAPACIDAD</small>
                        <input type="text" class="form-control" value="150 a 200">
                    </div>
                    <div class="mb-3">
                        <small>COSTO</small>
                        <input type="text" class="form-control" value="$10,000">
                    </div>
                    <div class="mb-3">
                        <small>DESCRIPCIÓN</small>
                        <textarea class="form-control" rows="3">Paquete para bodas, con servicios completos.</textarea>
                    </div>
                </div>
            </div>
            <hr>
            <div>
                <div class="row container_galery">
                    <H5>Servicios</H5>
                    <table class="table table-hover">
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>Musica</td>
                                <td><a href="#" class="text-decoration-none texto-color" title="Eliminar"><i class="bi bi-trash3-fill"></i></a></td>
                            </tr>
                            <tr>
                                <th scope="row">2</th>
                                <td>Banquete</td>
                                <td><a href="#" class="text-decoration-none texto-color" title="Eliminar"><i class="bi bi-trash3-fill"></i></a></td>
                            </tr>
                            <tr>
                                <th scope="row">3</th>
                                <td>Jardin y capilla</td>
                                <td><a href="#" class="text-decoration-none texto-color" title="Eliminar"><i class="bi bi-trash3-fill"></i></a></td>
                            </tr>
                            <tr>
                                <th scope="row">4</th>
                                <td>Mobiliario y decoración</td>
                                <td><a href="#" class="text-decoration-none texto-color" title="Eliminar"><i class="bi bi-trash3-fill"></i></a></td>
                            </tr>
                            <tr>
                                <th scope="row">5</th>
                                <td>Organización</td>
                                <td><a href="#" class="text-decoration-none texto-color" title="Eliminar"><i class="bi bi-trash3-fill"></i></a></td>
                            </tr>
                            <tr>
                                <th scope="row">6</th>
                                <td>Catering</td>
                                <td><a href="#" class="text-decoration-none texto-color" title="Eliminar"><i class="bi bi-trash3-fill"></i></a></td>
                            </tr>
                            <tr>
                                <th scope="row">7</th>
                                <td>Fotografia</td>
                                <td><a href="#" class="text-decoration-none texto-color" title="Eliminar"><i class="bi bi-trash3-fill"></i></a></td>
                            </tr>
                            <tr>
                                <th scope="row">8</th>
                                <td>Ambientación</td>
                                <td><a href="#" class="text-decoration-none texto-color" title="Eliminar"><i class="bi bi-trash3-fill"></i></a></td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <a class="emp_button_plus btn" data-bs-toggle="modal" data-bs-target="#agregarServicio"><i class="bi bi-plus-lg"></i></i></a>
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

    <div class="modal fade" id="agregarServicio" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="agregarAbonoLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Servicios</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <table class="table table-hover">
                        <tbody>
                            <tr>
                                <th scope="row"><input class="form-check-input" type="checkbox" value=""></th>
                                <td>Musica</td>
                            </tr>
                            <tr>
                                <th scope="row"><input class="form-check-input" type="checkbox" value=""></th>
                                <td>Banquete</td>
                            </tr>
                            <tr>
                                <th scope="row"><input class="form-check-input" type="checkbox" value=""></th>
                                <td>Jardín y Capilla</td>
                            </tr>
                            <tr>
                                <th scope="row"><input class="form-check-input" type="checkbox" value=""></th>
                                <td>Mobiliario y Decoración</td>
                            </tr>
                            <tr>
                                <th scope="row"><input class="form-check-input" type="checkbox" value=""></th>
                                <td>Organización</td>
                            </tr>
                            <tr>
                                <th scope="row"><input class="form-check-input" type="checkbox" value=""></th>
                                <td>Catering</td>
                            </tr>
                            <tr>
                                <th scope="row"><input class="form-check-input" type="checkbox" value=""></th>
                                <td>Fotografia</td>
                            </tr>
                            <tr>
                                <th scope="row"><input class="form-check-input" type="checkbox" value=""></th>
                                <td>Ambientación</td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="d-grid gap-2 col-6 mx-auto">
                        <button type="submit" class="btn emp_button">Agregar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
