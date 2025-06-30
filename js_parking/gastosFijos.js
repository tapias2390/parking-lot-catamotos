$(document).ready(function () {
  // Cargar tabla solo una vez al inicio
  cargarGastos();

  // Evento al enviar el formulario de filtro
  $("#formFiltroFechas").on("submit", function (e) {
    e.preventDefault();
    cargarGastos();
  });
});

// Función para consultar entre fechas
function cargarGastos() {
  const fecha_inicio = $("#fecha_inicio").val();
  const fecha_fin = $("#fecha_fin").val();

  if (!fecha_inicio || !fecha_fin) {
    alert("⚠ Debes seleccionar ambas fechas.");
    return;
  }

  if (fecha_inicio > fecha_fin) {
    alert("⚠ La fecha de inicio no puede ser mayor que la fecha final.");
    return;
  }

  $.post(
    "php/gastosFijosController.php",
    {
      action: "consultar",
      fecha_inicio: fecha_inicio,
      fecha_fin: fecha_fin,
    },
    function (res) {
      try {
        const datos = JSON.parse(res);
        $("#tablaGastosAjax").html(datos.tabla);
        $("#totalGastosAjax").html(datos.total);
      } catch (e) {
        console.error("Respuesta no válida:", res);
        alert("⚠ Error inesperado al cargar los gastos.");
      }
    }
  );
}

// Guardar gasto fijo
function saveGastoFijo() {
  const valor = $("#valor").val().trim();
  const descripcion = $("#descripcion").val().trim();

  if (!valor || !descripcion) {
    alert("⚠ Por favor, completa todos los campos.");
    return;
  }

  if (parseFloat(valor) <= 0) {
    alert("⚠ El valor debe ser mayor que 0.");
    return;
  }

  $.post(
    "php/gastosFijosController.php",
    {
      action: "guardar",
      valor: valor,
      descripcion: descripcion,
    },
    function (respuesta) {
      alert(respuesta);

      if (respuesta.includes("éxito")) {
        $("#valor").val("");
        $("#descripcion").val("");
        // Vuelve a cargar los datos solo una vez
        cargarGastos();
      }
    }
  );
}
