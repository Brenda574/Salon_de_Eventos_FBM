@extends('plantilla.layout')

@section('usuario')
    <li><a class="nav-link" href="{{ route('login') }}">Iniciar Sesion</a></li>
    <li><a class="nav-link" href="#">Registrarse </a></li>
@endsection

@section('contenido')
    <div class="row row-cols-1 row-cols-md-3 g-4" style="margin-top: 60px;">
        <div class="col">
            <div class="card h-100">
                <img src="https://cdn0.bodas.com.mx/article-real-wedding/221/3_2/960/jpg/1150609.jpeg" class="card-img-top"
                    alt="" />
                <div class="card-body" style="background-color: #fff9f9">
                    <div>
                        <h5 class="card-title">Bodas</h5>
                        <br>
                    </div>
                    <div class="d-flex justify-content-center align-items-center">
                        <div id="carouselExampleDark" class="carousel carousel-dark slide"
                            style="width: 60vh; text-align: center">

                            <div class="carousel-inner">
                                <div class="carousel-item active" data-bs-interval="10000">
                                    <h6>Hasta luego</h6>
                                </div>
                                <div class="carousel-item" data-bs-interval="2000">
                                    <h6>Adios</h6>

                                </div>
                                <div class="carousel-item" data-bs-interval="2000">
                                    <h6>Bye</h6>
                                </div>
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark"
                                data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark"
                                data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-center" style="background-color:#d3ded4">
                    <div><a class="btn btnCotizar">Cotizar</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card h-100">
                <img src="http://elsauceeventos.com/wp-content/uploads/2018/01/empresariales-.jpg" class="card-img-top"
                    alt="" />
                <div class="card-body" style="background-color: #fff9f9">
                    <h5 class="card-title">Eventos empresariales</h5>
                    <p class="card-text">This card has supporting text below as a natural lead-in to additional content.
                    </p>
                </div>
                <div class="card-footer text-center" style="background-color:#d3ded4">
                    <div><a class="btn btnCotizar">Cotizar</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card h-100">
                <img src="https://cdn0.bodas.com.mx/vendor/2737/3_2/960/jpg/11411948-10155691402620562-8558719571658733083-o_5_252737-1561598289.jpeg"
                    class="card-img-top " alt="" />
                <div class="card-body" style="background-color: #fff9f9">
                    <h5 class="card-title">Eventos especiales</h5>
                    <p class="card-text">
                        This is a wider card with supporting text below as a natural lead-in to
                        additional content. This card has even longer content than the first to show
                        that equal height action.
                    </p>
                </div>
                <div class="card-footer text-center" style="background-color:#d3ded4">
                    <div><a class="btn btnCotizar">Cotizar</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card h-100">
                <img src="https://cdn-az.allevents.in/events3/banners/7190c777af8b723c2c3affcef7ce632a3653d819bc745912cca4f95a50c82055-rimg-w960-h640-gmir.jpg?v=1677279045"
                    class="card-img-top" alt="" />
                <div class="card-body" style="background-color: #fff9f9">
                    <h5 class="card-title">Graduaciones</h5>
                    <p class="card-text">
                        This is a wider card with supporting text below as a natural lead-in to
                        additional content. This card has even longer content than the first to show
                        that equal height action.
                    </p>
                </div>
                <div class="card-footer text-center" style="background-color:#d3ded4">
                    <div><a class="btn btnCotizar">Cotizar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
