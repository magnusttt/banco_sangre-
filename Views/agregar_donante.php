<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/../Banco-de-sangre/vendor/twbs/bootstrap/dist/css/bootstrap.css">

</head>

<body>

    
                    <form action="Banco-de-sangre/Donante/crear/" method="POST" class="d-flex flex-column g-2" style="color: #bebebe;">

                        <div class="row g-2">

                            <div class="col-4 d-flex flex-column">
                                <label for="cedula" class="form-label">Cedula</label>
                                <input id="cedula" class="form-control" type="text" placeholder="Cedula" required name="cedula">
                            </div>

                            <div class="col-4 d-flex flex-column">
                                <label class="form-label" for="nombres">Nombres</label>
                                <input class="form-control" type="text" name="nombre" placeholder="Nombres" id="nombres">
                            </div>

                            <div class="col-4 d-flex flex-column">
                                <label class="form-label" for="apellido">Apellidos</label>
                                <input class="form-control" type="text" name="apellido" placeholder="Apellidos" id="apellido">
                            </div>

                            

                        </div>

                        <button type="submit">Enviar</button>



                    </form>
               

</body>

</html>