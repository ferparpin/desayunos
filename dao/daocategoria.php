<?php
include_once 'conexion.php';

class Daocategoria extends bdconnect{

    function showAll(){
        try {
            $conn = $this->connect();
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = $conn->prepare("SELECT * FROM categoria"); 
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
    
    
    function add($nombre){
        try{
            $conn = $this->connect();
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = $conn->prepare("Insert into categoria(nombre) values (:nombre) "); 
            $sql -> bindParam(':nombre', $nombre);
           
            $sql->execute();
            echo  $sql->rowCount();
        }catch(PDOException $error)
            {
              echo "El error sería: <br>" . $error->getMessage();
            }
     $conn = null;
    }

    function edit($id,$nombre){
        try{
            $conn = $this->connect();
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = $conn->prepare("Update categoria set nombre=:nombre where id_categoria=:id"); 
            $sql -> bindParam(':nombre', $nombre);
            $sql -> bindParam(':id', $id);
            $sql->execute();
            echo  $sql->rowCount();
        }catch(PDOException $error)
            {
              echo "El error sería: " . $error->getMessage();
            }
     $conn = null;
    }

    }
    
    ?>
    