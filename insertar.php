<?php
    // Configuración de la conexión a la base de datos
    $host = 'localhost';
    $dbname = 'bubbles';
    $username = 'root';
    $password = '';

    // Crear la conexión
    $con = mysqli_connect($host, $username, $password, $dbname);

    // Verificar si hay errores en la conexión
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        exit();
    }

    $nombre = $_POST['nombre'];
    $cantidad = $_POST['cantidad'];
    $precio = $_POST['precio'];
    $codprod = $_POST['codprod'];


    $sql = "INSERT INTO inventario (codprod,nombre, cantidad, precio) VALUES ('$codprod','$nombre', '$cantidad', '$precio')";
    $query = mysqli_query($con, $sql);

    if ($query) {
        Header("Location: /proyecto9/inventario.php");
    }
?>