<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/style1.css" type="text/css">
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
    echo $results;
?> -->
<div class="banner">
        <nav class="navbar navbar-dark navbar-expand-lg">
            <div class="container">
                <span><img src="img/Logo1.png" height="100" alt="logo" /></span>
                <a href="" class="navbar-brand fw-bold"> RACERS "UCB"</a>
                <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navtoggler">
                    <span class="navbar-toggler-icon">
                    </span>
                </button>

                <div class="collapse navbar-collapse" id="navtoggler">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item"> <a href="index.php" class="nav-link text-light fw-bold">Inicio</a></li>
                        <li class="nav-item"> <a href="view_login.php" class="nav-link text-light fw-bold">Iniciar Sesión</a></li>
                        <li class="nav-item"> <a href="signup.php" class="nav-link text-light fw-bold">Registrarse</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <form class="container mt-5 text-light" action="controller_login.php" method="POST">
        <h1 class="display-3">Iniciar Sesión</h1>
        
        <div class="mb-3 mt-3">
            <label for="" class="form-label">Usuario</label>
            <input type="text" class="form-control" id="exampleInputUser1" name="user" required>
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Contraseña</label>
            <input type="password" class="form-control" id="exampleInputPassword1" name="password" required>
        </div>

        <button type="submit" class="btn btn-warning text-light">Aceptar</button>
    
    </form>
    </div>
    
   
    
    
</body>

</html>