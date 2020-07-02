<?php
session_start();
header('Content-Type: text/html; charset=utf-8');
if(isset($_SESSION['user'])){
    include("includes/conexion.php");
    $user = $_SESSION['user'];
    $query = "SELECT * FROM Usuarios WHERE Username = '{$user}'";
	$result = mysqli_query($conexion, $query);
	$data = mysqli_fetch_array($result, MYSQLI_ASSOC);
        mysqli_free_result($result);
		if ($data==0) {
        $password=$_SESSION['pass'];
        $usuario=$_SESSION['user'];
        $conexion = mysqli_connect('localhost',$user,$password,'GPT') or die ( header("Location: index.php"));
        }else{
        $usuario=$data['Username'];

        }
	}else{
    header("location: index.php"); 
}       


$query1 = "SELECT SUM(Precio) AS Dinero_Total FROM Esterilizacion";

$result1 = mysqli_query($conexion, $query1);

$mostrar1 = mysqli_fetch_array($result1);





?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>GPT - Gatos para todos</title>
    <!-- BOOTSTRAP STYLES -->   
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- OWN STYLES -->
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="LineIcons/style.css">
    <!-- ICOMOON --> 

    <!-- ANIMATE.CSS -->

    <!-- GOOGLEFONTS -->
    <link href="https://fonts.googleapis.com/css2?family=Barlow+Condensed:wght@100&family=Sirin+Stencil&display=swap" rel="stylesheet">
    <!-- SLIDESHOW RESOURCES -->

    <!-- BOOTSTRAP SCRIPT -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script> 
    <!-- FAVICON -->
    <link rel="shortcut icon" href="Imagenes/logo.svg" type="image/x-icon">


</head>
<body>
    <!-- BARRA DE NAVEGACION -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
        <div class="container">
            <a class="navbar-brand logo" href="index.php">
                <img class="navimg" src="Imagenes/logo.svg" alt="">     
                G.P.T
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a href="admin.php"class="nav-link" href="#"><span class="icon-laptop"></span> Inicio</a>
                    </li>
                    <!-- DROPDOWN PRUEBAS -->
                    <li class="nav-item">
                        <a class="nav-link" href="out.php"><span class="icon-key"></span> Cerrar Sesión</a>
                        <!-- TEST MODAL WINDOW -->
                        
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="full"></div>
    <br><br>
    <div class="main_text">
        <h2 class="we text-center"><?php echo $usuario; ?> Bienvenid@ a G.P.T. <img src="Imagenes/hello.gif" alt=""> </h2>
        <p class="text-center">Aquí podras llevar el control de tus servicios. Este sistema te permitirá mantener todos los registros que hagas a través del tiempo. <br> Disfrutala!</p>
       <div class="container">
            <div class="row justify-content-center">
            <a href="#" data-target="#modalalumnos" data-toggle="modal">
                <button type="button" class="btn btn-xl btn-outline-danger mr-2" href="#" data-toggle="modal" data-target="#exampleModal">Calcular capital <span class="icon-wallet"></span></button>
            </a>
            <a href="pint2.php">
            <button type="button" class="btn btn-xl btn-outline-danger">Generar reporte <i>[.PDF] &nbsp;</i>  <span class="icon-clipboard"></span></button>
            </a>
            </div>
        </div>
        </div>
    
    </div>
    <br><br><br>
    <div class="gray">
        <div class="container">
            <div class="row">
                <div class="col-4">       
                    <div class="card" style="width: 18rem;">
                        <img class="card-img-top" src="Imagenes/campanas.jpg" alt="Card image cap" height="200px">
                        <div class="card-body">
                            <h5 class="card-title">Campañas</h5>
                            <p class="card-text">Agrega tus campañas de esterilizacion!</p>
                            <a href="esterilizacion.php" class="btn btn-outline-danger">Saber más <span class="icon-flag"></span></a>
                        </div>
                    </div>
                </div>
                <div class="col-4">       
                    <div class="card" style="width: 18rem;">
                        <img class="card-img-top" src="Imagenes/adopciones.jpg" alt="Card image cap" height="200px">
                        <div class="card-body">
                            <h5 class="card-title">Adopciones</h5>
                            <p class="card-text">Brinda un nuevo hogar a los gatitos</p>
                            <a href="adopcion.php" class="btn btn-outline-danger">Saber más <span class="icon-flag"></span></a>
                        </div>
                    </div>
                </div>


                <div class="col-4">       
                    <div class="card" style="width: 18rem;">
                        <img class="card-img-top" src="Imagenes/material.jpg" alt="Card image cap" height="200px">
                        <div class="card-body">
                            <h5 class="card-title">Material</h5>
                            <p class="card-text">Manten un control de tu inventario</p>
                            <a href="inventario.php" class="btn btn-outline-danger">Saber más <span class="icon-flag"></span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br><br><br>




    <div class="modal fade" id="modalalumnos" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" >
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Balance de Gastos 🐱</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <h2 class="we text-center">$<?php echo $mostrar1['Dinero_Total'] ?>MXN</h2>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Cerrar <span class="icon-hazardous"></span></button>
                                    
                                </div>
                                </div>
</body>
</html>
