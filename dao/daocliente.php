<?php

include_once 'conexion.php';


class Daocliente extends bdconnect{

    function showAll(){
        try {
            $conn = $this->connect();
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = $conn->prepare("SELECT * FROM cliente"); 
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
    }
    

?>