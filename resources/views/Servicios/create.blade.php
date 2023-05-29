@extends('plantilla.layout')

@section('usuario')
    <li><a class="nav-link" href="{{ route('sistema.gerente') }}">Inicio</a></li>
@endsection

@section('contenido')
    <div class="container">
        <br>
        <div class="row container_galery">
            <h3 class="label fw-bold" style="color: #af9495">Nuevo Servicio</h3>
        </div>
        <hr>
        <form action="{{ route('servicio.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div>
                <div class="row container_galery">
                    <div class="mb-3">
                        <small>NOMBRE</small>
                        <input type="text" class="form-control" name="nombre" id="nombre">
                    </div>
                    <div class="mb-3">
                        <small>COSTO</small>
                        <input type="text" class="form-control" name="costo" id="costo">
                    </div>
                    <div class="mb-3">
                        <small>DESCRIPCIÓN</small>
                        <textarea class="form-control" rows="3" name="descripcion" id="descripcion"></textarea>
                    </div>
                </div>
            </div>
            <hr>
            <div>
                <div class="row container_galery">
                    <p class="label fw-bold">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-images" viewBox="0 0 16 16">
                            <path d="M4.502 9a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3z" />
                            <path
                                d="M14.002 13a2 2 0 0 1-2 2h-10a2 2 0 0 1-2-2V5A2 2 0 0 1 2 3a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2v8a2 2 0 0 1-1.998 2zM14 2H4a1 1 0 0 0-1 1h9.002a2 2 0 0 1 2 2v7A1 1 0 0 0 15 11V3a1 1 0 0 0-1-1zM2.002 4a1 1 0 0 0-1 1v8l2.646-2.354a.5.5 0 0 1 .63-.062l2.66 1.773 3.71-3.71a.5.5 0 0 1 .577-.094l1.777 1.947V5a1 1 0 0 0-1-1h-10z" />
                        </svg> Imagenes
                    </p>
                    <div class="row">
                        <div class="mb-3">
                            <input class="form-control" type="file" accept="image/*" name="archivoServicio[]"
                                id="archivoServicios" multiple>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <div>
                <div class="row container_galery">
                    <button type="submit" class="btn emp_button">Guardar</button>
                </div>
            </div>
        </form>
    </div>
    <!--
        <div class="modal fade" id="agregarFoto" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Nueva Foto</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <div class="d-grid gap-2 col-6 mx-auto">
                            <button type="submit" class="btn emp_button">Aceptar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>-->
@endsection
