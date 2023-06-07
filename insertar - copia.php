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

    $codprod = $_POST['cod'];
    $nombre = $_POST['nombre'];
    $cantidad = $_POST['cantidad'];
    $precio = $_POST['precio'];

    // Consultar si existe un registro con el código proporcionado
    $checkQuery = "SELECT * FROM inventario WHERE codprod = '$codprod'";
    $checkResult = mysqli_query($con, $checkQuery);

    if (mysqli_num_rows($checkResult) > 0) {
        // Existe un registro con el código proporcionado, proceder con la modificación
        $updateQuery = "UPDATE inventario SET nombre = '$nombre', cantidad = '$cantidad', precio = '$precio' WHERE codprod = '$codprod'";
        $updateResult = mysqli_query($con, $updateQuery);

        if ($updateResult) {
            // Modificación exitosa, redirigir a la página del inventario
            header("Location: /proyecto9/inventario.php");
        } else {
            echo "Error al modificar el registro.";
        }
    } else {
        echo "No existe un registro con el código proporcionado.";
    }
?>