<?php 
	require_once "conex.php";
	
	print_r($_POST);


	$id_cliente=$_POST['id_cliente'];
	$dni=$_POST['dni'];
	$nombre=$_POST['nombre'];
	$apellido=$_POST['apellido'];
	$numero=$_POST['numero'];
	$edad=$_POST['edad'];
	$email=$_POST['email'];
	$nombreadulto=$_POST['nombreadulto'];
	$numeroadulto=$_POST['numeroadulto'];
	$emailadulto=$_POST['emailadulto'];

	$resultado = mysqli_query($conexion, "insert into alta values ('$id_cliente','$dni','$nombre','$apellido','$numero','$edad','$email','$nombreadulto','$numeroadulto','$emailadulto')");

	mysqli_close($conexion);

if ($resultado) {
	echo "Bien";

}
else{
		echo "Mal";
	}
header("location:clientes.php");
	
 ?>