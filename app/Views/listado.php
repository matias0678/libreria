<?php
error_reporting(E_ALL);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
 
    <title>Crud code igniter</title>
</head>
<body>

	<div class="container">
		<h1>Libreria</h1>
		<div class="row">
			<div class="col-sm-12">
                <!--Cargar libro -->
                <form method="POST" action="<?php echo base_url().'/crear' ?>">
                    <label for="nombre">Nombre del libro</label>
                    <input type="text" name="nombre" id="nombre" required class="form-control">
                    <label for="autor">Autor</label>
                    <input type="text" name="autor" id="autor" required class="form-control">
                    <label for="fecha">Fecha de edicion</label>
                    <input type="date" name="fecha" id="fecha" required class="form-control">
                    <br>
                    <button class="btn btn-primary">Guardar</button>
                </form>
                <hr>
                <!-- Vista para el buscador por nombre -->
                <form action="<?= base_url('libreria/buscarPorNombre') ?>" method="GET">
                    <label for="nombre">Buscar por nombre:</label>
                    <input type="text" name="nombre" id="nombre" required>
                    <button type="submit">Buscar</button>
                </form>

                <!-- Vista para el buscador por autor -->
                <form action="<?= base_url('libreria/buscarPorAutor') ?>" method="GET">
                    <label for="autor">Buscar por autor:</label>
                    <input type="text" name="autor" id="autor" required>
                    <button type="submit">Buscar</button>
                </form>

                <!-- Vista para el buscador por código de libro -->
                <form action="<?= base_url('libreria/buscarPorCodigo') ?>" method="GET">
                    <label for="codigo">Buscar por código de libro:</label>
                    <input type="text" name="codigo" id="codigo" required>
                    <button type="submit">Buscar</button>
                </form>
                
                <!-- Mostrar resultados de la búsqueda -->
                <?php if (!empty($libros)): ?>
                    <h2>Resultados de la búsqueda:</h2>
                    <ul>
                        <?php foreach ($libros as $libro): ?>
                            <li><?= $libro->nombre ?> - <?= $libro->autor ?> - <?= $libro->fecha ?></li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>
		    </div>
		</div>
        <hr>
        <h2>Listado de libros</h2>
        
        <div class="row">
            <div class="col-sm-12">
                <div class="table table-responsive">
                    <table class="table table-hover table-bordered">
                        <tr>
                            <th>Codigo</th>
                            <th>Nombre del libro</th>
                            <th>Autor</th>
                            <th>Fecha de edicion</th>
                            <th>Editar</th>
                            <th>Eliminar</th>
                        </tr>
                        <?php foreach($datos as $key): ?>
                            <tr>
                                <td><?php echo $key->lib_id ?></td>
                                <td><?php echo $key->nombre ?></td>
                                <td><?php echo $key->autor ?></td>
                                <td><?php echo $key->fecha ?></td>
                                <td>
                                    <a href="<?php echo base_url().'/obtenerLibro/'.$key->lib_id ?>" class="btn btn-warning btn-sm">Editar</a>
                                </td>
                                <td>
                                    <a href="<?php echo base_url().'/eliminar/'.$key->lib_id ?>" class="btn btn-danger btn-sm">Eliminar</a>
                                </td>
                            </tr>
                        <?php endforeach?>
                    </table>
                </div>
            </div>
        </div>
	</div>
    
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
    <script type="text/javascript">
        let mensaje= '<?php echo $mensaje ?>';
        
        //mensajes de confirmacion de la operacion
        if (mensaje == '1'){
            alert("agregado con exito");
        }
        else if (mensaje == '0'){
            alert("error al agregar, faltan datos");
        }
        else if (mensaje == '2'){
            alert("se actualizo con exito");
        }
        else if (mensaje == '3'){
            alert("error al actualizar");
        }
        else if (mensaje == '4'){
            alert("eliminado con exito");
        }
        else if (mensaje == '5'){
            alert("error al eliminar");
        }
    </script>
</body>
</html>