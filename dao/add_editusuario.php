<?php

require 'daousuario.php';


$usuario= new daousuario();

$nombre= $_POST["nombre_usuario"];
$apellido= $_POST["apellido"];
$telefono= $_POST["telefono"];
$correo= $_POST["correo"];
$residencia= $_POST["residencia"];
$rol= $_POST["rol"];
$opcion=$_POST["opcion"];
if($opcion==1){
    $filas=$usuario->add($nombre,$apellido,$telefono,$correo,$residencia,$rol);
}else if($opcion==2){
    $id=$_POST["id"];
    $filas=$usuario->edit($id,$nombre,$apellido,$telefono,$correo,$residencia,$rol);
}
if($opcion < 3 && $filas > 0){
    header("Location:../vista/proveedores.php");
}
?>
