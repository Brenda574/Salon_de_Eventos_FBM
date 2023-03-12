@extends('plantilla.layout')

@section('usuario')
    <li><a class="nav-link" href="{{ route('login') }}">Iniciar Sesion</a></li>
    <li><a class="nav-link" href="#">Registrarse </a></li>
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
                    <h1 class="mb-3">Paquetes</h1>
                    <h4 class="mb-3">Garden Gate</h4>
                    <a class="btn btn-outline-light btn-lg" href="#!" role="button">Conocenos</a>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <br>
        <br>
        <div class="row row-cols-1 row-cols-md-3 g-4 text-center d-flex justify-content-center align-items-center">
            <div class="col">
                <div class="card h-100">
                    <div class="sc-hdr">
                        <img src="https://cdn0.bodas.com.mx/article-real-wedding/221/3_2/960/jpg/1150609.jpeg"
                            class="card-img-top" alt="" />
                        <div class="capacidad-label">
                            <div class="cl-flex w-clearfix">
                                <div class="cl-txt">10,000 + serv.</div>
                                <div class="icon w-clearfix">
                                    <img src="img/icono_m.svg" alt="" class="icon">
                                </div>
                                <div class="cl-txt">150 a 200</div>
                                <div class="icon w-clearfix"><img src="img/icono_mh.svg" alt="" class="icon">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body" style="background-color: #fff9f9">
                        <div>
                            <h5 class="card-title">Boda</h5>
                        </div>
                        <br>
                        <br>
                        <div class="d-flex justify-content-center align-items-center">
                            <div id="carouselExampleDar" class="carousel carousel-dark slide"
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
                                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDar"
                                    data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDar"
                                    data-bs-slide="next">
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
            <div class="col">
                <div class="card h-100">
                    <div class="sc-hdr">
                        <img src="http://elsauceeventos.com/wp-content/uploads/2018/01/empresariales-.jpg"
                            class="card-img-top" alt="" />
                        <div class="capacidad-label">
                            <div class="cl-flex w-clearfix">
                                <div class="cl-txt">8,000 + serv.</div>
                                <div class="icon w-clearfix">
                                    <img src="img/icono_m.svg" alt="" class="icon">
                                </div>
                                <div class="cl-txt">50 a 100</div>
                                <div class="icon w-clearfix"><img src="img/icono_mh.svg" alt="" class="icon">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body" style="background-color: #fff9f9">
                        <div>
                            <h5 class="card-title">Eventos empresariales</h5>
                        </div>
                        <br>
                        <br>
                        <div class="d-flex justify-content-center align-items-center">
                            <div id="carouselExampleDa" class="carousel carousel-dark slide"
                                style="width: 60vh; text-align: center">

                                <div class="carousel-inner">
                                    <div class="carousel-item active" data-bs-interval="10000">
                                        <h6>Catering</h6>
                                    </div>
                                    <div class="carousel-item" data-bs-interval="2000">
                                        <h6>Mobiliario y decoración</h6>
                                    </div>
                                    <div class="carousel-item" data-bs-interval="2000">
                                        <h6>Ambientación</h6>
                                    </div>
                                    <div class="carousel-item" data-bs-interval="2000">
                                        <h6>Seguridad</h6>
                                    </div>
                                    <div class="carousel-item" data-bs-interval="2000">
                                        <h6>Barra de snack</h6>
                                    </div>
                                    <div class="carousel-item" data-bs-interval="2000">
                                        <h6>Equipo audiovisual</h6>
                                    </div>
                                    <div class="carousel-item" data-bs-interval="2000">
                                        <h6>Barra de bebidas</h6>
                                    </div>
                                </div>
                                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDa"
                                    data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDa"
                                    data-bs-slide="next">
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
            <div class="col">
                <div class="card h-100">
                    <div class="sc-hdr">
                        <img src="https://cdn0.bodas.com.mx/vendor/2737/3_2/960/jpg/11411948-10155691402620562-8558719571658733083-o_5_252737-1561598289.jpeg"
                            class="card-img-top " alt="" />
                        <div class="capacidad-label">
                            <div class="cl-flex w-clearfix">
                                <div class="cl-txt">10,000 + serv.</div>
                                <div class="icon w-clearfix">
                                    <img src="img/icono_m.svg" alt="" class="icon">
                                </div>
                                <div class="cl-txt">150 a 200</div>
                                <div class="icon w-clearfix"><img src="img/icono_mh.svg" alt="" class="icon">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body" style="background-color: #fff9f9">
                        <div>
                            <h5 class="card-title">Eventos especiales</h5>
                        </div>
                        <br>
                        <br>
                        <div class="d-flex justify-content-center align-items-center">
                            <div id="carouselExample" class="carousel carousel-dark slide"
                                style="width: 60vh; text-align: center">

                                <div class="carousel-inner">
                                    <div class="carousel-item active" data-bs-interval="10000">
                                        <h6>Banquete</h6>
                                    </div>
                                    <div class="carousel-item" data-bs-interval="2000">
                                        <h6>Barra de snacks</h6>

                                    </div>
                                    <div class="carousel-item" data-bs-interval="2000">
                                        <h6>Musica</h6>
                                    </div>
                                    <div class="carousel-item" data-bs-interval="2000">
                                        <h6>Catering</h6>
                                    </div>
                                    <div class="carousel-item" data-bs-interval="2000">
                                        <h6>Mobiliario y decoración</h6>
                                    </div>
                                    <div class="carousel-item" data-bs-interval="2000">
                                        <h6>Barra de bebidas</h6>
                                    </div>
                                    <div class="carousel-item" data-bs-interval="2000">
                                        <h6>Ambientación</h6>
                                    </div>
                                    <div class="carousel-item" data-bs-interval="2000">
                                        <h6>Equipo audiovisual</h6>
                                    </div>
                                </div>
                                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample"
                                    data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next" type="button" data-bs-target="#carouselExample"
                                    data-bs-slide="next">
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
            <div class="col">
                <div class="card h-100">
                    <div class="sc-hdr">
                        <img src="https://cdn-az.allevents.in/events3/banners/7190c777af8b723c2c3affcef7ce632a3653d819bc745912cca4f95a50c82055-rimg-w960-h640-gmir.jpg"
                            class="card-img-top" alt="" />
                        <div class="capacidad-label">
                            <div class="cl-flex w-clearfix">
                                <div class="cl-txt">10,200 + serv. </div>
                                <div class="icon w-clearfix">
                                    <img src="img/icono_m.svg" alt="" class="icon">
                                </div>
                                <div class="cl-txt">150 a 250</div>
                                <div class="icon w-clearfix"><img src="img/icono_mh.svg" alt="" class="icon">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body" style="background-color: #fff9f9">
                        <div>
                            <h5 class="card-title">Graduaciones</h5>
                        </div>
                        <br>
                        <br>
                        <div class="d-flex justify-content-center align-items-center">
                            <div id="carousel" class="carousel carousel-dark slide"
                                style="width: 60vh; text-align: center">
                                <div class="carousel-inner">
                                    <div class="carousel-item active" data-bs-interval="10000">
                                        <h6>Barra de snacks</h6>
                                    </div>
                                    <div class="carousel-item" data-bs-interval="2000">
                                        <h6>Barra de bebidas</h6>
                                    </div>
                                    <div class="carousel-item" data-bs-interval="2000">
                                        <h6>Ambientación</h6>
                                    </div>
                                    <div class="carousel-item" data-bs-interval="2000">
                                        <h6>Musica</h6>
                                    </div>
                                    <div class="carousel-item" data-bs-interval="2000">
                                        <h6>Ambientación</h6>
                                    </div>
                                    <div class="carousel-item" data-bs-interval="2000">
                                        <h6>Equipo audiovisual</h6>
                                    </div>
                                    <div class="carousel-item" data-bs-interval="2000">
                                        <h6>Fotografia</h6>
                                    </div>
                                </div>
                                <button class="carousel-control-prev" type="button" data-bs-target="#carousel"
                                    data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next" type="button" data-bs-target="#carousel"
                                    data-bs-slide="next">
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
            <div class="col">
                <div class="card h-100">
                    <div class="sc-hdr">
                        <img src="https://cdn0.bodas.com.mx/vendor/3709/3_2/960/jpg/luissy-xv-anos-12_5_193709-161220917412012.jpeg"
                            class="card-img-top" alt="" />
                        <div class="capacidad-label">
                            <div class="cl-flex w-clearfix">
                                <div class="cl-txt">10,000 + serv.</div>
                                <div class="icon w-clearfix">
                                    <img src="img/icono_m.svg" alt="" class="icon">
                                </div>
                                <div class="cl-txt">150 a 200</div>
                                <div class="icon w-clearfix"><img src="img/icono_mh.svg" alt="" class="icon">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body" style="background-color: #fff9f9">
                        <div>
                            <h5 class="card-title">XV años</h5>
                        </div>
                        <br>
                        <br>
                        <div class="d-flex justify-content-center align-items-center">
                            <div id="carouselExa" class="carousel carousel-dark slide"
                                style="width: 60vh; text-align: center">

                                <div class="carousel-inner">
                                    <div class="carousel-item active" data-bs-interval="10000">
                                        <h6>Musica</h6>
                                    </div>
                                    <div class="carousel-item" data-bs-interval="2000">
                                        <h6>Ambientación</h6>
                                    </div>
                                    <div class="carousel-item" data-bs-interval="2000">
                                        <h6>Banquete</h6>
                                    </div>
                                    <div class="carousel-item" data-bs-interval="2000">
                                        <h6>Barra de bebidas</h6>
                                    </div>
                                    <div class="carousel-item" data-bs-interval="2000">
                                        <h6>Barra de snacks</h6>
                                    </div>
                                    <div class="carousel-item" data-bs-interval="2000">
                                        <h6>Mobiliario y decoración</h6>
                                    </div>
                                    <div class="carousel-item" data-bs-interval="2000">
                                        <h6>Fotografia</h6>
                                    </div>
                                    <div class="carousel-item" data-bs-interval="2000">
                                        <h6>Catering</h6>
                                    </div>
                                </div>
                                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExa"
                                    data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next" type="button" data-bs-target="#carouselExa"
                                    data-bs-slide="next">
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
        </div>
    </div>
@endsection
