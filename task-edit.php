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
$codprod = $_POST['cod'];
$nombre = $_POST['nombre'];
$precio = $_POST['precio'];
$cantidad = $_POST['cantidad'];

$query = "UPDATE inventario SET nombre = '$nombre', precio = '$precio', cantidad = '$cantidad' WHERE codprod = '$codprod'";

$result = mysqli_query($con, $query);
if(!$result){
    die('Query Failed');
}

if ($result) {
  Header("Location: /proyecto9/inventario.php");
}
echo "Update Task Successfully";
?>