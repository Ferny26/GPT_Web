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
    <title>GPT - Inventario</title>
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
                        <a href="admin.php" class="nav-link" href="#"><span class="icon-laptop"></span> Inicio</a>
                    <!-- DROPDOWN PRUEBAS -->
                    <li class="nav-item">
                        <a class="nav-link" href="out.php"><span class="icon-key"></span> Cerrar Sesión</a>
                        <!-- TEST MODAL WINDOW -->
                    
                </ul>
            </div>
        </div>
    </nav>
    <br><br><br><br><br>
    <div class="main_text_lg">
    <h2 class="text-center we">Inventario de materiales</h2>
    <p class="text-center">Agrega material!</p>
    </div>
    <br>
    <center>
        <img class="est_img" src="Imagenes/medicina_color.png" alt="">
    </center>
    <hr>
    <br>
    <div class="container">
        <h2 class="we" >Mi Stock</h2>
        <br>
        <?php 
        $query = "SELECT * FROM Material";
        $result_count = mysqli_query($conexion, $query);
        if(mysqli_num_rows($result_count) == 0){ 
        
        ?>
        <div class="jumbotron">
            <h1 class="display-4">Upps! </h1>
            <p class="lead">Parece que aún no agregaste material, intenta  agregar</p>
            <hr class="my-4">
            <?php
      if($nivel!=0){
          ?>
         <a href="#" data-target="#modalalumnos" data-toggle="modal" class="btn btn-outline-danger">Agregar material <span class="icon-beaker"></span></a>
         <?php
      }
          ?>
        </div>
        <?php }else{ ?>
            <div class="row">
                
                 <div class="col-12">
                 <table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nombre</th>
      <th scope="col">Categoría</th>
      <th scope="col">Presentación</th>
      <th scope="col">Cantidad</th>
      <th scope="col">Acciones</th>
    </tr>
  </thead>
  <tbody>

                 <?php
                 $contador = 0;


                    while($mostrar = mysqli_fetch_array($result_count)){
                        $contador = $contador + 1;
                ?>

                
    <tr>
      <th scope="row"><?php echo $contador; ?></th>
      <td><?php echo $mostrar['Nombre']; ?></td>
      <td><?php echo $mostrar['Categoria']; ?></td>
      <td><?php echo $mostrar['Presentacion']; ?></td>
      <td><?php echo $mostrar['Cantidad']; ?></td>
      <?php
      if($nivel!=2){
          ?>
        <td><a>
        <?php
      }else{
        ?>
     
     <td><a href="borrar_material.php?ID=<?php echo $mostrar['ID_Material']; ?>"><button type="button" class="btn btn-outline-danger"><span class="icon-scissors"></span></button></a></td>
      <?php }?>
    </tr>
  
                <?php } ?>
                </tbody>
</table>
                 </div>
                
            </div>


        <?php
        }    
        ?>
        <br>
        <?php
      if($nivel!=0){
          ?>
        <a href="#" data-target="#modalalumnos" data-toggle="modal" class="btn btn-outline-success">Agregar material <span class="icon-beaker"></span></a>
        <?php
      }
          ?>
   </div>
    <br><br><br>

    <div class="modal fade" id="modalalumnos" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" >
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Añadir material 🏡</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="procesar_material.php" method="POST" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label for="recipient-name" class="col-form-label">Nombre del material:</label>
                                            <input type="text" name="nombre" class="form-control" id="recipient-name" placeholder="Ej: Caja de vendas" required>
                                        </div>


                                        <div class="form-group">
                                            <label for="recipient-name" class="col-form-label">Presentación:</label>
                                            <input type="text" name="presentacion" class="form-control" id="recipient-name" placeholder="Ej: Caja" required>
                                        </div>

                                        <div class="form-group">
                                            <label for="recipient-name" class="col-form-label">Categoria:</label>
                                            
                                            <select name="categoria" class="form-control">
                                                <option value="Productos desinfectantes">Productos desinfectantes</option>
                                                <option value="Quirurgicos">Quirúrgicos</option>
                                                <option value="Medicamentos">Medicamentos</option>
                                                <option value="Otros">Otros</option>

                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="recipient-name" class="col-form-label">Cantidad:</label>
                                            <input type="number" name="cantidad" class="form-control" id="recipient-name" placeholder="Ej: 30" required>
                                        </div>

                                    
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Arrepentirse <span class="icon-hazardous"></span></button>
                                    <button type="sumbit" class="btn btn-outline-danger brute">Añadir <span class="icon-flag"></span></button>
                                    </form>
                                </div>
                                </div>
</body>
</html>
