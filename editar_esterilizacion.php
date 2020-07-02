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

$nombre = $_POST['nombre'];
$fecha = $_POST['fecha'];
$objetivo = $_POST['obj'];



    
$query = "UPDATE Campaa SET Nombre='$nombre', Fecha='$fecha', Objetivo=$objetivo WHERE ID_Campaa =$ID";

$result = mysqli_query($conexion, $query);

if(!$result){
    die("Query failed");
}

header("location:esterilizacion.php");

?>