@extends('plantilla.layout')

@section('usuario')
    <li><a class="nav-link" href="{{ route('sistema.gerente') }}">Inicio</a></li>
@endsection

@section('contenido')
    <div class="container">
        <br>
        <div class="row container_galery">
            <div class="col-1">
                <small>ID</small>
                <h3 class="label fw-bold">1</h3>
            </div>
            <div class="col">
                <small>Titulo</small>
                <h3 class="label fw-bold" style="color: #af9495">Boda</h3>
            </div>
        </div>
        <hr>
        <div>
            <div class="row container_galery">
                <p class="label fw-bold">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-card-heading" viewBox="0 0 16 16">
                        <path d="M14.5 3a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h13zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13z"/>
                        <path d="M3 8.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5zm0-5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5v-1z"/>
                    </svg> Detalles
                </p>
                <div class="row">
                    <div class="col text-center">
                        <small>Capacidad</small>
                        <p class="label fw-bold">150 a 200</p>
                    </div>
                    <div class="col text-center">
                        <small>Costo</small>
                        <p class="label fw-bold">$10,000</p>
                    </div>
                    <div class="col text-center">
                        <small>Descripción</small>
                        <p class="label fw-bold">Paquete para bodas, con servicios completos.</p>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <div>
            <div class="row container_galery">
                <p class="label fw-bold">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-card-list" viewBox="0 0 16 16">
                        <path d="M14.5 3a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h13zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13z"/>
                        <path d="M5 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 5 8zm0-2.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm0 5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm-1-5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0zM4 8a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0zm0 2.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0z"/>
                    </svg> Servicios
                </p>
                <table class="table table-hover">
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>Musica</td>
                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td>Banquete</td>
                        </tr>
                        <tr>
                            <th scope="row">3</th>
                            <td>Jardin y capilla</td>
                        </tr>
                        <tr>
                            <th scope="row">4</th>
                            <td>Mobiliario y decoración</td>
                        </tr>
                        <tr>
                            <th scope="row">5</th>
                            <td>Organización</td>
                        </tr>
                        <tr>
                            <th scope="row">6</th>
                            <td>Catering</td>
                        </tr>
                        <tr>
                            <th scope="row">7</th>
                            <td>Fotografia</td>
                        </tr>
                        <tr>
                            <th scope="row">8</th>
                            <td>Ambientación</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
