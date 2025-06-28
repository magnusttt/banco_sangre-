<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="/../Banco-de-sangre/vendor/twbs/bootstrap/dist/css/bootstrap.css">
    <link rel="stylesheet" href="/../Banco-de-sangre/src/Styles/donantes.css">
    <link rel="stylesheet" href="/../Banco-de-sangre/src/Styles/sidebar.css">

</head>

<body>

    <div class="container-fluid container_general p-0 w-100">

        <header>

            <!-- En cabezado de la pantalla -->

            <nav
                class="navbar nav-content navbar-expand px-5 py-2 align-items-center d-flex justify-content-center align-items-center">

                <!--titulo del sistema-->

                <h2 class="title text-center d-flex justify-content-center align-items-center"><svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-people me-2 mb-2" viewBox="0 0 16 16">
                        <path d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1zm-7.978-1L7 12.996c.001-.264.167-1.03.76-1.72C8.312 10.629 9.282 10 11 10c1.717 0 2.687.63 3.24 1.276.593.69.758 1.457.76 1.72l-.008.002-.014.002zM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4m3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0M6.936 9.28a6 6 0 0 0-1.23-.247A7 7 0 0 0 5 9c-4 0-5 3-5 4q0 1 1 1h4.216A2.24 2.24 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816M4.92 10A5.5 5.5 0 0 0 4 13H1c0-.26.164-1.03.76-1.724.545-.636 1.492-1.256 3.16-1.275ZM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0m3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4" />
                    </svg>Inicio de session</h2>

            </nav>

        </header>

        <!-- Contenedor General del contenido de la Pantalla-->

        <main class="container px-0 mt-4 pb-3">

            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card rounded-3" style="background: linear-gradient(337deg,rgba(161, 170, 173, 1) 0%, rgba(195, 214, 203, 1) 50%, rgba(224, 224, 211, 1) 100%);">
                        <div class="card-body">

                            <div class="text-center mt-4 mb-4 p-1" style="border-bottom: rgba(25, 27, 27, 0.61) 1px solid; border-top: rgba(25, 27, 27, 0.71) 1px solid;">

                                    <h5><?= $mensaje ?></h5>

                            </div>


                            <form action="/Banco-de-sangre/Login/Mostrar/" method="POST">
                                <div class="mb-3">
                                    <label for="username" class="form-label">Usuario</label>
                                    <input type="text" class="form-control border-dark" id="usuario" name="usuario" minlength="3" maxlength="10" pattern="[a-zA-Z0-9]+" title="El usuario debe contener solo letras y números, entre 3 y 10 caracteres.">
                                </div>
                                <div class="mb-3">
                                    <label for="password" class="form-label">Contraseña</label>
                                    <input type="text" class="form-control border-dark" id="clave" name="clave" minlength="3" maxlength="15" pattern="[a-zA-Z0-9]+" title="La contraseña debe contener solo letras y números, entre 3 y 15 caracteres.">
                                </div>
                                <div class="btn-form mt-3 d-flex align-items-center justify-content-center gap-3">
                                    <button type="submit" class="btn btn-primary">Enviar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>


        </main>



        <?php require_once __DIR__ . '/Footer.php'; ?>