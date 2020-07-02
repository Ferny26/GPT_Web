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

$Nombre = $_POST['nombre'];
$Fecha = $_POST['fecha'];
$Peso = $_POST['peso'];
$Sexo = $_POST['sexo'];
$Procedencia = $_POST['procedencia'];
$Condicion = $_POST['condicion'];







$query_3="INSERT INTO Gato_Info(Nombre, Fecha_Nacimiento, Peso, Procedencia, Condicion_Especial, Sexo) VALUES('$Nombre','$Fecha',$Peso,'$Procedencia','$Condicion','$Sexo')";

$result_3 = mysqli_query($conexion, $query_3);

if(!$result){
    die("Query failed");
}

$query_2 = "SELECT * FROM Gato_Info WHERE ID_Gato=(SELECT MAX(ID_GATO) FROM Gato_Info)";
    $result_2 = mysqli_query($conexion, $query_2);
    $data_2 = mysqli_fetch_array($result_2);

    $Precio=$_POST['Precio'];
    $Faja=$_POST['Faja'];
    $ID_Campaa=$ID;
    $ID_Gato=$data_2['ID_Gato'];


    $id = $data_2['ID_Gato'];


    $query_4="INSERT INTO Esterilizacion(Precio, Faja, ID_Campaa, ID_Gato) VALUES('$Precio','$Faja','$ID_Campaa','$ID_Gato')";
    $result_4 = mysqli_query($conexion, $query_4);

if(isset($_POST['responsable'])){

    $Responsable = $_POST['responsable'];

    $result_count = mysqli_query($conexion, $query_2);
    if(mysqli_num_rows($result_2) >= 1){ 
      header("location:responsable.php?ID=$ID&id=$id");
    }else{
        header("location:campaña.php?ID=$ID");
    }
}else{
    header("location:campaña.php?ID=$ID");

}



?>