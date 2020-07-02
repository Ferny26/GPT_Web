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

if(isset($_GET['ID_Gato'])){
    $ID_Gato=$_GET['ID_Gato'];
}

$Nombre = $_POST['nombre'];
$Fecha = $_POST['fecha'];
$Peso = $_POST['peso'];
$Sexo = $_POST['sexo'];
$Procedencia = $_POST['procedencia'];
$Condicion = $_POST['condicion'];


$query_3="UPDATE Gato_Info SET Nombre='$Nombre', Fecha_Nacimiento='$Fecha', Peso=$Peso, Procedencia='$Procedencia', Condicion_Especial='$Condicion', Sexo='$Sexo' WHERE ID_Gato=$ID_Gato";

$result_3 = mysqli_query($conexion,$query_3);

if(!$result){
    die("Query failed");
}

    $Precio=$_POST['Precio'];
    $Faja=$_POST['Faja'];

    $query_4="UPDATE Esterilizacion SET Precio=$Precio, Faja=$Faja WHERE ID_Gato=$ID_Gato";
    $result_5 = mysqli_query($conexion, $query_4);

    $query3="SELECT * FROM Gato_Hogar WHERE ID_Gato=$ID_Gato";
    $result_4 = mysqli_query($conexion, $query3);
    $data_2 = mysqli_fetch_array($result_4);

    $query6="SELECT * FROM Esterilizacion WHERE ID_Gato=$ID_Gato";
    $result_6 = mysqli_query($conexion, $query6);
    $data5 = mysqli_fetch_array($result_6);

    $ID=$data_2['ID_Responsable'];


    $ID_Campaa=$data5['ID_Campaa'];

        if($ID != 0){        
            header("location:editar_responsable.php?ID=$ID&ID_Campaa=$ID_Campaa");
        }
        else{   
        header("location:campaña.php?ID=$ID_Campaa");
        }
?>