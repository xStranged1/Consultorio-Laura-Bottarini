<?php 

	print_r($_POST);


	require_once "conex.php";

	$id_turno=$_POST['id_turno'];
	$descripcion=$_POST['descripcion'];
	$detalle=$_POST['detalle'];
	$zona=$_POST['zona'];
	$fecha=$_POST['fecha'];
	$hora=$_POST['hora'];
	$tipo=$_POST['tipo'];
	

	$resultado = "UPDATE turno SET id_turno='$id_turno',descripcion='$descripcion',detalle='$detalle',zona='$zona',fecha='$fecha',hora='$hora',tipo='$tipo',tipo='$tipo' WHERE id_turno=".$id_turno;

	echo $resultado."<br>";

	$q = mysqli_query($conexion, $resultado);

	if($q){
		echo "se guardo correctamente";
	}else {
		echo "se produjo un error";
	}



	mysqli_close($conexion);

	header("location: turno.php");

 ?>