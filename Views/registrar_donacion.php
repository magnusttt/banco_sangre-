<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Donacion</title>
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

            <h2 class="text-center mb-2 text-white pb-3 w-50 border-bottom border-white">Donacion Sanguinea</h2>

        </div>

        <div class="row col-md-8 offset-md-2">

            <form action="/Banco-de-sangre/Inventario/registrarDonacion" method="POST" class="row g-3 border-black mt-3 pt-5 py-4 rounded d-flex align-items-center flex-column w-100" style="background: #ececec;">

            <?php foreach($donante as $donante): ?>

                <div class="row mt-3">
                    <div class="col-6">
                        <input type="hidden" name="id_donante" id="id_donante" value="<?= $donante['ID_Donante'] ?>">
                        <label for="nombres" class="form-label">Nombres del Donante</label>
                        <input class="form-control border-secondary" type="text" name="nombres" id="nombres" value="<?= $donante['primer_nombre'] . ' ' . $donante['segundo_nombre'].'('.$donante['CI'].')'?>" readonly>
                    </div>
                    <div class="col-6">
                        <label for="personal" class="form-label">Personal Encargado</label>
                        <select name="personal_id" id="personal" class="form-select border-secondary" required>
                            <option value="">Seleccione personal</option>
                            <?php foreach($personal_activo as $personal): ?>
                                <option value="<?= $personal['id_empleado'] ?>">
                                    <?= $personal['primer_nombre'] . ' ' . $personal['primer_apellido'].' ('.$personal['Cargo'].')' ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="col-6">
                        <label for="personal" class="form-label">Insumos</label>
                        <select name="jeringa" id="personal" class="form-select border-secondary" required>
                            <option value="">Seleccione Jeringa a utilizar</option>
                            <?php foreach($jeringas as $jeringa): ?>
                                <option value="<?= $jeringa['ID_Insumo'] ?>">
                                    <?= $jeringa['Nombre'] . ' ' .'('.$jeringa['Codigo_fabricante'].')' ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                        <select name="bolsa" id="personal" class="form-select border-secondary mt-3" required>
                            <option value="">Seleccione Bolsa a utilizar</option>
                            <?php foreach($bolsas as $bolsa): ?>
                                <option value="<?= $bolsa['ID_Insumo'] ?>">
                                    <?= $bolsa['Nombre'] . ' ' .'('.$bolsa['Codigo_fabricante'].')' ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="col-6">
                        <label for="fecha_donacion" class="form-label">Fecha de Donación</label>
                        <input class="form-control border-secondary" type="datetime-local" name="fecha_donacion" id="fecha_donacion" required>
                    </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-6">
                            <label for="tipo_sangre" class="form-label">Tipo de Sangre del Donante</label>
                            <input class="form-control border-secondary" type="text" name="tipo_sangre" id="tipo_sangre" value="<?= $donante['Tipo_sangre'] ?>" readonly>
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