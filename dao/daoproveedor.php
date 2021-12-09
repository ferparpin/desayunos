<?php
include_once 'conexion.php';



class Daoproveedor extends bdconnect{

    function showAll(){
        try {
            $conn = $this->connect();
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = $conn->prepare("SELECT * FROM proveedores"); 
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
    
    function add($nombre,$apellido,$telefono,$correo){
        try{
            $conn = $this->connect();
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = $conn->prepare("Insert into proveedores(nombre,apellido,telefono, correo,estado) values (:nombre,:apellido,:telefono,:correo,1) "); 
            $sql -> bindParam(':nombre', $nombre);
            $sql -> bindParam(':apellido', $apellido);
            $sql -> bindParam(':telefono', $telefono);
            $sql -> bindParam(':correo', $correo);

            $sql->execute();
        return  $sql->rowCount();
        }catch(PDOException $error)
            {
            echo "El error sería: <br>" . $error->getMessage();
            }
            $conn = null;
    }

    function edit($id,$nombre,$apellido,$telefono,$correo,$estado){
        try{
            $conn = $this->connect();
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = $conn->prepare("Update proveedores set nombre=:nombre,apellido=:apellido,telefono=:telefono,correo=:correo,estado=:estado where id_proveedor=:id"); 
            $sql -> bindParam(':nombre', $nombre);
            $sql -> bindParam(':apellido', $apellido);
            $sql -> bindParam(':telefono', $telefono);
            $sql -> bindParam(':correo', $correo);
            $sql -> bindParam(':estado', $estado);
            $sql -> bindParam(':id', $id);
    
            $sql->execute();
            return  $sql->rowCount();
        }catch(PDOException $error)
            {
              echo "El error sería: <br>" . $error->getMessage();
            }
     $conn = null;
        }
    
    function categoriasbyproveedor($id){
        try {
            $conn = $this->connect();
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = $conn->prepare("select insumos.id_insumo as codigo,insumos.nombre from insumos INNER JOIN proveedores_insumos on proveedores_insumos.id_insumo = insumos.id_insumo INNER JOIN proveedores on proveedores_insumos.id_proveedor=proveedores.id_proveedor where proveedores.id_proveedor=:id"); 
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

    function addinsumoproveedor($proveedor,$insumo){
        try {
            $conn = $this->connect();
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = $conn->prepare("INSERT INTO proveedores_insumos(id_proveedor, id_insumo) VALUES(:id,:insumo)"); 
            $sql -> bindParam(':id', $proveedor);
            $sql -> bindParam(':insumo', $insumo);
            $sql->execute();
            return  $sql->rowCount();
        }
        catch(PDOException $error) {
            echo "Error: " . $error->getMessage();
        }
    }

    function deleteinsumoproveedor($proveedor,$insumo){
        try {
            $conn = $this->connect();
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = $conn->prepare("Delete from proveedores_insumos where id_proveedor=:id and id_insumo=:insumo"); 
            $sql -> bindParam(':id', $proveedor);
            $sql -> bindParam(':insumo', $insumo);
            $sql->execute();
            return  $sql->rowCount();
        }
        catch(PDOException $error) {
            echo "Error: " . $error->getMessage();
        }
    }

    }
