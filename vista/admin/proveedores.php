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
<h1> <b> Agenda de Proveedores</b></h1>
</div>
<?php 
    include_once '../../dao/listar_proveedores.php';
?>  
<div class="modal fade" id="modalproveedor" tabindex="-1"  aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Editar proveedor</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
          
 <div class="form-container">
 <form action="../../dao/add_editproveedor.php" method="POST" >
     
    <input type="hidden" value="2" name="opcion">

    <label for="nombre" class="label">ID: </label>
    <input type="text" name="id" class="form-control" readonly>

    <label for="nombre" class="label">Nombre: </label>
    <input type="text" name="nombre_proveedor" class="form-control">

    <label for="email" class="label">Apellido: </label>
    <input type="text" name="apellido" class="form-control">

    <label for="email" class="label">Telefono: </label>
    <input type="text" name="telefono"  class="form-control">

    <label for="email" class="label">Email: </label>
    <input type="text" name="correo"  class="form-control">

    <label for="categoria" class="label">Estado: </label>
    <select name="estado" id="proveedor_estado" class="form-select mb-3">
       <option value="1">Activo</option>
       <option value="0">Inactivo</option>
     </select>

      <button type="submit" class="btn secondariobtn">Guardar</button>
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
     $('#proveedor_table').DataTable({
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

    $('#proveedor_table').on('click','tr td .edit',function (){      

      var data=$(this).parent().parent().children();

      //get data
      var id=data[0].outerText;
      var nombre=data[1].outerText;
      var apellido=data[2].outerText;
      var telefono=data[3].outerText;
      var correo=data[4].outerText;
      var estado=data[5].outerText;

      //set data
      $("input[name='id']").val(id);
      $("input[name='nombre_proveedor']").val(nombre);
      $("input[name='apellido']").val(apellido);
      $("input[name='telefono']").val(telefono);
      $("input[name='correo']").val(correo);
      $("#proveedor_estado option:contains(" + estado + ")").attr('selected', 'selected').change();
    });
    
</script>
</body>
</html>