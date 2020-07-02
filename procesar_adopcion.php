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


$query_3="INSERT INTO Gato_Info(Nombre, Fecha_Nacimiento, Peso, Procedencia, Condicion_Especial, Sexo) VALUES('$Nombre','$Fecha',$Peso,'$Procedencia','$Condicion','$Sexo')";
$query_4="INSERT INTO Responsable(Nombres, Apellido_Materno, Apellido_Paterno, Domicilio, Celular) VALUES('$Nombres','$ApellidoMaterno','$ApellidoPaterno','$Domicilio','$Celular')";

$result_3 = mysqli_query($conexion, $query_3);
$result_4 = mysqli_query($conexion, $query_4);


if(!$result){
    die("Query failed");
}

    $query_2 = "SELECT * FROM Gato_Info WHERE ID_Gato=(SELECT MAX(ID_GATO) FROM Gato_Info)";
    $result_2 = mysqli_query($conexion, $query_2);
    $data_2 = mysqli_fetch_array($result_2);
    $ID_Gato = $data_2['ID_Gato'];

    $query_3 = "SELECT * FROM Responsable WHERE ID_Responsable=(SELECT MAX(ID_Responsable) FROM Responsable)";
    $result_3 = mysqli_query($conexion, $query_3);
    $data_3= mysqli_fetch_array($result_3);
    $ID_Responsable = $data_3['ID_Responsable'];

    $Fecha_Adopcion=$_POST['fecha_adopcion'];

    $query_5="INSERT INTO Gato_Adopcion(ID_Gato,ID_Adoptante,Fecha_Adopcion) VALUES('$ID_Gato','$ID_Responsable','$Fecha_Adopcion')";
    $result_4 = mysqli_query($conexion, $query_5);

    header("location:adopcion.php");


?>