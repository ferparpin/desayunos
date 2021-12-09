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
<div class="barrita"><h1><b>Agregar Insumo</b></h1></div>
<div class="form-container">
    <form action="../../dao/add_editinsumos.php" class="mt-1 pt-2 pe-5 ps-5 pb-3" method="post" style="z-index: 12;">
     
      <input type="hidden" name="opcion" value="1">
      <label for="nombre" class="label">Nombre: </label>
      <input type="text" name="nombre" class="form-control mb-1">

      <label for="precio" class="label">Precio: </label>
      <input type="number" name="precio" class="form-control mb-1">

      <label for="descripcion" class="label">Descripcion: </label>
      <input type="text" name="descripcion" class="form-control mb-1">

      <label for="stock" class="label">Cantidad inicial: </label>
      <input type="number" name="stock" class="input form-control mb-1">

      <label for="unidad"> Unidad de medida</label>
      <select name="unidad" class="form-select mb-2">
        <option value="1">Kg</option>
        <option value="2">g</option>
        <option value="3">Lt</option>
        <option value="4">Ml</option>
        <option value="5">Unidad</option>
      </select>

      <div class="text-center">
        <button type="submit" class="btn secondariobtn">Guardar</button>
      </div>
    </form>
 </div>  
</div>
  </div>
  <div class="imagenderecha" style="z-index: 5;"><img src="../../logos/tea.svg" class="imagenderecha" alt=""></div>

  <script src="../../Scripts/nav_bar.js"></script>

</body>
</html>
        