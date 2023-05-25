@extends('plantilla.layout')

<script>
    var msg = '{{ Session::get('alert') }}';
    var exist = '{{ Session::has('alert') }}';
    if (exist) {
        alert(msg);
    }
</script>

@section('contenido')
    <div class="p-5 text-center emp_ban">
        <h1 class="mb-3">PORTAL DE GERENTE</h1>
    </div>
    <div class="container container_galery">
        <div class="accordion accordion-flush" id="accordionFlushExample">
            <div class="accordion-item">
                <h3 class="accordion-header" id="flush-headingOne">
                    <button class="accordion-button plegable collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                        <H3>Usuarios</H3>
                    </button>
                </h3>
                <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne"
                    data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <a href={{ route('usuario.create') }} type="submit" class="btn emp_button_c">Nuevo</a>
                        </div>
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nombre(s)</th>
                                    <th scope="col">Usuario</th>
                                    <th scope="col">Rol</th>
                                    <th scope="col">Creación</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($usuarios as $item)
                                    <tr>
                                        <th scope="row">{{ $item['id'] }}</th>
                                        <td>{{ $item['nombre'] }}</td>
                                        <td>{{ $item['usuario'] }}</td>
                                        <td>{{ $item['rol'] }}</td>
                                        <td>{{ $item['created_at'] }}</td>
                                        <td>
                                            <form action="{{ route('usuario.destroy', $item) }}" method="post">
                                                @method('DELETE')
                                                @csrf
                                                <a href="{{ route('usuario.show', $item) }}"
                                                    class="btn text-decoration-none texto-color" title="Detalles">
                                                    <i class="bi bi-card-heading"></i>
                                                </a>
                                                <a href="{{ route('usuario.edit', $item) }}"
                                                    class="btn text-decoration-none texto-color" title="Editar">
                                                    <i class="bi bi-pencil-square"></i>
                                                </a>
                                                @can('delete', $item)
                                                    <button type="submit" class="btn btn-link text-decoration-none texto-color"
                                                        title="Eliminar">
                                                        <i class="bi bi-trash3-fill"></i>
                                                    </button>
                                                @endcan
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="flush-headingTwo">
                    <button class="accordion-button plegable collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                        <H3>Paquetes</H3>
                    </button>
                </h2>
                <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo"
                    data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <a href="{{ route('paquete.create') }}" class="btn emp_button_c">Nuevo</a>
                        </div>
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Titulo</th>
                                    <th scope="col">Capacidad Max</th>
                                    <th scope="col">Costo</th>
                                    <th scope="col">Descripcion</th>
                                    <th scope="col">Estatus</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($paquetes as $item)
                                    <tr>
                                        <th scope="row">{{ $item['id'] }}</th>
                                        <td>{{ $item['nombre'] }}</td>
                                        <td>{{ $item['capacidad_maxima'] }}</td>
                                        <td>${{ $item['costo'] }}</td>
                                        <td>{{ $item['descripcion'] }}</td>
                                        <td>
                                            @if ($item['estatus'] == 'Activo')
                                                <input class="form-check-input" type="checkbox" value="" checked
                                                    disabled>
                                            @else
                                                <input class="form-check-input" type="checkbox" value="" disabled>
                                            @endif
                                        </td>
                                        <td>
                                            <form action="{{ route('paquete.destroy', $item) }}" method="post">
                                                @method('DELETE')
                                                @csrf
                                                <a href="{{ route('paquete.show', $item) }}"
                                                    class="btn text-decoration-none texto-color" title="Detalles">
                                                    <i class="bi bi-card-heading"></i></a>
                                                @can('update', $item)
                                                    <a href="{{ route('paquete.edit', $item) }}"
                                                        class="btn text-decoration-none texto-color" title="Editar">
                                                        <i class="bi bi-pencil-square"></i></a>
                                                @endcan
                                                @can('delete', $item)
                                                    <button type="submit" class="btn btn-link text-decoration-none texto-color"
                                                        title="Eliminar">
                                                        <i class="bi bi-trash3-fill"></i>
                                                    </button>
                                                @endcan
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="flush-headingThree">
                    <button class="accordion-button plegable collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                        <H3>Servicios</H3>
                    </button>
                </h2>
                <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree"
                    data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <a href="{{ route('servicio.create') }}" class="btn emp_button_c">Nuevo</a>
                        </div>
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Costo</th>
                                    <th scope="col">Descripcion</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($servicios as $item)
                                    <tr>
                                        <th scope="row">{{ $item['id'] }}</th>
                                        <td>{{ $item['nombre'] }}</td>
                                        <td>${{ $item['costo'] }}</td>
                                        <td>{{ $item['descripcion'] }}</td>
                                        <td>
                                            <form action="{{ route('servicio.destroy', $item) }}" method="post">
                                                @method('DELETE')
                                                @csrf
                                                <a href="{{ route('servicio.show', $item) }}"
                                                    class="btn text-decoration-none texto-color" title="Detalles">
                                                    <i class="bi bi-card-heading"></i></a>
                                                @can('update', $item)
                                                    <a href="{{ route('servicio.edit', $item) }}"
                                                        class="btn text-decoration-none texto-color" title="Editar">
                                                        <i class="bi bi-pencil-square"></i></a>
                                                @endcan
                                                @can('delete', $item)
                                                    <button type="submit"
                                                        class="btn btn-link text-decoration-none texto-color"
                                                        title="Eliminar">
                                                        <i class="bi bi-trash3-fill"></i>
                                                    </button>
                                                @endcan
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container container_galery">
        <p class="label fw-bold">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                class="bi bi-calendar4-event" viewBox="0 0 16 16">
                <path
                    d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM2 2a1 1 0 0 0-1 1v1h14V3a1 1 0 0 0-1-1H2zm13 3H1v9a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V5z" />
                <path d="M11 7.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1z" />
            </svg> EVENTOS REGISTRADOS
        </p>
        <hr>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th class="text-center" scope="col">#</th>
                    <th class="text-center" scope="col">Evento</th>
                    <th class="text-center" scope="col">Cliente</th>
                    <th class="text-center" scope="col">Fecha</th>
                    <th class="text-center" scope="col">Confirmación</th>
                    <th class="text-center" scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($eventos as $evento)
                    <tr>
                        <th class="text-center" scope="row">{{ $evento->id }}</th>
                        <td>{{ $evento->nombre_evento }}</td>
                        <td class="text-center">{{ $evento->usuario_id }}</td>
                        <td class="text-center">{{ $evento->fecha }}</td>
                        <td class="text-center">
                            @if ($evento['estatus'] == 'Confirmado')
                                <input class="form-check-input" type="checkbox" value="" checked disabled>
                            @else
                                @if ($evento['estatus'] == 'Pendiente')
                                    <p style="color: rgb(156, 156, 42)">Autorización<br>Pendiente</p>
                                @else
                                    <input class="form-check-input" type="checkbox" value="" disabled>
                                @endif
                            @endif
                        </td>
                        <td><a href="{{ route('evento.showGerente', $evento->id) }}" class="btn emp_button_plus"><i
                                    class="bi bi-three-dots-vertical"></i></a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="d-grid gap-2 d-md-flex justify-content-md-center" style="padding: 2rem">
        <a href={{ route('sistema.bitacora') }} type="submit" class="btn emp_button_c">Historial</a>
    </div>
@endsection
