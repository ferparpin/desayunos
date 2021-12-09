<!DOCTYPE html>
<html lang="es">
<head>
<?php 
    include_once 'header.php';
?>
 <link rel="stylesheet" href="../../css/datable.css"> 
<!-- <link rel="stylesheet" href="../css/forms.css"> -->
</head>
<body>
<?php 
    include_once 'barrasidevar.php';
?>  
<!-- Button trigger modal -->
<button type="button" class="btn secondarybtn" data-bs-toggle="modal" data-bs-target="#addModal"><b>Agregar categoria</b>
</button>
<div class="title"><h1><b>Categoria</b></h1></div>
<?php 
    include_once '../../dao/listar_categoria.php';
?> 


<!-- Modal -->
<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">      
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agregar categoria</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>

      <div class="modal-body">
      <div class="form-container">
     <form>
      <label for="nombre" class="label">Nombre: </label>
      <input type="text" id="nombre" placeholder="" class="form-control">
    </form>
 </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn closebtn" data-bs-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" id="addCategoria">Guardar</button>
      </div>
    </div>
  </div>
</div>
<!-- Modal -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">      
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agregar categoria</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

      <div class="modal-body">
      <div class="form-container">
     <form  class="form">
      <label for="nombre" class="label">Nombre: </label>
      <input type="text" id="nombre_categoria" placeholder="" class="form-control">
    </form>
 </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn closebtn" data-bs-dismiss="modal">Cerrar</button>
        <button type="button" id="editCategoria" class="btn secondarybtn">Guardar</button>
      </div>
    </div>
  </div>
</div>
<script src="../../Scripts/nav_bar.js">
</script>

<script>
    $(document).ready(function() {
     $('#categoria_table').DataTable({
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
    $('#addCategoria').on('click',function() {
      let nombre=$('#nombre').val();
      if(nombre){
      $.ajax({
            type: 'POST',
            url: '../../dao/add_editcategoria.php',
            data: { 
                'nombre': nombre, 
                'opcion': 1
            },
            success: function(filas){
                if(filas > 0){
                  window.location.reload(); 
                }
            }
        });
      }
    });
    function edit(id,nombre) {
      $('#nombre_categoria').val(nombre);
      $('#editModal').modal('show');
      $("#editCategoria").unbind('click');
      $('#editCategoria').on('click',function() {
      let nombre=$('#nombre_categoria').val();
      $.ajax({
            type: 'POST',
            url: '../../dao/add_editcategoria.php',
            data: { 
                'id': id,
                'nombre': nombre, 
                'opcion': 2
            },
            success: function(filas){
                if(filas > 0){
                  window.location.reload(); 
                }
            }
        });
      
    });

    }
    
</script>
</body>
</html>