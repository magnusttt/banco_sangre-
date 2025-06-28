<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Tipo de Examen</title>
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

            <h2 class="text-center mb-2 text-white pb-3 w-50 border-bottom border-white">Editar Tipo de Examen</h2>

        </div>

        <div class="row col-md-8 offset-md-2">

            <form action="/Banco-de-sangre/TipoExamen/EditarTipoExamen/" method="POST" class="row g-3 border-black mt-3 pt-5 py-4 rounded d-flex align-items-center flex-column w-100" style="background: #ececec;">

                <?php foreach ($tiposexamen as $tipoexamen): ?>

                    <input type="hidden" name="id" value="<?= $tipoexamen['ID_Tipo_Examen'] ?>">


                    <div class="row d-flex justify-content-center align-items-center">

                        <div class="col-10">

                            <label for="" class="form-label">Nombre</label>
                            <input class="form-control border-secondary" value="<?= $tipoexamen['Nombre_Examen'] ?>" type="text" name="Nombre" required minlength="3" maxlength="10" id="">

                        </div>
                    </div>

                    <div class="row mt-3 d-flex justify-content-center align-items-center">

                        <div class="col-10">
                            <label for="" class="form-label">Descripcion</label>
                            <input class="form-control border-secondary" value="<?= $tipoexamen['Descripcion'] ?>" type="text" name="Descripcion" required minlength="4" maxlength="100" id="">
                        </div>
                    </div>

                    <div class="row mt-3 d-flex justify-content-center align-items-center">

                        <div class="col-10">

                            <label for="" class="form-label">Categoria</label>
                            <input class="form-control border-secondary" value="<?= $tipoexamen['Categoria'] ?>" type="text" name="Categoria" required minlength="3" maxlength="10" id="">

                        </div>
                    </div>



                <?php endforeach; ?>

                <div class="btn-form mt-3 d-flex align-items-center justify-content-center gap-3">
                    <a href="/Banco-de-sangre/TipoExamen/Mostrar/" type="button" class="btn btn-secondary">Volver</a>
                    <button type="submit" class="btn btn-primary">Enviar</button>
                </div>

            </form>

        </div>

    </div>

    <script src="/vendor/twbs/bootstrap/dist/js/bootstrap.bundle.js"></script>

</body>

</html>