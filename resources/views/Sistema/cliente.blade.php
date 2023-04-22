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
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($eventos as $evento)
                        <tr class="text-center">
                            <th scope="row">{{ $evento['id'] }}</th>
                            <td>{{ $evento['nombre_evento'] }}</td>
                            <td>{{ $evento['fecha'] }}</td>
                            <td>
                                @if ($evento['estatus']=='Confirmado')
                                    <input class="form-check-input" type="checkbox" value="" checked disabled>
                                @else
                                    <input class="form-check-input" type="checkbox" value="" disabled>
                                @endif
                            </td>
                            <td>
                                <a class="text-decoration-none texto-color" data-bs-toggle="collapse" data-bs-target="#collapseWidthExample" aria-expanded="false" aria-controls="collapseWidthExample">
                                    <i class="bi bi-images" style="font-size:20px;"></i>
                                </a>
                            </td>
                            <td>
                                @if ($evento->estatus == "Confirmado")
                                    <a href="{{ route('evento.showCliente', $evento) }}" class="btn emp_button_plus">Datos</a>
                                @else
                                    <a href="{{ route('evento.edit', $evento) }}" class="btn emp_button_plus">Editar</a>
                                @endif
                            </td>
                            <td>
                                @if ($evento->estatus == "Confirmado")
                                    <a class="btn emp_button_plus" data-bs-target="#modalDetallesContrato{{ $evento['id'] }}" data-bs-toggle="modal">Contrato</a>
                                @else
                                    <a class="btn emp_button_plus" data-bs-target="#modalDetallesContrato{{ $evento['id'] }}" data-bs-toggle="modal">Eliminar</a>
                                @endif
                            </td>
                        </tr>
                        <div class="modal fade" id="modalDetallesContrato{{ $evento['id'] }}" aria-hidden="true" aria-labelledby="modalDetallesContratoLabel" tabindex="-1">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5 text-success" id="modalDetallesContratoLabel">{{ $evento['nombre_evento'] }}</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <dl class="row">
                                            <p><strong>Fecha programada: </strong>{{ $evento['fecha'] }}</p>
                                            <p><strong>Evento: </strong>{{ $evento['nombre_evento'] }}</p>
                                            <p><strong>Proposito: </strong> {{ $evento['proposito'] }}</p>
                                            <hr>
                                            @foreach ($paquetes as $paquete)
                                                @if ($evento['paquete_id'] == $paquete->id)
                                                    <p><strong>Paquete: </strong>{{ $paquete['nombre'] }}</p>
                                                @endif
                                            @endforeach
                                            <div class="col-sm-6">
                                                <p><strong> Hora inicial: </strong>{{ $evento['hora_inicio'] }}</p>
                                            </div>
                                            <div class="col-sm-6">
                                                <p><strong>Hora final: </strong>{{ $evento['hora_final'] }}</p>
                                            </div>
                                            <p><strong>Invitados contemplados: </strong> {{ $evento['num_invitados'] }}</p>
                                            <div class="col-sm-6">
                                                <p><strong>Servicios: </strong></p>
                                            </div>
                                            <div class="col-sm-6">
                                                <ul>
                                                    @foreach ($evento->servicios as $serv)
                                                        @foreach ($servicios as $servicio)
                                                            @if ($serv->pivot->servicio_id == $servicio->id)
                                                                <li>{{ $servicio->nombre }}</li>
                                                            @endif
                                                        @endforeach
                                                    @endforeach
                                                </ul>
                                            </div>
                                            <br>
                                            <p><strong>Estado de cuenta:</strong></p>
                                        </dl>
                                        <p class="text-end">$0/<strong class="text-success">${{ $evento['costo'] }}</strong></p>
                                    </div>
                                    <div class="modal-footer">
                                        <button class="btn emp_button_c" data-bs-target="#modalDetallesContrato2{{ $evento['id'] }}" data-bs-toggle="modal">Cancelar Evento</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal fade" id="modalDetallesContrato2{{ $evento['id'] }}" aria-hidden="true" aria-labelledby="modalDetallesContratoLabel2" tabindex="-1">
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
                    @endforeach
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
@endsection
