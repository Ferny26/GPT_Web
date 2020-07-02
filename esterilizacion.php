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
        $username = $_SESSION['user'];
        $password= $_SESSION['pass'];
        $conexion = mysqli_connect('localhost',$username,$password,'GPT') or die ( header("Location: index.php"));
        include("includes/conexion.php");
        $query2 = "SELECT Delete_priv FROM mysql.user WHERE user = '{$username}'";
        $result2 = mysqli_query($conexion, $query2);
        $data2 = mysqli_fetch_array($result2);
        if($data2['Delete_priv']=='N'){
        $query3 = "SELECT Update_priv FROM mysql.user WHERE user = '{$username}'";
        $result3 = mysqli_query($conexion, $query3);
        $data3 = mysqli_fetch_array($result3);
            if($data3['Update_priv']=='N'){
                $nivel = 0;l;
            }else{
                $nivel = 1;
            }
        }else{
            $nivel = 2;
        }
	}else{
        $nivel = $data['Nivel'];
    }
}else{
    header("location: index.php"); 
}       



?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>GPT - Campañas de esterilización</title>
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
                    <!-- DROPDOWN PRUEBAS -->
                    <li class="nav-item">
                        <a class="nav-link" href="out.php"><span class="icon-key"></span> Cerrar Sesión</a>
                        <!-- TEST MODAL WINDOW -->
                        
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <br><br><br><br><br>
    <div class="main_text_lg">
    <h2 class="text-center we">Campañas de esterilización</h2>
    <p class="text-center">Agrega tus campañas!</p>
    </div>
    <br>
    <center>
        <img class="img" src="Imagenes/casa_gato.png" alt="">
    </center>
    <hr>
    <br>
    <div class="container">
        <h2 class="we" >Mis campañas</h2>
        <br>
        <?php 
        $query = "SELECT * FROM seleccionar_campanas";
        $result_count = mysqli_query($conexion, $query);
        if(mysqli_num_rows($result_count) == 0){ 
        
        ?>
        <div class="jumbotron">
            <h1 class="display-4">Upps! </h1>
            <p class="lead">Parece que aún no creaste ninguna campaña, intenta crear una</p>
            <hr class="my-4">
            <?php
            if($nivel==2 || $nivel==1){
                ?>
            <a href="#" data-target="#modalalumnos" data-toggle="modal" class="btn btn-outline-danger">Crear mi primera campaña <span class="icon-pricetags"></span></a>
            <?php
            }else{
            }
            ?>
        </div>
        <?php }else{ ?>
            <div class="row">
                <?php
                    while($mostrar = mysqli_fetch_array($result_count)){
                ?>
                    
                    <div class="col-4">
                    <br>
                    <div class="card" style="width: 18rem;">
                        <div class="card-body">
                            <h3 class="card-title font-weight-bold"><?php echo $mostrar['Nombre']; ?></h3>
                            <h6 class="card-subtitle mb-2 text-muted"><?php echo $mostrar['Fecha']; ?></h6>
                            <p class="card-text">La campaña de "<?php echo $mostrar['Nombre']; ?>" tiene como objetivo esterilizar <?php echo $mostrar['Objetivo']; ?> Gatos</p>
            
                            <?php
                                if($nivel == 0){

                            ?>
                            <a href="campaña.php?ID=<?php echo $mostrar['ID_Campaa']; ?>">
                                <button type="button" class="btn btn-outline-danger"><span class="icon-documents"></span></button>
                            </a>
                                <?php }else{ 
                                        if($nivel == 1){
                                        
                                ?>
                                <a href="campaña.php?ID=<?php echo $mostrar['ID_Campaa']; ?>">
                                <button type="button" class="btn btn-outline-danger"><span class="icon-documents"></span></button>
                            </a>
                            <a href="#" data-target="#<?php echo "a".$mostrar['ID_Campaa'];?>" data-toggle="modal" >
                                <button type="button" class="btn btn-outline-primary"><span class="icon-tools"></span></button>
                            </a>
                                        <?php }else{
                                                 if($nivel == 2){
                                        ?>
                                <a href="campaña.php?ID=<?php echo $mostrar['ID_Campaa']; ?>">
                                <button type="button" class="btn btn-outline-danger"><span class="icon-documents"></span></button>
                            </a>
                            <a href="#" data-target="#<?php echo "a".$mostrar['ID_Campaa'];?>" data-toggle="modal" >
                                <button type="button" class="btn btn-outline-primary"><span class="icon-tools"></span></button>
                            </a>
                            <a href="eliminar_campaña.php?ID=<?php echo $mostrar['ID_Campaa']; ?>">
                                <button type="button" class="btn btn-outline-secondary"><span class="icon-scissors"></span></button>
                                </a>
                                                 <?php }}} ?>
                            <div class="modal fade" id="<?php echo "a".$mostrar['ID_Campaa'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1" aria-hidden="true">
                            <div class="modal-dialog" >
                                <div class="modal-content">
                                <div class="modal-header">
                                <h4 class="modal-title" id="exampleModalLabel1">Editar campaña 🐱</p></h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="editar_esterilizacion.php?ID=<?php echo $mostrar['ID_Campaa']; ?>" method="POST">
                                        <div class="form-group">
                                            <label for="recipient-name" class="col-form-label">Nombre de la campaña:</label>
                                            <input type="text" name="nombre" class="form-control" id="recipient-name" value="<?php echo $mostrar['Nombre'];?>" required>
                                        </div>


                                        <div class="form-group">
                                            <label for="recipient-name" class="col-form-label">Fecha:</label>
                                            <input type="date" name="fecha" class="form-control" id="recipient-name" value="<?php echo $mostrar['Fecha'];?>">
                                        </div>

                                        <div class="form-group">
                                            <label for="recipient-name" class="col-form-label">Objetivo:</label>
                                            <input type="number" name="obj" class="form-control" id="recipient-name" value="<?php echo $mostrar['Objetivo'];?>" required>
                                        </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Arrepentirse <span class="icon-hazardous"></span></button>
                                    <button type="sumbit" class="btn btn-outline-danger brute">Editar campaña <span class="icon-flag"></span></button>
                                    </form>
                                </div>
                                </div></div></div>
                           
                        </div>
                    </div>
                    </div>
                <?php } ?>
            </div>


        <?php
        }    
        ?>
        <br>
        <?php 
        if($nivel==2 || $nivel==1){
            ?>
        <a href="#" data-target="#modalalumnos" data-toggle="modal" class="btn btn-outline-primary">Agregar campaña <span class="icon-pricetags"></span></a>
                <?php
        }else{

        }
        ?>
        </div>
    <br><br><br>

                <div class="modal fade" id="modalalumnos" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" >
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Crear campaña 🐱</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="procesar_campaña.php" method="POST">
                                        <div class="form-group">
                                            <label for="recipient-name" class="col-form-label">Nombre de la campaña:</label>
                                            <input type="text" name="nombre" class="form-control" id="recipient-name" placeholder="Ej: Campaña de Octubre" required>
                                        </div>


                                        <div class="form-group">
                                            <label for="recipient-name" class="col-form-label">Fecha:</label>
                                            <input type="date" name="fecha" class="form-control" id="recipient-name" selected required>
                                        </div>

                                        <div class="form-group">
                                            <label for="recipient-name" class="col-form-label">Objetivo:</label>
                                            <input type="number" name="obj" class="form-control" id="recipient-name" placeholder="Ej: 23" required>
                                        </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Arrepentirse <span class="icon-hazardous"></span></button>
                                    <button type="sumbit" class="btn btn-outline-danger brute">Crear campaña <span class="icon-flag"></span></button>
                                    </form>
                                </div>
                                </div>
                        
</body>
</html>
