<?php

require 'daocliente.php';


$cliente= new daocliente();
?>
</style>
<div class="contenedor">
        <div class="container-table">
<table class="table">
<thead class="row header">
    <th class="celda">id_cliente</th>
    <th class="celda">nombre</th>
    <th class="celda">Apellido</th>
    <th class="celda">Telefono</th>
    <td class="celda">Correo</td>
    <td class="celda">direccion</td>

</thead>


<tbody class="row">
<?php foreach ($cliente->showAll() as $key => $value) {
?>  
    <td class="celda"><?php echo $value["id_cliente"] ?></td>
    <td class="celda"><?php echo $value["nombre"] ?></td>
    <td class="celda"><?php echo $value["apellido"] ?></td>
    <td class="celda"><?php echo $value["telefono"] ?></td>
    <td class="celda"><?php echo $value["correo"] ?></td>
    <td class="celda"><?php echo $value["direccion"] ?></td>
<?php } ?>
</tbody>    
</table>
</div>
</div>

