<?php
include_once 'conexion.php';



class Daopedido extends bdconnect{

    function showAll(){
        try {
            $conn = $this->connect();
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = $conn->prepare("SELECT ped.id_pedido,ped.total,ped.fecha_de_entrega,client.id_cliente identificacion,client.nombre,client.apellido,client.telefono, client.correo,client.residencia,GROUP_CONCAT(' ',producto.nombre,'(total : ',pedido_producto.cantidad,')' ) productos FROM `pedido` as ped INNER JOIN cliente as client on ped.id_cliente=client.id_cliente INNER JOIN pedido_producto on ped.id_pedido=pedido_producto.id_pedido INNER JOIN producto on pedido_producto.id_producto=producto.id_producto"); 
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