@extends('plantilla.layout')

@section('contenido')
    <div class="p-5 text-center emp_ban">
        <h1 class="mb-3">PORTAL DE EMPLEADOS</h1>
    </div>
    <div class="container container_galery">
        <h3>Registro de Eventos</h3>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Evento</th>
                    <th scope="col">Cliente</th>
                    <th scope="col">Fecha</th>
                    <th scope="col">Confirmación</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($eventos as $evento)
                    <tr>
                        <th scope="row">{{ $evento->id }}</th>
                        <td>{{ $evento->nombre_evento }}</td>
                        <td>{{ $evento->usuario_id }}</td>
                        <td>{{ $evento->fecha }}</td>
                        <td>
                            @if ($evento['estatus'] == 'Confirmado')
                                <input class="form-check-input" type="checkbox" value="" checked disabled>
                            @else
                                @if ($evento['estatus'] == 'Pendiente')
                                    <p style="color: rgb(156, 156, 42)">Pendiente</p>
                                @else
                                    <input class="form-check-input" type="checkbox" value="" disabled>
                                @endif
                            @endif
                        </td>
                        <td><a href="{{ route('evento.show', $evento->id) }}" class="btn emp_button_plus"><i class="bi bi-three-dots-vertical"></i></a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
