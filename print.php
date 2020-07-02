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
    $ID = $_GET['ID'];
}

$query = "SELECT * FROM Campaa WHERE ID_Campaa = '$ID'";
$result_campaa = mysqli_query($conexion, $query);
$data_campana = mysqli_fetch_array($result_campaa);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
      .border{
        border:1px solid #000;
      }
    </style>
    
</head>
<body>
<div class="container">
<div class="border">
<div class="demo">
<?php
  $query_2 = "SELECT COUNT(Gato_Info.ID_Gato) AS Machos FROM Esterilizacion INNER JOIN Gato_Info ON Esterilizacion.ID_Gato = Gato_Info.ID_Gato WHERE Gato_Info.Sexo='M' AND Esterilizacion.ID_Campaa = $ID";
  $result_2 = mysqli_query($conexion, $query_2);
  $data_2 = mysqli_fetch_array($result_2);



  $query_3 = "SELECT COUNT(Gato_Info.ID_Gato) AS Hembras FROM Esterilizacion INNER JOIN Gato_Info ON Esterilizacion.ID_Gato = Gato_Info.ID_Gato WHERE Gato_Info.Sexo='H' AND Esterilizacion.ID_Campaa = $ID";
  $result_3 = mysqli_query($conexion, $query_3);
  $data_3 = mysqli_fetch_array($result_3);



  $query_4 = "SELECT SUM(Precio) AS Dinero_Total FROM Esterilizacion WHERE ID_Campaa=$ID;";
  $result_4 = mysqli_query($conexion, $query_4);
  $data_4 = mysqli_fetch_array($result_4);
  
 
?>
    <!--BOOTSTRAP STYLES-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!--BOOTSTRAP SCRIPTS JS-->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <!--ESTILOS PROPIOS-->
    <link href="https://fonts.googleapis.com/css?family=Dancing+Script&display=swap" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Barlow+Condensed:wght@100&family=Sirin+Stencil&display=swap" rel="stylesheet">
    
    <style>
      .logo{
        font-family: 'Dancing Script', cursive;
        font-size:70px;
      }

      .logogo{
        font-family: 'Dancing Script', cursive;
      }
      
      button a {
        color:#fff;
      }

      @media print {
  .footer {page-break-after: always;}
}
h2.we{
  font-family: 'Sirin Stencil', cursive;
}
    </style>

<h2 class="we text-center">Informe de Campaña</h2>
<br>

<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Cantidad de gatos macho</th>
      <th scope="col">Cantidad de gatas hembra</th>
      <th scope="col">Balance total</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td><?php echo $data_2['Machos']; ?></td>
      <td><?php echo $data_3['Hembras']; ?></td>
      <td><?php echo $data_4['Dinero_Total']; ?></td>
    </tr>
  </tbody>
</table>



</div>
</div>
<button type="button" class="btn btn-success"><a id="basic" href="#nada" class="button button-primary">Print container</a></button>
<button type="button" class="btn btn-info"><a href="admin.php">Volver</a></button>

<!-- jQuery -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- printThis -->

<script type="text/javascript" src="js/printThis.js"></script>

<!-- demo -->
<script>
  $('#basic').on("click", function () {
    $('.demo').printThis({
        header: "",
      base: "https://jasonday.github.io/printThis/"
    });
  });
</script>

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-114774247-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());
  gtag('config', 'UA-114774247-1');
</script>
</body>
</html>

