<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/../Banco-de-sangre/vendor/twbs/bootstrap/dist/css/bootstrap.css">
    <link rel="stylesheet" href="/../Banco-de-sangre/src/Styles/sidebar.css">

    <style>
        label {
            text-align: center;
        }
    </style>

</head>

<body class="bg-dark">

    <div class="container my-3 ">

        <div class="d-flex justify-content-center">

            <h2 class="text-center mb-2 text-white pb-3 w-50 border-bottom border-white">Editar Proveedor</h2>

        </div>

        <div class="row col-md-8 offset-md-2">

            <form action="/Banco-de-sangre/Provedores/EditarProvedor/" method="POST" class="row g-3 border-black mt-3 pt-5 py-4 rounded d-flex align-items-center flex-column w-100" style="background: #ececec;">

                <?php foreach ($provedores as $provedor): ?>

                    <input type="hidden" name="id" value="<?= $provedor['id_provedor'] ?>">

                    <div class="row d-flex">

                        <div class="col-12">

                            <label for="" class="form-label">Documentacion</label>
                            <input class="form-control border-secondary" type="text" name="rif" value="<?= $provedor['doc'] ?>" required minlength="3" maxlength="25" id="">

                        </div>

                    </div>

                    <div class="row d-flex mt-3">

                        <div class="col-12">

                            <label for="" class="form-label">Nombre</label>
                            <input class="form-control border-secondary" type="text" name="nombre" value="<?= $provedor['nombre'] ?>" required minlength="3" maxlength="15" id="">

                        </div>

                    </div>

                    <div class="row mt-3">

                        <div class="col-12">

                            <label for="" class="form-label">Tipo de Proveedor</label>
                            <input class="form-control border-secondary" type="text" name="tipo" value="<?= $provedor['tipo_provedor'] ?>" required minlength="3" maxlength="15" id="">

                        </div>

                    </div>

                    <div class="row mt-3">

                        <div class="col-12">

                            <label for="" class="form-label">Dirección</label>
                            <input class="form-control border-secondary" type="text" name="direccion" value="<?= $provedor['direccion'] ?>" required minlength="3" maxlength="50" id="">

                        </div>

                    </div>

                    <div class="row mt-3">

                        <div class="col-12">

                            <label for="" class="form-label">Telefono</label>
                            <input class="form-control border-secondary" type="number" name="telefono" value="<?= $provedor['telefono'] ?>" min="0" id="">

                        </div>

                    </div>

                    <div class="row mt-3">

                        <div class="col-12">

                            <label for="" class="form-label">Correo Electronico</label>
                            <input class="form-control border-secondary" type="email" name="correo" value="<?= $provedor['correo'] ?>" required minlength="3" maxlength="20" id="">

                        </div>

                    </div>

                    <div class="row mt-3">

                        <div class="col-12">

                            <label for="" class="form-label">Fecha de registro del proveedor</label>
                            <input class="form-control border-secondary" type="date" name="fecha" value="<?= $provedor['fi_ingreso'] ?>" required id="">

                        </div>

                    </div>

                <?php endforeach ?>

                <div class="d-flex justify-content-center gap-3">
                    <a href="/Banco-de-sangre/Provedores/Mostrar/" type="button" class="btn btn-secondary">Volver</a>
                    <button type="submit" class="btn btn-primary">Enviar</button>

            </form>

        </div>

    </div>
    </div>
    </div>

</body>

</html>