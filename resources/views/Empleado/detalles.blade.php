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
    <div class="container">
        <br>
        <small>ID</small>
        <h3 class="label fw-bold">1</h3>
        <hr>
        <div>
            <p class="label fw-bold">Detalles</p>
            <div class="row">
                <div class="col text-center">
                    <small>EVENTO</small>
                    <p class="label fw-bold">Boda</p>
                </div>
                <div class="col text-center">
                    <small>CLIENTE</small>
                    <p class="label fw-bold">Cliente 1</p>
                </div>
                <div class="col text-center">
                    <small>Fecha</small>
                    <p class="label fw-bold">20/03/2023</p>
                </div>
                <div class="col text-center">
                    <small>Costo</small>
                    <p class="label fw-bold">$15,000.00</p>
                </div>
            </div>
        </div>
        <hr>
        <div>
            <small class="label float-end fst-italic" style="color: orange">Pendiente</small>
            <p class="label fw-bold">Pagos</p>
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
                <small><button class="emp_button_plus btn"  data-bs-toggle="modal" data-bs-target="#staticBackdrop">AÑADIR</button></small>
            </div>
        </div>
    </div>

    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Nuevo Abono</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="#">
                    <div class="modal-body">
                        <div class="mb-3 row">
                            <label for="staticCosto" class="col-sm-4 col-form-label fw-bold">Diferencia: </label>
                            <div class="col-sm-8">
                                <input type="text" readonly class="form-control-plaintext" id="staticCosto" value="$4,500.00">
                            </div>
                        </div>
                        <hr>
                        <div>
                            <form action="#">
                                <div class="mb-3">
                                    <small>Monto</small>
                                    <input class="form-control" type="text">
                                </div>
                                <div class="mb-3">
                                    <small>Tipo de Pago</small>
                                    <input class="form-control" list="datalistOptions">
                                    <datalist id="datalistOptions">
                                        <option value="Credito">
                                        <option value="Debito">
                                        <option value="Efectivo">
                                    </datalist>
                                </div>
                                <button type="submit" class="btn emp_button">Aceptar</button>
                            </form>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>
@endsection