<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Paciente</title>
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

            <h2 class="text-center mb-2 text-white pb-3 w-50 border-bottom border-white">Editar Paciente</h2>

        </div>

        <div class="row col-md-8 offset-md-2">

            <form action="/Banco-de-sangre/Paciente/EditarPaciente/" method="POST" class="row g-3 border-black mt-3 pt-5 py-4 rounded d-flex align-items-center flex-column w-100" style="background: #ececec;">

            <?php foreach($pacientes as $paciente): ?>

                <input type="hidden" name="id" value="<?= $paciente['ID_paciente'] ?>">

                <div class="row d-flex">

                    <div class="col-6">

                        <label for="" class="form-label">Primer Nombre</label>
                        <input class="form-control border-secondary" type="text" name="p_nombre" value="<?= $paciente['Primer_nombre'] ?>" required minlength="3" maxlength="10" id="">

                    </div>

                    <div class="col-6">

                        <label for="" class="form-label">Segundo Nombre</label>
                        <input class="form-control border-secondary" type="text" name="s_nombre" value="<?= $paciente['Segundo_nombre'] ?>" minlength="3" maxlength="10" id="">

                    </div>
                </div>

                <div class="row d-flex mt-3">

                    <div class="col-6">

                        <label for="" class="form-label">Primer Apellido</label>
                        <input class="form-control border-secondary" type="text" name="p_apellido" value="<?= $paciente['Primer_apellido'] ?>" required minlength="3" maxlength="15" id="">

                    </div>

                    <div class="col-6">

                        <label for="POST" class="form-label">Segundo Apellido</label>
                        <input class="form-control border-secondary" type="text" name="s_apellido" value="<?= $paciente['Segundo_apellido'] ?> " minlength="3" maxlength="15" id="">

                    </div>
                </div>

                <div class="row mt-3">

                    <div class="col-4 text-center">

                        <label for="" class="form-label">Tipo de telefono</label>
                        <select name="Tipo_telefono" id="" class="form-select border-secondary">
                            <option value="<?= $paciente['Tipo_telefono'] ?>" class=" bg-secondary"><?= $paciente['Tipo_telefono'] ?></option>
                            <option value="Movil">Movil</option>
                            <option value="Casero">Casero</option>
                        </select>

                    </div>

                    <div class="col-8">

                        <label for="" class="form-label">Telefono</label>
                        <input class="form-control border-secondary" value="<?= $paciente['Telefono'] ?>" type="number" name="telefono" required id="">

                    </div>

                </div>

                <div class="row mt-3">

                    <div class="col-4 text-center">

                        <label for="" class="form-label">Nacionalidad</label>
                        <select name="nacionalidad" id="" class="form-select border-secondary">
                            <option value="<?= $paciente['Nacionalidad'] ?>"><?= $paciente['Nacionalidad'] ?></option>
                            <option value="V">Venezolano</option>
                            <option value="E">Extranjero</option>
                        </select>

                    </div>

                    <div class="col-8">

                        <label for="" class="form-label">Cedula</label>
                        <input class="form-control border-secondary" type="number" value="<?= $paciente['CI'] ?>" name="cedula" required min="0" max="99999999" id="">

                    </div>

                </div>

                <div class="row mt-3">

                    <div class="col-4 text-center">

                        <label for="" class="form-label">Tipo de Sangre</label>
                        <select name="Tipo_sangre" id="" class="form-select border-secondary">
                            <option class=" bg-secondary" value="<?= $paciente['Tipo_sangre'] ?>"><?= $paciente['Tipo_sangre'] ?></option>
                            <option value="A+">A+</option>
                            <option value="A-">A-</option>
                            <option value="B+">B+</option>
                            <option value="B-">B-</option>
                            <option value="AB+">AB+</option>
                            <option value="AB-">AB-</option>
                            <option value="O+">O+</option>
                            <option value="O-">O-</option>
                        </select>

                    </div>

                    <div class="col-8">

                        <label for="" class="form-label">Dirección</label>
                        <input class="form-control border-secondary" type="text" value="<?= $paciente['Direccion'] ?>" name="direccion" required minlength="4" maxlength="30" id="">

                    </div>
                    <div class="col-8">
                        <label for="" class="form-label">Descripcion</label>
                        <input class="form-control border-secondary" type="text" value="<?= $paciente['Descripcion'] ?>" name="Descripcion" required minlength="4" maxlength="100" id="">

                    </div>
                </div>

                <div class="row mt-3 d-flex justify-content-center align-items-center">

                    <div class="col-6 text-center">

                        <label for="" class="form-label">Fecha de Nacimiento</label>
                        <input class="form-control border-secondary" value="<?= $paciente['Fecha_Nacimiento'] ?>" type="date" name="fecha_n" required id="">

                    </div>

                    <div class="col-6 text-center">

                        <label for="" class="form-label">Fecha de Ingreso</label>
                        <input class="form-control border-secondary" value="<?= $paciente['Fecha_Ingreso_info_Paciente'] ?>" type="date" name="fecha_i" required id="">
                        
                    </div>

                </div>

                <?php endforeach; ?>

                <div class="btn-form mt-3 d-flex align-items-center justify-content-center gap-3">
                    <a href="/Banco-de-sangre/Paciente/Mostrar/" type="button" class="btn btn-secondary">Volver</a>
                    <button type="submit" class="btn btn-primary">Enviar</button>
                </div>

            </form>

        </div>

    </div>

    <script src="/vendor/twbs/bootstrap/dist/js/bootstrap.bundle.js"></script>

</body>

</html>