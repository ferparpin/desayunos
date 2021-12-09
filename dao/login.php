<?php

require 'daologin.php';

$login= new Daologin();
$correo=$_POST["correo"];
$clave=$_POST["clave"];

$salt = "a66a96b36d";
$contraseña_encript = hash_hmac("sha256", $clave, $salt);

$filas=$login->login($correo,$contraseña_encript);
if(count($filas[0]) > 0){
    session_start();
    $_SESSION["user"]=$filas[0];
    header("Location:../vista/admin/calendario.php");
}

