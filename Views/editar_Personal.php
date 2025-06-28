<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Personal</title>
    <link rel="stylesheet" href="/vendor/twbs/bootstrap/dist/css/bootstrap.css">
    <link rel="stylesheet" href="/../Banco-de-sangre/vendor/twbs/bootstrap/dist/css/bootstrap.css">
    <link rel="stylesheet" href="/../Banco-de-sangre/src/Styles/sidebar.css">

    <style>
        label {
            text-align: center;
        }
    </style>

</head>

<body class="bg-dark">

    <div class="container my-4 ">

        <div class="d-flex justify-content-center">

            <h2 class="text-center mb-2 text-white pb-3 w-50 border-bottom border-white">Editar Personal</h2>

        </div>

        <div class="row col-md-8 offset-md-2">

            <form action="/Banco-de-sangre/Personal/EditarPersonal/" method="POST" class="row g-3 border-black mt-3 pt-5 py-4 rounded d-flex align-items-center flex-column w-100" style="background: #ececec;">

            <?php foreach($personal as $per): ?>

                <input type="hidden" name="id" value="<?= $per['id_empleado'] ?>">

                <div class="row d-flex">

                    <div class="col-6">

                        <label for="" class="form-label">Primer Nombre</label>
                        <input class="form-control border-secondary" type="text" name="primer_nombre" value="<?= $per['primer_nombre'] ?>" required minlength="3" maxlength="10" id="">

                    </div>

                    <div class="col-6">

                        <label for="" class="form-label">Segundo Nombre</label>
                        <input class="form-control border-secondary" type="text" name="segundo_nombre" value="<?= $per['segundo_nombre'] ?>" minlength="3" maxlength="10" id="">

                    </div>
                </div>

                <div class="row d-flex mt-3">

                    <div class="col-6">

                        <label for="" class="form-label">Primer Apellido</label>
                        <input class="form-control border-secondary" type="text" name="primer_apellido" value="<?= $per['primer_apellido'] ?>" required minlength="3" maxlength="15" id="">

                    </div>

                    <div class="col-6">

                        <label for="POST" class="form-label">Segundo Apellido</label>
                        <input class="form-control border-secondary" type="text" name="segundo_aoellido" value="<?= $per['segundo_apellido'] ?> " minlength="3" maxlength="15" id="">

                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-4 text-center">

                        <label for="" class="form-label">Tipo de telefono</label>
                        <select name="tipo_telefono" id="" class="form-select border-secondary">
                            <option value="<?= $per['Tipo_telefono'] ?>" class=" bg-secondary"><?= $per['Tipo_telefono'] ?></option>
                            <option value="Movil">Movil</option>
                            <option value="Casero">Casero</option>
                        </select>

                    </div>
                    <div class="col-8">

                        <label for="" class="form-label">Telefono</label>
                        <input class="form-control border-secondary" value="<?= $per['Telefono'] ?>" type="number" name="telefono" required id="">

                    </div>

                </div>

                <div class="row mt-3">

                    <div class="col-4 text-center">

                        <label for="" class="form-label">Nacionalidad</label>
                        <select name="nacionalidad" id="" class="form-select border-secondary">
                            <option value="<?= $per['nacionalidad'] ?>"><?= $per['nacionalidad'] ?></option>
                            <option value="V">Venezolano</option>
                            <option value="E">Extranjero</option>
                        </select>

                    </div>

                    <div class="col-8">

                        <label for="" class="form-label">Documento de identidad</label>
                        <input class="form-control border-secondary" type="number" value="<?= $per['doc'] ?>" name="doc" required min="0" max="99999999" id="">

                    </div>

                </div>

                <div class="row mt-3">

                    <div class="col-4 text-center">

                        <label for="" class="form-label">Cargo</label>
                        <select name="cargo" id="" class="form-select border-secondary">
                            <option class=" bg-secondary" value="<?= $per['Cargo'] ?>"><?= $per['Cargo'] ?></option>
                            <option value="Auxiliar de laboratorio">Auxiliar de laboratorio</option>
                            <option value="Bioanalista">Bioanalista</option>
                            <option value="Emoterapistas">Emoterapistas</option>
                            <option value="Secretaria">Secretaria</option>
                            <option value="Mantenimiento">Mantenimiento</option>
                        </select>

                    </div>

                    <div class="col-8">

                        <label for="" class="form-label">Dirección</label>
                        <input class="form-control border-secondary" type="text" value="<?= $per['Direccion'] ?>" name="direccion" required minlength="4" maxlength="30" id="">

                    </div>

                </div>

                <div class="row mt-3 d-flex justify-content-center align-items-center">

                    <div class="col-6 text-center">

                        <label for="" class="form-label">Fecha de Nacimiento</label>
                        <input class="form-control border-secondary" value="<?= $per['Fecha_Nacimiento'] ?>" type="date" name="fecha_nac" required id="">

                    </div>

                    <div class="col-6 text-center">

                        <label for="" class="form-label">Fecha de Ingreso</label>
                        <input class="form-control border-secondary" value="<?= $per['FI_personal'] ?>" type="date" name="fecha_ingreso" required id="">

                    </div>

                </div>

                <?php endforeach; ?>

                <div class="btn-form mt-3 d-flex align-items-center justify-content-center gap-3">
                    <a href="/Banco-de-sangre/Personal/Mostrar/" type="button" class="btn btn-secondary">Volver</a>
                    <button type="submit" class="btn btn-primary">Enviar</button>
                </div>

            </form>

        </div>

    </div>

    <script src="/vendor/twbs/bootstrap/dist/js/bootstrap.bundle.js"></script>

</body>

</html>