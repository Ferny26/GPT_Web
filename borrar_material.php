<?php

if(isset($_GET['ID'])){
    $ID = $_GET['ID'];
    include("includes/conexion.php");
    $query = "DELETE FROM Material WHERE ID_Material= $ID";
    $result = mysqli_query($conexion, $query);
    header("location: inventario.php");
}

?>