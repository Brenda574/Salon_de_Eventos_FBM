@extends('plantilla.layout')

@section('usuario')
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Empleado</a>
        <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="{{ route('principal') }}">Salir</a></li>
        </ul>
    </li>
@endsection

@section('contenido')
    <div class="p-5 text-center bg-light" style="margin-top: 60px;">
        <h1 class="mb-3">PORTAL DE EMPLEADOS</h1>
        <h4 class="mb-3">...</h4>
    </div>
    <div>
        <hr>
        <h3>Registro de Eventos</h3>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Evento</th>
                    <th scope="col">Cliente</th>
                    <th scope="col">Fecha</th>
                    <th scope="col">Estatus</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td>Boda</td>
                    <td>Cliente 1</td>
                    <td>20/03/2023</td>
                    <td>Confirmado</td>
                    <td><a class="btn" data-bs-toggle="modal" data-bs-target="#staticBackdrop">+</a></td>
                </tr>
                <tr>
                    <th scope="row">2</th>
                    <td>Evento Empresarial</td>
                    <td>Cliente 2</td>
                    <td>08/03/2023</td>
                    <td>En Curso</td>
                    <td><a class="btn" data-bs-toggle="modal" data-bs-target="#staticBackdrop">+</a></td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Evento</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="#">
                    <div class="modal-body">
                        <small class="label float-end fst-italic" style="color: orange">Pendiente</small>
                        <div class="mb-3 row">
                            <label for="staticCosto" class="col-sm-2 col-form-label fw-bold">Total</label>
                            <div class="col-sm-10"><input type="text" readonly class="form-control-plaintext"
                                    id="staticCosto" value="$15,000.00"></div>
                        </div>
                        <hr>
                        <div>
                            <p class="label fw-bold">Abonos</p>
                            <div class="row">
                                <div class="col text-center">
                                    <small>#</small>
                                    <p class="label fw-bold">1</p>
                                </div>
                                <div class="col text-center">
                                    <small>Cantidad</small>
                                    <p class="label fw-bold">$10,500.00</p>
                                </div>
                                <div class="col text-center">
                                    <small>Diferencia</small>
                                    <p class="label fw-bold">$4,500.00</p>
                                </div>
                            </div>
                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                <small><a class="emp_add text-decoration-none">AÑADIR</a></small>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn emp_button_c" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn emp_button">Aceptar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>
@endsection
