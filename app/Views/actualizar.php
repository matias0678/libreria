<?php 

    $lib_id = $datos[0]['lib_id'];
    $nombre = $datos[0]['nombre'];
    $autor = $datos[0]['autor'];
    $fecha = $datos[0]['fecha']; 
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <title>Actualizar</title>
</head>
<body>
    <div class="container">
        <div class="row">
                <div class="col-sm-12">
                    <form method="POST" action="<?php echo base_url().'/actualizar' ?>">
                        <input type="number" id="lib_id" name="lib_id" hidden="" 
                        value="<?php echo $lib_id ?>">

                        <label for="nombre">Nombre del libro</label>
                        <input type="text" name="nombre" id="nombre" class="form-control" 
                        value="<?php echo $nombre ?>">

                        <label for="autor">Autor</label>
                        <input type="text" name="autor" id="autor" class="form-control" 
                        value="<?php echo $autor ?>">

                        <label for="fecha">Fecha de edicion</label>
                        <input type="date" name="fecha" id="fecha" class="form-control" 
                        value="<?php echo $fecha ?>">
                        <br>
                        <button class="btn btn-warning">Guardar</button>
                    </form>
                </div>
            </div>
        </div>			
    </div>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

</body>
</html>