<?php
if(isset($_GET['ID'])){
    $ID = $_GET['ID'];
    $id = $_GET['id'];
}
include("includes/conexion.php");

$Nombres=$_POST['Nombres'];
$ApellidoMaterno=$_POST['ApellidoMaterno'];
$ApellidoPaterno=$_POST['ApellidoPaterno'];
$Domicilio=$_POST['Domicilio'];
$Celular=$_POST['Celular'];

$query="INSERT INTO Responsable(Nombres, Apellido_Materno, Apellido_Paterno, Domicilio, Celular) VALUES('$Nombres','$ApellidoMaterno','$ApellidoPaterno','$Domicilio','$Celular')";
$result = mysqli_query($conexion, $query);

$query_2 ="SELECT * FROM Responsable WHERE Nombres='$Nombres' AND Apellido_Materno='$ApellidoMaterno' AND Apellido_Paterno='$ApellidoPaterno' AND Celular=$Celular";
$result_2 = mysqli_query($conexion, $query_2);
$data_2 = mysqli_fetch_array($result_2);

$ID_Responsable=$data_2['ID_Responsable'];
$query_3="INSERT INTO Gato_Hogar(ID_Gato, ID_Responsable) VALUES('$id','$ID_Responsable')";
$result_3 = mysqli_query($conexion, $query_3);

header("location:campaña.php?ID=$ID");
?>