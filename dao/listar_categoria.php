<?php

require 'daocategoria.php';


$categoria= new Daocategoria();
?>
<div class="contenedor">

<div class="container-table">
<table id="categoria_table" class="tabla1">
  <thead>
    <th class="celda">Id</th>
    <th class="celda">Nombre</th>
    <th class="celda">Opción</th>  
</thead>
<tbody >
<?php
foreach ($categoria->showAll() as $key => $value) {
?>  
 <tr>
    <td class="celda"><?php echo $value["id_categoria"] ?></td>
    <td class="celda"><?php echo $value["nombre"] ?></td>
    <td class="celda"> <button class="btn btn-primary" onclick="edit(<?php echo $value['id_categoria']?>,'<?php echo $value['nombre'] ?>')">Editar</button> </td>
    <?php } ?> 
 </tr>  
</tbody>    
</table>
</div>
</div>
