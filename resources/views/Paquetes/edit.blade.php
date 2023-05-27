@extends('plantilla.layout')

@section('usuario')
    <li><a class="nav-link" href="{{ route('sistema.gerente') }}">Inicio</a></li>
@endsection

@section('contenido')
    <div class="container">
        <br>
        <div class="row container_galery">
            <h3 class="label fw-bold" style="color: #af9495">Editar Paquete</h3>
        </div>
        <hr>
        <form action="{{ route('paquete.update', $paquete->id) }}" method="POST">
            @method('PUT')
            @csrf
            <div>
                <div class="row container_galery">
                    <div class="mb-3">
                        <small>TITULO</small>
                        <input type="text" class="form-control" value="{{ $paquete->nombre }}" name="nombre"
                            id="nombre">
                    </div>
                    <div class="mb-3">
                        <small>CAPACIDAD MAX</small>
                        <input type="text" class="form-control" value="{{ $paquete->capacidad_maxima }}" name="capacidad"
                            id="capacidad">
                    </div>
                    <div class="mb-3">
                        <small>COSTO</small>
                        <input type="text" class="form-control" value="{{ $paquete->costo }}" name="costo"
                            id="costo">
                    </div>
                    <div class="mb-3">
                        <small>DESCRIPCIÓN</small>
                        <textarea class="form-control" rows="3" name="descripcion" id="descripcion">{{ $paquete->descripcion }}</textarea>
                    </div>
                </div>
            </div>
            <hr>
            <div>
                <div class="container_galery">
                    <div class="d-grid gap-2 col-6 mx-auto">
                        <select class="form-select estatus_ac" aria-label="Default select example" id="estatus"
                            name="estatus">
                            @if ($paquete->estatus == 'Activo')
                                <option>Inactivo</option>
                                <option selected>Activo</option>
                            @else
                                <option selected>Inactivo</option>
                                <option>Activo</option>
                            @endif
                        </select>
                    </div>
                </div>
            </div>
            <hr>
            <div>
                <div class="row container_galery">
                    <button type="submit" class="btn emp_button">Guardar</button>
                </div>
            </div>
            
            <div class="modal fade" id="agregarFoto" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Nueva Foto</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('paquete.subirImg', ['idPaquete' => $paquete->id]) }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <input class="form-control" type="file" name="archivo[]" id="archivo" multiple
                                        accept="image/*">
                                </div>
                                <div class="d-grid gap-2 col-6 mx-auto">
                                    <button type="submit" class="btn emp_button">Aceptar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
