@extends('plantilla.layout')

@section('usuario')
    <li><a class="nav-link" href="{{ route('sistema.cliente') }}">Inicio</a></li>
@endsection

@section('authenticacion')
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false"><i
                class="bi bi-person-circle"></i> {{ Auth::user()->nombre }}</a>
        <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="{{ route('logout') }}">Cerrar sesión</a></li>
        </ul>
    </li>
@endsection

@section('contenido')
    <div class="container">
        <br>
        <div class="row container_galery">
            <h3 class="label fw-bold" style="color: #af9495">Nuevo Evento</h3>
        </div>
        <hr>
        <form method="post" action="{{ route('evento.store') }}">
            <div>
                <div class="row container_galery">
                    <div class="row">
                        <div class="col mb-3">
                            <small>EVENTO</small>
                            <input type="text" class="form-control" name="nombre_evento" id="nombre_evento">
                        </div>
                        <div class="col mb-3">
                            <small>PAQUETE</small>
                            <select class="form-select" name="paquete_id" id="paquete_id">
                                <option selected></option>
                                @foreach ($paquetes as $paquete)
                                    <option value="{{ $paquete->id }}">{{ $paquete['nombre'] }} →
                                        ${{ $paquete['costo'] }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mb-3">
                            <small>FECHA</small>
                            <input type="date" class="form-control" name="fecha" id="fecha">
                        </div>
                        <div class="col mb-3">
                            <small>HORA INICIO</small>
                            <input type="time" class="form-control" name="hora_inicio" id="hora_inicio">
                        </div>
                        <div class="col mb-3">
                            <small>HORA FIN</small>
                            <input type="time" class="form-control" name="hora_final" id="hora_final">
                        </div>
                    </div>
                    <div class="col mb-3">
                        <small>INVITADOS CONTEMPLADOS</small>
                        <input type="text" class="form-control" name="num_invitados" id="num_invitados">
                    </div>
                </div>
            </div>
            <hr>
            <div>
                <div class="row container_galery">
                    <H5>Servicios</H5>
                    <table id="tabla-servicios" class="table table-hover">
                        <tbody>
                            <tr>
                                <td>#</td>
                                <td>Servicio</td>
                                <td>Costo</td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <a class="emp_button_plus btn" data-bs-toggle="modal" data-bs-target="#agregarServicio"><i
                                class="bi bi-plus-lg"></i></i></a>
                    </div>
                </div>
            </div>
            <hr>
            <div>
                <div class="row container_galery">
                    <div class="col">
                        <h4><b>Total: </b> $</h4>
                    </div>
                    <div class="col d-grid gap-2 d-md-flex justify-content-md-end">
                        <button type="button" class="btn emp_button_c">Confirmar Evento</button>
                        <button type="submit" class="btn emp_button">Guardar</button>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <div class="modal fade" id="agregarServicio" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="agregarAbonoLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Servicios</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <table class="table table-hover">
                        <tbody>
                            @foreach ($servicios as $servicio)
                                <tr>
                                    <th scope="row"><input class="form-check-input" type="checkbox" name="servicio"
                                            value="{{ $servicio->id }}" data-id="{{ $servicio->id }}"
                                            data-costo="{{ $servicio->costo }}" data-nombre="{{ $servicio->nombre }}"></th>
                                    <td>{{ $servicio['nombre'] }} (${{ $servicio['costo'] }})</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="d-grid gap-2 col-6 mx-auto">
                        <button type="submit" class="btn emp_button" onclick="agregarServicios()">Agregar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function agregarServicios() {
            var checkboxes = document.querySelectorAll('input[name="servicio"]:checked')
            checkboxes.forEach(function(checkbox) {
                var id = checkbox.dataset.id;
                var nombre = checkbox.dataset.nombre;
                var costo = checkbox.dataset.costo;
                var row = document.createElement('tr');
                row.innerHTML = '<td>' + id + '<td>' + nombre + '</td> $' + costo + '</td>';
                document.getElementById('tabla-servicios').appendChild(row);
            });
        }
    </script>
@endsection
