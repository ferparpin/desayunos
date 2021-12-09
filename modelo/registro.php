<?php
include_once 'conexion.php';


class registro extends bdconnect{

     private $id_registro;
     private $fecha;
     private $descripcion;
     private $fk_usuario;

     public function getId_registro()
     {
          return $this->id_registro;
     }

     public function setId_registro($id_registro)
     {
          $this->id_registro = $id_registro;

          return $this;
     }

     public function getFecha()
     {
          return $this->fecha;
     }

     public function setFecha($fecha)
     {
          $this->fecha = $fecha;

          return $this;
     }

     public function getDescripcion()
     {
          return $this->descripcion;
     }

     public function setDescripcion($descripcion)
     {
          $this->descripcion = $descripcion;

          return $this;
     }
     public function getFk_usuario()
     {
          return $this->fk_usuario;
     }

     public function setFk_usuario($fk_usuario)
     {
          $this->fk_usuario = $fk_usuario;

          return $this;
     }
}
?>
    