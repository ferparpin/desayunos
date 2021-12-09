<?php

require 'daoproducto.php';


$productos= new daoproducto();
?>
<div class="contenedor">
<div class="container-table">
<table id="producto_table" class="tabla1">
<thead>
    <th class="celda">id_producto</th>
    <th class="celda">nombre</th>
    <th class="celda">Precio</th>
    <th class="celda">descripcion</th>
    <th class="celda">estado</th>
    <th class="celda">stock</th>
    <th class="celda">categoria</th>
    <th class="celda">Opcion</th>

</thead>

  
<tbody>
<?php
  foreach ($productos->showAll() as $key => $value) {
?>
   <tr>
    <td class="celda"><?php echo $value["id_producto"] ?></td>
    <td class="celda"><?php echo $value["nombre"] ?></td>
    <td class="celda"><?php echo $value["precio"] ?></td>
    <td class="celda"><?php echo $value["descripcion"] ?></td>
    <td class="celda"><?php echo $value["estado"] ? "Activo" : "Inactivo" ?></td>
    <td class="celda"><?php echo $value["stock"] ?></td>
    <td class="celda"><?php echo $value["categoria"] ?></td>
    <td><button type="button" class="primary-button btn edit" data-bs-toggle="modal" data-bs-target="#modalproveedor">Editar</button>  
  </td>
    <?php } ?>
  </tr>
</tbody>    
</table>
</div>
</div>
