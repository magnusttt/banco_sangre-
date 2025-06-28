<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventario de sangre</title>
    <link rel="stylesheet" href="/../Banco-de-sangre/vendor/twbs/bootstrap/dist/css/bootstrap.css">
    <link rel="stylesheet" href="/../Banco-de-sangre/src/Styles/donantes.css">
    <link rel="stylesheet" href="/../Banco-de-sangre/src/Styles/sidebar.css">   
</head>

<body>

    <div class="container-fluid container_general p-0 w-100">

        <header>

            <!-- En cabezado de la pantalla -->

            <nav
                class="navbar nav-content navbar-expand px-5 py-2 align-items-center d-flex justify-content-between">

                <!-- Boton del la barra lateral -->

                <button class="btn btn-danger btn-burger" type="button" data-bs-toggle="offcanvas"
                    data-bs-target="#staticBackdrop" aria-controls="staticBackdrop">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <!--titulo del sistema-->

                <h2 class="title text-center d-flex justify-content-center align-items-center"><svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-people me-2 mb-2" viewBox="0 0 16 16">
                        <path d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1zm-7.978-1L7 12.996c.001-.264.167-1.03.76-1.72C8.312 10.629 9.282 10 11 10c1.717 0 2.687.63 3.24 1.276.593.69.758 1.457.76 1.72l-.008.002-.014.002zM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4m3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0M6.936 9.28a6 6 0 0 0-1.23-.247A7 7 0 0 0 5 9c-4 0-5 3-5 4q0 1 1 1h4.216A2.24 2.24 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816M4.92 10A5.5 5.5 0 0 0 4 13H1c0-.26.164-1.03.76-1.724.545-.636 1.492-1.256 3.16-1.275ZM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0m3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4" />
                    </svg>Iventario de Sangre</h2>

                <!-- contenedor del icono del Usuario -->

                <div class="btn-group dropstart">

                    <!-- Boton del icono del usuario -->

                    <button type="button" class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown"
                        aria-expanded="false" style="background: #BF2517; border: 1px solid #000; ">
                        <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" fill="currentColor" class="bi bi-power" viewBox="0 0 16 16">
                            <path d="M7.5 1v7h1V1z" />
                            <path d="M3 8.812a5 5 0 0 1 2.578-4.375l-.485-.874A6 6 0 1 0 11 3.616l-.501.865A5 5 0 1 1 3 8.812" />
                        </svg>
                    </button>

                    <!-- dropdown de las opciones del usuario -->

                    <ul class="dropdown-menu bg-dark dropdown-user">
                        <li><button class="dropdown-item" type="button">Inicio de Seción</button></li>
                        <li><button class="dropdown-item" type="button">Cerrar Seción</button></li>
                    </ul>

                </div>
            </nav>

        </header>

        <!-- Contenedor General de la barra lateral o sidebar -->


        <?php require_once __DIR__ . '/sidebar.php' ?>

        <div class="main">


            <!-- Contenedor General del contenido de la Pantalla-->

            <main class="container px-0 mt-4 pb-3">



                <div class="row mt-3">
                    <div class="d-flex gap-3 justify-content-start">
                        <a href="/Banco-de-sangre/Inventario/registrarDonacionVista/" class="btn btn-danger">Registrar Donación</a>
                        <a href="/Banco-de-sangre/Inventario/registrarTransfusionVista/" class="btn btn-danger">Registrar Transfusión</a>
                    </div>
                </div>

                <div class="card content-dont mt-5">
                    <div class="card-header">
                        <h5 class="card-title">
                            Tipos de Sangre
                        </h5>
                    </div>


                    <div class="card-body">

                        <table class="table text-center">
                            <thead>
                                <tr>
                                    <th scope="col">Estado</th>
                                    <th class="text-info" scope="col">A+</th>
                                    <th class="text-info" scope="col">B+</th>
                                    <th class="text-info" scope="col">AB+</th>
                                    <th class="text-info" scape="col">O+</th>
                                    <th class="text-danger" scope="col">A-</th>
                                    <th class="text-danger" scope="col">B-</th>
                                    <th class="text-danger" scope="col">AB-</th>
                                    <th class="text-danger" scape="col">O-</th>
                                    <th scope="col">Total:</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $tipos = ['A+', 'B+', 'AB+', 'O+', 'A-', 'B-', 'AB-', 'O-'];
                                    $estados = ['Disponible', 'usada', 'vencida'];
                                    foreach ($estados as $estado) {
                                        echo "<tr><td>$estado</td>";
                                        $total = 0;
                                        foreach ($tipos as $tipo) {
                                            $cantidad = 0;
                                            foreach ($resumen as $fila) {
                                                if ($fila['Tipo_sangre'] === $tipo) {
                                                    $cantidad = $fila[$estado === 'Disponible' ? 'Disponibles' : ucfirst($estado) . 's'] ?? 0;
                                                }
                                            }
                                            $total += $cantidad;
                                            echo "<td>$cantidad</td>";
                                        }
                                        echo "<td>$total</td></tr>";
                                    }
                                ?>      
                            </tbody>
                        </table>
                    </div>

                </div>
                <div class="row mt-5">
                    <div class="d-flex gap-3 justify-content-start">

                        <form class="d-flex" role="search" method="post" action="">
                            <div class="col-4 pe-0">
                                    <select name="estado" class="form-select border-dark">
                                        <option value="Disponible">Disponibles</option>
                                        <option value="usada">Usadas</option>
                                        <option value="vencida">Vencidas</option>
                                    </select>
                            </div>
                            <input class="form-control search me-2" type="search" placeholder="" aria-label="Search">
                            <button class="btn btn-danger d-flex justify-content-center" type="submit"><svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                    <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0" />
                                </svg></button>
                        </form>
                    </div>
                <div class="card content-dont mt-5">
                    <div class="card-header">
                        <h5 class="card-title">
                            Unidades de Sangre
                        </h5>
                        <?php if ($estado == 'Disponible') { ?>

                            <h6 class="text-center">Disponibles</h6>

                        <?php } elseif ($estado == 'Usada') { ?>

                            <h6 class="text-center">Usadas</h6>

                        <?php } elseif ($estado == 'Vencida') { ?>
                            <h6 class="text-center">Vencidas</h6>
                        <?php }?>
                    </div>
                    
                    <div class="card-body">

                        <table class="table text-center">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th class="text-info" scope="col">ID Sangre</th>
                                    <th class="text-info" scope="col">Tipo</th>
                                    <th class="text-info" scope="col">Estado</th>
                                    <th class="text-info" scope="col">Id Donacion</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($unidades)) {
                                    $iterador = 0;
                                    foreach ($unidades as $unidad) : ?>

                                        <?php

                                        $iterador++;
                                        ?>

                                        <tr>
                                            <th><?= $iterador; ?></th>
                                            <th><?= $unidad['ID_sangre'] ?></th>
                                            <th><?= $unidad['Tipo_sangre'] ?></th>
                                            <th><?= $unidad['Estado'] ?></th>
                                            <th><?= $unidad['ID_donacion'] ?></th>
                                        </tr>

                <?php endforeach;
                                } else { ?>

                <tr>
                    <td colspan='14'><?= $mensaje; ?></td>
                </tr>

            <?php } ?>     
                            </tbody>
                        </table>
                    </div>

                </div>

            </main>

        </div>

    </div>

    <?php require_once __DIR__ . '/Footer.php'; ?>