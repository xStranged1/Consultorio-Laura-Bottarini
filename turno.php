<?php
require_once "conex.php";
if (isset($_GET['cliente'])) {
	$cliente=$_GET['cliente'];
}
else {
	$cliente="";
}
$sqlc = "SELECT count(id_turno) from turno";
$res=mysqli_query($conexion, $sqlc);
$rowc= mysqli_fetch_assoc($res);

//---------------->Fecha

$fecha = date("d/m/Y");
$valores = explode('/', $fecha);

?>
<!DOCTYPE html>
<html lang="es">
<head>

	<meta charset="utf-8">
	<link rel="icon" type="image/vnd.microsoft.icon" href="logo.ico" sizes="16x16 24x24 36x36 48x48">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Turnos</title>

	<!-- Bootstrap -->
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/style_nav.css" rel="stylesheet">


	<style>
		.content {
			margin-top: 80px;
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
			<h2>Lista de Turnos</h2>
			<hr />

			<?php
			if(isset($_GET['aksi']) == 'delete'){
				// escaping, additionally removing everything that could be (html/javascript-) code
				$nik = mysqli_real_escape_string($con,(strip_tags($_GET["nik"],ENT_QUOTES)));
				$cek = mysqli_query($con, "SELECT * FROM turno WHERE id_turno='$nik'");
				if(mysqli_num_rows($cek) == 0){
					echo '<div class="alert alert-info alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> No se encontraron datos.</div>';
				}else{
					$delete = mysqli_query($con, "DELETE FROM turno WHERE id_turno='$nik'");
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
						<option value="0">Filtrar por</option>
						<?php $filter = (isset($_GET['filter']) ? strtolower($_GET['filter']) : NULL);  ?>
						<option value="2" <?php if($filter == 'Tetap'){ echo 'selected'; } ?>>Estética</option>
						<option value="1" <?php if($filter == 'Kontrak'){ echo 'selected'; } ?>>Depilación</option>
						<option value="3" <?php if($filter == 'Kontrak'){ echo 'selected'; } ?>>Nombre</option>
						<option value="5" <?php if($filter == 'Outsourcing'){ echo 'selected'; } ?>>Turnos recientes</option>		
						


					</select>
					<div style="float: right; margin-top: -26px;" class="col-lg-6">
					<div class="input-group">
					<h3 style="">Cantidad total de turnos: <?php echo $rowc["count(id_turno)"];?>
				</h3>
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
				        <button class="btn btn-success" type="submit" onsubmit="<?php $cliente?>">Buscar</button>
				      </span>

				    </div>
				 </div>


				
					

			</form>

			
			<br />
			<div style="margin-left: -46px;" class="table-responsive">
			<table class="table table-striped table">
				<tr>
                    <th>Nombre</th>
					<th>N° Turno</th>
					<th>Descripción</th>
                    <th>Detalle</th>
                    <th>Zona</th>
					<th>Fecha</th>
					<th>Hora</th>
					<th>Tipo</th>
                    <th>Editar</th>
                    <th>Eliminar</th>
				</tr>
				<?php

				if($filter=="5"){
					$sql = mysqli_query($conexion, "SELECT * FROM turno ORDER BY id_turno DESC");
				}
				elseif ($cliente) {	
					$sql = mysqli_query($conexion, "SELECT turno.id_turno, turno.descripcion, turno.detalle, turno.zona, turno.fecha, turno.hora, turno.tipo, turno.dni, nombre, apellido  FROM turno, alta WHERE turno.dni=alta.dni AND (apellido LIKE '%$cliente%' OR nombre LIKE '%$cliente%' OR id_turno LIKE '%$cliente%' OR descripcion LIKE '%$cliente%' OR fecha LIKE '%$cliente%'  OR turno.dni LIKE '%$cliente%' OR zona LIKE '%$cliente%')  ");
				}
				elseif ($filter=="3") {
					$sql = mysqli_query($conexion, "SELECT turno.id_turno, turno.descripcion, turno.detalle, turno.zona, turno.fecha, turno.hora, turno.tipo, turno.dni, nombre, apellido FROM turno,alta where turno.dni=alta.dni ORDER BY nombre");
				}
				

				/*elseif($filter=="3"){

					
					
					$sqlf = mysqli_query($conexion, "SELECT fecha, dni FROM turno");
					
					
//-------------> fecha
							
					while($rowf = mysqli_fetch_assoc($sqlf)){

						$fecha2=date($rowf['fecha']);
						$valores2 = explode('/', $fecha2);

						if ($valores[2]-$valores2[2]<0) {
							echo "La fecha ingresada es mayor a la actual";

						}
						elseif ($valores[1]-$valores2[1]<0) {
							echo "La fecha ingresada es mayor a la actual";
						}
						elseif ($valores[0]-$valores2[0]<0) {
							echo "La fecha ingresada es mayor a la actual";
						}
						else{
							echo "La fecha ingresada es menor a la actual";
						}
					$i++;					
					}

					
				}*/
				elseif ($filter){
					$sql = mysqli_query($conexion, "SELECT * FROM turno WHERE tipo='$filter' ORDER BY id_turno DESC");
				}
					
				
				
				else{
					$sql = mysqli_query($conexion, "SELECT * FROM turno ORDER BY id_turno DESC");
				}
				

				if(mysqli_num_rows($sql) == 0){
					
					echo '<tr><td colspan="8">No hay turnos para: '.$cliente.'</td></tr>';
				}else{
					$no = 1;
					while($row = mysqli_fetch_assoc($sql)){

						$dni=$row['dni'];
						$sqldni= mysqli_query($conexion, "SELECT nombre, apellido FROM alta WHERE dni='$dni'");

						
						
						


						while($row1 = mysqli_fetch_assoc($sqldni)){

							echo '
							<tr>
								<td><a href="clientes.php?cliente='.$row['dni'].'"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>'.' '.$row1['nombre'].' '.$row1['apellido'].'</td>';

								



						}




						echo '
						
							
							<td>'.$row['id_turno'].'</td>
							<td>'.$row['descripcion'].'</td>
							<td>'.$row['detalle'].'</a></td>
                            <td>'.$row['zona'].'</td>
                            <td>'.$row['fecha'].'</td>
							<td>'.$row['hora'].'</td>
                            
							<td>';
							if($row['tipo'] == '2'){
								echo '<span class="label label-success">Estética</span>';
							}
                            else if ($row['tipo'] == '1' ){
								echo '<span class="label label-info">Depilación</span>';
							}
                            
						echo '
							</td>
							<td>

								<a href="editarturnos.php?edit='.$row['id_turno'].'&dni='.$row['dni'].'" title="Editar datos" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
							</td>
							<td>
								<a href="eliminarturno.php?delete='.$row['id_turno'].'" title="Eliminar" onclick="return confirm(\'Esta seguro de borrar el turno n° '.$row['id_turno'].'?\')" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
							</td>
						</tr>
						';
						
					}
				}
				?>
			</table>
			</div>
		</div>
	</div><center>
	<p>&copy; Laura Botarini <?php echo date("Y");?></p>
		</center>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>
</html>
