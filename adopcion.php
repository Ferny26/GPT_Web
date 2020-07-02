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
            if($data2['Update_priv']=='N'){
                $nivel = 0;
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
    <title>GPT - Adopciones</title>
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
                </ul>
            </div>
        </div>
    </nav>
    <br><br><br><br><br>
    <div class="main_text_lg">
    <h2 class="text-center we">Adopta un gatito</h2>
    <p class="text-center">Adopta!</p>
    </div>
    <br>
    <center>
        <img class="est_img" src="Imagenes/gato_adopcion.png" alt="">
    </center>
    <hr>
    <br>
    <div class="container">
        <h2 class="we" >Mis adopciones</h2>
        <br>
        <?php
        $query="SELECT * FROM Gato_Adopcion";
        $result_count = mysqli_query($conexion, $query);
        if(mysqli_num_rows($result_count) == 0){
        ?>
        <div class="jumbotron">
            <h1 class="display-4">Upps! </h1>
            <p class="lead">Parece que aún no hay procesos de adopcion, intenta crear uno</p>
            <hr class="my-4">
            <?php if($nivel==0){
            }else{?>
            <a href="agregar_adopcion.php" class="btn btn-outline-danger">Crear mi primer Proceso <span class="icon-heart"></span></a>
            <?php }?>
        </div>
      <?php }else{ ?>
          <div class="row">

              <div class="col-12">
              <table class="table">
<thead class="thead-dark">
 <tr>
   <th scope="col">#</th>
   <th scope="col">Nombre</th>
   <th scope="col">Sexo</th>
   <th scope="col">Fecha de Nacimiento</th>
   <th scope="col">Procedencia</th>
   <th scope="col">Nombre de Adoptante</th>
   <th scope="col">Fecha de Adopción</th>
   <th scope="col">Borrar</th>
   <th scope="col">Editar</th>
   <th scope="col"></th>
 </tr>
</thead>
<tbody>
          <?php
              $query_2="SELECT * FROM Gato_Adopcion";
              $result_2 = mysqli_query($conexion, $query_2);


              $contador = 0;
              while($data_2 = mysqli_fetch_array($result_2)){
                  $contador = $contador + 1;
                  $IDGato=$data_2['ID_Gato'];
                  $IDAdoptante=$data_2['ID_Adoptante'];
                  $FechaAdopcion=$data_2['Fecha_Adopcion'];

                  $query_3="SELECT * FROM Gato_Info WHERE ID_Gato = $IDGato";
                  $result_3 = mysqli_query($conexion, $query_3);
                  $data_3 = mysqli_fetch_array($result_3);


                  $query_4="SELECT * FROM Responsable WHERE ID_Responsable = $IDAdoptante";
                  $result_ = mysqli_query($conexion, $query_4);
                  $data_4 = mysqli_fetch_array($result_);


                  $Nombre=$data_3['Nombre'];
                  $Sexo=$data_3['Sexo'];
                  $Nacim=$data_3['Fecha_Nacimiento'];
                  $Procedencia=$data_3['Procedencia'];
                  $NombreAdoptante=$data_4['Nombres'];


                  $query_4="SELECT * FROM Gato_Hogar WHERE ID_Gato = $IDGato";
                  $result_4 = mysqli_query($conexion, $query_4);

                  if(mysqli_num_rows($result_4) != 0){
                      $responsable = "Si";
                  }else{
                      $responsable = "No";
                  }
              ?>

              <tr>
                  <th scope="row"><?php echo $contador; ?></th>
                  <td><?php echo $Nombre; ?></td>
                  <td><?php echo $Sexo; ?></td>
                  <td><?php echo $Nacim; ?></td>
                  <td><?php echo $Procedencia; ?></td>
                  <td><?php echo $NombreAdoptante; ?></td>
                  <td><?php echo $FechaAdopcion; ?></td>
                  <?php if($nivel==2){?>
                  <td><a href="eliminar_adopcion.php?ID=<?php echo $data_2['ID_Adopcion'];?>"><button type="button" class="btn btn-outline-danger"><span class="icon-scissors"></span></button></a>
                  <td><a href="editar_adopcion.php?ID=<?php echo $data_2['ID_Adopcion'];?>"type="button" class="btn btn-outline-primary"><span class="icon-tools"></span></button></a>
                  <?php }if($nivel==1){?>
                  <td><a href="editar_adopcion.php?ID=<?php echo $data_2['ID_Adopcion'];?>"type="button" class="btn btn-outline-primary"><span class="icon-tools"></span></button></a>
                  <?php }if($nivel==0){}?>
              </tr>
              <?php }?>
              </tbody>
          </table>
       </div>
  </div>

              <?php } ?>
               </div>
        <br>
        <?php if($nivel==0){

        }else{?>
        <div class="container">
        <a href="agregar_adopcion.php" href="#"class="btn btn-outline-danger">Adoptar <span class="icon-heart"></span></a>
        </div>
        <?php }?>
    </div>
    <br><br><br>
</body>
</html>
