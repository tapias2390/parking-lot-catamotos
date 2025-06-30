<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="UTF-8">
	<title>Gastos Fijos | Parqueadero JT</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Bootstrap 5 -->
	<link href="libs/bootstrap.min.css" rel="stylesheet">
	<link href="css_parking/gastosFijos.css" rel="stylesheet">
</head>

<body>

	<div class="container py-4">

		<!-- Título -->
		<h2 class="text-center text-primary mb-4">Gastos Fijos</h2>



		<!-- Formulario Registro -->
		<div class="card shadow-sm mb-4">

			<div class="card-body">
				<form id="formGastoFijo" class="row g-3">
					<div class="col-md-6">
						<label for="valor" class="form-label">Valor</label>
						<input type="number" class="form-control" id="valor" name="valor" required>
					</div>
					<div class="col-md-6">
						<label for="descripcion" class="form-label">Descripción</label>
						<input type="text" class="form-control" id="descripcion" name="descripcion" required>
					</div>
					<div class="col-12 text-end">
						<button type="button" class="btn btn-success" onclick="saveGastoFijo()">Guardar</button>
					</div>
				</form>
			</div>
		</div>

		<!-- Filtro por Fecha -->
		<div class="card shadow-sm mb-4">
			<div class="card-header bg-light fw-bold">Consultar por Fecha</div>
			<div class="card-body">
				<!-- Filtro por fechas (inicio y fin) -->
				<form id="formFiltroFechas" class="row mt-4 g-3">
					<div class="col-md-6">
						<label for="fecha_inicio" class="form-label">Desde</label>
						<input type="date" class="form-control" id="fecha_inicio" name="fecha_inicio"
							value="<?php echo $_POST['fecha_inicio'] ?? date('Y-m-01'); ?>" required>
					</div>
					<div class="col-md-6">
						<label for="fecha_fin" class="form-label">Hasta</label>
						<input type="date" class="form-control" id="fecha_fin" name="fecha_fin"
							value="<?php echo $_POST['fecha_fin'] ?? date('Y-m-d'); ?>" required>
					</div>
					<div class="col-12 d-flex justify-content-end">
						<button type="submit" class="btn btn-primary">Consultar</button>
					</div>
				</form>
			</div>
		</div>

		<!-- Tabla de resultados -->
		<div class="table-responsive">
			<!-- Contenedor para tabla AJAX -->
			<div id="tablaGastosAjax" class="table-responsive mt-4"></div>

			<!-- Contenedor para total -->
			<div class="text-end fw-bold fs-5 mt-3" id="totalGastosAjax"></div>
		</div>

	</div>

	<script src="libs/jquery.min.js"></script>
	<script src="libs/bootstrap.min.js"></script>
	<script src="js_parking/gastosFijos.js"></script>

</body>

</html>