<?php

require 'daoproveedor.php';


$proveedor= new Daoproveedor();
$opcion=$_POST["opcion"];
$nombre=$opcion <3 ? $_POST["nombre_proveedor"] : "";
$apellido=$opcion <3 ? $_POST["apellido"] : "";
$telefono=$opcion <3 ? $_POST["telefono"] : "";
$correo=$opcion <3 ? $_POST["correo"] : "";
$filas="";
if($opcion==1){
    $filas=$proveedor->add($nombre,$apellido,$telefono,$correo);
}else if($opcion==2){
    $id=$_POST["id"];
    $estado=$_POST["estado"];
    $filas=$proveedor->edit($id,$nombre,$apellido,$telefono,$correo,$estado);
    var_dump($filas);
}else if($opcion==3){
    echo json_encode($proveedor->showAll());
}else if($opcion==4){
    $id_proveedor=$_POST["proveedor"];
    $data = array();
    foreach ($proveedor->categoriasbyproveedor($id_proveedor) as $key => $value) {
        $data[] = array(
            "codigo"=>$value["codigo"],
            "nombre"=>$value["nombre"],
            "id"=>$id_proveedor
        );
    }
    echo json_encode(array("data" => $data));
}else if($opcion==5){
    $id_proveedor=$_POST["proveedor"];
    $insumo=$_POST["insumo"];
    $filas=$proveedor->deleteinsumoproveedor($id_proveedor,$insumo);
    echo $filas;
}
else if($opcion==6){
    $id_proveedor=$_POST["proveedor"];
    $insumo=$_POST["insumo"];
    $filas=$proveedor->addinsumoproveedor($id_proveedor,$insumo);
    echo $filas;
}

if($opcion < 3 && $filas > 0){
    header("Location:../vista/proveedores.php");
}

