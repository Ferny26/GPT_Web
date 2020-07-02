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

if(isset($_GET['IDID'])){
    $IDID = $_GET['IDID'];
}

if(!$result){
    die("Query failed");
}


$query_2="SELECT * FROM Esterilizacion WHERE ID_Esterilizacion=$IDID";
$result_2 = mysqli_query($conexion, $query_2);
$data2 = mysqli_fetch_array($result_2);
$ID=$data2['ID_Gato'];
$ID_Campaa=$data2['ID_Campaa'];

$query_3="SELECT * FROM Gato_Hogar WHERE ID_Gato=$ID";
$result_3 = mysqli_query($conexion, $query_3);
$data3 = mysqli_fetch_array($result_3);
if($data3!=0){
    $ID_Responsable=$data3['ID_Responsable'];

$query_4="DELETE FROM Responsable WHERE ID_Responsable=$ID_Responsable";
$result_4 = mysqli_query($conexion, $query_4);
}
$query_5="DELETE FROM Gato_Info WHERE ID_Gato=$ID";
$result_5 = mysqli_query($conexion, $query_5);

header("location: campaña.php?ID=$ID_Campaa");

?>