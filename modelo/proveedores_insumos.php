<?php
include_once 'conexion.php';


class proveedores_insumos extends bdconnect{

     private $id_proveedor;
     private $id_insumo;

     public function getId_proveedor()
     {
          return $this->id_proveedor;
     }

     public function setId_proveedor($id_proveedor)
     {
          $this->id_proveedor = $id_proveedor;

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