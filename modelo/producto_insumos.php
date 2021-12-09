<?php
include_once 'conexion.php';


class producto_insumos extends bdconnect{

     private $id_producto;
     private $id_insumo;

     public function getId_producto()
     {
          return $this->id_producto;
     }
     public function setId_producto($id_producto)
     {
          $this->id_producto = $id_producto;

          return $this;
     }
     public function getId_insumo()
     {
          return $this->id_insumo;
     }
     public function setId_insumo($id_insumo)
     {
          $this->id_insumo = $id_insumo;

          return $this;
     }
}
?>