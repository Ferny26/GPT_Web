<?php
if(isset($_GET['ID'])){
    $ID = $_GET['ID'];
}

include("includes/conexion.php");
$query="SELECT * FROM Gato_Adopcion WHERE ID_Adopcion=$ID";
$result2 = mysqli_query($conexion, $query);
$data= mysqli_fetch_array($result2);
$ID_Gato=$data['ID_Gato'];
$ID_Responsable=$data['ID_Adoptante'];

$query_2="DELETE FROM Gato_Info WHERE ID_Gato=$ID_Gato";
$query_3="DELETE FROM Responsable WHERE ID_Responsable=$ID_Responsable";

$result_2 = mysqli_query($conexion, $query_2);
$result_3 = mysqli_query($conexion, $query_3);
header("location:adopcion.php");
?>
