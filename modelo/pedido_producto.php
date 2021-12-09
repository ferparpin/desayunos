<?php
include_once 'conexion.php';


class pedido_producto extends bdconnect{

     private $id_pedido;
     private $id_producto;
     private $cantidad;
     private $estado;

    
     public function getId_pedido()
     {
          return $this->id_pedido;
     }
     public function setId_pedido($id_pedido)
     {
          $this->id_pedido = $id_pedido;

          return $this;
     }
     public function getId_producto()
     {
          return $this->id_producto;
     }
     public function setId_producto($id_producto)
     {
          $this->id_producto = $id_producto;

          return $this;
     }
     public function getCantidad()
     {
          return $this->cantidad;
     }
     public function setCantidad($cantidad)
     {
          $this->cantidad = $cantidad;

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
