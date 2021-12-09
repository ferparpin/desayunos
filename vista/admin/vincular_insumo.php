<!DOCTYPE html>
<html lang="es">
  <head>
    <?php 
        include_once 'header.php';
    ?>
    <link rel="stylesheet" href="../../css/datable.css" />
  </head>
  <body>
    <?php 
        include_once 'barrasidevar.php';
    ?>
    <div class="title">
      <h1><b> Vincular productos</b></h1>
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
              <h5 class="modal-title">Vincular producto a insumo</h5>
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
                  >Seleccione un producto
                </label>
                <select
                  id="select_producto_vincular"
                  class="form-select mb-3"
                ></select>
                <label for="nombre" class="label">Seleccione un insumo </label>
                <select
                  id="select_insumo_vincular"
                  class="form-select mb-3"
                ></select>
                <label for="nombre" class="label">Digite la cantidad </label>
                <input
                  type="number"
                  id="cantidad_vincular"
                  class="form-control"
                />
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
      <!-- Modal -->
      <div class="modal fade" id="editar" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Actualizar</h5>
              <button
                type="button"
                class="btn-close"
                data-bs-dismiss="modal"
                aria-label="Close"
              ></button>
            </div>
            <div class="modal-body">
              <div>
                <label for="nombre" class="label">Producto </label>
                <input
                  id="edit_producto_vincular"
                  class="form-control mb-3"
                  readonly
                />
                <label for="nombre" class="label">Insumo </label>
                <input
                  id="edit_insumo_vincular"
                  class="form-control mb-3"
                  readonly
                />
                <label for="nombre" class="label">Digite la cantidad </label>
                <input type="number" id="cantidad_edit" class="form-control" />
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
              <button
                type="button"
                onclick="actualizar()"
                class="btn btn-primary"
              >
                Guardar
              </button>
            </div>
          </div>
        </div>
      </div>
      <div class="text-center">
        <label for="nombre" class="label">Seleccione un producto </label>
        <div class="mb-4">
          <select
            name="producto"
            id="select_producto"
            class="form-select m-auto"
            style="width: 20%"
          >
            <option value="-1">Seleccionar</option>
          </select>
        </div>
      </div>

      <div class="container-table">
        <table id="producto_insumo_table" class="tabla1">
          <thead>
            <th class="celda">ID</th>
            <th class="celda">Nombre</th>
            <th class="celda">Cantidad</th>
            <th class="celda">Opcion</th>
          </thead>
          <tbody></tbody>
        </table>
      </div>
    </div>

    <script src="../../Scripts/nav_bar.js"></script>

    <script>
      $(document).ready(function () {
        cargarproductos();
        cargarinsumos();
        $("#producto_insumo_table").DataTable({
          responsive: true,
          language: {
            decimal: "",
            emptyTable: "Seleccione un producto",
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
              let opcion2 = document.createElement("option");
              opcion.text = elemento.nombre;
              opcion.value = elemento.id_producto;
              opcion2.text = elemento.nombre;
              opcion2.value = elemento.id_producto;
              $("#select_producto_vincular")[0].add(opcion);
              $("#select_producto")[0].add(opcion2);
            });
          },
        });
      }
      function cargarinsumos() {
        $.ajax({
          type: "POST",
          url: "../../dao/add_editinsumos.php",
          data: {
            opcion: 3,
          },
          success: function (filas) {
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
          url: "../../dao/add_editproducto.php",
          data: {
            opcion: 5,
            producto: id,
            insumo: insumo,
          },
          success: function (data) {
            if (data > 0) {
              if ($.fn.DataTable.isDataTable("#producto_insumo_table")) {
                $("#producto_insumo_table").dataTable().fnClearTable();
              }
            }
          },
        });
      }

      function cargarinsumosproductos(id) {
        if ($.fn.DataTable.isDataTable("#producto_insumo_table")) {
          $("#producto_insumo_table").dataTable().fnClearTable();
          $("#producto_insumo_table").DataTable().destroy();
        }
        $("#producto_insumo_table").DataTable({
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
            url: "../../dao/add_editproducto.php",
            data: {
              opcion: 4,
              producto: id,
            },
          },
          columns: [
            { data: "codigo" },
            { data: "nombre" },
            { data: "cantidad" },
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
                  ')" class="primary-button btn edit" >Desvicular</button> <button type="button" onclick="editar(' +
                  item.codigo +
                  "," +
                  item.id +
                  "," +
                  item.cantidad +
                  ",'" +
                  item.nombre +
                  '\')" class="primary-button btn edit" data-bs-toggle="modal" data-bs-target="#editar">Editar</button>'
                );
              },
            },
          ],
        });
      }
      $("#select_producto").on("change", function () {
        cargarinsumosproductos(this.value);
      });

      $("#guardar").on("click", function () {
        var producto = $("#select_producto_vincular").val();
        var insumo = $("#select_insumo_vincular").val();
        var cantidad = $("#cantidad_vincular").val();
        var producto_actual = $("#select_producto").val();
        $.ajax({
          type: "POST",
          url: "../../dao/add_editproducto.php",
          data: {
            opcion: 6,
            producto: producto,
            insumo: insumo,
            cantidad: cantidad,
          },
          success: function (data) {
            console.log(data);
            if (data > 0) {
              if ($.fn.DataTable.isDataTable("#producto_insumo_table")) {
                $("#producto_insumo_table").dataTable().fnClearTable();
              }
            } else if (producto_actual === producto) {
              $("#vincular").modal("hide");
              cargarinsumosproductos(producto_actual);
            }
          },
        });
      });

      function editar(insumo, producto, cantidad, nombre) {
        $("#edit_producto_vincular").attr("name", producto);
        $("#edit_producto_vincular").val(
          $("#select_producto option:selected").text()
        );
        $("#edit_insumo_vincular").attr("name", insumo);
        $("#edit_insumo_vincular").val(nombre);
        $("#cantidad_edit").val(cantidad);
      }

      function actualizar() {
        var id = $("#edit_producto_vincular").attr("name");
        var insumo = $("#edit_insumo_vincular").attr("name");
        var cantidad = $("#cantidad_edit").val();
        $.ajax({
          type: "POST",
          url: "../../dao/add_editproducto.php",
          data: {
            opcion: 7,
            producto: id,
            insumo: insumo,
            cantidad: parseInt(cantidad),
          },
          success: function (data) {
            if (data > 0) {
              if ($.fn.DataTable.isDataTable("#producto_insumo_table")) {
                $("#producto_insumo_table").dataTable().fnClearTable();
              }
              cargarinsumosproductos(id);
              $("#editar").modal("hide");
            }else {
              $('#editar').modal("hide");
            }
          }
        });
      }

    </script>
  </body>
</html>
