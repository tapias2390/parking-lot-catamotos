<!DOCTYPE html>
<html>

<head>
	<title>Parqueadero JT</title>
	<meta charset="UTF-8">
	<script src="libs/jquery.min.js"></script>
	<link rel="stylesheet" href="libs/bootstrap.min.css" />
	<script src="http://code.jquery.com/jquery-git.js"></script>
	<script src="libs/bootstrap.min.js"></script>
	<script src="js/save.js"></script>
</head>

<body>
	<div class="container">
		<div style="height:50px;"></div>
		<div class="well" style="margin:auto; padding:auto; width:100%;">
			<span style="font-size:25px; color:blue">
				<center><strong>Ingresos</strong></center>
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
								<label class="control-label" style="position:relative; top:7px;">Valor:</label>
							</div>
							<div class="col-lg-10">
								<input type="number"  min="0" max="100000000"  class="form-control valor" id="valor" name="valor" require  >
							</div>
						</div>
					</td>

					<td>
						<div class="row">
							<div class="col-lg-12">
								<label class="control-label" style="position:relative; top:7px;">Descripción:</label>
							</div>
							<div class="col-lg-10">
								<input type="text" class="form-control" id="descripcion" name="descripcion" require>
							</div>
						</div>
					</td>


					<td>
						<div class="modal-footer">
							<button type="button" id="saveingresos" class="btn btn-primary" onclick="saveingresos()">
								<span class="glyphicon glyphicon-floppy-disk">Guardar</span> </button>
						</div>
					</td>
					</tr>
				</table>
			</div>


			<div style="height:50px;"></div>



			<div class="row">

				<form method="POST" action="#">
				<div class="col-lg-4">
					<label>Seleccione la fecha:</label>
						<input type="date"   class="form-control" id="fechaf" name="fechaf"  require
							placeholder="Fecha fin" value="<?php if (isset($_POST['fechaf'])) {
								echo $_POST['fechaf'];
							} ?>" >
					</div>
					<div class="col-lg-4">
						<button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-check"></span>
							Consultar</button>

					</div>
				</form>

				<?php

				include('conn.php');
				
				// Establecer la zona horaria a Colombia
                date_default_timezone_set('America/Bogota');

				$dia = date('d'); // Día actual (en formato de dos dígitos, con ceros iniciales si es necesario)
                $mes = date('m'); // Mes actual (en formato de dos dígitos, con ceros iniciales si es necesario)
                $ano = date('Y'); // Año actual (en formato de cuatro dígitos)
                
                $fecha =  $ano."-".$mes."-". $dia;
                //echo $fecha;
                
				$contaor = 0;
				if (isset($_POST['fechaf'])) {
					$ff = $_POST['fechaf'];
					
					$formatoValido = '/^\d{4}-\d{2}-\d{2}$/';
					
					 $fechaf = preg_match($formatoValido,$ff);
			
					$query = mysqli_query($conn, "select * from ingresos where  fecha >= '$ff' AND fecha < DATE_ADD('$ff', INTERVAL 1 DAY);");
				} else {
					$query = mysqli_query($conn, "select * from ingresos  where  DATE(fecha) = '$fecha'");


				}


				?>


			</div>
			<div style="height:10px;"></div>

			<table class="table table-striped table-bordered table-hover">
				<thead>
					<th>#</th>
					<th>Descripcion</th>
					<th>Fecha y Hora</th>
					<th>Valor</th>
					
				</thead>
				<tbody>
					<?php
					$valor = 0;
					while ($row = mysqli_fetch_array($query)) {
						$valor +=$row['valor'];
						?>
						<tr>
							<td>
								<?php echo $contaor += 1 ?>
							</td>
							<td>
								<?php echo ucwords($row['descripcion']); ?>
							</td>
							<td>
							<?php  $fechaHoraFormateada = date('Y-m-d h:i:s A', strtotime($row['fecha']));  echo $fechaHoraFormateada ; ?>
						
							</td>
							<td>
								<?php echo "$".ucwords( number_format((int)$row['valor'],0,',','.')); ?>
							</td>
							


						</tr>
						<?php
					}

					?>
				</tbody>
			</table>
			<table class="table table-striped table-bordered table-hover" border="0" >
			<tr>
			
							<td>
								<?php echo "<b style='float: right;padding: 10px;padding-right: 8%;'> Total ingresos :  $".  number_format((int)$valor,0,',','.')."</b>" ?>
							</td>
			</table>
		</div>


	</div>
</body>

</html>