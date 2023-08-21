function updateTable() {
  $.ajax({
      url: "php/tiendaAdmin.php",
      method: "GET",
      dataType: "json",
      success: function (data) {
          let tableContent = "";

          // Recorre los datos recibidos y construye las filas de la tabla
          for (let i = 0; i < data.length; i++) {
              tableContent += "<tr>";
              tableContent += "<td>" + data[i].id + "</td>";
              tableContent += "<td>" + data[i].nombre + "</td>";
              tableContent += "<td>" + data[i].precio + "</td>";
              tableContent += "<td>" + data[i].categoria + "</td>";
              tableContent += "<td>Opciones</td>"; // Agrega opciones si es necesario
              tableContent += "</tr>";
          }

          // Actualiza el contenido de la tabla
          $("#tableBody").html(tableContent);
      },
      error: function (error) {
          console.log("Error:", error);
      }
  });
}

// Captura el envío del formulario y actualiza la tabla después de la inserción
$(document).ready(function () {
  $("#productForm").submit(function (event) {
      event.preventDefault();
      // Realiza la petición AJAX para insertar el producto
      $.ajax({
          url: "php/tiendaAdmin.php",
          method: "POST",
          data: new FormData(this),
          contentType: false,
          processData: false,
          success: function () {
              // Llama a la función para actualizar la tabla
              updateTable();
          },
          error: function (error) {
              console.log("Error:", error);
          }
      });
  });

  // Actualiza la tabla cuando la página carga
  updateTable();
});
