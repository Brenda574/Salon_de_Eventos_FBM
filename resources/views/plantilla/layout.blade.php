<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Garden Gate</title>
    <link rel="shortcut icon" href="https://cdn-icons-png.flaticon.com/512/8915/8915119.png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('img/icono_mh.svg') }}" rel="stylesheet">
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light shadow fixed-top">
            <div class="container">
                <a class="navbar-brand" href="{{ route('principal') }}"><img
                        src="https://cdn-icons-png.flaticon.com/512/8915/8915119.png" width="40"><img
                        src="https://www.aimmedia.com/wp-content/uploads/2022/10/GardenGate_LOGO_FINAL-600x250_554e45.png"
                        width="100"></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ms-auto">
                        @yield('usuario')
                        @unless (!Auth::check())
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">
                                <i class="bi bi-person-circle"></i> {{ Auth::user()->nombre }}
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="{{ route('logout') }}">Cerrar sesión</a></li>
                            </ul>
                        </li>
                        @endunless
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <div style="margin-bottom: 60px; margin-top: 60px;">
        @yield('contenido')
    </div>

    <footer class="bg-light text-center text-white">
        <div class="container p-4 pb-0">
            <section class="mb-4">
                <a class="btn text-white btn-floating m-1" style="background-color: #3b5998;" href="#!"
                    role="button"><i class="bi bi-facebook"></i></a>
                <a class="btn text-white btn-floating m-1" style="background-color: #55acee;" href="#!"
                    role="button"><i class="bi bi-twitter"></i></a>
                <a class="btn text-white btn-floating m-1" style="background-color: #dd4b39;" href="#!"
                    role="button"><i class="bi bi-google"></i></a>
                <a class="btn text-white btn-floating m-1" style="background-color: #ac2bac;" href="#!"
                    role="button"><i class="bi bi-instagram"></i></a>
                <a class="btn text-white btn-floating m-1" style="background-color: #0082ca;" href="#!"
                    role="button"><i class="bi bi-linkedin"></i></a>
                <a class="btn text-white btn-floating m-1" style="background-color: #333333;" href="#!"
                    role="button"><i class="bi bi-github"></i></a>
            </section>
        </div>
        <div class="text-center p-3" style="background-color: #8E9B91">
            © 2020 Copyright:
            <a class="text-white" href="#">GardenGate</a>
        </div>
    </footer>
</body>

</html>
