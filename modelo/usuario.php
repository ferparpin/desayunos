<?php
include_once 'conexion.php';


class usuario extends bdconnect{

     private $id_usuario;
     private $nombre;
     private $apellido;
     private $telefono;
     private $correo;
     private $residencia;
     private $rol;

     
     public function getId_usuario()
     {
          return $this->id_usuario;
     }

     public function setId_usuario($id_usuario)
     {
          $this->id_usuario = $id_usuario;

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

     public function getResidencia()
     {
          return $this->residencia;
     }

   
     public function setResidencia($residencia)
     {
          $this->residencia = $residencia;

          return $this;
     }

    
     public function getRol()
     {
          return $this->rol;
     }

     public function setRol($rol)
     {
          $this->rol = $rol;

          return $this;
     }
}

?>