<?php
	include('../conn.php');
	
	


	$idMoto =$_POST['idMoto'];
	$placa=$_POST['placa2'];
	$valor_cobrado =$_POST['valor_cobrado'];
	$fecha_salida =$_POST['fecha_salida'];
	$estado =$_POST['estado2'];

	$sql="";
	if($estado == 0){
		$sql = "UPDATE moto 
        SET 
            valor_cobrado = '$valor_cobrado',
            fecha_salida = '$fecha_salida',
            estado = '$estado'
        WHERE id = $idMoto ";
	}else{
		$sql = "UPDATE moto 
        SET 
            valor_cobrado = '0',
            fecha_salida = '',
            estado = '$estado'
        WHERE id = $idMoto ";
	}

	


			$result =mysqli_query($conn,$sql);
	
	
	echo $result;

?>