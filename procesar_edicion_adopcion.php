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

if(isset($_GET['ID_Gato_Adopcion'])){
    $ID_Gato_Adopcion = $_GET['ID_Gato_Adopcion'];
}


$query_1="SELECT * FROM Gato_Adopcion WHERE ID_Adopcion=$ID_Gato_Adopcion";
$result_1 = mysqli_query($conexion, $query_1);
$dat_1=mysqli_fetch_array($result_1);


$Nombre = $_POST['nombre'];
$Fecha = $_POST['fecha'];
$Peso = $_POST['peso'];
$Sexo = $_POST['sexo'];
$Procedencia = $_POST['procedencia'];
$Condicion = $_POST['condicion'];

$Nombres=$_POST['Nombres'];
$ApellidoMaterno=$_POST['ApellidoMaterno'];
$ApellidoPaterno=$_POST['ApellidoPaterno'];
$Domicilio=$_POST['Domicilio'];
$Celular=$_POST['Celular'];

$Fecha_Adopcion= $_POST['fecha_adopcion'];
$ID_Gato=$dat_1['ID_Gato'];
$ID_Responsable=$dat_1['ID_Adoptante'];



$query_3="UPDATE Gato_Info SET Nombre='$Nombre', Fecha_Nacimiento='$Fecha', Peso=$Peso, Procedencia='$Procedencia', Condicion_Especial='$Condicion', Sexo='$Sexo' WHERE ID_Gato=$ID_Gato";
$query_4="UPDATE Responsable SET Nombres='$Nombres', Apellido_Materno='$ApellidoMaterno', Apellido_Paterno='$ApellidoPaterno', Domicilio='$Domicilio', Celular='$Celular' WHERE ID_Responsable=$ID_Responsable";
$query_5="UPDATE Gato_Adopcion SET Fecha_Adopcion='$Fecha_Adopcion' WHERE ID_Gato_Adopcion=$ID_Gato_Adopcion";

$result_3 = mysqli_query($conexion, $query_3);
$result_4 = mysqli_query($conexion, $query_4);
$result_5 = mysqli_query($conexion, $query_5);


if(!$result){
    die("Query failed");
}

    header("location:adopcion.php");


?>