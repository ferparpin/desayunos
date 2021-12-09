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
<h1> <b>Insumos</b></h1>
</div>
<?php 
    include_once '../../dao/listar_insumo.php';
?>  
<div class="modal fade" id="modalinsumo" tabindex="-1"  aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Editar Insumo</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
              
    <form action="../../dao/add_editinsumos.php"  enctype="multipart/form-data" class="mt-1 pt-2 pe-5 ps-5 pb-3" method="post" style="z-index: 12;">
     
      <input type="hidden" name="opcion" value="2">

      <label for="nombre" class="label">ID: </label>
      <input type="text" name="id" class="form-control mb-1" readonly>

      <label for="nombre" class="label">Nombre: </label>
      <input type="text" name="nombre" class="form-control mb-1">

      <label for="precio" class="label">Precio: </label>
      <input type="text" name="precio" placeholder="" class="form-control mb-1">

      <label for="descripcion" class="label">Descripcion: </label>
      <input type="text" name="descripcion" placeholder="" class="form-control mb-1">

      <label for="stock" class="label">Cantidad inicial: </label>
      <input type="text" name="stock" placeholder="" class="input form-control mb-1">


      <label for="categoria" class="label">Estado: </label>
      <select name="estado" id="estado_select" class="form-select mb-1">
        <option value="1">Activo</option>
        <option value="0">Inactivo</option>
      </select>

      <div class="text-center">
        <button type="submit" class="btn secondariobtn">Guardar</button>
      </div>
    </form>
    </form>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<script src="../../Scripts/nav_bar.js">
</script>

<script>
    $(document).ready(function() {
     $('#insumo_table').DataTable({
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

    
    $('#insumo_table').on('click','tr td .edit',function (){      

      var data=$(this).parent().parent().children();

      //get data
      var id=data[0].outerText;
      var nombre=data[1].outerText;
      var precio=data[2].outerText;
      var descripcion=data[3].outerText;
      var estado=data[4].outerText;
      console.log(estado);
      var stock=data[5].outerText;

      //set data
      $("input[name='id']").val(id);
      $("input[name='nombre']").val(nombre);
      $("input[name='precio']").val(precio);
      $("input[name='descripcion']").val(descripcion);
      $("input[name='stock']").val(stock);
      $("#estado_select option:contains(" + estado + ")").attr('selected', 'selected').change();

    });
</script>
</body>
</html>