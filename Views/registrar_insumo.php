<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Insumo</title>
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

            <h2 class="text-center mb-2 text-white pb-3 w-50 border-bottom border-white">Registrar Insumo</h2>

        </div>

        <div class="row col-md-8 offset-md-2">

            <form action="/Banco-de-sangre/Insumos/registrarInsumo" method="POST" class="row g-3 border-black mt-3 pt-5 py-4 rounded d-flex align-items-center flex-column w-100" style="background: #ececec;">

                <div class="row mt-3">
                    <div class="col-6">
                        <label for="Codigo_fabricante" class="form-label">Codigo Fabricante</label>
                        <input class="form-control border-secondary" type="text" name="Codigo_fabricante" id="Codigo_fabricante" >
                    </div>
                    <div class="col-6">
                        <label for="personal" class="form-label">Categoria</label>
                        <select name="ID_insumos" id="" class="form-select border-secondary" required>
                            <option value="">Seleccione Categoria</option>
                            <?php foreach($categoria as $Categorias): ?>
                                <option value="<?= $Categorias['ID_insumos'] ?>">
                                    <?= $Categorias['Nombre'].' ('.$Categorias['Unidad_medida'].')' ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="col-6">
                        <label for="Proveedor" class="form-label">Proveedor</label>
                        <select name="ID_proveedor" id="Proveedor" class="form-select border-secondary" required>
                            <option value="">Seleccione Proveedor</option>
                            <?php foreach($proveedor as $Proveedors): ?>
                                <option value="<?= $Proveedors['ID_proveedor'] ?>">
                                    <?= $Proveedors['Doc'].' '.$Proveedors['Nombre'] . ' ' .'('.$Proveedors['Tipo_proveedor'].')' ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="col-6">
                        <label for="fecha_fabricacion" class="form-label">Fecha de Fabricacion</label>
                        <input class="form-control border-secondary" type="datetime-local" name="fecha_fabricacion" id="fecha_fabricacion" required>
                    </div>
                    <div class="col-6">
                        <label for="fecha_vencimiento" class="form-label">Fecha de Vencimiento</label>
                        <input class="form-control border-secondary" type="datetime-local" name="fecha_vencimiento" id="fecha_vencimiento" required>
                    </div>
                </div>

                <div class="btn-form mt-3 d-flex align-items-center justify-content-center gap-3">
                    <a href="/Banco-de-sangre/Insumos/Mostrar/" type="button" class="btn btn-secondary">Volver</a>
                    <button type="submit" class="btn btn-primary">Enviar</button>
                </div>

            </form>

        </div>

    </div>

    <script src="/vendor/twbs/bootstrap/dist/js/bootstrap.bundle.js"></script>

</body>

</html>