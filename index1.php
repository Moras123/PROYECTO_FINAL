
<?php
    session_start();
   
    require 'database.php';
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-..." crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" integrity="sha512-..." crossorigin="anonymous"></script>
    <style>
        h1 {
            color: #000000;
        }

        .icon-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 50vh;
            margin-bottom: 20px;
        }
        .space {
            width: 10px;
            height: auto;
            display: inline-block;
        }
    </style>
</head>

<body>
    <!-- <?php 
        var_dump($_SESSION);
    ?> -->
    <div class="banner">
        <nav class="navbar navbar-dark navbar-expand-lg">
            <div class="container">
                <span><img src="img/bub1.png" height="150" alt="logo" /></span>
                <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navtoggler">
                    <span class="navbar-toggler-icon">
                    </span>
                </button>
            </div>
        </nav>
        <div class="icon-container">
            <button type="button" class="btn btn-primary btn-lg btn-block">Venta</button>
            <div class="space">
            </div>
            <button type="button" class="btn btn-primary btn-lg btn-block"  onclick="window.location.href='/proyecto9/inventario.php'">Inventario</button>
            <div class="space">
            </div>
            <button type="button" class="btn btn-primary btn-lg btn-block">Reporte</button>
        </div>
    </div>
</body>
</html>

