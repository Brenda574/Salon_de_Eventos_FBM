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
        <form id="evento" method="post" action="{{ route('evento.store') }}">
            @csrf
            <div>
                <div class="row container_galery">
                    <div class="row">
                        <div class="col mb-3">
                            <small>EVENTO</small>
                            <input type="text" class="form-control" name="nombre_evento" id="nombre_evento">
                        </div>
                        <div class="col mb-3">
                            <small>PAQUETE</small>
                            <select class="form-select" name="paquete_id" id="paquete_id" onchange="ShowSelected();">
                                <option value="0" selected data-costo="0"></option>
                                @foreach ($paquetes as $paquete)
                                    <option value="{{ $paquete->id }}" data-costo="{{ $paquete->costo }}">
                                        {{ $paquete['nombre'] }} →
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
                        <div class="col mb-3">
                            <small>INVITADOS CONTEMPLADOS</small>
                            <input type="text" class="form-control" name="num_invitados" id="num_invitados">
                        </div>
                    </div>
                    <div class="col mb-3">
                        <small>DESCRIPCION</small>
                        <input type="text" class="form-control" name="proposito" id="proposito">
                    </div>
                    <div class="col mb-3">
                        <small>ESTATUS</small>
                        <div class="d-grid gap-2">
                            <select class="form-select estatus_ac" aria-label="Default select example" id="estatus"
                                name="estatus">
                                <option selected>Confirmado</option>
                                <option value="1">SinConfirmar</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <div>
                <div class="row container_galery">
                    <H5>Servicios</H5>
                    <table id="tabla-servicios" class="table table-hover" name="servicios">
                        <tbody>
                            <tr>
                                <td>#</td>
                                <td>Servicio</td>
                                <td>Costo</td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <a class="emp_button_plus btn" data-bs-toggle="modal" data-bs-target="#agregarServicio"><i
                                class="bi bi-plus-lg"></i></i></a>
                    </div>
                    <div class="col d-grid gap-2 d-md-flex">
                        <button type="button" onclick="borrarServicios()" class="btn emp_button_c">Borrar todo</button>
                    </div>
                </div>
            </div>
            <hr>
            <div>
                <div class="row container_galery">
                    <div class="col row fs-3" style="margin-block: -5px; padding: -5px;">
                        <label for="total" class="col-sm-3 col-form-label text-end"><b>Total: </b> $</label>
                        <div class="col" style="padding: 0; margin-left: -4px;"><input type="text" readonly class="form-control-plaintext" id="total" name="total" value="0"></div>
                    </div>
                    <div class="col d-grid gap-2 d-md-flex justify-content-md-end">
                        <button type="button" class="btn emp_button_c">Confirmar Evento</button>
                        <input type="hidden" name="servicios_id" id="servicios_id" value="">
                        <button type="submit" class="btn emp_button" form="evento">Guardar</button>
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
                                            data-costo="{{ $servicio->costo }}" data-nombre="{{ $servicio->nombre }}"
                                            data-agregado="false"></th>
                                    <td>{{ $servicio['nombre'] }} (${{ $servicio['costo'] }})</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="d-grid gap-2 col-6 mx-auto">
                        <button type="button" class="btn emp_button" onclick="agregarServicios()">Agregar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type="text/javascript">
        var serviciosSeleccionados = {};
        var aux = 0;

        function agregarServicios() {
            var checkboxes = document.querySelectorAll('input[name="servicio"]:checked')
            var textoT = document.getElementById('total').value;
            var total = Number(textoT);
            var serviciosIdsSeleccionados = [];
            checkboxes.forEach(function(checkbox) {
                var id = checkbox.dataset.id;
                var nombre = checkbox.dataset.nombre;
                var costo = checkbox.dataset.costo;
                if (serviciosSeleccionados[id]) {
                    return;
                }
                serviciosSeleccionados[id] = true;
                serviciosIdsSeleccionados.push(id);
                var row = document.createElement('tr');
                row.innerHTML = '<td>' + id + '<td>' + nombre + '</td> $' + costo +
                    '<td> <button type="button" class="btn btn-link text-decoration-none texto-color" title="Eliminar" onclick="eliminarUno(this)"> <i class="bi bi-trash3-fill"></i> </button> </td>';
                total += Number(costo);
                document.getElementById('tabla-servicios').appendChild(row);
                checkbox.dataset.agregado = 'true';
            });
            document.querySelector('#total').value = total;
            document.querySelector('#servicios_id').value = JSON.stringify(serviciosIdsSeleccionados);
            cerrarModal();
        }

        function cerrarModal() {
            $('#agregarServicio').modal('hide');
        }

        function borrarServicios() {
            var tabla = document.getElementById('tabla-servicios');
            tabla.innerHTML = '<td>#</td> <td>Servicio</td> <td>Costo</td> <td></td>';
            serviciosSeleccionados = {};
            document.querySelector('#total').value = 0 + aux;
        }

        function eliminarUno(btn) {
            var fila = btn.parentNode.parentNode;
            var id = fila.firstChild.innerHTML;
            serviciosSeleccionados[id] = false;
            fila.parentNode.removeChild(fila);
            document.querySelector('#total').value = total;
        }
        var costo = 0;

        function ShowSelected() {
            var combo = document.getElementById("paquete_id");
            var selected = combo.options[combo.selectedIndex].value;
            var costo = combo.options[combo.selectedIndex].dataset.costo;
            var total = Number(document.querySelector('#total').value);
            for (var paquete of combo.options) {
                if (selected == paquete.value) {
                    var nuevoTotal = total + Number(paquete.dataset.costo) - aux;
                    document.querySelector('#total').value = nuevoTotal;
                    costo = nuevoTotal; // Almacenar el costo total en la variable global
                    aux = Number(paquete.dataset.costo);
                }
            }
        }
    </script>
@endsection
