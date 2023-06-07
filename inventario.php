<?php
    session_start();
    header("Cache-Control: no-cache, must-revalidate");
    header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");
    require 'database.php';

    $db = new PDO("mysql:host=localhost;dbname=bubbles", "root", "");
    $query = $db->prepare("SELECT * FROM inventario");
    $query->execute();
    $results = $query->fetchAll(PDO::FETCH_ASSOC);
    

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
    <!-- JQuery -->
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"
        integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <!-- App -->
    <script src="app.js"></script>
    <!-- Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
            height: 10vh;
            margin-bottom: 20px;
        }

        .space {
            width: 10px;
            height: auto;
            display: inline-block;
        }

        th,
        td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        .tableContainer {
            height: 300px;
            overflow: auto;
        }

        .tableContainer table {
            width: 80%;
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
                <span>	<a href="index1.php"><img src="img/bub1.png" height="150" alt="logo" /></a></span>
                <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navtoggler">
                    <span class="navbar-toggler-icon">
                    </span>
                </button>
            </div>
        </nav>
        <br>
        <center>
            <h1>INVENTARIO</h1>
       
<div class="col-md-7">
                <div class="card my-4" id="task-result">
                    <div class="card-body">
                        <ul id="container">

                        </ul>
                    </div>
                </div>
                <table cellspacing="0" cellpadding="0" border="0" width="325">
    <tr>
        <td>
            <table width="980" BORDER=5 CELLSPACING=1 CELLPADDING=1 bordercolor=darkblue>
                <tr>
                    <td><b><font color="blue">&nbsp;CodProd&nbsp;</font></b></td>
                    <td><b><font color="blue">&nbsp;Nombre&nbsp;</font></b></td>
                    <td><b><font color="blue">&nbsp;Precio&nbsp;</font></b></td>
                    <td><b><font color="blue">&nbsp;Cantidad&nbsp;</font></b></td>
                    <td><b><font color="blue">&nbsp;Boton&nbsp;</font></b></td>
                    <td></td>
                </tr>
            </table>
        </td>
    </tr><tr>
        <td>
            <div>
                <div style="width: 1000px; height: 180px; overflow: auto;">
                    <table cellspacing="0" cellpadding="1" border="1" width="980" bordercolor=darkblue id="tasks">

                    </table>
                </div>
            </div>
        </td>
    </tr>
            </div>

            <center>

                <br>
                <br>
                <table BORDER=0 CELLSPACING=1 CELLPADDING=1 bordercolor=darkblue>
                    <tr>
                        <!--<TD><a href="abm.php?accion=alta">Agregar</a></TD>
		<TD><a href="abm.php?accion=modificacion">Modificar</a></TD>
		<TD><a href="abm.php?accion=baja">Borrar</a></TD>-->
                        <div class="icon-container">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#exampleModal">Agregar</button>
                            <div class="space">
                            </div>
                    </tr>
                    <br>
                    <br>

            </div>
            
</body>
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="insertar.php" method="POST" enctype='multipart/form-data'>
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Insertar</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="text" class="form-control mb-3" name="codprod"
                        placeholder="Codigo del producto" required>
                    <input type="text" class="form-control mb-3" name="nombre"
                        placeholder="Nombre" required>
                    <input type="text" class="form-control mb-3" name="cantidad"
                        placeholder="Cantidad" required>
                    <input type="text" class="form-control mb-3" name="precio"
                        placeholder="Precio" required>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary"
                        data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" value="Upload"
                        class="btn btn-primary">Guardar Datos</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="confirmModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">    
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="task-edit.php" method="POST" enctype="multipart/form-data">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modificar</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="text" class="form-control mb-3" name="cod" required>
                    <input type="text" class="form-control mb-3" name="nombre" placeholder="Nombre" required>
                    <input type="text" class="form-control mb-3" name="precio" placeholder="Precio" required>
                    <input type="text" class="form-control mb-3" name="cantidad" placeholder="Cantidad" required>
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Guardar Datos</button>
                </div>
            </form>
        </div>
    </div>
</div>
</html>