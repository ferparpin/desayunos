<?php

require 'daocategoria.php';

$categoria= new Daocategoria();

$opcion=(int)$_POST["opcion"];
$nombre=$opcion !=3 ? $_POST["nombre"] : "";

if($opcion==1){
   $categoria->add($nombre);
}
else if($opcion==2){
    $id=(int)$_POST["id"];
    $categoria->edit($id,$nombre);
}else if($opcion==3){
    echo json_encode($categoria->showAll());
}
if($opcion < 3 && $filas > 0){
    header("Location:../vista/proveedores.php");
}

?>