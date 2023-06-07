<?php
session_start();
include("database.php");

$sql = "SELECT *  FROM motos";
$query = mysqli_query($con, $sql);
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DIEGO MORON</title>
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <!-- Sweet Alert -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>



<body>
    <!-- <?php
            var_dump($_SESSION);
            function diego1($precio) {
                $precioFinal = $precio - ($precio * 10 / 100);
                return $precioFinal;
            }
            ?> -->
            <div class="banner">
        <nav class="navbar navbar-dark navbar-expand-lg">
            <div class="container">
                <span><img src="img/Logo1.png" height="100" alt="logo" /></span>
                <a href="" class="navbar-brand fw-bold">DIEGO MORON</a>
                <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navtoggler">
                    <span class="navbar-toggler-icon">
                    </span>
                </button>
                <?php if (isset($_SESSION['USER'])): ?>
                    <div class="collapse navbar-collapse" id="navtoggler">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item"> <a href="index.php" class="nav-link text-light fw-bold">Inicio</a></li>
                        <li class="nav-item"> <a href="products.php" class="nav-link text-light fw-bold">Contactos</a></li>
                        <li class="nav-item"> <a href="controller_logout.php" class="nav-link text-light fw-bold">Cerrar Sesión</a></li>
                        <button type="button" class="btn btn-info d-flex flex-row-reverse me-5" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Insertar
                    </button>
                    
                    </ul>
                    </div>
                <?php else: ?>
                    <div class="collapse navbar-collapse" id="navtoggler">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item"> <a href="index.php" class="nav-link text-light fw-bold">Inicio</a></li>
                        <li class="nav-item"> <a href="view_login.php" class="nav-link text-light fw-bold">Iniciar Sesión</a></li>
                        <li class="nav-item"> <a href="signup.php" class="nav-link text-light fw-bold">Registrarse</a></li>
                    </ul>
                    </div>
                <?php endif; ?>
    </form>
    </div>  
    </nav>

    <div class="container mt-5">
        <div class="row">
            <?php
            while ($row = mysqli_fetch_assoc($query)) {
                echo
                "<div class='col-lg-4 col-md-6 col-sm-12 mt-4 mt-sm-0'>
                        <div class='card  mt-3' style='width: 18rem;'>
                            <img class='ms-5 mt-3' src='data:image;base64," . base64_encode($row["image"]) . "' style='height:200px;width:200px;'>
                            <div class='card-body'>
                                <h5 class='card-title'>" . $row["nombre"] . "</h5>
                                <p class='card-text'><b>Marca: </b>" . $row["marca"] . "<br><b>Precio: </b>" . $row["precio"] . "<br><b>Descuento: </b>" .diego1($row["precio"]) ."</p>
                            " ?>
                <a href="delete.php?id=<?php echo $row["id_moto"] ?>" class="btn btn-danger">Eliminar</a>
        </div>
    </div>
    </div>
<?php
}
         
?>

</div>
</div>

</body>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="insertar.php" method="POST" enctype='multipart/form-data'>
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Insertar</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type='file' class="form-control mb-3" name='file' required>
                    <input type="text" class="form-control mb-3" name="nombre" placeholder="Nombre" required>
                    <input type="text" class="form-control mb-3" name="marca" placeholder="Marca" required>
                    <input type="text" class="form-control mb-3" name="precio" placeholder="Precio" required>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" value="Upload" class="btn btn-warning">Guardar Datos</button>
                </div>
            </form>
        </div>
    </div>
</div>



</html>