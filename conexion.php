<?php
    $conexion = 'mysql:host=localhost;dbname=ventas';
    $user = 'root';
    $pass = '';

    try {
        $pdo = new PDO($conexion, $user, $pass);
        // echo "Conexión exitosa";
        
    } catch (PDOException $e) {
        print "¡Error!: " . $e->getMessage() . "<br/>";
        die();
    }