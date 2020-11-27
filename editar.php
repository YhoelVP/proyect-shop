<?php
    // Si el campo de la variable GET con el indice que tenga como valor 'id' esta vacio entoces se cerrara y lo demás no se ejecutara
    if (!isset($_GET['id'])) exit();
    $id = $_GET['id'];
    
    // Nos conectaremos a la base de datos a traves de la conexión
    include_once('conexion.php');
    // Prepararemos la sentencia donde elegiremos a un producto que obtendremos por el método GET y solo ese editaremos
    $sentencia = $pdo->prepare('SELECT * FROM productos WHERE id = ?;');
    $sentencia->execute([$id]);
    $producto = $sentencia->fetch(PDO::FETCH_OBJ);
    
    // Condicionaremos que si la variable producto que obtendra el ID no es correcto entoces nos saltará un mensaje
    if ($producto === false) {
        echo "No existe un productos con ese ID!";
        exit();
    }
    
    include_once('encabezado.php');
?>

<div class="col-xs-12">
        <h1>editar producto con ID <?php echo $producto->id; ?></h1>
        <form action="guardarDatosEditados.php" method="post">
            <input type="hidden" name="id" value="<?php echo $producto->id; ?>">

            <label for="codigo">Código del producto:</label>
            <input required value="<?php echo $producto->codigo; ?>" type="text" class="form-control" name="codigo" id="codigo" placeholder="Escribe el código">

            <label for="descripcion">Descripción:</label>
            <textarea required class="form-control" name="descripcion" id="descripcion" cols="30" rows="5" placeholder="Escribe una descripción del producto"><?php echo $producto->descripcion; ?></textarea>

            <label for="precioVenta">Precio de venta:</label>
            <input required value="<?php echo $producto->precioVenta; ?>" type="text" class="form-control" name="precioVenta" id="precioVenta" placeholder="Escribe el precio de venta">

            <label for="precioCompra">Precio de compra:</label>
            <input required value="<?php echo $producto->precioCompra; ?>" type="text" class="form-control" name="precioCompra" id="precioCompra" placeholder="Escribe el precio de compra">

            <label for="cantidad">Cantidad:</label>
            <input required value="<?php echo $producto->existencia; ?>" type="text" class="form-control" name="cantidad" id="cantidad" placeholder="Escribe la cantidad de productos">
            <br><br>
            <input type="submit" class="btn btn-info" value="Guardar">
            <a href="./listar.php" class="btn btn-warning">Cancelar</a>
        </form>
</div>

<?php include_once('pie.php'); ?>