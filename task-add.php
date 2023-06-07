<?php
include('database.php');
$connection = Conectarse();
$query = "SELECT MAX(id_order) FROM inventario";
$result = mysqli_query($connection, $query);
$array = $result->fetch_array();
$function = $array['MAX(id_order)'] + 1;

if(isset($_POST['codprod'])){
    $codprod = $_POST['codprod'];
    $nombre = $_POST['nombre'];
    $precio = $_POST['precio'];
    $cantidad = $_POST['cantidad'];
    $query = "INSERT INTO inventario (codprod, nombre, precio, cantidad) VALUES ('$codprod', '$nombre', '$precio', '$cantidad')";
    $result = mysqli_query($connection, $query);
    if(!$result){
        die('Query Failed. ');
    }
    echo 'Order Added Successfully';
}
?>