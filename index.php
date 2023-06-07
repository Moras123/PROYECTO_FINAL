
<?php
    header("Cache-Control: no-cache, must-revalidate");
    header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <title>Bubbles</title>
    <meta charset='utf-8'>
    <link rel="stylesheet" href="css/style.css?v=<?php echo time(); ?>" type="text/css">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa"
        crossorigin="anonymous"></script>
    <!-- Sweet Alert -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <style>
        h1 { color: #000000; }
    </style>
</head>

<body>
    <div class="banner">
        <nav class="navbar navbar-dark navbar-expand-lg">
            <div class="container">
                <span><img src="img/bub1.png" height="150" alt="logo" /></span>
                <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navtoggler">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
        </nav>
        <form class="container mt-5 text-light" method="POST">
            <h1 class="display-3">Iniciar Sesión</h1>

            <div class="mb-3 mt-3">
                <label for="" class="text-dark">Usuario</label>
                <input type="text" class="form-control" id="exampleInputUser1" name="user" required>
            </div>
            <div class="mb-3">
                <label for="" class="text-dark">Contraseña</label>
                <input type="password" class="form-control" id="exampleInputPassword1" name="password" required>
            </div>

            <button id="btnEnviar" name="btnEnviar" type="submit" class="btn btn-secondary">Aceptar</button>
        </form>
    </div>
</body>

</html>

<?php
    if(isset($_POST['btnEnviar'])) {
        $conexion = mysqli_connect('localhost', 'root', '', 'bubbles');

        $usuario = $_POST['user'];
        $password = $_POST['password'];

        // SELECT 

        $sql = "SELECT * FROM usuario_admin WHERE usuario = '$usuario'";
        $result = mysqli_query($conexion, $sql);

        $usuario_registrado = false;
        $password_correcta = false;

        while($mostrar = mysqli_fetch_array($result)){
            if($usuario == $mostrar['usuario']){
                $usuario_registrado = true;
                if($password == $mostrar['contrasenia']){
                    $password_correcta = true;
                } else {
                    $password_correcta = false;
                }
            }
        }

        if($password_correcta){
            header('Location: index1.php');
            exit();
        }

        if($usuario_registrado && !$password_correcta){
            echo "<script>alert('Contraseña incorrecta');</script>";
        }

        if(!$usuario_registrado && !$password_correcta){ 
            echo "<script>alert('Usuario no registrado');</script>";
        }
    }
?>