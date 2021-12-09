<?php
include_once 'conexion.php';


class insumos extends bdconnect{

     private $id_insumo;
     private $nombre;
     private $precio;
     private $descripcion;
     private $estado;

     
     public function getId_insumo()
     {
          return $this->id_insumo;
     }
     public function setId_insumo($id_insumo)
     {
          $this->id_insumo = $id_insumo;

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
     public function getPrecio()
     {
          return $this->precio;
     }
     public function setPrecio($precio)
     {
          $this->precio = $precio;

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
     public function getEstado()
     {
          return $this->estado;
     }
     public function setEstado($estado)
     {
          $this->estado = $estado;

          return $this;
     }
}
?>