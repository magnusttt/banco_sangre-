<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Maquina</title>
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

            <h2 class="text-center mb-2 text-white pb-3 w-50 border-bottom border-white">Editar Maquina</h2>

        </div>

        <div class="row col-md-8 offset-md-2">

            <form action="/Banco-de-sangre/Maquina/EditarMaquina/" method="POST" class="row g-3 border-black mt-3 pt-5 py-4 rounded d-flex align-items-center flex-column w-100" style="background: #ececec;">

            <?php foreach($maquinas as $maquina): ?>

                <input type="hidden" name="id" value="<?= $maquina['ID_maquina'] ?>">

                <div class="row d-flex">

                    <div class="col-12">

                        <label for="" class="form-label">Serial</label>
                        <input class="form-control border-secondary" type="text" name="serial" required minlength="3" maxlength="15" value="<?= $maquina['Serial'] ?>" id="">

                    </div>

                </div>

                <div class="row d-flex mt-3">

                    <div class="col-12">

                        <label for="" class="form-label">Nombre</label>
                        <input class="form-control border-secondary" type="text" name="nombre" required minlength="3" maxlength="15" value="<?= $maquina['Nombre'] ?>" id="">

                    </div>

                </div>

                <div class="row mt-3">

                    <div class="col-12">

                        <label for="" class="form-label">Modelo</label>
                        <input class="form-control border-secondary" type="text" name="modelo" required minlength="3" maxlength="15" value="<?= $maquina['Modelo'] ?>" id="">

                    </div>

                </div>

                <div class="row mt-3">

                    <div class="col-12">

                        <label for="" class="form-label">Descripcion</label>
                        <textarea class="form-control border-secondary" type="text" name="descripcion" cols="50" rows="5" minlength="3" maxlength="80" id="">
                            <?= $maquina['Descripcion'] ?>
                        </textarea>

                    </div>

                </div>

                <?php endforeach ?>

                <div class="d-flex justify-content-center gap-3">
                    <a href="/Banco-de-sangre/Maquina/Mostrar/" type="button" class="btn btn-secondary">Volver</a>
                    <button type="submit" class="btn btn-primary">Enviar</button> </div>

            </form>

        </div>

    </div>
    </div>
    </div>

</body>

</html>