<?php
    // Declarar las variables para los respectivos campos usando el método POST
    $codigo = $_POST['codigo'];
    $descripcion = $_POST['descripcion'];
    $precioCompra = $_POST['precioCompra'];
    $precioVenta = $_POST['precioVenta'];
    $cantidad = $_POST['cantidad'];
    $id = $_POST['id'];

    // Si los campos no estan definidos - Salir
    if (!isset($_POST['codigo']) || !isset($_POST['descripcion']) || !isset($_POST['precioCompra']) || !isset($_POST['precioVenta']) || !isset($_POST['cantidad'])) exit();
    // Si las variables están definidad ejecutar lo siguiente
    include_once('conexion.php');
    $sentencia = $pdo->prepare('UPDATE productos SET codigo = ?, descripcion = ?, precioCompra = ?, precioVenta = ?, existencia = ? WHERE id = ?;');
    $resultado = $sentencia->execute([$codigo, $descripcion, $precioVenta, $precioCompra, $cantidad, $id]);

    if ($resultado === true) {
        header('Location: ./listar.php');
        exit;
    }
    echo "Algo salió mal. Por favor verifica que los datos existan o esten escritos correctamente";