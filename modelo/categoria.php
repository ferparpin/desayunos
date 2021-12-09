<?php
include_once 'conexion.php';


class categoria extends bdconnect{

 private $id_categoria; 
 private $nombre;

 public function getId_categoria()
 {
  return $this->id_categoria;
 }
 public function setId_categoria($id_categoria)
 {
  $this->id_categoria = $id_categoria;

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
}
?>