<?php
include_once 'conexion.php';

class Daoproducto extends bdconnect{

    function showAll(){
        try {
            $conn = $this->connect();
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = $conn->prepare("SELECT pd.id_producto,pd.nombre,pd.precio,pd.descripcion,pd.stock,pd.estado,pd.imagen,ct.nombre as categoria FROM producto as pd inner join categoria as ct on pd.id_categoria=ct.id_categoria"); 
            $sql->execute();
            $sql->setFetchMode(PDO::FETCH_ASSOC);
            return  $sql->fetchAll();
        }
        catch(PDOException $error) {
            echo "Error: " . $error->getMessage();
        }
        $conexion = null;
        echo "</table>";
        }
    
    
    function add($nombre,$precio,$descripcion,$stock,$categoria,$imagen){
        try{
            $conn = $this->connect();
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = $conn->prepare("Insert into producto(nombre,descripcion,precio,stock,id_categoria,imagen,estado) values (:nombre,:descripcion,:precio,0,:categoria,:imagen,1) "); 
            $sql -> bindParam(':nombre', $nombre);
            $sql -> bindParam(':descripcion', $descripcion);
            $sql -> bindParam(':precio', $precio);
            $sql -> bindParam(':categoria', $categoria);
            $sql -> bindParam(':imagen', $imagen);
           
            $sql->execute();
            $sql->rowCount() . " Registros Actualizados Satisfactoriamente";
        return  $sql->rowCount();
        }catch(PDOException $error)
            {
              echo "El error sería: <br>" . $error->getMessage();
            }
     $conn = null;
    }
    function edit($id,$nombre,$precio,$descripcion,$categoria,$imagen,$estado){
        var_dump($id);
        try{
            
            $conn = $this->connect();
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql="";
            if($imagen !=""){
                $sql = $conn->prepare("Update producto set nombre=:nombre,descripcion=:descripcion,precio=:precio,id_categoria=:categoria,imagen=:imagen,estado=:estado where id_producto=:id"); 
            }else{
                $sql = $conn->prepare("Update producto set nombre=:nombre,descripcion=:descripcion,precio=:precio,id_categoria=:categoria,estado=:estado  where id_producto=:id");
            }
            $sql -> bindParam(':nombre', $nombre);
            $sql -> bindParam(':descripcion', $descripcion);
            $sql -> bindParam(':precio', $precio);
            $sql -> bindParam(':categoria', $categoria);
            if($imagen !=""){
                $sql -> bindParam(':imagen', $imagen);
            }
            $sql -> bindParam(':estado', $estado);
            
            $sql -> bindParam(':id', $id);

            $sql->execute();
            $sql->rowCount() . " Registros Actualizados Satisfactoriamente";
        return  $sql->rowCount();
        }catch(PDOException $error)
            {
              echo "El error sería: <br>" . $error->getMessage();
            }
     $conn = null;
    }
    
    function categoriasbyproducto($id){
        try {
            $conn = $this->connect();
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = $conn->prepare("select insumos.id_insumo as codigo,insumos.nombre,producto_insumos.cantidad from insumos INNER JOIN producto_insumos on producto_insumos.id_insumo = insumos.id_insumo INNER JOIN producto on producto_insumos.id_producto=producto.id_producto where producto.id_producto=:id"); 
            $sql -> bindParam(':id', $id);
            $sql->execute();
            $sql->setFetchMode(PDO::FETCH_ASSOC);
            return  $sql->fetchAll();
        }
        catch(PDOException $error) {
            echo "Error: " . $error->getMessage();
        }
        $conexion = null;
        echo "</table>";  
    }

    function addinsumoproducto($producto,$insumo,$cantidad){
        try {
            $conn = $this->connect();
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = $conn->prepare("INSERT INTO producto_insumos(id_producto, id_insumo,cantidad) VALUES(:id,:insumo,:cantidad)"); 
            $sql -> bindParam(':id',$producto);
            $sql -> bindParam(':insumo',$insumo);
            $sql -> bindParam(':cantidad',$cantidad);
            $sql->execute();
            return  $sql->rowCount();
        }
        catch(PDOException $error) {
            echo "Error: " . $error->getMessage();
        }
    }

    function updateinsumoproducto($producto,$insumo,$cantidad){
        try {
            $conn = $this->connect();
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $producto=(int)$producto;
            $insumo=(int)$insumo;
            $cantidad=(int)$cantidad;
            $sql = $conn->prepare("Update producto_insumos set cantidad=:cantidad  where id_producto=:id and id_insumo=:insumo"); 
            $sql -> bindParam(':cantidad',$cantidad,PDO::PARAM_INT);
            $sql -> bindParam(':id',$producto,PDO::PARAM_INT);
            $sql -> bindParam(':insumo',$insumo,PDO::PARAM_INT);
            $sql->execute();
            return  $sql->rowCount();
        }
        catch(PDOException $error) {
            echo "Error: " . $error->getMessage();
        }
    }

    function deleteinsumoproducto($producto,$insumo){
        try {
            $conn = $this->connect();
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = $conn->prepare("Delete from producto_insumos where id_producto=:id and id_insumo=:insumo"); 
            $sql -> bindParam(':id', $producto);
            $sql -> bindParam(':insumo', $insumo);
            $sql->execute();
            return  $sql->rowCount();
        }
        catch(PDOException $error) {
            echo "Error: " . $error->getMessage();
        }
    }
    

    function addProduccion($id,$cantidad){
        $update=true;
        $insumos_faltantes=[];
        try {
            $conn = $this->connect();
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = $conn->prepare("SELECT producto.nombre,insumos.nombre,insumos.stock-(producto_insumos.cantidad*:cantidad) as cantidad from producto
            inner join producto_insumos on producto_insumos.id_producto=producto.id_producto
            inner join insumos on producto_insumos.id_insumo=insumos.id_insumo
            where producto.id_producto=:id"); 
            $sql -> bindParam(':cantidad', $cantidad,PDO::PARAM_INT);
            $sql -> bindParam(':id', $id,PDO::PARAM_INT);
            $sql->execute();
            $sql->setFetchMode(PDO::FETCH_ASSOC);
            $insumos=$sql->fetchAll();
            foreach ($insumos as $key => $value) {
                 if((int)$value["cantidad"] < 0){
                     $update=false;
                     $insumos_faltantes[]=array($value["nombre"],(int)$value["cantidad"]*-1);
                 }
            }
            if($update){
                $sql = $conn->prepare("Update producto set stock=stock+:stock where id_producto=:id"); 
                $sql -> bindParam(':stock', $cantidad,PDO::PARAM_INT);
                $sql -> bindParam(':id', $id,PDO::PARAM_INT);
                $sql->execute();
                $sql = $conn->prepare("update insumos inner join producto_insumos on producto_insumos.id_insumo= insumos.id_insumo inner join producto on producto_insumos.id_producto = producto.id_producto set insumos.stock=insumos.stock-(:cantidad*producto_insumos.cantidad) where producto.id_producto=:id;"); 
                $sql -> bindParam(':cantidad', $cantidad,PDO::PARAM_INT);
                $sql -> bindParam(':id', $id,PDO::PARAM_INT);
                $sql->execute();
            }
            return $insumos_faltantes;
           
        }
        catch(PDOException $error) {
            echo "Error: " . $error->getMessage();
        }
    }

    }
    ?>
    