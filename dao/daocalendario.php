<?php
include_once 'conexion.php';



class Daocalendario extends bdconnect{

    function showAll(){
        try {
            $conn = $this->connect();
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = $conn->prepare("SELECT calendario.id_calendario,calendario.descripcion,calendario.fecha_inicio,calendario.fecha_fin,pedido.id_pedido,pedido.id_cliente,pedido.fecha_de_entrega, cliente.nombre,cliente.apellido,cliente.telefono 
            FROM calendario inner join pedido on calendario.fk_pedido=pedido.id_pedido inner join cliente on pedido.id_cliente=cliente.id_cliente"); 
            $sql->execute();
            $sql->setFetchMode(PDO::FETCH_ASSOC);
            return  $sql->fetchAll();
        }
        catch(PDOException $error) {
            echo "Error: " . $error->getMessage();
        }
        $conexion = null;
        }
        function add($nombre,$apellido,$telefono,$correo,$residencia,$rol){
            try{
                $conn = $this->connect();
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $sql = $conn->prepare("Insert into usuario(nombre,apellido,telefono,correo,residencia,rol) values (:nombre,:apellido,:telefono,:correo,:residencia,:rol)"); 
                $sql -> bindParam(':nombre', $nombre);
                $sql -> bindParam(':apellido', $apellido);
                $sql -> bindParam(':telefono', $telefono);
                $sql -> bindParam(':correo', $correo);
                $sql -> bindParam(':residencia', $residencia);
                $sql -> bindParam(':rol', $rol);
        
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