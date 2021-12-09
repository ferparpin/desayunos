<?php
include_once 'conexion.php';


class cliente extends bdconnect{

     private $id_cliente;
     private $nombre;
     private $apellido;
     private $telefono;
     private $correo;
     private $direccion;

 
     public function getId_cliente()
     {
          return $this->id_cliente;
     }
     public function setId_cliente($id_cliente)
     {
          $this->id_cliente = $id_cliente;

          return $this;
     }
     public function getNombre()
     {
          return $this->nombre;
     }
     public function setNombre($nombre)
     {
          $this->nombre = $nombre;

          return $this;
     } 
     public function getApellido()
     {
          return $this->apellido;
     }
     public function setApellido($apellido)
     {
          $this->apellido = $apellido;

          return $this;
     }
     public function getTelefono()
     {
          return $this->telefono;
     }
     public function setTelefono($telefono)
     {
          $this->telefono = $telefono;

          return $this;
     }
     public function getCorreo()
     {
          return $this->correo;
     }
     public function setCorreo($correo)
     {
          $this->correo = $correo;

          return $this;
     } 
     public function getDireccion()
     {
          return $this->direccion;
     }
     public function setDireccion($direccion)
     {
          $this->direccion = $direccion;

          return $this;
     }
}
