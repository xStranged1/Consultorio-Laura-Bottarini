<?php
require_once "conex.php";
$cliente="";

if (isset($_GET['cliente'])) {
	$cliente=$_GET['cliente'];
}
$sqlc = "SELECT count(id_cliente) from alta";
$res=mysqli_query($conexion, $sqlc);
$rowc= mysqli_fetch_assoc($res);
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<link rel="icon" type="image/vnd.microsoft.icon" href="logo.ico" sizes="16x16 24x24 36x36 48x48">
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Clientes</title>

	<!-- Bootstrap -->
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/style_nav.css" rel="stylesheet">

	<style>
		.content {
			margin-top: 40px;
		}
	</style>

</head>
<body>
	
	<div class="container">
		<div class="content">
				<a href="index.html">
			 <button type="button" class="btn btn-lg">
			 	<span class="glyphicon glyphicon-home">
				</span>
				</button>
				</a>
			

			<h2>Lista de Clientes</h2>

		<p></p>
			<hr />

			<?php
			if(isset($_GET['aksi']) == 'delete'){
				// escaping, additionally removing everything that could be (html/javascript-) code
				$nik = mysqli_real_escape_string($con,(strip_tags($_GET["nik"],ENT_QUOTES)));
				$cek = mysqli_query($con, "SELECT * FROM alta WHERE dni='$nik'");
				if(mysqli_num_rows($cek) == 0){
					echo '<div class="alert alert-info alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> No se encontraron datos.</div>';
				}else{
					$delete = mysqli_query($con, "DELETE FROM alta WHERE dni='$nik'");
					if($delete){
						echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Datos eliminado correctamente.</div>';
					}else{
						echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Error, no se pudo eliminar los datos.</div>';
					}
				}
			}
			?>

			<form class="form-inline" method="get">
				<div class="form-group">
					<select name="filter" class="form-control" onchange="form.submit()">
						<option value="0">Ordenar por</option>
						<?php $filter = (isset($_GET['filter']) ? strtolower($_GET['filter']) : NULL);  ?>
						<option value="1" <?php if($filter == 'Tetap'){ echo 'selected'; } ?>>Edad</option>
						<option value="2" <?php if($filter == 'Kontrak'){ echo 'selected'; } ?>>Nombre</option>
						<option value="3" <?php if($filter == 'Kontrak'){ echo 'selected'; } ?>>Nuevos clientes</option>
                        <option value="4" <?php if($filter == 'Outsourcing'){ echo 'selected'; } ?>>Todos</option>
					</select>
					<div style="float: right; margin-top: -27px;" class="col-lg-6">
					<div class="input-group">
					<h3 style="">Cantidad total de clientes: <?php echo $rowc["count(id_cliente)"];?></h3>
				</div>
				</div>
				</div>
				<div class="col-lg-4">
				    <div class="input-group">
				      <input autofocus="true" value="<?php

				      if ((isset($_GET['cliente']))){
				      	echo $_GET['cliente'];
						$cliente=$_GET['cliente'];
				      } 
				      	
				      	
				    	?>" type="text" class="form-control" name="cliente" placeholder="Buscar">
				      <span class="input-group-btn">
				        <button class="btn btn-success" type="submit" onsubmit="<?php $cliente ?>">Buscar</button>
				      </span>
				    </div>
				 </div>
			</form>
			<br />
			<div class="table-responsive" style="margin-left: -46px;">
			<table class="table table-striped table-hover">
				<tr>
                    <th>No</th>
					<th>DNI</th>
					<th>Nombre</th>
                    <th>Número</th>
					<th>Edad</th>
					<th>E-mail</th>
					<th>Nombre Adulto</th>
					<th>Número Adulto</th>
                    <th>E-mail Adulto</th>         
                    <th>Editar</th>
                    <th>Borrar</th>
                    <th>Asignar Turno</th>
                    <th>Ver Turnos</th>
				</tr>
				<?php

				if ($cliente) {
					
					$sql = mysqli_query($conexion, "SELECT * FROM alta WHERE nombre like '%$cliente%' or apellido like '%$cliente%' or numero like '%$cliente%' or dni like '%$cliente%' ORDER BY nombre DESC");
				}
				
				elseif($filter=="4"||$filter==""){
					
					$sql = mysqli_query($conexion, "SELECT * FROM alta ORDER BY nombre ");

				}
				

				elseif ($filter=="3") {
						$sql = mysqli_query($conexion, "SELECT * FROM alta ORDER BY id_cliente DESC ");
					}
					elseif ($filter=="1") {
						$sql = mysqli_query($conexion, "SELECT * FROM alta ORDER BY edad  ");
					}
				
				
				else{
					$sql = mysqli_query($conexion, "SELECT * FROM alta ORDER BY nombre");
				}

				
					
				if(mysqli_num_rows($sql) == 0){
					echo '<tr><td colspan="8">No hay datos de '.$cliente.'.</td></tr>';
				}else{
					$no = 1;
					while($row = mysqli_fetch_assoc($sql)){
						if ($row['nombreadulto']=="") {
							$row['nombreadulto']="-";
						}
						if ($row['numeroadulto']=="") {
							$row['numeroadulto']="-";
						}
						if ($row['emailadulto']=="") {
							$row['emailadulto']="-";
						}
						echo '
						<tr>
							<td>'.$no.'</td>
							<td>'.$row['dni'].'</td>

							<td><span class="glyphicon glyphicon-user " aria-hidden="true"></span> '.$row['nombre'].' '.$row['apellido'].'</td>
							
                            <td>'.$row['numero'].'</td>
                            <td>'.$row['edad'].'</td>
							<td>'.$row['email'].'</td>

                            <td>'.$row['nombreadulto'].'</td>
                            <td>'.$row['numeroadulto'].'</td>
                            <td>'.$row['emailadulto'].'</td>
							
							<td>
								<a href="editar.php?edit='.$row['dni'].'" title="Editar datos" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
								</td>
								<td>
								<a href="eliminar.php?delete='.$row['dni'].'" title="Eliminar" onclick="return confirm(\'Esta seguro de borrar los datos de: '.$row['dni'].'? Se eliminarán también sus turnos'.'\')" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
								</td>
								<td>
									<a href="crearturno.php?dni='.$row['dni'].'" title="Asignar turno" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></a>
									</a>
								</td>
								<td>
									<a href="turno.php?cliente='.$row['dni'].'" title="Ver turnos" class="btn btn-warning btn-sm"><span class="glyphicon  glyphicon-menu-hamburger" aria-hidden="true"></span></a>
									</a>
								</td>
						</tr>
						';
						$no++;
						

					}
				}
				
				?>
				
			</table>
			</div>

			
		</div>
	</div><center>
	<p>&copy; Laura Bottarini <?php echo date("Y");?></p>
		</center>

	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>
</html>