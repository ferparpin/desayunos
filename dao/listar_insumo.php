<?php

require 'daoinsumos.php';


$insumos= new daoinsumos();
?>
<div class="contenedor">
<div class="container-table">
<table id="insumo_table" class="tabla1">
<thead>
    <th class="celda">ID</th>
    <th class="celda">Nombre</th>
    <th class="celda">Precio</th>
    <th class="celda">Descripcion</th>
    <th class="celda">Estado</th>
    <th class="celda">Stock</th>
    <th class="celda">Opcion</th>

</thead>

  
<tbody>
<?php
  foreach ($insumos->showAll() as $key => $value) {
?>
   <tr>
    <td class="celda"><?php echo $value["id_insumo"] ?></td>
    <td class="celda"><?php echo $value["nombre"] ?></td>
    <td class="celda"><?php echo $value["precio"] ?></td>
    <td class="celda"><?php echo $value["descripcion"] ?></td>
    <td class="celda"><?php echo $value["estado"] ? "Activo" : "Inactivo" ?></td>
    <td class="celda"><?php echo $value["stock"] ?></td>
    <td><button type="button" class="primary-button btn edit" data-bs-toggle="modal" data-bs-target="#modalinsumo">Editar</button>  
  </td>
    <?php } ?>
  </tr>
</tbody>    
</table>
</div>
</div>
