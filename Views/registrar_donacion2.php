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
            <form action="/Banco-de-sangre/Inventario/registrarDonacion" method="POST" class="border-black mt-3 pt-4 pb-4 px-4 rounded" style="background: #ececec;">
                <div class="row g-3">
                    <div class="col-md-6">
                        <label for="donante" class="form-label">Donante</label>
                        <select name="id_donante" id="donante" class="form-select border-secondary" required>
                            <option value="">Seleccione donante</option>
                            <?php foreach($donantes as $donante): ?>
                                <option value="<?= $donante['ID_Donante'] ?>" data-tipo="<?= $donante['Tipo_sangre'] ?>">
                                    <?= $donante['primer_nombre'] . ' ' . $donante['segundo_nombre'].' ('.$donante['CI'].' - '.$donante['Tipo_sangre'].')'?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="tipo_sangre" class="form-label">Tipo de Sangre del Donante</label>
                        <input class="form-control border-secondary" type="text" name="tipo_sangre" id="tipo_sangre" value="" readonly>
                    </div>

                    <div class="col-md-6">
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

                    <div class="col-md-6">
                        <label for="fecha_donacion" class="form-label">Fecha de Donación</label>
                        <input class="form-control border-secondary" type="datetime-local" name="fecha_donacion" id="fecha_donacion" required>
                    </div>

                    <div class="col-md-6">
                        <label for="jeringa" class="form-label">Jeringa a Utilizar</label>
                        <select name="jeringa" id="jeringa" class="form-select border-secondary" required>
                            <option value="">Seleccione Jeringa</option>
                            <?php foreach($jeringas as $jeringa): ?>
                                <option value="<?= $jeringa['ID_Insumo'] ?>">
                                    <?= $jeringa['Nombre'] . ' ('.$jeringa['Codigo_fabricante'].')' ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="bolsa" class="form-label">Bolsa a Utilizar</label>
                        <select name="bolsa" id="bolsa" class="form-select border-secondary" required>
                            <option value="">Seleccione Bolsa</option>
                            <?php foreach($bolsas as $bolsa): ?>
                                <option value="<?= $bolsa['ID_Insumo'] ?>">
                                    <?= $bolsa['Nombre'] . ' ('.$bolsa['Codigo_fabricante'].')' ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>

                <div class="mt-4 d-flex justify-content-center gap-3">
                    <a href="/Banco-de-sangre/Donaciones/Mostrar/" type="button" class="btn btn-secondary">Volver</a>
                    <button type="submit" class="btn btn-primary">Enviar</button>
                </div>
            </form>

        </div>

    </div>

    <script src="/vendor/twbs/bootstrap/dist/js/bootstrap.bundle.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const donanteSelect = document.getElementById('donante');
            const tipoSangreInput = document.getElementById('tipo_sangre');
            donanteSelect.addEventListener('change', function() {
                const selected = donanteSelect.options[donanteSelect.selectedIndex];
                tipoSangreInput.value = selected.getAttribute('data-tipo') || '';
            });
        });
    </script>

</body>

</html>