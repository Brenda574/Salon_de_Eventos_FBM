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
    <div class="p-5 text-center emp_ban" style="margin-top: 60px;">
        <h1 class="mb-3">Bienvenido {{Auth::user()->nombre}}</h1>
    </div>
    <div class="container">
        <div class="container_galery">
            <h4 class="mb-3">Estos son tus eventos registrados.</h4>
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <a href="{{ route('evento.create') }}" class="btn emp_button_c">Nuevo</a>
            </div>
            <table class="table table-hover">
                <thead>
                    <tr class="text-center">
                        <th scope="col">#</th>
                        <th scope="col">Evento</th>
                        <th scope="col">Fecha</th>
                        <th scope="col">Confirmación</th>
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
                        <td>
                            <a href="#" class="text-decoration-none texto-color">
                                <i class="bi bi-images" style="font-size:20px;"></i>
                            </a>
                        </td>
                        <td><a class="btn emp_button_plus">Detalles</a></td>
                    </tr>
                    <tr class="text-center">
                        <th scope="row">2</th>
                        <td>Bautizo</td>
                        <td>30/05/2023</td>
                        <td><input class="form-check-input" type="checkbox" value="" checked disabled></td>
                        <td>
                            <a class="text-decoration-none texto-color" data-bs-toggle="collapse" data-bs-target="#collapseWidthExample" aria-expanded="false" aria-controls="collapseWidthExample">
                                <i class="bi bi-images" style="font-size:20px;"></i>
                            </a>
                        </td>
                        <td><a class="btn emp_button_plus" data-bs-target="#modalDetallesContrato" data-bs-toggle="modal">Detalles</a></td>
                    </tr>
                    <tr class="text-center">
                        <th scope="row">3</th>
                        <td>Graduacion</td>
                        <td>-</td>
                        <td><input class="form-check-input" type="checkbox" value="" disabled></td>
                        <td>-</td>
                        <td> <a href="{{ route('evento.edit') }}" class="btn emp_button_plus">Modificar</a></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <hr>
        <div class="container_galery">
            <h4>Galeria</h4>
            <div class="collapse" id="collapseWidthExample">
                <form action="sube.php" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col">
                            <input class="form-control" type="file" name="archivo">
                        </div>
                        <div class="col">
                            <button class="btn emp_button">Subir</button>
                        </div>
                    </div>
                    <div class="row">
                        <div class="lightbox-gallery">
                            <div><img src="https://i.pinimg.com/564x/79/43/42/794342ce554262c8fdeeed2893127deb.jpg"></div>
                            <div><img src="https://i.pinimg.com/564x/0b/09/84/0b098416d0d5269522c4ce26c5a951cb.jpg"></div>
                            <div><img src="https://i.pinimg.com/564x/a3/55/ad/a355ad2d99c3c027f30def41b5543ee1.jpg"></div>
                            <div><img src="https://i.pinimg.com/564x/68/03/b2/6803b24d6f941fd22b17b0febbd40656.jpg"></div>
                        </div>
                    </div>
                </form> 
            </div>
        </div>
    </div>

    <!--modales-->
    <div class="modal fade" id="modalDetallesContrato" aria-hidden="true" aria-labelledby="modalDetallesContratoLabel"
        tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5 text-success" id="modalDetallesContratoLabel">Bautizo</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <dl class="row">
                        <p><strong>Fecha programada: </strong>30/04/2023</p>
                        <p><strong>Evento: </strong>Bautizo</p>
                        <p><strong>Paquete: </strong>Eventos Especiales</p>
                        <div class="col-sm-6">
                            <p><strong> Hora inicial: </strong>13:00 pm</p>
                        </div>
                        <div class="col-sm-6">
                            <p><strong>Hora final: </strong>17:00 pm</p>
                        </div>
                        <p><strong>Invitados contemplados: </strong> 300</p>
                        <div class="col-sm-6">
                            <p><strong>Servicio: </strong></p>
                        </div>
                        <div class="col-sm-6">
                            <p>Catering, Fotografia, Banquete, Ambientación</p>
                        </div>
                        <br>
                        <p><strong>Estado de cuenta:</strong></p>
                    </dl>
                    <p class="text-end">$10,500/<strong class="text-success">$15,000</strong></p>
                </div>
                <div class="modal-footer">
                    <button class="btn emp_button_c" data-bs-target="#modalDetallesContrato2" data-bs-toggle="modal">Cancelar Evento</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalDetallesContrato2" aria-hidden="true" aria-labelledby="modalDetallesContratoLabel2"
        tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5 text-center" id="modalDetallesContratoLabel2">
                        <i class="bi bi-exclamation-octagon-fill text-warning" style="font-size: 26px"></i> Confirmar Cancelación
                    </h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h1 class="display-6 text-center">Estimado Cliente</h1>
                    <p><em>Le informamos que nuestra politica de devoluciones establace que no se aceptan devoluciones de
                            pago para eventos que ya han sido programados y organizados. <br> Esto se debe a que hemos
                            reservado el tiempo y los recursos necesarios para su evento. Nosotros nos hemos comprometido a
                            cumplir con nuestros servicios según lo acordado.</em></p>
                    <p class="text-center"><em>Gracias por su preferencia.</em></p>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-danger" aria-label="Close" data-bs-toggle="modal">Confirmar</button>
                </div>
            </div>
        </div>
    </div>
@endsection
