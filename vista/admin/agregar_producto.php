<!DOCTYPE html>
<html lang="es">
<head>
<?php 
    include_once 'header.php';
?>
<link rel="stylesheet" href="../../css/form.css">
</head>
<body>
<?php 
    include_once 'barrasidevar.php';
?>  

<div class="contenedordiv">  
<div class="barrita"><h1><b>Agregar producto</b></h1></div>
<div class="form-container">
    <form action="../../dao/add_editproducto.php"  enctype="multipart/form-data" class="mt-1 pt-2 pe-5 ps-5 pb-3" method="post" style="z-index: 12;">
     
      <input type="hidden" name="opcion" value="1">
      <label for="nombre" class="label">Nombre: </label>
      <input type="text" name="nombre_producto" pattern="[A-Za-z ]" title="solo se aceptan letras" required class="form-control mb-1">

      <label for="precio" class="label">Precio: </label>
      <input type="text" name="precio" placeholder="" required class="form-control mb-1">

      <label for="descripcion" class="label">Descripcion: </label>
      <input type="text" name="descripcion" required placeholder="" required class="form-control mb-1">

      <label for="categoria" class="label">Categoria: </label>
      <select name="categoria" id="categoria_select" class="form-select mb-1"></select>
      
      <label for="imagen" class="label"> Imagen </label>
      <input type="file" name="imagen_producto" id="imagen" required class="form-control mb-3">

      <div class="text-center">
        <button type="submit" class="btn secondariobtn">Guardar</button>
      </div>
    </form>
 </div>  
</div>
  </div>
  <div class="imagenderecha" style="z-index: 5;"><img src="../../logos/tea.svg" class="imagenderecha" alt=""></div>

  <script src="../../Scripts/nav_bar.js"></script>
  <script>
    $(document).ready(function(){ 
      cargarcategorias();
     }); 
    function cargarcategorias() {
      $.ajax({
            type: 'POST',
            url: '../../dao/add_editcategoria.php',
            data: {
                'opcion': 3
            },
            success: function(filas){
              let categorias=JSON.parse(filas);
              categorias.forEach(elemento => {
                let opcion=document.createElement("option");
                opcion.text=elemento.nombre;
                opcion.value=elemento.id_categoria;
                $('#categoria_select')[0].add(opcion);
              });
             
            }
        });
    }
  </script>

</body>
</html>
        