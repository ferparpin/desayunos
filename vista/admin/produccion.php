<!DOCTYPE html>
<html lang="es">
  <head>
    <?php 
        include_once 'header.php';
    ?>
    <link rel="stylesheet" href="../../css/formulario.css" />
  </head>
  <body>
    <?php 
        include_once 'barrasidevar.php';
    ?>
    <div class="contenedordiv" style="margin-top: 20vh">
      <div class="barrita">
        <h1><b>Agregar Producción</b></h1>
      </div>
      <div class="form-container" style="height: 210px">
        <form>
          <label for="nombre" class="label">Seleccione un producto </label>
          <select id="select_producto" class="form-select mb-3"></select>
          <label for="nombre" class="label">Digite la cantidad </label>
          <input id="cantidad" type="number" min="0" class="form-control" />
          <div class="text-center">
            <button type="button" id="guardar" class="btn secondariobtn mt-2">
              Guardar
            </button>
          </div>
        </form>
      </div>
    </div>
    <div
      id="alert"
      style="width: 50%; position: absolute; top: 38px; right: 0"
      role="alert"
    >
      <p id="mensaje"></p>
    </div>

    <div class="imagenderecha">
      <img src="../../logos/adduser.svg" class="imagenderecha" alt="" />
    </div>

    <script src="../../Scripts/nav_bar.js"></script>

    <script>
      $(document).ready(function () {
        cargarproductos();
        $("#alert").hide();
        $("#guardar").on("click", function () {
          guardar();
        });
      });
      function cargarproductos() {
        $.ajax({
          type: "POST",
          url: "../../dao/add_editproducto.php",
          data: {
            opcion: 3,
          },
          success: function (filas) {
            console.log(filas);
            let productos = JSON.parse(filas);
            productos.forEach((elemento) => {
              let opcion = document.createElement("option");
              opcion.text = elemento.nombre;
              opcion.value = elemento.id_producto;
              $("#select_producto")[0].add(opcion);
            });
          },
        });
      }
      function guardar() {
        var producto = $("#select_producto").val();
        var cantidad = $("#cantidad").val();
        var expresion= new RegExp('^[0-9]');
        if (producto != "" && cantidad != "" && expresion.test(cantidad)) {
          $.ajax({
            type: "POST",
            url: "../../dao/add_editproducto.php",
            data: {
              opcion: 8,
              producto: producto,
              cantidad: cantidad,
            },
            success: function (filas) {
              let productos = JSON.parse(filas);

              let message = "";
              var clase = "";
              if (productos.length > 0) {
                message =
                  message +
                  "No se pudo agregar la produccion por que faltan los siguientes insumos : ";
                productos.forEach((elemento) => {
                  message =
                    message +
                    elemento[0] +
                    " (cantidad faltante : " +
                    elemento[1] +
                    ") , ";
                  $("#alert").addClass("alert alert-danger");
                  $("#alert").show();
                  setTimeout(function () {
                    $("#alert").hide();
                  }, 100000);
                  $("#mensaje").text(message);
                });
              } else {
                message = "Produccion agregada exitosamente";
                $("#alert").addClass("alert alert-info");
                $("#alert").show();
              }
              console.log(message);
            },
          });
        }
      }
    </script>
  </body>
</html>
