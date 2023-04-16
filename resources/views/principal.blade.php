@extends('plantilla.layout')

@section('usuario')
    <li><a class="nav-link" href="{{ route('login') }}">Iniciar Sesion</a></li>
    <li><a class="nav-link" href="{{ route('registro') }}">Registrarse </a></li>
@endsection

@section('contenido')
    <div class="p-5 text-center bg-image rounded-3"
        style="
background-image: url('https://cdn0.bodas.com.mx/vendor/8303/3_2/960/jpg/bjardin38_5_128303.jpeg');
height: 400px; width: 100%;
">
        <div class="mask" style="background-color: rgba(0, 0, 0, 0.6); height: 300px;">
            <div class="d-flex justify-content-center align-items-center h-100">
                <div class="text-white">
                    <h1 class="mb-3">PAQUETES</h1>
                    <h4 class="mb-3">Garden Gate</h4>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <br>
        <br>
        <div class="row row-cols-1 row-cols-md-3 g-4 text-center d-flex justify-content-center align-items-center">
            @foreach ($paquetes as $item)
                @if ($item['estatus'] == 'Activo')
                    <div class="col">
                        <div class="card h-100">
                            <div class="sc-hdr">
                                <img src="{{ $item['ruta_imagen'] }}" class="card-img-top" alt="" />
                                <div class="capacidad-label">
                                    <div class="cl-flex w-clearfix">
                                        <div class="cl-txt">{{ $item['costo'] }} + serv.</div>
                                        <div class="icon w-clearfix">
                                            <img src="img/icono_m.svg" alt="" class="icon">
                                        </div>
                                        <div class="cl-txt">{{ $item['capacidad_maxima'] }}</div>
                                        <div class="icon w-clearfix"><img src="img/icono_mh.svg" alt=""
                                                class="icon">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body" style="background-color: #fff9f9">
                                <div>
                                    <h5 class="card-title">{{ $item['nombre'] }}</h5>
                                </div>
                                <br>
                                <br>
                                <div class="d-flex justify-content-center align-items-center">
                                    <div id="carouselExampleDar{{ $item['id'] }}" class="carousel carousel-dark slide"
                                        style="width: 60vh; text-align: center">
                                        <div class="carousel-inner">
                                            <div class="carousel-item active" data-bs-interval="10000">
                                                <h6>Musica</h6>
                                            </div>
                                            <div class="carousel-item" data-bs-interval="2000">
                                                <h6>Banquete</h6>
                                            </div>
                                            <div class="carousel-item" data-bs-interval="2000">
                                                <h6>Jardin y capilla</h6>
                                            </div>
                                            <div class="carousel-item" data-bs-interval="2000">
                                                <h6>Mobiliario y decoración</h6>
                                            </div>
                                            <div class="carousel-item" data-bs-interval="2000">
                                                <h6>Organización</h6>
                                            </div>
                                            <div class="carousel-item" data-bs-interval="2000">
                                                <h6>Catering</h6>
                                            </div>
                                            <div class="carousel-item" data-bs-interval="2000">
                                                <h6>Fotografia</h6>
                                            </div>
                                            <div class="carousel-item" data-bs-interval="2000">
                                                <h6>Ambientación</h6>
                                            </div>
                                        </div>
                                        <button class="carousel-control-prev" type="button"
                                            data-bs-target="#carouselExampleDar{{ $item['id'] }}" data-bs-slide="prev">
                                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                            <span class="visually-hidden">Previous</span>
                                        </button>
                                        <button class="carousel-control-next" type="button"
                                            data-bs-target="#carouselExampleDar{{ $item['id'] }}" data-bs-slide="next">
                                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                            <span class="visually-hidden">Next</span>
                                        </button>
                                    </div>
                                </div>
                                <br>
                            </div>
                            <div class="card-footer text-center" style="background-color:#d3ded4">
                                <div><a href="{{ route('login') }}" class="btn btnCotizar">Cotizar</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
        <br><br>
        <hr>
        <div>
            <div class="fw-bold text-center">
                <h1 class="mb-3">SERVICIOS</h1>
                <h5 class="mb-3" style="color: #af9495">Garden Gate tiene estos servicios a tu disposición.</h5>
            </div>
            <div class="row row-cols-1 row-cols-md-3 g-4 text-center d-flex justify-content-center align-items-center">
                @foreach ($servicios as $item)
                <div class="col-sm-5 col-md-6">
                    <img src="https://www.stanser.com/wp-content/uploads/2020/05/typographic_ornamental_vignettes_5.png" width="50">
                    <h2>{{ $item['nombre'] }}</h2>
                </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
