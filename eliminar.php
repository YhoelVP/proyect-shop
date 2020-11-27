<?php
    // Si el método GET su valor id esta vacio salir
    if (!isset($_GET['id'])) exit();
    // Creamos una variable que acceda al id mediante el método GET
    $id = $_GET['id'];

    // Incluimos la conexión a la base de datos y preparamos la sentencia
    include_once('conexion.php');
    $sentencia = $pdo->prepare('DELETE FROM productos WHERE id = ?;');
    // Ejecutamos la sentencia agregandole la id mediante el método GET
    $resultado = $sentencia->execute([$id]);

    // Si el resultado de la sentencia se ejecuta correctamente el archivo listar.php se actualizara automaticamente
    if ($resultado === true) {
        header('Location: ./listar.php');
        exit;
    }
    else echo "Algo salió mal";