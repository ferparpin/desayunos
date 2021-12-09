<?php

require 'daousuario.php';


$usuario= new daousuario();
?>
</style>
<div class="contenedor">
        <div class="container-table">
<table id="usuario_table" class="table">
<thead >
    <th class="celda">id_usuario</th>
    <th class="celda">nombre</th>
    <th class="celda">Apellido</th>
    <th class="celda">Telefono</th>
    <th class="celda">Correo</th>
    <th class="celda">Residencia</th>
    <th class="celda">Rol</th>
    <th class="celda">Estado</th>
    <th class="celda">Opciones</th>
</thead>


<tbody>
<?php
foreach ($usuario->showAll() as $key => $value) {
?>  <tr>
    <td class="celda"><?php echo $value["id_usuario"] ?></td>
    <td class="celda"><?php echo $value["nombre"] ?></td>
    <td class="celda"><?php echo $value["apellido"] ?></td>
    <td class="celda"><?php echo $value["telefono"] ?></td>
    <td class="celda"><?php echo $value["correo"] ?></td>
    <td class="celda"><?php echo $value["residencia"] ?></td>
    <td class="celda"><?php if($value["rol"]==1){ 
                                echo "Administrador";
                            }else if($value["rol"]==2){
                                echo "Empleado";
                            } ?>
    </td>
    <td class="celda"><?php echo $value["estado"] ? "Activo" : "Inactivo" ?></td>
    <td><button type="button" class="primary-button btn edit" data-bs-toggle="modal" data-bs-target="#modalusuario">Editar</button>
    </td>
    
    </tr>
<?php } ?>
</tbody>    
</table>
</div>
</div>
