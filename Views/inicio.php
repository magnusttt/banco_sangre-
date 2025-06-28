<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Inicio</title>
  <link rel="stylesheet" href="/../Banco-de-sangre/vendor/twbs/bootstrap/dist/css/bootstrap.css">
  <link rel="stylesheet" href="/../Banco-de-sangre/src/Styles/donantes.css">
  <link rel="stylesheet" href="/../Banco-de-sangre/src/Styles/sidebar.css">
  <link rel="stylesheet" href="/../Banco-de-sangre/src/Styles/inicio.css">
</head>

<body>

  <div class="container-fluid container_general fondoInicio p-0 w-100">

    <header>

      <!-- En cabezado de la pantalla -->

      <nav class="navbar nav-content navbar-expand px-5 align-items-center d-flex justify-content-between">

        <!-- Boton del la barra lateral -->

        <button class="btn btn-danger btn-burger" type="button" data-bs-toggle="offcanvas"
          data-bs-target="#staticBackdrop" aria-controls="staticBackdrop">
          <span class="navbar-toggler-icon"></span>
        </button>

        <!--titulo del sistema-->

        <h2 class="title text-center d-flex justify-content-center align-items-center">INICIO</h2>

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
            <li><a href="/Banco-de-sangre/Login/Mostrar/" class="dropdown-item btn" type="button">Cerrar Seción</a></li>
          </ul>

        </div>
      </nav>

    </header>

    <!-- Contenedor General de la barra lateral o sidebar -->


    <?php require_once __DIR__ . '/sidebar.php' ?>

    <div class="">


      <!-- Contenedor General del contenido de la Pantalla-->

      <main class="container px-0 pb-3">

        <div class="fondoInicio">

          <div class="titulo d-flex w-100 align-items-center justify-content-center" >
            <div id="file">
              <img class="rounded-circle me-1" width="100" height="90" src="/../Banco-de-sangre/src/Images/logo.jpg">
            </div>
            <div id="titulo">
              <h1 class=" fw-bold">Banco de Sangre</h1>
              <p>Dr. Egidio Montesino</p>
            </div>
          </div>

          <div class="pt-3 px-2 row row-cols-1 row-cols-md-3 g-4">

            <div class="col">
              <div class="card rounded-4 justify-content-center align-items-center pt-2" style="background: linear-gradient(172deg,rgba(41, 41, 64, 1) 56%, rgba(18, 32, 36, 1) 80%);">
                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-person-circle" style="fill: rgb(206, 201, 201);" viewBox="0 0 16 16">
                  <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0" />
                  <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1" />
                </svg>
                <div class="card-body">
                  <h5 class="card-title" style="color: rgb(206, 201, 201);">Empleados</h5>
                  <p class="card-text fw-bold text-center" style="color: rgb(206, 201, 201);">Aquí podrás ver una tabla en la que se puede ver, crear, editar y eliminar los empleados</p>
                </div>
                <div class="card-footer">
                  <a href="/Banco-de-sangre/Personal/Mostrar/" class="btn btn-danger">Ir</a>
                </div>
              </div>
            </div>

            <div class="col">
              <div class="card rounded-4 justify-content-center align-items-center pt-2 " style="background: linear-gradient(172deg,rgba(41, 41, 64, 1) 56%, rgba(18, 32, 36, 1) 80%);">
                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" style="fill: rgb(177, 0, 0);" class="bi bi-person-circle" viewBox="0 0 16 16">
                  <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0" />
                  <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1" />
                </svg>
                <div class="card-body">
                  <h5 class="card-title" style="color: rgb(206, 201, 201);">Pacientes</h5>
                  <p class="card-text fw-bold text-center" style="color: rgb(206, 201, 201);">Aquí podrás ver una tabla en la que se puede ver, crear, editar y eliminar el Paciente </p>
                </div>
                <div class="card-footer">
                  <a href="/Banco-de-sangre/Paciente/Mostrar/" class="btn btn-danger">Ir</a>
                </div>
              </div>
            </div>

            <div class="col">
              <div class="card rounded-4 justify-content-center align-items-center pt-2" style="background: linear-gradient(172deg,rgba(41, 41, 64, 1) 56%, rgba(18, 32, 36, 1) 80%);">
                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-clipboard-plus-fill" style="fill: rgb(206, 201, 201);" viewBox="0 0 16 16">
                  <path d="M6.5 0A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3Zm3 1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5h3Z" />
                  <path d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1A2.5 2.5 0 0 1 9.5 5h-3A2.5 2.5 0 0 1 4 2.5v-1Zm4.5 6V9H10a.5.5 0 0 1 0 1H8.5v1.5a.5.5 0 0 1-1 0V10H6a.5.5 0 0 1 0-1h1.5V7.5a.5.5 0 0 1 1 0Z" />
                </svg>
                <div class="card-body">
                  <h5 class="card-title" style="color: rgb(206, 201, 201);">Donante</h5>
                  <p class="card-text fw-bold text-center" style="color: rgb(206, 201, 201);">Aquí podrás ver una tabla en la que se puede ver, crear, editar y eliminar el Donante</p>
                </div>
                <div class="card-footer">
                  <a href="/Banco-de-sangre/Donante/Mostrar/" class="btn btn-danger">Ir</a>
                </div>
              </div>
            </div>

            <div class="col">
              <div class="card rounded-4 justify-content-center align-items-center pt-2" style="background: linear-gradient(172deg,rgba(41, 41, 64, 1) 56%, rgba(18, 32, 36, 1) 80%);">
                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24" style="fill: rgb(177, 0, 0);">
                  <path d="M4 21h15.893c1.103 0 2-.897 2-2V5c0-1.103-.897-2-2-2H4c-1.103 0-2 .897-2 2v14c0 1.103.897 2 2 2zm0-2v-5h4v5H4zM14 7v5h-4V7h4zM8 7v5H4V7h4zm2 12v-5h4v5h-4zm6 0v-5h3.894v5H16zm3.893-7H16V7h3.893v5z"></path>
                </svg>
                <div class="card-body">
                  <h5 class="card-title">Tipos de Examenes</h5>
                  <p class="card-text text-white fw-bold text-center"  style="color: rgb(206, 201, 201);">Aquí se registran y ver los examenes que se pueden realizar en el banco de sangres</p>
                </div>
                <div class="card-footer">
                  <a href="/Banco-de-sangre/TipoExamen/Mostrar/" class="btn btn-danger">Ir</a>
                </div>
              </div>
            </div>

            <div class="col">
              <div class="card rounded-4 justify-content-center align-items-center pt-2" style="background: linear-gradient(172deg,rgba(41, 41, 64, 1) 56%, rgba(18, 32, 36, 1) 80%);">
                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-joystick"  style="fill: rgb(206, 201, 201);" viewBox="0 0 16 16">
                  <path d="M10 2a2 2 0 0 1-1.5 1.937v5.087c.863.083 1.5.377 1.5.726 0 .414-.895.75-2 .75s-2-.336-2-.75c0-.35.637-.643 1.5-.726V3.937A2 2 0 1 1 10 2" />
                  <path d="M0 9.665v1.717a1 1 0 0 0 .553.894l6.553 3.277a2 2 0 0 0 1.788 0l6.553-3.277a1 1 0 0 0 .553-.894V9.665c0-.1-.06-.19-.152-.23L9.5 6.715v.993l5.227 2.178a.125.125 0 0 1 .001.23l-5.94 2.546a2 2 0 0 1-1.576 0l-5.94-2.546a.125.125 0 0 1 .001-.23L6.5 7.708l-.013-.988L.152 9.435a.25.25 0 0 0-.152.23" />
                </svg>
                <div class="card-body">
                  <h5 class="card-title"  style="color: rgb(206, 201, 201);">Inventario de insumos</h5>
                  <p class="card-text text-white fw-bold text-ceneter" style="color: rgb(206, 201, 201);">Aquí se ve la cantidad de insumos disponibles en el banco de sangre</p>
                </div>
                <div class="card-footer">
                  <a href="/Banco-de-sangre/Insumos/Mostrar/" class="btn btn-danger">Ir</a>
                </div>
              </div>
            </div>

            <div class="col">
              <div class="card rounded-4 justify-content-center align-items-center pt-2" style="background: linear-gradient(172deg,rgba(41, 41, 64, 1) 56%, rgba(18, 32, 36, 1) 80%);">
                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-joystick" style="fill: rgb(177, 0, 0);" viewBox="0 0 16 16">
                  <path d="M10 2a2 2 0 0 1-1.5 1.937v5.087c.863.083 1.5.377 1.5.726 0 .414-.895.75-2 .75s-2-.336-2-.75c0-.35.637-.643 1.5-.726V3.937A2 2 0 1 1 10 2" />
                  <path d="M0 9.665v1.717a1 1 0 0 0 .553.894l6.553 3.277a2 2 0 0 0 1.788 0l6.553-3.277a1 1 0 0 0 .553-.894V9.665c0-.1-.06-.19-.152-.23L9.5 6.715v.993l5.227 2.178a.125.125 0 0 1 .001.23l-5.94 2.546a2 2 0 0 1-1.576 0l-5.94-2.546a.125.125 0 0 1 .001-.23L6.5 7.708l-.013-.988L.152 9.435a.25.25 0 0 0-.152.23" />
                </svg>
                <div class="card-body">
                  <h5 class="card-title" style="color: rgb(206, 201, 201);">Inventario De Sangre</h5>
                  <p class="card-text text-white fw-bold" style="color: rgb(206, 201, 201);">Aquí se puede ven las bolsas de sngres disponibles y las que se llegaron a usar </p>
                </div>
                <div class="card-footer">
                  <a href="/Banco-de-sangre/Inventario/Mostrar/" class="btn btn-danger">Ir</a>
                </div>
              </div>
            </div>



          </div>

      </main>

    </div>

  </div>

  <?php require_once __DIR__ . "/Footer.php"; ?>