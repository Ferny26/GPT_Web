<?php

session_start();

include("conexion.php");
include("encrypt.php");

if(isset($_POST['login'])){
    $user = $_POST['user'];
    $pass = openssl_encrypt($_POST['pass'], COD, KEY);
    $proceso = $conexion -> query("SELECT * FROM Usuarios WHERE Username='$user' AND Password='$pass'");

        if($resultado = mysqli_fetch_array($proceso)){
            $_SESSION['user'] = $user;
            header("location:../admin.php");
        }else{
            $username = $_POST['user'];
            $password= $_POST['pass'];
            $conexion = mysqli_connect('localhost',$username,$password,'GPT') or die (header("location:../index.php"));
            $_SESSION['user'] = $username;
            $_SESSION['pass'] = $password;
            header("location:../admin.php");
        }
}
?>
