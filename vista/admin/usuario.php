<!DOCTYPE html>
<html lang="es">
<head>
<?php 
    include_once 'header.php';
?>
<link rel="stylesheet" href="../../css/datable.css">
</head>
<body>
<?php 
    include_once 'barrasidevar.php';
?>  
<div class="title">
<h1> <b> Usuarios del sistema</b></h1>
</div>
<?php 
    include_once '../../dao/listar_usuario.php';
?>  
<div class="modal fade" id="modalusuario" tabindex="-1"  aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalusuario">Editar usuario</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
          
 <div class="form-container">
    <form action="../../dao/add_editusuario.php" method="POST" class="form">
      
      <input type="hidden" name="opcion" value="2">

      <label for="nombre" class="label">ID: </label>
      <input type="text" name="id" placeholder="" class="form-control" readonly>

      <label for="nombre" class="label">Nombre: </label>
      <input type="text" name="nombre_usuario" placeholder=""class="form-control">

      <label for="email" class="label">Apellido: </label>
      <input type="text" name="apellido" placeholder="" class="form-control">

      <label for="email" class="label">Telefono: </label>
      <input type="text" name="telefono" placeholder="" class="form-control">

      <label for="email" class="label">Correo: </label>
      <input type="text" name="correo" placeholder="" class="form-control">

      <label for="email" class="label">Residencia: </label>
      <input type="text" name="residencia" placeholder="" class="form-control">

      <label class="label">Rol: </label>
      <select name="rol" id="usuario_select" class="form-select mb-1">
        <option value="1">Administrador</option>
        <option value="2">Empleado</option>
      </select>

      <label for="categoria" class="label">Estado: </label>
      <select name="estado" id="usuario_rol" class="form-select mb-1">
        <option value="1">Activo</option>
        <option value="0">Inactivo</option>
      </select>

      <button type="submit" class="btn secondarybtn">Guardar cambios</button>
    </form>
 </div>
      <div class="modal-footer">
        <button type="button" class="btn closebtn" data-bs-dismiss="modal">Cerrar</button>
        
      </div>
    </div>
  </div>
</div>
<script src="../../Scripts/nav_bar.js">
</script>

<script>
    $(document).ready(function() {
     $('#usuario_table').DataTable({
    responsive: true,
    language: {
        "decimal": "",
        "emptyTable": "No hay información",
        "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
        "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
        "infoFiltered": "(Filtrado de _MAX_ total entradas)",
        "infoPostFix": "",
        "thousands": ",",
        "lengthMenu": "Mostrar _MENU_ Entradas",
        "loadingRecords": "Cargando...",
        "processing": "Procesando...",
        "search": "Buscar:",
        "zeroRecords": "Sin resultados encontrados",
        "paginate": {
            "first": "Primero",
            "last": "Ultimo",
            "next": "Siguiente",
            "previous": "Anterior"
        }
    },
    });
    });
    $('#usuario_table').on('click','tr td .edit',function (){      

      var data=$(this).parent().parent().children();

      //get data
      var id=data[0].outerText;
      var nombre=data[1].outerText;
      var apellido=data[2].outerText;
      var telefono=data[3].outerText;
      var correo=data[4].outerText;
      var residencia=data[5].outerText;
      var rol=data[6].outerText;
      var estado=data[7].outerText;

      //set data
      $("input[name='id']").val(id);
      $("input[name='nombre_usuario']").val(nombre);
      $("input[name='apellido']").val(apellido);
      $("input[name='telefono']").val(telefono);
      $("input[name='correo']").val(correo);
      $("input[name='residencia']").val(residencia);
      $("#usuario_select option:contains(" + rol + ")").attr('selected', 'selected').change();
      $("#usuario_rol option:contains(" + estado + ")").attr('selected', 'selected').change();
    });
    
</script>
</body>
</html>