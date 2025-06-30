<!DOCTYPE html>
<html>

<head>
	<title>Parqueadero Liborio Lopera</title>
	<meta charset="UTF-8">
	<script src="libs/jquery.min.js"></script>
	<link rel="stylesheet" href="libs/bootstrap.min.css" />
	<script src="libs/bootstrap.min.js"></script>
	<script src="js/save.js"></script>

</head>

<body>
	<style>

.well {
	background-image: url("img/lavada_moto.jpeg") !important;

	
}
	</style>
	<div class="container">
		<div style="height:50px;"></div>
		<div class="well" style="margin:auto; padding:auto; width:100%;">
			<span style="font-size:25px; color:blue">
				<center><strong>LAVADA DE MOTOS</strong></center>
			</span>
			<div style="height:50px;"></div>
			<div class="container-fluid">

			<table class="table table-striped table-bordered table-hover">
					<tr>
						<td>
							<a href="index.php" class="btn btn-warning" style="width: 100%;"><span class="glyphicon glyphicon-road"></span>
								Parqueadero</a>
						</td>
						<td>
							<a href="lavadas.php"  class="btn btn-primary" style="width: 100%;"><span
									class="	glyphicon glyphicon-tint"></span> Lavadas</a> 
						</td>
						<td>
							<a href="ingresos.php"  class="btn btn-warning" style="width: 100%;"><span
									class="	glyphicon glyphicon-usd"></span> Ingresos</a> 
						</td>
						<td>
							<a href="gastos.php"  class="btn btn-primary" style="width: 100%;"><span
									class="	glyphicon glyphicon-tags"></span> Gastos</a>

						</td>

						<td>
							<a href="historial.php" class="btn btn-danger" style="width: 100%;"><span
									class="glyphicon glyphicon-repeat"></span> Historial</a>

						</td>

						<td>
							<a href="caja.php" class="btn btn-warning" style="width: 100%;"><span class="glyphicon glyphicon-piggy-bank"></span>
								Caja</a>
						</td>
					</tr>
				</table>

				<table class="table table-striped table-bordered table-hover">
					</tr>
					<td>
						<div class="row">
							<div class="col-lg-12">
								<label class="control-label"   style="position:relative; top:7px;">Placa:</label>
							</div>
							<div class="col-lg-10">
								<input type="text" maxlength="7"  style="text-transform:uppercase" class="form-control" id="placa" name="placa" require>
							</div>
						</div>
					</td>

					<td>
						<div class="row">
							<div class="col-lg-12">
								<label class="control-label" style="position:relative; top:7px;">Cascos:</label>
							</div>
							<div class="col-lg-10">
								<input type="text" style="text-transform:uppercase" class="form-control" id="cascos" name="cascos" require>
							</div>
						</div>
					</td>

					<td>
						<div class="row">
							<div class="col-lg-12">
								<label class="control-label" style="position:relative; top:7px;">Ubicación:</label>
							</div>
							<div class="col-lg-10">
								<input type="text" style="text-transform:uppercase" class="form-control" id="ubicacion" name="ubicacion" require>
							</div>
						</div>
					</td>

					<td>
						<div class="row">
							<div class="col-lg-12">
								<label class="control-label" style="position:relative; top:7px;">Descripción:</label>
							</div>
							<div class="col-lg-10">
								<input type="text" style="text-transform:uppercase" class="form-control" id="descripcion" name="descripcion" require placeholder="LAVADA DE MOTOS	">
							</div>
						</div>
					</td>

					<td>
						<div class="modal-footer">
							<button type="button" class="btn btn-success" onclick="guardarDatosLavadas()"><span
									class="glyphicon glyphicon-floppy-disk"></span> Guardar</button>
						</div>
					</td>
					</tr>
				</table>
			</div>


			<div style="height:50px;"></div>



			<div class="row">

				<form method="POST" action="#">
					<div class="col-lg-3">
						<input type="text"  maxlength="7"  style="text-transform:uppercase" class="form-control" name="placa2" require placeholder="Placa">
					</div>
					<div class="col-lg-6">
						<button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-check"></span>
							Consultar</button>

							<a href="salidalavdas.php">
							<button type="button" class="btn btn-primary"><span class="glyphicon glyphicon-check"></span>
							Salida lavadas de  motos</button></a>

					</div>
				</form>

				<?php

				include('conn.php');
				
				$contaor = 0;
				if (isset($_POST['placa2'])) {
					$placa = $_POST['placa2'];
					$query = mysqli_query($conn, "select * from `lavadas` where estado=1 and placa LIKE '%$placa%'  ");
					
				} else {
					$sql2 = "select * from `lavadas` where estado=1 ";
					$query = mysqli_query($conn, $sql2 );
				}

				
				?>


			</div>
			<div style="height:10px;"></div>

			<div style="background: white;">

			
			<table class="table table-striped table-bordered table-hover" >
				<thead>
					<th>#</th>
					<th>Placa</th>
					<th>Cascos</th>
					<th>Ubicación</th>
					<th>Descripcion</th>
					<th>Fecha y Hora</th>
					<th>Accion</th>
				</thead>
				<tbody>
					<?php
					while ($row = mysqli_fetch_array($query)) {
						?>
						<tr>
							<td>
								<?php echo $contaor += 1 ?>
							</td>
							<td style="text-transform:uppercase">
								<?php echo ucwords($row['placa']); ?>
							</td>
							<td>
								<?php echo ucwords($row['cascos']); ?>
							</td>
							<td>
								<?php echo ucwords($row['ubicacion']); ?>
							</td>
							<td>
								<?php echo ucwords($row['descripcion']); ?>
							</td>
							
							<td>
							<?php  $fechaHoraFormateada = date('Y-m-d h:i:s A', strtotime($row['fecha_ingreso']));  echo $fechaHoraFormateada ; ?>
							
							</td>
							<td>
								<a href="#edit<?php echo $row['id']; ?>" data-toggle="modal" class="btn btn-warning" style="margin:5px;"><span
										class="glyphicon glyphicon-pencil"></span></a> 
										
								<a href="imprimir.php?id=<?php echo $row['id']; ?>" class="btn btn-danger" style="margin:5px;"><span class="glyphicon glyphicon-time"></span> </a> 
								
								<a  onclick="btnimprimirRecibo('<?php echo $row['placa']; ?>','<?php echo $row['descripcion']; ?>','<?php echo $row['cascos']; ?>','<?php echo $row['fecha_ingreso']; ?>','<?php echo $row['ubicacion']; ?>')"  class="btn btn-warning" style="margin:5px;"><span class="glyphicon glyphicon-print"></span> </a> 
							
								<a  onclick="cambiarTabla('<?php echo $row['id'];?>','lavadas')"  class="btn btn-primary" style="margin:5px;">
								    <span class="glyphicon glyphicon-road"></span> </a> 

								<?php include('buttonlvadas.php'); ?>
							</td>
						</tr>
						<?php
					}

					?>
				</tbody>
			</table>
			</div>
		</div>

		<div id="container-fluid2">
			<div class="container-fluid" id="container-fluid">
			</div>

		</div>
		<?php include('add_modal.php'); ?>
	</div>
</body>

</html>