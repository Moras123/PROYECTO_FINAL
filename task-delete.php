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

if(isset($_POST['codprod'])){
    $id = $_POST['codprod'];
    $query = "DELETE FROM inventario WHERE codprod = '$id'";
    $result = mysqli_query($con, $query);
    if(!$result){
        die('Query Failed');
    }
    echo "Task Deleted Successfully";
}
?>
