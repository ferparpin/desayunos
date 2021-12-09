<div id="mySidenav" class="sidenav">
<div><img src="../../logos/logoadmi.svg" alt="" class="logoadmi"></div>
<a class="closebtn" onclick="cerrar()">&times;</a>
<?php
$isAdmin=$_SESSION["user"]["rol"]==1 ? true : false;
?>
<ul >
<a href="#">
    <img src="../../icons/producto.png" alt="" class="img-side-nav">
     <span class="span_secciones">Producto</span>
  </a>
  <li><i class="fas fa-plus-circle"></i><a href="categoria.php">Categoria</a></li>
  <li><i class="fas fa-plus-circle"></i><a href="agregar_producto.php">Agregar</a></li>
  <li><i class="far fa-edit"></i><a href="producto.php">Editar</a></li>

</ul>
<ul class="lin">
<a href="#">
  <img src="../../icons/pedido.png" class="img-side-nav">
   <span class="span_secciones">Pedidos</span>
 </a> 
 <li><i class="far fa-eye"></i><a href="pedido.php">visualizar</a></li>
</ul>
<ul >
  <a href="#">
      <img src="../../icons/producto.png" alt="" class="img-side-nav">
       <span class="span_secciones">Insumos</span>
    </a>
    <li><i class="fas fa-plus-circle"></i><a href="agregar_insumo.php">Agregar</a></li>
    <li><i class="far fa-edit"></i><a href="insumo.php">Editar</a></li>
    <li><i class="fas fa-plus-circle"></i><a href="vincular_proveedor.php">Vincular proveedor</a></li>
  </ul>
<?php if($isAdmin){ ?>
<ul class="lin">
  <a href="#">
    <img src="../../icons/trabajo-en-equipo.png" class="img-side-nav">
     <span class="span_secciones">usuario</span>
  </a>
  
  <li><i class="fas fa-plus-circle"></i><a href="nuevo_usuario.php">Agregar</a></li>
  <li><i class="far fa-edit"></i><a href="usuario.php">ver/editar</a></li>
</ul>
<?php } ?>
<ul class="lin">
  <a href="#">
    <img src="../../icons/mensajero.png" class="img-side-nav">
     <span class="span_secciones">Proveedores</span>
  </a>
  <li><i class="fas fa-plus-circle"></i><a href="nuevo_proveedor.php">Agregar</a></li>
  <li><i class="far fa-eye"></i><a href="proveedores.php">visualizar</a></li>
  <li><i class="far fa-edit"></i><span>Modificar</span></li>
</ul>
<ul class="lin">
  <a href="#">
    <img src="../../icons/calendario.png" class="img-side-nav">
     <span class="span_secciones">calendario</span>
  </a>
  <li><i class="far fa-calendar-plus"></i><span>Eventos</span></li>
</ul>
<ul class="lin">
<a href="#">
  <img src="../../icons/inventario.png" class="img-side-nav">
   <span class="span_secciones">inventarios</span>
 </a> 
 <li><a href="produccion.php"><i class="fas fa-plus-circle"></i><span>Agregar</span></a></li>
 <li><i class="far fa-eye"></i><span>vizualizar</span></li>
</ul>
<ul class="lin">
    <a href="#">
      <img src="../../icons/ajustes.png" class="img-side-nav">
       <span class="span_secciones">Configuraciones</span>
    </a>
    <li><i class="fas fa-book-reader"></i><span>Registro de acciones</span></li>
    <li><a href="../../dao/logout.php"><span>Cerrar sesión</span></a></li>
  </ul>
</div>
<span class="Menu" onclick="abrir()">&#9776; </span>

   
