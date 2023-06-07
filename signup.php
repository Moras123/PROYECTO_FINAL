
<?php
    
    require 'database.php';
    $sqlSelect=$conn->query("SELECT MAX(id_usuario) FROM usuario_admin");
    $result = $sqlSelect->fetchColumn();
    $function = $result + 1;

    $message = '';
    $tipo = false;
    if(!empty($_POST['user']) && !empty($_POST['password'])){
        $sql="INSERT INTO usuario_admin(id_usuario, usuario, contrasenia) VALUES (:function, :user, :password)";
        $stmt=$conn->prepare($sql);
        
        $stmt->bindParam(':function', $function);
        $stmt->bindParam(':user',  $_POST['user']);
        // $password = password_hash($_POST['password'], PASSWORD_BCRYPT); 
        // $stmt->bindParam(':password', $password);
        $stmt->bindParam(':password',  $_POST['password']);
        
        if($stmt->execute()){
            $message = 'Cuenta creada exitosamente';
            $tipo = true;
        } else{
            $message = 'Lo sentimos pero parece que la creacion de la cuenta no fue exitosa';
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

<body>
<div class="banner">
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
                        <li class="nav-item"> <a href="view_login.php" class="nav-link text-light fw-bold">Iniciar Sesión</a></li>
                        <li class="nav-item"> <a href="signup.php" class="nav-link text-light fw-bold">Registrarse</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    <form class="container mt-5 text-light" action="signup.php" method="POST">
        <h1 class="display-3">Registrate</h1>
        
        <div class="mb-3 mt-3">
            <label for="" class="form-label">Usuario</label>
            <input type="text" class="form-control" id="exampleInputUser1" name="user" required>
    
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Contraseña</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Confirma tu contraseña</label>
            <input type="password" class="form-control" id="confirm_password" name="confirm_password" required>
        </div>

        <button type="submit" class="btn btn-warning text-light">Aceptar</button>
    </form>
    </div>

    <?php if(!empty($message) && $tipo === true): ?>
            <script>swal("", '<?= $message?>', "success");</script>
    <?php elseif(!empty($message) && $tipo === false):?>
            <script>swal("", '<?= $message?>', "error");</script>
    <?php endif; ?>

    <script>
        var password = document.getElementById("password"), 
        confirm_password = document.getElementById("confirm_password");

        function validatePassword(){
        if(password.value != confirm_password.value) {
            confirm_password.setCustomValidity("Las contraseñas no son las mismas");
        } else {
            confirm_password.setCustomValidity('');
        }
        }

        password.onchange = validatePassword;
        confirm_password.onkeyup = validatePassword;
    </script>
</body>

</html>