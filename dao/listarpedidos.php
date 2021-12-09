<?php

require 'daopedido.php';


$pedido= new daopedido();

echo json_encode($pedido->showAll());

?>