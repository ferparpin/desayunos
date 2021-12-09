<?php
include_once 'conexion.php';



class Daousuario extends bdconnect{

    function showAll(){
        try {
            $conn = $this->connect();
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = $conn->prepare("SELECT * FROM usuario"); 
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

    function add($nombre,$apellido,$telefono,$correo,$residencia,$rol){
            try{
                $conn = $this->connect();
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $sql = $conn->prepare("Insert into usuario(nombre,apellido,telefono,correo,residencia,rol,estado) values (:nombre,:apellido,:telefono,:correo,:residencia,:rol,1)"); 
                $sql -> bindParam(':nombre', $nombre);
                $sql -> bindParam(':apellido', $apellido);
                $sql -> bindParam(':telefono', $telefono);
                $sql -> bindParam(':correo', $correo);
                $sql -> bindParam(':residencia', $residencia);
                $sql -> bindParam(':rol', $rol);
        
                $sql->execute();
            return  $sql->rowCount();
            }catch(PDOException $error)
                {
                  echo "El error sería: <br>" . $error->getMessage();
                }
         $conn = null;
            }
    function edit($id,$nombre,$apellido,$telefono,$correo,$residencia,$rol){
            try{
                $conn = $this->connect();
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $sql = $conn->prepare("Update usuario set nombre=:nombre,apellido=:apellido,telefono=:telefono,correo=:correo,residencia=:residencia,rol=:rol where id_usuario=:id"); 
                $sql -> bindParam(':nombre', $nombre);
                $sql -> bindParam(':apellido', $apellido);
                $sql -> bindParam(':telefono', $telefono);
                $sql -> bindParam(':correo', $correo);
                $sql -> bindParam(':residencia', $residencia);
                $sql -> bindParam(':rol', $rol);
                $sql -> bindParam(':id', $id);
                $sql->execute();

                return  $sql->rowCount();
                }catch(PDOException $error)
                    {
                      echo "El error sería: <br>" . $error->getMessage();
                    }
             $conn = null;
                }
        
            }
    ?>