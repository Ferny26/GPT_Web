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
}
}else{
    header("location: index.php"); 
}           

if(isset($_GET['ID'])){
    $ID = $_GET['IDID'];
    $ID_Gato=$_GET['ID'];
}

        $query3="SELECT * FROM Esterilizacion WHERE ID_Esterilizacion=$ID";
        $resultado=$conexion->query($query3);
        $data2 = mysqli_fetch_array($resultado);
        $query2="SELECT * FROM Gato_Info WHERE ID_Gato = $ID_Gato";
        $resultado2=$conexion->query($query2);
        $data3= mysqli_fetch_array($resultado2);



if(!$result){
    die("Query failed");
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
    <br><br><br><br><br><br>
    <form action="procesar_edicion_gato.php?ID_Gato=<?php echo $ID_Gato?>" method="POST">    
        <div class="container">
            <h2 class="we">Actualizar Gato </h2>
            <br>
            <div class="row">
                <div class="col-4">
                    <div class="form-group">
                        <h5>Nombre del gato:</h5>
                        <input name="nombre" type="text" value= "<?php echo $data3['Nombre'];?>"class="form-control" placeholder="Ej: Michineitor" required>
                    </div>
                </div>

                <div class="col-4">
                    <div class="form-group">
                        <h5>Fecha de nacimiento:</h5>
                        <input name="fecha" type="date" value= "<?php echo $data3['Fecha_Nacimiento'];?>" class="form-control" required>
                    </div>
                </div>

              
                <div class="col-4">
                    <div class="form-group">
                        <h5>Peso <i>[KG]</i>:</h5>
                        <input name="peso" type="number" value= "<?php echo $data3['Peso'];?>" class="form-control"required>
                    </div>
                </div>

                <div class="col-4">
                    <div class="form-group">
                        <h5>Sexo <i>[Binario]</i>:</h5>
                        <select name="sexo" id="" class="form-control">
                        <option selected value= "<?php echo $data3['Sexo'];?>"><?php echo $data3['Sexo'];?></option>
                            <option value="M">Macho</option>
                            <option value="H">Hembra</option>
                        </select>
                    </div>
                </div>

                <div class="col-4">
                    <div class="form-group">
                        <h5>Procedencia:</h5>
                        <select name="procedencia" id="" class="form-control">
                            <option selected value= "<?php echo $data3['Procedencia'];?>"><?php echo $data3['Procedencia'];?></option>
                            <option value="Hogar">Hogar</option>
                            <option value="Feral">Feral</option>
                            <option value="Recien rescatado">Recien rescatado</option>
                        </select>
                    </div>
                </div>

                <div class="col-4">
                    <div class="form-group">
                        <h5>Condición especial:</h5>
                        <input type="text" name="condicion" class="form-control" value= "<?php echo $data3['Condicion_Especial'];?>" placeholder="Ej: Michineitor">
                    </div>
                </div>
                <div class="col-8">
                   
                </div> 
            </div>
                <h2 class="we">Datos generales</h2>
                <br>
<div class="row">
<br>
<div class="col-4">
                    <div class="form-group">
                        <h5>Precio:</h5>
                        <input name="Precio" type="number" value= "<?php echo $data2['Precio'];?>"class="form-control" placeholder="$$$$" required>
                    </div>
</div>
<div class="col-4">
                    <div class="form-group">
                        <h5>Faja: <i>[Binario]</i>:</h5>
                        <select name="Faja" id=""  class="form-control">
                        <option selected value= "<?php echo $data2['Faja'];?>"><?php echo $data2['Faja'];?></option>
                            <option value="1">Si</option>
                            <option value="0">No</option>
                        </select>
                    </div>
                </div>

                <div class="col-4"></div>


                <div class="col-4">
                    <div class="form-group">
                        <button type="sumbit" class="btn btn-outline-info brute ">Guardar <span class="icon-beaker"></span></button>
                    </div>
                </div>
            </div>
        </div>
    </form>

</body>
</html>
