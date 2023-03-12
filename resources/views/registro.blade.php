<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesion | Garden Gate</title>
    <link rel="shortcut icon" href="https://cdn-icons-png.flaticon.com/512/8915/8915119.png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>

<body class="h-100 gradient-form" style="background-color: #eee;">
    <section>
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-xl-10">
                    <div class="card rounded-3 text-black" style="background-color: #b5c1b7;">
                        <div class="row g-0">
                            <div class="col-lg-6">
                                <div class="card-body p-md-5 mx-md-4">
                                    <div class="text-center">
                                        <img src="https://cdn-icons-png.flaticon.com/512/8915/8915119.png"
                                            style="width: 80px;" alt="logo">
                                    </div>
                                    <div class="text-center">
                                        <img src="https://www.aimmedia.com/wp-content/uploads/2022/10/GardenGate_LOGO_FINAL-600x250_554e45.png"
                                            style="width: 185px; " alt="logo">
                                    </div>
                                    <form action="Acceder" method="post" style="padding-top: 2rem">
                                        @csrf
                                        <div class="form-outline mb-4">
                                            <input type="text" id="names" class="form-control" name="nombre"
                                                placeholder="Nombre(s)" />
                                        </div>
                                        <div class="form-outline mb-4">
                                            <input type="text" id="apellido" name="apellido"
                                                placeholder="Apellido(s)" class="form-control" />
                                        </div>
                                        <div class="form-outline mb-4">
                                            <input type="text" id="usuario" name="usuario" placeholder="Usuario"
                                                class="form-control" />
                                        </div>
                                        <div class="form-outline mb-4">
                                            <input type="password" id="apellido" name="password"
                                                placeholder="Contraseña" class="form-control" />
                                        </div>
                                        <div class="form-outline mb-4">
                                            <input disabled type="text" id="rol" name="rol" value="Cliente"
                                                class="form-control" />
                                        </div>
                                        <div class="text-center pt-1 mb-5 pb-1">
                                            <div><a href="{{ route('login') }}" class="btn boton4 custom-2 mb-3"
                                                    type="submit"
                                                    style="background-color: #E1D5D5; transition: all 0.35s;">Registrar</a>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="col-lg-6 d-flex align-items-center gradient-custom-2 ard rounded-3"
                                style="background-image: url('https://i.pinimg.com/564x/d6/9c/09/d69c096f70ab897a5318d1788809d967.jpg');background-size : 550px  750px; background-repeat : no-repeat">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>
</body>

</html>
