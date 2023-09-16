<?php 

	print_r($_POST);


	require_once "conex.php";

	$dniviejo=$_POST['dniviejo'];
	$dni=$_POST['dni'];
	$nombre=$_POST['nombre'];
	$apellido=$_POST['apellido'];
	$numero=$_POST['numero'];
	$edad=$_POST['edad'];
	$email=$_POST['email'];
	$nombreadulto=$_POST['nombreadulto'];
	$numeroadulto=$_POST['numeroadulto'];
	$emailadulto=$_POST['emailadulto'];

	$resultado = "UPDATE alta SET dni='$dni',nombre='$nombre',apellido='$apellido',numero='$numero',edad='$edad',email='$email',nombreadulto='$nombreadulto',numeroadulto='$numeroadulto',emailadulto='$emailadulto' WHERE dni=".$dniviejo;

	echo $resultado."<br>";

	$q = mysqli_query($conexion, $resultado);

	if($q){
		echo "se guardo correctamente";
	}else {
		echo "se produjo un error";
	}

	echo 'El DNI es:'.$dni;

	mysqli_close($conexion);

	header("location: clientes.php");

 ?>