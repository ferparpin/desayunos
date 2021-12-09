<!DOCTYPE html>
<html lang="es">
  <head>
    <?php 
        include_once 'header.php';
    ?>
    <link rel="stylesheet" href="../css/datable.css" />
  </head>
  <body>
    <?php 
        include_once 'barrasidevar.php';
    ?>
    <div class="title">
      <h1><b> Vincular provedor</b></h1>
    </div>

    <div class="contenedor">
      <div class="text-end">
        <button
          class="btn btn-warning mr-4 mb-3"
          style="margin-right: 127px"
          data-bs-toggle="modal"
          data-bs-target="#vincular"
        >
          Vincular insumo
        </button>
      </div>
      <!-- Modal -->
      <div class="modal fade" id="vincular" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Vincular proveedor a insumo</h5>
              <button
                type="button"
                class="btn-close"
                data-bs-dismiss="modal"
                aria-label="Close"
              ></button>
            </div>
            <div class="modal-body">
              <div>
                <label for="nombre" class="label"
                  >Seleccione un proveedor
                </label>
                <select
                  id="select_proveedor_vincular"
                  class="form-select mb-3"
                ></select>
                <label for="nombre" class="label">Seleccione un insumo </label>
                <select
                  id="select_insumo_vincular"
                  class="form-select mb-3"
                ></select>
              </div>
            </div>
            <div class="modal-footer">
              <button
                type="button"
                class="btn btn-secondary"
                data-bs-dismiss="modal"
              >
                Salir
              </button>
              <button type="button" id="guardar" class="btn btn-primary">
                Guardar
              </button>
            </div>
          </div>
        </div>
      </div>
      <div class="text-center">
        <label for="nombre" class="label">Seleccione un proveedor </label>
        <div class="mb-4">
          <select
            name="proveedor"
            id="select_proveedor"
            class="form-select m-auto"
            style="width: 20%"
          >
            <option value="-1">Seleccionar</option>
          </select>
        </div>
      </div>

      <div class="container-table">
        <table id="proveedor_insumo_table" class="tabla1">
          <thead>
            <th class="celda">ID</th>
            <th class="celda">Nombre</th>
            <th class="celda">Opcion</th>
          </thead>
          <tbody></tbody>
        </table>
      </div>
    </div>

    <script src="../Scripts/nav_bar.js"></script>

    <script>
      $(document).ready(function () {
        cargarproveedores();
        cargarinsumos();
        $("#proveedor_insumo_table").DataTable({
          responsive: true,
          language: {
            decimal: "",
            emptyTable: "Seleccione un proveedor",
            info: "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
            infoEmpty: "Mostrando 0 to 0 of 0 Entradas",
            search: "Buscar:",
            lengthMenu: "Mostrar _MENU_ Entradas",
            paginate: {
              first: "Primero",
              last: "Ultimo",
              next: "Siguiente",
              previous: "Anterior",
            },
          },
        });
      });

      function cargarproveedores() {
        $.ajax({
          type: "POST",
          url: "../dao/add_editproveedor.php",
          data: {
            opcion: 3,
          },
          success: function (filas) {
            let proveedores = JSON.parse(filas);
            proveedores.forEach((elemento) => {
              let opcion = document.createElement("option");
              let opcion2 = document.createElement("option");
              opcion.text = elemento.nombre;
              opcion.value = elemento.id_proveedor;
              opcion2.text = elemento.nombre;
              opcion2.value = elemento.id_proveedor;
              $("#select_proveedor_vincular")[0].add(opcion);
              $("#select_proveedor")[0].add(opcion2);
            });
          },
        });
      }
      function cargarinsumos() {
        $.ajax({
          type: "POST",
          url: "../dao/add_editinsumos.php",
          data: {
            opcion: 3,
          },
          success: function (filas) {
            console.log(filas);
            let categorias = JSON.parse(filas);
            categorias.forEach((elemento) => {
              let opcion = document.createElement("option");
              opcion.text = elemento.nombre;
              opcion.value = elemento.id_insumo;
              $("#select_insumo_vincular")[0].add(opcion);
            });
          },
        });
      }

      function desvincular(insumo, id) {
        $.ajax({
          type: "POST",
          url: "../dao/add_editproveedor.php",
          data: {
            opcion: 5,
            proveedor: id,
            insumo: insumo,
          },
          success: function (data) {
            if (data > 0) {
              if ($.fn.DataTable.isDataTable("#proveedor_insumo_table")) {
                $("#proveedor_insumo_table").dataTable().fnClearTable();
              }
            }
          },
        });
      }

      function cargarinsumosproveedores(id) {
        if ($.fn.DataTable.isDataTable("#proveedor_insumo_table")) {
          $("#proveedor_insumo_table").dataTable().fnClearTable();
          $("#proveedor_insumo_table").DataTable().destroy();
        }
        $("#proveedor_insumo_table").DataTable({
          responsive: true,
          language: {
            decimal: "",
            emptyTable: "No hay insumos vinculados",
            info: "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
            infoEmpty: "Mostrando 0 to 0 of 0 Entradas",
            infoFiltered: "(Filtrado de _MAX_ total entradas)",
            infoPostFix: "",
            thousands: ",",
            lengthMenu: "Mostrar _MENU_ Entradas",
            loadingRecords: "Cargando...",
            processing: "Procesando...",
            search: "Buscar:",
            zeroRecords: "Sin resultados encontrados",
            paginate: {
              first: "Primero",
              last: "Ultimo",
              next: "Siguiente",
              previous: "Anterior",
            },
          },
          ajax: {
            method: "POST",
            url: "../dao/add_editproveedor.php",
            data: {
              opcion: 4,
              proveedor: id,
            },
          },
          columns: [
            { data: "codigo" },
            { data: "nombre" },
            {
              data: null,
              title: "Opción",
              wrap: true,
              render: function (item) {
                return (
                  ' <button type="button" onclick="desvincular(' +
                  item.codigo +
                  "," +
                  item.id +
                  ')" class="primary-button btn edit" >Desvicular</button>'
                );
              },
            },
          ],
        });
      }
      $("#select_proveedor").on("change", function () {
        cargarinsumosproveedores(this.value);
      });

      $("#guardar").on("click", function () {
        var proveedor = $("#select_proveedor_vincular").val();
        var insumo = $("#select_insumo_vincular").val();
        var proveedor_actual = $("#select_proveedor").val();
        $.ajax({
          type: "POST",
          url: "../dao/add_editproveedor.php",
          data: {
            opcion: 6,
            proveedor: proveedor,
            insumo: insumo,
          },
          success: function (data) {
            if (data > 0) {
              if ($.fn.DataTable.isDataTable("#proveedor_insumo_table")) {
                $("#proveedor_insumo_table").dataTable().fnClearTable();
              }
            } else if (proveedor_actual === proveedor) {
              $("#vincular").modal("hide");
              cargarinsumosproveedores(proveedor_actual);
            }
          },
        });
      });
    </script>
  </body>
</html>
