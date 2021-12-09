<?php

require 'daoproducto.php';

$producto= new Daoproducto();
$opcion=$_POST["opcion"];
$nombre=$opcion < 3 ? $_POST["nombre_producto"] : "";
$precio=$opcion < 3 ? $_POST["precio"] : "";
$descripcion=$opcion < 3 ? $_POST["descripcion"]: "";
$categoria=$opcion < 3 ? $_POST["categoria"]: "";
$imagen=$opcion < 3 ? $_FILES["imagen_producto"]: "";
$img_producto=$opcion < 3 ? $imagen["name"]: "";
$ruta=$opcion < 3 ? $imagen["tmp_name"]: "";
$destino="../imagenes/".$img_producto;
$filas=0;


 
if($opcion==1){
    $filas=$producto->add($nombre,$precio,$descripcion,$categoria,$img_producto);
}else if($opcion==2){
    $id=$_POST["id"];
    $estado=$_POST["estado"];
    $filas=$producto->edit($id,$nombre,$precio,$descripcion,$categoria,$img_producto,$estado);
}else if($opcion==3){
    echo json_encode($producto->showAll());
}else if($opcion==4){
    $id_producto=$_POST["producto"];
    $data = array();
    foreach ($producto->categoriasbyproducto($id_producto) as $key => $value) {
        $data[] = array(
            "codigo"=>$value["codigo"],
            "nombre"=>$value["nombre"],
            "cantidad"=>$value["cantidad"],
            "id"=>$id_producto
        );
    }
   
    echo json_encode(array("data" => $data));
}else if($opcion==5){
    $id_producto=$_POST["producto"];
    $insumo=$_POST["insumo"];
    $filas=$producto->deleteinsumoproducto($id_producto,$insumo);
    echo $filas;
    $filas=0;
}
else if($opcion==6){
    $id_producto=$_POST["producto"];
    $insumo=$_POST["insumo"];
    $cantidad=$_POST["cantidad"];
    $filas=$producto->addinsumoproducto($id_producto,$insumo,$cantidad);
    echo $filas;
    $filas=0;
}
else if($opcion==7){
    $id_producto=$_POST["producto"];
    $insumo=$_POST["insumo"];
    $cantidad=$_POST["cantidad"];
    $filas=$producto->updateinsumoproducto($id_producto,$insumo,$cantidad);
    echo $filas;
    $filas=0;
} else if($opcion==8){
    $id_producto=$_POST["producto"];
    $cantidad=$_POST["cantidad"];
    echo json_encode($producto->addProduccion($id_producto,$cantidad));
    $filas=0;
} 

if($filas > 0){
    if(!file_exists('../imagenes')){
        mkdir('../imagenes' ,0777,true);
    }
    if($imagen["size"] >0){
        copy($ruta,$destino);
    }
    header("Location:../vista/producto.php");
}
