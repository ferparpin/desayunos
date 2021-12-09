<?php
include_once 'conexion.php';



class Daoinsumos extends bdconnect{

    function showAll(){
        try {
            $conn = $this->connect();
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = $conn->prepare("SELECT * FROM insumos"); 
            $sql->execute();
            $sql->setFetchMode(PDO::FETCH_ASSOC);
            return  $sql->fetchAll();
        }
        catch(PDOException $error) {
            echo "Error: " . $error->getMessage();
        }
        $conexion = null;
        }
        function add($nombre,$precio,$descripcion,$stock){
            try{
                $conn = $this->connect();
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $sql = $conn->prepare("Insert into insumos(nombre,descripcion,precio,stock,estado) values (:nombre,:descripcion,:precio,:stock,1) "); 
                $sql -> bindParam(':nombre', $nombre);
                $sql -> bindParam(':descripcion', $descripcion);
                $sql -> bindParam(':precio', $precio);
                $sql -> bindParam(':stock', $stock);
                $sql->execute();
                
            return  $sql->rowCount();
            }catch(PDOException $error)
                {
                  echo "El error sería: <br>" . $error->getMessage();
                }
         $conn = null;
        }
        function edit($id,$nombre,$precio,$descripcion,$stock,$estado){

            try{
                
                $conn = $this->connect();
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $sql="";
                $sql = $conn->prepare("Update insumos set nombre=:nombre,descripcion=:descripcion,precio=:precio,stock=:stock,estado=:estado where id_insumo=:id");
                $sql -> bindParam(':nombre', $nombre);
                $sql -> bindParam(':descripcion', $descripcion);
                $sql -> bindParam(':precio', $precio);
                $sql -> bindParam(':stock', $stock);
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
    }
    ?>
    
