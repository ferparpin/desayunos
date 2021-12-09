<?php
include_once 'conexion.php';


class proveedores extends bdconnect{

     private $id_proveedor;
     private $nombre;
     private $apellido;
     private $telefono;
     
     public function getId_proveedor()
     {
          return $this->id_proveedor;
     }

     public function setId_proveedor($id_proveedor)
     {
          $this->id_proveedor = $id_proveedor;

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
    }
   
   
   ?>