<?php
include_once 'conexion.php';


class producto extends bdconnect{

     private $id_producto;
     private $nombre;
     private $precio;
     private $stock;
     private $descripcion;
     private $estado;
     private $imagen;
     private $id_categoria; 

     public function getId_producto()
     {
          return $this->id_producto;
     }

     public function setId_producto($id_producto)
     {
          $this->id_producto = $id_producto;

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


     public function getStock()
     {
          return $this->stock;
     }

     
     public function setStock($stock)
     {
          $this->stock = $stock;

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

     public function getImagen()
     {
          return $this->imagen;
     }


     public function setImagen($imagen)
     {
          $this->imagen = $imagen;

          return $this;
     }

     public function getId_categoria()
     {
          return $this->id_categoria;
     }

     
     public function setId_categoria($id_categoria)
     {
          $this->id_categoria = $id_categoria;

          return $this;
     }
}
?>