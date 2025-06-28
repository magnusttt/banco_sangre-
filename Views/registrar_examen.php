<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Examen</title>
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

            <h2 class="text-center mb-2 text-white pb-3 w-50 border-bottom border-white">Registrar Examen</h2>

        </div>

        <div class="row col-md-8 offset-md-2">
            <form action="/Banco-de-sangre/Examen/RegistrarExamen" method="POST" class="border-black mt-3 pt-4 pb-4 px-4 rounded" style="background: #ececec;">
                <div class="row g-3">
                    <div class="col-md-6">
                        <label for="tipo_examen" class="form-label">Tipo de Examen</label>
                        <select name="tipo_examen" id="tipo_examen" class="form-select border-secondary" required>
                            <option value="">Seleccione Tipo</option>
                            <?php foreach($Tipos as $tipo): ?>
                                <option value="<?= $tipo['ID_Tipo_Examen'] ?>">
                                    <?= $tipo['Nombre_Examen'] . ' ('.$tipo['Categoria'].')' ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    
                    <div class="col-md-6">
                        <label for="estado_examen" class="form-label">Estado del Examen</label>
                        <select name="estado_examen" id="estado_examen" class="form-select border-secondary" required>
                            <option value="Realizado">Realizado</option>
                            <option value="Pendiente">Pendiente</option>
                            <option value="En Proceso">En Proceso</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="maquina" class="form-label">Maquina Utilizada</label>
                        <select name="id_maquina" id="maquina" class="form-select border-secondary" required>
                            <option value="">Seleccione Maquina</option>
                            <?php foreach($maquinas as $maquina): ?>
                                <option value="<?= $maquina['ID_maquina'] ?>">
                                    <?= $maquina['Nombre'] . ' ' . $maquina['Modelo'].' ('.$maquina['Serial'].')' ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="donante" class="form-label">Donante</label>
                        <select name="id_donante" id="donante" class="form-select border-secondary" required>
                            <option value="">Seleccione donante</option>
                            <?php foreach($donantes as $donante): ?>
                                <option value="<?= $donante['ID_Donante'] ?>" data-tipo="<?= $donante['Tipo_sangre'] ?>">
                                    <?= $donante['primer_nombre'] . ' ' . $donante['segundo_nombre'].' ('.$donante['CI'].')'?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label for="personal" class="form-label">Personal Encargado</label>
                        <select name="id_personal" id="personal" class="form-select border-secondary" required>
                            <option value="">Seleccione personal</option>
                            <?php foreach($personales as $personal): ?>
                                <option value="<?= $personal['id_empleado'] ?>">
                                    <?= $personal['primer_nombre'] . ' ' . $personal['primer_apellido'].' ('.$personal['Cargo'].')' ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="fecha_hora_examen" class="form-label">Fecha y Hora del Examen</label>
                        <input class="form-control border-secondary" type="datetime-local" name="fecha_hora_examen" id="fecha_hora_examen" required>
                    </div>
                    <div class="col-10">
                        <label for="resultado" class="form-label">Resultado</label>
                        <input class="form-control border-secondary" type="text" name="resultado" id="resultado" value="" required>
                    </div>

                    
                </div>

                <div class="mt-4 d-flex justify-content-center gap-3">
                    <a href="/Banco-de-sangre/Examen/Mostrar/" type="button" class="btn btn-secondary">Volver</a>
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