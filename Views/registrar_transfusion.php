<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Transfusion</title>
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

            <h2 class="text-center mb-2 text-white pb-3 w-50 border-bottom border-white">Transfusion Sanguinea</h2>

        </div>

        <div class="row col-md-8 offset-md-2">

            <form action="/Banco-de-sangre/Inventario/registrarTransfusion" method="POST" class="row g-3 border-black mt-3 pt-5 py-4 rounded d-flex align-items-center flex-column w-100" style="background: #ececec;">
                <div class="row mt-3">
                    <div class="col-6">
                        <label for="fecha_transfusion" class="form-label">Fecha y Hora de Transfusión</label>
                        <input class="form-control border-secondary" type="datetime-local" name="fecha_transfusion" id="fecha_transfusion" required>
                    </div>
                    <div class="col-6">
                        <label for="id_paciente" class="form-label">Paciente</label>
                        <select name="id_paciente" id="id_paciente" class="form-select border-secondary" required>
                            <option value="">Seleccione paciente</option>
                            <?php foreach($pacientes as $paciente): ?>
                                <option value="<?= $paciente['ID_paciente'] ?>">
                                    <?= $paciente['Primer_nombre'] . ' ' . $paciente['Primer_apellido'] .' '. $paciente['Tipo_sangre'] .' (' . $paciente['CI'] . ')' ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                
                <div class="row mt-3">
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
                        <label for="id_sangre" class="form-label">Unidad de Sangre</label>
                        <select name="id_sangre" id="id_sangre" class="form-select border-secondary" required>
                            <option value="">Seleccione unidad de sangre</option>
                            <?php foreach($unidad as $sangre): ?>
                                <option value="<?= $sangre['ID_sangre'] ?>">
                                    <?= $sangre['ID_sangre'] . ' - ' . $sangre['Tipo_sangre'] . ' (' . $sangre['Estado'] . ')' ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>

                <div class="btn-form mt-3 d-flex align-items-center justify-content-center gap-3">
                    <a href="/Banco-de-sangre/Transfusiones/Mostrar/" type="button" class="btn btn-secondary">Volver</a>
                    <button type="submit" class="btn btn-primary">Enviar</button>
                </div>

            </form>

        </div>

    </div>

    <script src="/vendor/twbs/bootstrap/dist/js/bootstrap.bundle.js"></script>

</body>

</html>