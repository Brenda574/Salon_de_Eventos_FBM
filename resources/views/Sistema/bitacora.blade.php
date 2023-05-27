@extends('plantilla.layout')

@section('usuario')
    <li><a class="nav-link" href="{{ route('sistema.gerente') }}">Inicio</a></li>
@endsection

<script>
    var msg = '{{ Session::get('alert') }}';
    var exist = '{{ Session::has('alert') }}';
    if (exist) {
        alert(msg);
    }
</script>

@section('contenido')
    <div class="p-5 text-center emp_ban">
        <h1 class="mb-3">BITACORA DEL SISTEMA</h1>
    </div>
    <div class="container container_galery">
        <div class="accordion accordion-flush" id="accordionFlushExample">
            <div class="accordion-item">
                <h3 class="accordion-header" id="flush-headingOne">
                    <button class="accordion-button plegable collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                        <H3>MOVIMEINTOS</H3>
                    </button>
                </h3>
                <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne"
                    data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">
                        <table id="tablax" class="table table-hover">
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

    <script src="https://code.jquery.com/jquery-3.4.1.js"
        integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous">
    </script>

    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js">
    </script>

    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js">
    </script>

    <script>
        $(document).ready(function () {
            $('#tablax').DataTable({
                language: {
                    processing: "",
                    search: "Buscar&nbsp;:",
                    lengthMenu: "Registros&nbsp;: _MENU_",
                    info: "",
                    infoEmpty: "",
                    infoFiltered: "",
                    infoPostFix: "",
                    loadingRecords: "Cargando...",
                    zeroRecords: "No se encontraron datos con tu busqueda.",
                    emptyTable: "No hay datos disponibles en la tabla.",
                    paginate: {
                        first: "|<",
                        previous: "<<",
                        next: ">>",
                        last: ">|"
                    }
                },
                scrollY: 400,
                lengthMenu: [ [10, 25, -1], [10, 25, "Todos"] ],
            });
        });
    </script>
@endsection
