<?php
include_once "conex.php";
$sql = "DELETE from turno WHERE id_turno=".$_GET['delete'];
echo $sql;
$res=mysqli_query($conexion, $sql);
if (!$res) echo mysqli_error($conexion);
header("location: turno.php");


?>