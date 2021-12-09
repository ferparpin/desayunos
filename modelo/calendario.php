<?php
include_once 'conexion.php';


class calendario extends bdconnect{

     private $id_calendario;
     private $descripcion;
     private $fecha_inicio; 	
     private $fecha_fin;
     private $fk_pedido;

    
     public function getId_calendario()
     {
          return $this->id_calendario;
     }
     public function setId_calendario($id_calendario)
     {
          $this->id_calendario = $id_calendario;

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
     public function getFecha_inicio()
     {
          return $this->fecha_inicio;
     }
     public function setFecha_inicio($fecha_inicio)
     {
          $this->fecha_inicio = $fecha_inicio;

          return $this;
     }
     public function getFecha_fin()
     {
          return $this->fecha_fin;
     }
     public function setFecha_fin($fecha_fin)
     {
          $this->fecha_fin = $fecha_fin;

          return $this;
     }
     public function getFk_pedido()
     {
          return $this->fk_pedido;
     }
     public function setFk_pedido($fk_pedido)
     {
          $this->fk_pedido = $fk_pedido;

          return $this;
     }
    }
     ?>