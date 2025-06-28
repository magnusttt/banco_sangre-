<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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

            <h2 class="text-center mb-2 text-white pb-3 w-50 border-bottom border-white">Editar Donante</h2>

        </div>

        <div class="row col-md-8 offset-md-2">

            <form action="/Banco-de-sangre/Donante/EditarDonante/" method="POST" class="row g-3 border-black mt-3 pt-5 py-4 rounded d-flex align-items-center flex-column w-100" style="background: #ececec;">

            <?php foreach($donantes as $donante): ?>

                <input type="hidden" name="id" value="<?= $donante['ID_Donante'] ?>">

                <div class="row d-flex">

                    <div class="col-6">

                        <label for="" class="form-label">Primer Nombre</label>
                        <input class="form-control border-secondary" type="text" name="p_nombre" value="<?= $donante['primer_nombre'] ?>" required minlength="3" maxlength="10" id="">

                    </div>

                    <div class="col-6">

                        <label for="" class="form-label">Segundo Nombre</label>
                        <input class="form-control border-secondary" type="text" name="s_nombre" value="<?= $donante['segundo_nombre'] ?>" minlength="3" maxlength="10" id="">

                    </div>
                </div>

                <div class="row d-flex mt-3">

                    <div class="col-6">

                        <label for="" class="form-label">Primer Apellido</label>
                        <input class="form-control border-secondary" type="text" name="p_apellido" value="<?= $donante['primer_apellido'] ?>" required minlength="3" maxlength="15" id="">

                    </div>

                    <div class="col-6">

                        <label for="POST" class="form-label">Segundo Apellido</label>
                        <input class="form-control border-secondary" type="text" name="s_apellido" value="<?= $donante['segundo_apellido'] ?> " minlength="3" maxlength="15" id="">

                    </div>
                </div>

                <div class="row mt-3">

                    <div class="col-4 text-center">

                        <label for="" class="form-label">Tipo de telefono</label>
                        <select name="tipo_telefono" id="" class="form-select border-secondary">
                            <option value="<?= $donante['Tipo_telefono'] ?>" class=" bg-secondary"><?= $donante['Tipo_telefono'] ?></option>
                            <option value="Movil">Movil</option>
                            <option value="Casero">Casero</option>
                        </select>

                    </div>

                    <div class="col-8">

                        <label for="" class="form-label">Telefono</label>
                        <input class="form-control border-secondary" value="<?= $donante['Telefono'] ?>" type="number" name="telefono" required id="">

                    </div>

                </div>

                <div class="row mt-3">

                    <div class="col-4 text-center">

                        <label for="" class="form-label">Nacionalidad</label>
                        <select name="nacionalidad" id="" class="form-select border-secondary">
                            <option value="<?= $donante['Nacionalidad'] ?>"><?= $donante['Nacionalidad'] ?></option>
                            <option value="V">Venezolano</option>
                            <option value="E">Extranjero</option>
                        </select>

                    </div>

                    <div class="col-8">

                        <label for="" class="form-label">Cedula</label>
                        <input class="form-control border-secondary" type="number" value="<?= $donante['CI'] ?>" name="cedula" required min="0" max="99999999" id="">

                    </div>

                </div>

                <div class="row mt-3">

                    <div class="col-4 text-center">

                        <label for="" class="form-label">Tipo de Sangre</label>
                        <select name="tipo" id="" class="form-select border-secondary">
                            <option class=" bg-secondary" value="<?= $donante['Tipo_sangre'] ?>"><?= $donante['Tipo_sangre'] ?></option>
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
                        <input class="form-control border-secondary" type="text" value="<?= $donante['Direccion'] ?>" name="direccion" required minlength="4" maxlength="30" id="">

                    </div>

                </div>

                <div class="row mt-3 d-flex justify-content-center align-items-center">

                    <div class="col-6 text-center">

                        <label for="" class="form-label">Fecha de Nacimiento</label>
                        <input class="form-control border-secondary" value="<?= $donante['Fecha_Nacimiento'] ?>" type="date" name="fecha_n" required id="">

                    </div>

                    <div class="col-6 text-center">

                        <label for="" class="form-label">Fecha de Ingreso</label>
                        <input class="form-control border-secondary" value="<?= $donante['Fecha_Ingreso_info_Donante'] ?>" type="date" name="fecha_i" required id="">

                    </div>

                </div>

                <?php endforeach; ?>

                <div class="btn-form mt-3 d-flex align-items-center justify-content-center gap-3">
                    <a href="/Banco-de-sangre/Donante/Mostrar/" type="button" class="btn btn-secondary">Volver</a>
                    <button type="submit" class="btn btn-primary">Enviar</button>
                </div>

            </form>

        </div>

    </div>

    <script src="/vendor/twbs/bootstrap/dist/js/bootstrap.bundle.js"></script>

</body>

</html>