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
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">¿Quien?</th>
                                    <th scope="col">¿Que?</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($registrosBitacora as $registro)
                                    <tr>
                                        <td>{{ $registro->quien }}</td>
                                        <td>{{ $registro->que }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
    </div>
@endsection
