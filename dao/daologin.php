<?php
include_once 'conexion.php';



class Daologin extends bdconnect{

    function login($correo,$clave){
        try {
            $conn = $this->connect();
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = $conn->prepare("SELECT id_usuario,nombre,apellido,telefono,correo,residencia,rol,	
            estado from usuario where correo=:correo and clave=:clave");
            $sql -> bindParam(':correo', $correo); 
            $sql -> bindParam(':clave', $clave); 
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