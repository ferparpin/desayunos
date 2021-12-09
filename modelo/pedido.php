<?php
include_once 'conexion.php';


class pedido extends bdconnect{

     private $id_pedido;
     private $total;
     private $id_cliente;
     private $fecha_de_entrega;

     public function getId_pedido()
     {
          return $this->id_pedido;
     }
     public function setId_pedido($id_pedido)
     {
          $this->id_pedido = $id_pedido;

          return $this;
     }

     public function getTotal()
     {
          return $this->total;
     }
     public function setTotal($total)
     {
          $this->total = $total;

          return $this;
     }
     public function getId_cliente()
     {
          return $this->id_cliente;
     }
     public function setId_cliente($id_cliente)
     {
          $this->id_cliente = $id_cliente;

          return $this;
     }
     public function getFecha_de_entrega()
     {
          return $this->fecha_de_entrega;
     }
     public function setFecha_de_entrega($fecha_de_entrega)
     {
          $this->fecha_de_entrega = $fecha_de_entrega;

          return $this;
     }
}