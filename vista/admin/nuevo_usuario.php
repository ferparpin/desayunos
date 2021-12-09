<!DOCTYPE html>
<html lang="es">
<head>
<?php 
    include_once 'header.php';
?>
<link rel="stylesheet" href="../../css/formulario.css">
</head>
<body>
<?php 
    include_once 'barrasidevar.php';
?>  

<div class="contenedordiv">  
<div class="barrita"><h1><b>Agregar Usuarios</b></h1></div>
<div class="form-container">
    <form action="../dao/add_editusuario.php" method="POST" >
     
      <input type="hidden" name="opcion" value="1">

      <label for="nombre" class="label">Nombre: </label>
      <input type="text" name="nombre_usuario"class="form-control">

      <label for="email" class="label">Apellido: </label>
      <input type="text" name="apellido"  class="form-control">

      <label for="email" class="label">Telefono: </label>
      <input type="text" name="telefono"  class="form-control">

      <label for="email" class="label">Email: </label>
      <input type="text" name="correo"  class="form-control">

      <label for="email" class="label">Residencia: </label>
      <input type="text" name="residencia"  class="form-control">

      <label for="email" class="label">Rol: </label>
      <select name="rol" class="form-select mb-3">
        <option value="1">Administrador</option>
        <option value="2">Empleado</option>
      </select>

      <button type="submit" class="btn secondariobtn">Guardar</button>

    </form>
 </div>  
</div>
  </div>
  <div  class="imagenderecha"><img src="../../logos/adduser.svg" class="imagenderecha" alt=""></div>
        


<script src="../../Scripts/nav_bar.js">
</script>


</body>
</html>