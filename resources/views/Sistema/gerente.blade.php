@extends('plantilla.layout')

@section('authenticacion')
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">
            <i class="bi bi-person-circle"></i> {{ Auth::user()->nombre }}
        </a>
        <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="{{ route('logout') }}">Cerrar sesión</a></li>
        </ul>
    </li>
@endsection

<script>
    var msg = '{{Session::get('alert')}}';
    var exist = '{{Session::has('alert')}}';
    if(exist){
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
                                                    class="btn text-decoration-none texto-color" title="Detalles"><i
                                                        class="bi bi-card-heading"></i></a>
                                                <a href="{{ route('usuario.edit', $item) }}"
                                                    class="btn text-decoration-none texto-color" title="Editar"><i
                                                        class="bi bi-pencil-square"></i></a>
                                                <button type="submit" class="btn btn-link text-decoration-none texto-color"
                                                    title="Eliminar">
                                                    <i class="bi bi-trash3-fill"></i>
                                                </button>
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
                                                    class="btn text-decoration-none texto-color" title="Detalles"><i
                                                        class="bi bi-card-heading"></i></a>
                                                <a href="{{ route('paquete.edit', $item) }}"
                                                    class="btn text-decoration-none texto-color" title="Editar"><i
                                                        class="bi bi-pencil-square"></i></a>
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
                                                    class="btn text-decoration-none texto-color" title="Detalles"><i
                                                        class="bi bi-card-heading"></i></a>
                                                <a href="{{ route('servicio.edit', $item) }}"
                                                    class="btn text-decoration-none texto-color" title="Editar"><i
                                                        class="bi bi-pencil-square"></i></a>
                                                <button type="submit"
                                                    class="btn btn-link text-decoration-none texto-color"
                                                    title="Eliminar">
                                                    <i class="bi bi-trash3-fill"></i>
                                                </button>
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
@endsection