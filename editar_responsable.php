<?php
if(isset($_GET['ID'])){
    $ID = $_GET['ID'];
    $ID_Campaa=$_GET['ID_Campaa'];
}
include("includes/conexion.php");

$query="SELECT * FROM Responsable WHERE ID_Responsable=$ID";
$result = mysqli_query($conexion, $query);
$data = mysqli_fetch_array($result);


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
                        <a class="nav-link" href="#"><span class="icon-laptop"></span> Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="out.php"><span class="icon-key"></span> Cerrar Sesión</a>
                        <!-- TEST MODAL WINDOW -->
                        
                    </li>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <?php

    
    ?>
    <br><br><br><br><br><br>
    <form action="procesar_edicion_responsable.php?ID=<?php echo $ID; ?>&ID_Campaa=<?php echo $ID_Campaa;?>" method="POST">    
        <div class="container">
            <h2 class="we">Editar Responsable</h2>
            <br>
            <div class="row">
            <div class="col-4">
                    <div class="form-group">
                        <h5>Nombre:</h5>
                        <input name="Nombres" type="text" class="form-control" value="<?php echo $data['Nombres'];?>" placeholder="Ej: Claudia"required>
                    </div>
</div>


<div class="col-4">
                    <div class="form-group">
                        <h5>Apellido Materno:</h5>
                        <input name="ApellidoMaterno" type="text" class="form-control" value="<?php echo $data['Apellido_Materno'];?>" placeholder="Ej: Ramirez">
                    </div>
</div>


<div class="col-4">
                    <div class="form-group">
                        <h5>Apellido Paterno:</h5>
                        <input name="ApellidoPaterno" type="text" class="form-control" value="<?php echo $data['Apellido_Paterno'];?>" placeholder="Ej: Gonzalez">
                    </div>
</div>


<div class="col-4">
                    <div class="form-group">
                        <h5>Domicilio:</h5>
                        <input name="Domicilio" type="text" class="form-control" value="<?php echo $data['Domicilio'];?>" placeholder="Ej: Cedros #112">
                    </div>
</div>


<div class="col-4">
                    <div class="form-group">
                        <h5>Celular:</h5>
                        <input name="Celular" type="text" class="form-control" value="<?php echo $data['Celular'];?>" placeholder="Ej: 3336627736"required>
                    </div>
</div>
<div class="col-4">
                    
                </div>
<div class="col-4">
                    <div class="form-group">
                        <button type="sumbit" class="btn btn-outline-info ">Guardar <span class="icon-beaker"></span></button>
                    </div>
                </div>
            </div>
            
        </div>
        
    </form>                             

</body>
</html>
