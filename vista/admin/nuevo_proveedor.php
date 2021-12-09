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
<div class="barrita"><h1><b>Agregar proveedor</b></h1></div>
<div class="form-container">
    <form action="../../dao/add_editproveedor.php" method="POST" >

      <input type="hidden" name="opcion" value="1">     
      <label for="nombre" class="label">Nombre: </label>
      <input type="text" name="nombre_proveedor" placeholder="" class="form-control">

      <label for="email" class="label">Apellido: </label>
      <input type="text" name="apellido" placeholder="" class="form-control">

      <label for="email" class="label">Telefono: </label>
      <input type="text" name="telefono" placeholder="" class="form-control">

      <label for="email" class="label">Email: </label>
      <input type="text" name="correo" placeholder="" class="form-control">

      <button type="submit" class="btn secondariobtn">Guardar</button>

    </form>
 </div>  
</div>
  </div>
  <div  class="imagenderecha"><img src="../../logos/undraw_deliveries_-131-a.svg" class="imagenderecha" alt=""></div>
        


<script src="../../Scripts/nav_bar.js">
</script>


</body>
</html>