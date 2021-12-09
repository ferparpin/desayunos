<?php

require 'daoregistro.php';


$registro= new daoregistro();
?>
</style>
<div class="contenedor">
        <div class="container-table">
<table class="table">
<thead class="row header">
    <th class="celda">id_registro</th>
    <th class="celda">fecha</th>
    <th class="celda">descripcion</th>
    <td class="celda">usuario</td>
</thead>


<tbody class="row">
<?php
foreach ($registro->showAll() as $key => $value) {
?>  
    <td class="celda"><?php echo $value["id_registro"] ?></td>
    <td class="celda"><?php echo $value["fecha"] ?></td>
    <td class="celda"><?php echo $value["descripcion"] ?></td>
    <td class="celda"><?php echo $value["nombre"] ?></td>
<?php } ?>
</tbody>    
</table>
</div>
</div>
