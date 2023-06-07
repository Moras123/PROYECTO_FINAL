
<?php
   session_start();
   require 'database.php';

    if (!isset($_SESSION['USER'])){ 
        header('Location: /Moto/index.php');
    }

    $sqlSelect=$conn->query("SELECT MAX(id_usuario) FROM usuario_admin");
    $result = $sqlSelect->fetchColumn();
    $function = $result;

    $message = '';
    $tipo = false;
    if(!empty($_POST['cod']) && !empty($_POST['name'])){
        $sql="INSERT INTO vehiculo(placa, nombre_cliente, modelo,	
        marca, anio, celular,correo_empresa,fecha,tipo) VALUES (:pl, :name, :type1, :marca, :date1, :cel, :mail, :date2, :type2, :function)";
        $stmt=$conn->prepare($sql);
        
        $stmt->bindParam(':pl',  $_POST['pl']);
        $stmt->bindParam(':name',  $_POST['name']);
        $stmt->bindParam(':type1',  $_POST['type1']);
        $stmt->bindParam(':marca',  $_POST['marca']);
        $stmt->bindParam(':date1',  $_POST['date1']);
        $stmt->bindParam(':cel',  $_POST['cel']);
        $stmt->bindParam(':mail',  $_POST['mail']);
        $stmt->bindParam(':date2',  $_POST['date2']);
        $stmt->bindParam(':type2',  $_POST['type2']);
        $stmt->bindParam(':function', $function);
        
        if($stmt->execute()){
            $message = 'Vehiculo Registrado';
            $tipo = true;
        } else{
            $message = 'Lo sentimos pero parece que el registro salio mal';
            $tipo = false;
        }
    }
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <!-- Sweet Alert -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>

<body class="bg-dark">
<div class="mb-5">
        <nav class="navbar navbar-dark navbar-expand-lg">
            <div class="container">
                <span><img src="img/Logo1.png" height="100" alt="logo" /></span>
                <a href="" class="navbar-brand fw-bold">RACERS UCB</a>
                <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navtoggler">
                    <span class="navbar-toggler-icon">
                    </span>
                </button>

                <div class="collapse navbar-collapse" id="navtoggler">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item"> <a href="index.php" class="nav-link text-light fw-bold">Inicio</a></li>
                        <li class="nav-item"> <a href="controller_logout.php" class="nav-link text-light fw-bold">Cerrar Sesión</a></li>
                    
                    </ul>
                </div>
            </div>
        </nav>
    <form class="container mt-5 text-light" action="products.php" method="POST">
        <h1 class="display-3">Registra un Vehiculo a la base de datos</h1>
        
        <div class="mb-3 mt-3">
            <label for="" class="form-label">Placa</label>
            <input type="text" class="form-control" id="exampleInputUser1" name="pl" required>
    
        </div>
        <div class="mb-3 mt-3">
            <label for="" class="form-label">Nombre del propietario</label>
            <input type="text" class="form-control" id="exampleInputUser1" name="name" required>
    
        </div>
        <div class="mb-3 mt-3">
            <label for="" class="form-label">Modelo</label>
            <input type="text" class="form-control" id="exampleInputUser1" name="type1" required>
    
        </div>
        <div class="mb-3 mt-3">
            <label for="" class="form-label">Marca</label>
            <input type="text" class="form-control" id="exampleInputUser1" name="marca" required>
    
        </div>
        <div class="mb-3 mt-3">
            <label for="" class="form-label">Año</label>
            <input type="text" class="form-control" id="exampleInputUser1" name="date1" required>
    
        </div>
        <div class="mb-3 mt-3">
            <label for="" class="form-label">Telefono</label>
            <input type="number" class="form-control" id="exampleInputUser1" name="cel" required>
    
        </div>
        <div class="mb-3 mt-3">
            <label for="" class="form-label">Correo de la empressa</label>
            <input type="text" class="form-control" id="exampleInputUser1" name="mail" required>
    
        </div>
        <div class="mb-3 mt-3">
            <label for="" class="form-label">Fecha de elaboracion</label>
            <input type="date" class="form-control" id="exampleInputUser1" name="date2" required>
    
        </div>
        <div class="mb-3 mt-3">
            <label for="" class="form-label">Tipo</label>
            <input type="text" class="form-control" id="exampleInputUser1" name="type2" required>
    
        </div>
     
     

        <button type="submit" class="btn btn-warning text-light">Aceptar</button>
    </form>
</div>

    <?php if(!empty($message) && $tipo === true): ?>
            <script>swal("", '<?= $message?>', "success");</script>
    <?php elseif(!empty($message) && $tipo === false):?>
            <script>swal("", '<?= $message?>', "error");</script>
    <?php endif; ?>

    
</body>

</html>