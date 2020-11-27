<?php
    // Declarar las variables para los respectivos campos usando el método POST
    $codigo = $_POST['codigo'];
    $descripcion = $_POST['descripcion'];
    $precioCompra = $_POST['precioCompra'];
    $precioVenta = $_POST['precioVenta'];
    $cantidad = $_POST['cantidad'];

    // Si los campos no estan definidos - Salir
    if (!isset($_POST['codigo']) || !isset($_POST['descripcion']) || !isset($_POST['precioCompra']) || !isset($_POST['precioVenta']) || !isset($_POST['cantidad'])) exit();
    // Si las variables están definidad ejecutar lo siguiente

    include_once('conexion.php');
    $sentencia = $pdo->prepare('INSERT INTO productos (codigo, descripcion, precioCompra, precioVenta, existencia) VALUES (?, ?, ?, ?, ?);');
    $resultado = $sentencia->execute([$codigo, $descripcion, $precioVenta, $precioCompra, $cantidad]);

    if ($resultado === true) {
        // Si el resultado es correcto o se ejecuta sin problemas entonces la página listar se actualizará automaticamente y no entrará a ella
        header('Location: ./listar.php');
        exit;
    }
    else echo "Algo salió mal, por favor verifica que la tabla exista";

    include_once('pie.php');