<?php
include_once "conex.php";
$sql = "DELETE from alta WHERE dni=".$_GET['delete'];
echo $sql;
$res=mysqli_query($conexion, $sql);
if (!$res) echo mysqli_error($conexion);
header("location: clientes.php");


?>