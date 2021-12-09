<?php

require 'daoinsumos.php';

$insumo= new Daoinsumos();
$opcion=$_POST["opcion"];
$nombre=$opcion <3 ? $_POST["nombre"]:"";
$precio=$opcion <3 ?  $_POST["precio"]: "";
$descripcion=$opcion <3 ?  $_POST["descripcion"] : "";
$stock=$opcion <3 ?  $_POST["stock"] : "";



 
if($opcion==1){
    $filas=$insumo->add($nombre,$precio,$descripcion,$stock);
}else if($opcion==2){
    $id=$_POST["id"];
    $estado=$_POST["estado"];
    $filas=$insumo->edit($id,$nombre,$precio,$descripcion,$stock,$estado);
}else if($opcion==3){
    $filas=0;
    echo json_encode($insumo->showAll());

}

if($filas > 0){
    header("Location:../vista/insumo.php");
}
