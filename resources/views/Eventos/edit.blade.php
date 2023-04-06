@extends('plantilla.layout')

@section('usuario')
    <li><a class="nav-link" href="{{ route('sistema.cliente') }}">Inicio</a></li>
@endsection

@section('contenido')
    <div class="container">
        <br>
        <div class="row container_galery">
            <h3 class="label fw-bold" style="color: #af9495">Editar Evento</h3>
        </div>
        <hr>
        <form action="{{ route('sistema.cliente') }}">
            <div>
                <div class="row container_galery">
                    <div class="row">
                        <div class="col mb-3">
                            <small>EVENTO</small>
                            <input type="text" class="form-control" value="Graduación">
                        </div>
                        <div class="col mb-3">
                            <small>PAQUETE</small>
                            <select class="form-select">
                                <option></option>
                                <option value="1">Boda ($10,000)</option>
                                <option value="2">Eventos Empresariales ($8,000)</option>
                                <option value="3">Eventos Especiales ($10,000)</option>
                                <option value="4" selected>Graduaciones ($10,200)</option>
                                <option value="5">XV Años ($10,000)</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mb-3">
                            <small>FECHA</small>
                            <input type="date" class="form-control">
                        </div>
                        <div class="col mb-3">
                            <small>HORA INICIO</small>
                            <input type="time" class="form-control">
                        </div>
                        <div class="col mb-3">
                            <small>HORA FIN</small>
                            <input type="time" class="form-control">
                        </div>
                    </div>
                    <div class="col mb-3">
                        <small>INVITADOS CONTEMPLADOS</small>
                        <input type="text" class="form-control" value="">
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
                                <td>Mobiliario y decoración</td>
                                <td>$</td>
                                <td><a href="#" class="text-decoration-none texto-color" title="Eliminar"><i class="bi bi-trash3-fill"></i></a></td>
                            </tr>
                            <tr>
                                <td>Fotografia</td>
                                <td>$</td>
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
                    <div class="col">
                        <h4><b>Total: </b>$10,200</h4>
                    </div>
                    <div class="col d-grid gap-2 d-md-flex justify-content-md-end">
                        <button type="button" class="btn emp_button_c">Confirmar Evento</button>
                        <button type="submit" class="btn emp_button">Guardar</button>
                    </div>
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