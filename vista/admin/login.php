<!DOCTYPE html>
<html lang="es">
<head>
<?php

session_start();
if(isset($_SESSION["user"])){
header("Location:./calendario.php");
}

?>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;500;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="../../css/loginestilos.css">
  <title>Inicio de sesión </title>
</head>
<body>
  <div class="login">
    <div class="form-container">
      <img src="../../logos/logoprincipal.svg" class="logo">

      <form action="../../dao/login.php" method="post" class="form">
        <label for="email" class="label">Correo</label>
        <input type="text" name="correo" placeholder="Example@gmail.com" class="input input-email">

        <label for="Password" class="label">Contraseña</label>
        <input type="password" name="clave" placeholder="*********" class="input input-password">

        <input type="submit" value="ingresar" class="primary-button login-button">
        <a href="contraseña.html">¿Olvidó su contraseña?</a>      
    </form>

<button class="secondary-button">Registrate</button>
    
    </div>
  </div>
</body>
</html>