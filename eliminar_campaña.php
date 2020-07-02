<?php
if(isset($_GET['ID'])){
    $ID = $_GET['ID'];
}
include("includes/conexion.php");



$query="SELECT * FROM Esterilizacion WHERE ID_Campaa=$ID";
$result_2 = mysqli_query($conexion, $query);

while($data = mysqli_fetch_array($result_2)){
    $ID_Gato=$data['ID_Gato'];
    $query_2="SELECT * FROM Gato_Hogar WHERE ID_Gato=$ID_Gato";
    $result_3 = mysqli_query($conexion, $query_2);
    $data2 = mysqli_fetch_array($result_3);
    if($data2!=0){
        $ID_Responsable=$data2['ID_Responsable'];
        $query_3="DELETE FROM Responsable WHERE ID_Responsable=$ID_Responsable";
        $result_4 = mysqli_query($conexion, $query_3);
    }
    $query_4="DELETE FROM Gato_Info WHERE ID_Gato=$ID_Gato";
    $result_5 = mysqli_query($conexion, $query_4);
}
$query_7="DELETE FROM Campaa WHERE ID_Campaa=$ID";
$result_7 = mysqli_query($conexion, $query_7);

header("location:esterilizacion.php");
?>