@extends('plantilla.layout')

@section('usuario')
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false"><i class="bi bi-person-circle"></i>nombre_clientes</a>
        <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">Cerrar sesión</a></li>
        </ul>
    </li>
@endsection

@section('contenido')
    <div class="p-5 text-center bg-light" style="margin-top: 60px;">
        <h1 class="mb-3">Bienvenido (nombre_cliente)</h1>
        <h4 class="mb-3">Esta es tu agenda de tus proximos eventos.</h4>
    </div>


  <div class="container col-7">
  <table class="table table-hover">
  <thead>
    <tr class="text-center">
      <th scope="col">#</th>
      <th scope="col">Evento</th>
      <th scope="col">Fecha</th>
      <th scope="col">Estado</th>
      <th>Imagenes</th>
      <th></th>
    </tr>
  </thead>
  <tbody>
    <tr class="text-center">
      <th scope="row">1</th>
      <td>Boda</td>
      <td>30/04/2023</td>
      <td><input class="form-check-input" type="checkbox" value="" checked disabled></td>
      <td><i class="btn bi bi-images h4 text-primary" style="font-size:20px;"></i></td>
      <td><a class="btn emp_button_plus">Detalles</a></td>
    </tr>
    <tr class="text-center">
      <th scope="row">2</th>
      <td>Bautizo</td>
      <td>30/05/2023</td>
      <td><input class="form-check-input" type="checkbox" value="" checked disabled></td>
      <td><i class="btn bi bi-images text-primary" style="font-size:20px;"></i></td>
      <td><a class="btn emp_button_plus" data-bs-target="#modalDetallesContrato" data-bs-toggle="modal">Detalles</a></td>
    </tr>
    <tr class="text-center">
      <th scope="row">3</th>
      <td>Graduacion</td>
      <td>-</td>
      <td><input class="form-check-input" type="checkbox" value="" disabled></td>
      <td>-</td>
      <td> <a href="{{ route('principal') }}" class="btn emp_button_plus">Modificar</a></td>
    </tr>
  </tbody>
</table>

<h2>aquie va imagenes</h2>
<form action="sube.php" method="post" enctype="multipart/form-data">
  <input type="file" name="archivo">
  <button>Subir</button>
</form>
    </div>

    <!--modales-->
    <div class="modal fade" id="modalDetallesContrato" aria-hidden="true" aria-labelledby="modalDetallesContratoLabel" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5 text-success" id="modalDetallesContratoLabel">Bautizo</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <dl class="row">
          <p><strong>Fecha programada: </strong>30/04/2023</p>
          <p><strong>Paquete: </strong>Bautizo</p>
          <div class="col-sm-6"><p><strong> Hora inicial: </strong>13:00 pm</p></div>
          <div class="col-sm-6"><p><strong>Hora final: </strong>17:00 pm</p></div>
        
        
          <p><strong>Proposito: </strong> Bautizo de alguien</p>
          <p><strong>Invitados contemplados: </strong> 300</p>
          <div class="col-sm-6"><p><strong>Mobiliario: </strong>Sí</p></div>
          <div class="col-sm-6"><p><strong>Manteleria: </strong>Sí</p></div>
          
          <div class="col-sm-6"><p><strong>Servicio: </strong></p></div>
          <div class="col-sm-6"><p>Servicio_1, Servico_2, Servicio_5, Servicio_8.</p></div>
          <br>
          <p><strong>Estado de cuenta:</strong></p>
        </dl>
          <p class="text-end">$15,500.00/<strong class="text-success">$35,000.00</strong></p>
      </div>
      <div class="modal-footer">
        <button class="btn btn-warning" data-bs-target="#modalDetallesContrato2" data-bs-toggle="modal">Cancelar Evento</button>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="modalDetallesContrato2" aria-hidden="true" aria-labelledby="modalDetallesContratoLabel2" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5 text-center" id="modalDetallesContratoLabel2"><i class="bi bi-exclamation-octagon-fill text-warning" style="font-size: 26px"></i>Confirmar Cancelación</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <h1 class="display-6 text-center">Estimado Cliente</h1>
      <p><em>Le informamos que nuestra politica de devoluciones establace que no se aceptan devoluciones de pago para eventos que ya han sido programados y organizados. <br> Esto se debe a que hemos reservado el tiempo y los recursos necesarios para su evento. Nosotros nos hemos comprometido a cumplir con nuestros servicios según lo acordado.</em></p>
      <p class="text-center"><em>Gracias por su preferencia.</em></p>
      </div>
      <div class="modal-footer">
        <button class="btn btn-danger" aria-label="Close" data-bs-toggle="modal">Confirmar</button>
      </div>
    </div>
  </div>
</div>










    <!--
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
    </div>-->


    <!--
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Estado de Cuenta</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="#">
                    <div class="modal-body">
                        <p>Estimado cliente, su paquete cuenta con los siguientes paquetes.</p>
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
    </div>-->
    </div>
@endsection
