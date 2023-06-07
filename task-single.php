<?php
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
   
    $codprod = $_POST['codprod'];
    $query = "SELECT * FROM inventario WHERE codprod = '$codprod'";
    $result = mysqli_query($con, $query);
    if(!$result){
        die('Query Failed');
    }

    $row = mysqli_fetch_array($result);
    $task = array(
        'codprod' => $row['codprod'],
        'nombre' => $row['nombre'],
        'precio' => $row['precio'],
        'cantidad' => $row['cantidad'],	
    );

    $jsonstring = json_encode($task);
    echo $