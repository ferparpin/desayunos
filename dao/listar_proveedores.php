<?php
    require 'daoproveedor.php';
    $proveedores= new Daoproveedor();
?>
<div>
<div >
<table id="proveedor_table" class="tabla1" >
<thead>
    <tr>
        <th class="celda">Id</th>
        <th class="celda">Nombre</th>
        <th class="celda">Apellido</th>
        <th class="celda">Telefono</th>
        <th class="celda">Correo</th>
        <th class="celda">Estado</th>
        <th class="celda">Opciones</th>

    </tr>
</thead>
<tbody >
    
<?php
foreach ($proveedores->showAll() as $key => $value) {
    
?>  <tr>
        <td class="celda"><?php echo $value["id_proveedor"] ?></td>
        <td class="celda"><?php echo $value["nombre"] ?></td>
        <td class="celda"><?php echo $value["apellido"] ?></td>
        <td class="celda"><?php echo $value["telefono"] ?></td>
        <td class="celda"><?php echo $value["correo"] ?></td>
        <td class="celda"><?php echo $value["estado"] ? "Activo" : "Inactivo" ?></td>
        <!-- <td><label class="switch">
        <input type="checkbox">
        <span class="slider"></span>
        </label></td> -->
        <td><button type="button" class="primary-button btn edit" data-bs-toggle="modal" data-bs-target="#modalproveedor">Editar</button>
    </td>
        </tr>
<?php } ?>
</tbody>    
</table>
</div>
</div>