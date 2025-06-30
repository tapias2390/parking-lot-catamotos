<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Imprimir</title>
    <meta charset="UTF-8">
	<script src="libs/jquery.min.js"></script>
	<link rel="stylesheet" href="libs/bootstrap.min.css" />
	<script src="libs/bootstrap.min.js"></script>
	<script src="js/save.js"></script>
</head>
<body>

<div  aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                    <button type="button" class="close"  aria-hidden="true"  onclick="cancelar()">&times;</button>
                    <center><h4 class="modal-title" id="myModalLabel">Salida de moto</h4></center>
            </div>
			<div class="modal-body">
						<?php
                        include('conn.php');
							$id = $_REQUEST['id'];
							
							// Configura la zona horaria a la de tu ubicación (opcional)
							date_default_timezone_set('America/Bogota');

							// Obtiene la fecha actual
							
							$fecha_salida = new DateTime();
							$fecha_salida->format('Y-m-d H:i:s');
							$del=mysqli_query($conn,"select * from lavadas where id='".$id."'");
							$drow=mysqli_fetch_array($del);
							
						?>
						<div class="container-fluid" id="container-fluid">
						
							<h4><center>*** PARQUEADERO LIBORIO LOPERA ***</h4>
							<h2><center>Placa: <strong style="color:blue;text-transform:uppercase;"><?php echo ucwords($drow['placa']); ?></strong></center></h2>
							<h3><center>Cascos: <strong><?php echo ucwords($drow['cascos']); ?></strong></center></h3>
							<h3><center>Ubicación: <strong><?php echo ucwords($drow['ubicacion']); ?></strong></center></h3>
							
							<h3><center>Descripción: <strong><br/><?php echo ucwords($drow['descripcion']); ?></strong></center></h3>
							
							
							<h5><center>Fecha Ingreso: <strong><?php echo ucwords($drow['fecha_ingreso']); ?></strong></center></h5>
							
							<h5><center>Tiempo: <strong>
							<?php
							// Calcula la diferencia entre las fechas
							$fechaInicio = new DateTime($drow['fecha_ingreso']);
							// Calcula la diferencia entre las fechas
							$diferencia = $fechaInicio->diff($fecha_salida);
							// Obtiene la diferencia en minutos y horas
							
							// Obtiene la diferencia en horas y minutos
								$diferenciaEnHoras = $diferencia->h + ($diferencia->days * 24);
								$diferenciaEnMinutos = $diferencia->i;
								$horas =00;
								$minutos= 00;
								if($diferenciaEnHoras != 0){
									$horas = $diferenciaEnHoras;
								}

								if($diferenciaEnMinutos != 0){
									$minutos = $diferenciaEnMinutos;
								}
								
							
							echo $horas.":".$minutos;
							?>
							</strong></center></h5>
							


							<h5><center>Ingreso valor cobrado: <strong>
							<input type="number"  id="valor" name="valor"  maxlength="7" class="form-control valor" placeholder="INGRESE EL VALOR A COBRAR" style="width: 50%; margin: 2%;">
						

                            <input type="hidden"  id="_id" name="_id" class="form-control" value="<?php echo $id; ?>">
					<input type="hidden"  id="_fecha_salida" name="_fecha_salida" class="form-control" value="<?php echo $fecha_salida->format('Y-m-d H:i:s'); ?>">
							<?php
						
							$fechasalida2 = $fecha_salida->format('Y-m-d H:i:s');
							
							?></strong></center></h5> 
							

							


						</div> 
			</div>

			<div class="modal-footer">
                    <button type="button" class="btn btn-default" onclick="cancelar()"><span class="glyphicon glyphicon-remove"></span> Cancelar</button>
                   
				
				
				
				<a id="generarPago" onclick="generarPago()" style="cursor: pointer;">Generar pago</a>
			</div>
		</div>
	</div>
</div>
			
			
<script>
    function cancelar(){
        window.location.href = 'lavadas.php';
    }
    function generarPago(){
		  var id = document.getElementById('_id').value;
          var fecha_salida = document.getElementById('_fecha_salida').value;
          var valor = document.getElementById('valor').value;

		 
		var valorSinPunto = valor.replace(/\./g, "");
		
		if (valor === null || valor === "") {
			alert("Valor no ingresado");
		}else{
            

		$.ajax({
        // Action
        url: 'edit2lavadas.php',
        // Method
        type: 'POST',
        data: {
          // Get value
          _id: id,
          _valorlavada: valorSinPunto,
          _fecha_salida:fecha_salida,
        },
        success:function(response){
          
          //alert("response"+response);
          // Response is the output of action file
          if(response == 1){
            window.location.href = 'lavadas.php';
          }
          
          else{
			alert(response)
                // Maneja la respuesta del script PHP aquí
                window.location.href = 'lavadas.php';
          }
        }
      });	
        }

	  
	}
	
</script>
			
		
    
<!-- /.modal -->

    
</body>
</html>