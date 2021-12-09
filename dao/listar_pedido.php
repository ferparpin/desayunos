<?php

require 'daopedido.php';


$pedido= new daopedido();
?>
<div class="contenedor">
<div class="container-table">
<table id="pedido_table" class="tabla1">
  <thead>
    <th class="celda">Numero</th>
    <th class="celda">Fecha de entrega</th>
    <th class="celda">Nombre del cliente</th>
    <th class="celda">Telefono</th>
    <th class="celda">Correo</th>
    <th class="celda">Direccion</th>
    <th class="celda">Total</th>
    <th class="celda">Productos</th>
</thead>
<tbody >
<?php
foreach ($pedido->showAll() as $key => $value) {
?>  
 <tr>
    <td class="celda"><?php echo $value["id_pedido"] ?></td>
    <td class="celda"><?php echo $value["fecha_de_entrega"] ?></td>
    <td class="celda"><?php echo $value["nombre"].' '.$value["apellido"] ?></td>
    <td class="celda"><?php echo $value["telefono"] ?></td>
    <td class="celda"><?php echo $value["correo"] ?></td>
    <td class="celda"><?php echo $value["residencia"] ?></td>
    <td class="celda"><?php echo $value["total"] ?></td>
    <td class="celda"><?php echo $value["productos"] ?></td>
    <?php } ?> 
 </tr>  
</tbody>    
</table>
</div>
</div>
