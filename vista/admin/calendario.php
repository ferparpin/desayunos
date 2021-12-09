<!DOCTYPE html>
<html lang="es">
  <head>
    <?php 
      include_once 'header.php';
    ?>
    <link rel="stylesheet" href="../../css/formulario.css" />
    <link rel="stylesheet" type="text/css" href="../../css/fullcalendar.css" />
    <script type="text/javascript" src="../../js/moment.min.js"></script>
    <script type="text/javascript" src="../../js/fullcalendar.min.js"></script>
    <script type="text/javascript" src="../../js/locale/es.js"></script>
  </head>
  <body>
    <?php 
      include_once 'barrasidevar.php';
  ?>
    <!-- Modal -->
    <div class="modal fade" id="infoModal">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-body">
            <div class="text-center">
              <h4 id="title"></h4>
            </div>
            <label id="description" class="mt-2 mb-3"></label>
            <label id="fecha" class="mt-2 mb-3"></label>
            <div class="text-end">
              <button
                type="button"
                class="btn btn-secondary"
                data-bs-dismiss="modal"
              >
                Cerrar
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="contenedordiv">
      <h2>Calendario de eventos</h2>
      <div id="calendar" style="margin-top: 20px; padding: 0 60px"></div>
    </div>

    <script src="../../Scripts/nav_bar.js"></script>
    <script>
      var hoy = new Date();

      $(document).ready(function () {
        getevents();
      });
      function getevents() {
        $.ajax({
          type: "POST",
          url: "../../dao/listarpedidos.php",
          data: {},
          success: function (filas) {
            let pedidos = JSON.parse(filas);
            let pedido = [];
            pedidos.forEach((elemento) => {
              pedido.push({
                title:
                  "Pedido de " +
                  elemento["nombre"] +
                  " " +
                  elemento["apellido"],
                start: elemento["fecha_de_entrega"],
                description:
                  "Productos solicitados : <br>" + elemento["productos"],
                color: "#3A87AD",
                textColor: "#ffffff",
              });
            });
            $("#calendar").fullCalendar({
              header: {
                left: "prev,next",
                center: "title",
                right: "month,agendaWeek",
              },
              defaultDate: hoy,
              buttonIcons: true,
              weekNumbers: false,
              editable: false,
              eventLimit: true,
              events: pedido,
              dayClick: function (date, jsEvent, view) {},
              eventClick: function (calEvent, jsEvent, view) {
                $("#title").text(calEvent.title);
                $("#description").html(calEvent.description);
                $("#fecha").text(
                  "Fecha de entrega : " +
                    moment(calEvent.start).format("DD MMM YYYY")
                );
                $("#infoModal").modal("show");
              },
            });
          },
        });
      }
    </script>
  </body>
</html>
