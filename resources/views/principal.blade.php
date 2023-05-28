@extends('plantilla.layout')

@section('usuario')
    @unless (Auth::check())
        <li><a class="nav-link" href="{{ route('login') }}">Iniciar Sesion</a></li>
        <li><a class="nav-link" href="{{ route('registro') }}">Registrarse </a></li>
    @endunless
@endsection

@section('contenido')
    <div class="p-5 text-center bg-image rounded-3"
        style="background-image: url('https://cdn0.bodas.com.mx/vendor/8303/3_2/960/jpg/bjardin38_5_128303.jpeg'); height: 400px; width: 100%;">
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
                                <div class="card-img-top">
                                    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                                        <div class="carousel-inner">
                                            @if ($item->imagenesPaquetes)
                                                @foreach ($item->imagenesPaquetes as $img)
                                                    <div class="carousel-item active">
                                                        <img class="d-block w-100" src="{{ asset('imagenes/' . $img->ruta) }}" alt="{{ $img->nombre }}" width="500" height="250">
                                                    </div>
                                                @endforeach
                                            @endif
                                        </div>
                                    </div>
                                </div>
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
                            </div>
                            <div class="card-footer text-center" style="background-color:#d3ded4">
                                @unless (Auth::check())
                                    <div><a href="{{ route('login') }}" class="btn btnCotizar">Cotizar</a>
                                    </div>
                                @endunless
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
                        <img src="https://www.stanser.com/wp-content/uploads/2020/05/typographic_ornamental_vignettes_5.png"
                            width="50">
                        <h2>{{ $item['nombre'] }}</h2>
                    </div>
                @endforeach
            </div>
            <br>
            <br>
            <div class="wrapper d-grid gap-2 col-6 mx-auto"> 
                <div> 
                    @foreach ($imagenesServicios as $img)
                        <img src="{{ asset('imagenes/' . $img->ruta) }}" alt="{{ $img->nombre }}">
                    @endforeach
                </div> 
            </div>
        </div>
    </div>
@endsection
