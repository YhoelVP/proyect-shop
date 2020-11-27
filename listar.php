<?php
    // Incluir los archivos de cabecera y la conexión a la base de datos
    include_once('encabezado.php');
    include_once('conexion.php');

    // Hacer un listado de la tabla productos para luego pintarlos en un formulario
    $sentencia = $pdo->query('SELECT * FROM productos');
    $productos = $sentencia->fetchAll(PDO::FETCH_OBJ); 
?>

<div class="col-xs-12">
    <h1>Productos</h1>
    <div>
        <a href="./formulario.php" class="btn btn-success">Nuevo
            <i class="fa fa-plus"></i>
        </a>
    </div>
    <br>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Código</th>
                <th>Descripción</th>
                <th>Precio de compra</th>
                <th>Precio de venta</th>
                <th>Cantidad</th>
                <th>Editar</th>
                <th>Eliminar</th>
            </tr>
        </thead>
        <tbody>
            <!-- Hacemos un arreglo que por cada consulta que tiene la tabla productos esta se creará una nueva fila con los datos correspondiente -->
            <?php foreach ($productos as $producto): ?>
            <tr>
                <th><?php echo $producto->id; ?></th>
                <th><?php echo $producto->codigo; ?></th>
                <th><?php echo $producto->descripcion; ?></th>
                <th><?php echo $producto->precioCompra; ?></th>
                <th><?php echo $producto->precioVenta; ?></th>
                <th><?php echo $producto->existencia; ?></th>
                <th>
                    <!-- Crearemos un botón eliminar y editar para cada fila agregada -->
                    <a href="<?php echo "editar.php?id=" . $producto->id?>" class="btn btn-warning">
                        <i class="fa fa-edit"></i>
                    </a>
                </th>
                <th>
                    <!-- Crearemos un botón eliminar y editar para cada fila agregada -->
                    <a href="<?php echo "eliminar.php?id=" . $producto->id?>" class="btn btn-danger">
                        <i class="fa fa-trash"></i>
                    </a>
                </th>
            </tr>
            <?php endforeach ?>
            <!-- Fin del fucle foreach -->
        </tbody>
    </table>
</div>

<?php include_once('pie.php') ?>