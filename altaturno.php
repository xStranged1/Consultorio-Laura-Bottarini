<?php 
	require_once "conex.php";
	
	print_r($_POST);



	$descripcion=$_POST['descripcion'];
	$detalle=$_POST['detalle'];
	$fecha=$_POST['fecha'];
	$zona=$_POST['zona'];
	$hora=$_POST['hora'];
	$tipo=$_POST['tipo'];
	$id_turno="";
	$dni=$_POST['dni'];

	$resultado = mysqli_query($conexion, "insert into turno values ('$id_turno','$descripcion','$detalle','$zona','$fecha','$hora','$tipo','$dni')");

	if($resultado){
		echo "se guardo correctamente";
	}else {
		echo "se produjo un error";
	}

	mysqli_close($conexion);
header("location:turno.php");

	

 ?>