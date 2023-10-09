<?php
include_once "conex.php";
$sql = "SELECT * from alta WHERE dni=".$_GET['edit'];
$res=mysqli_query($conexion, $sql);
$row= mysqli_fetch_assoc($res);
$dniviejo=$_GET['edit'];
?>

<html>
<head>
	<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="bootstrap/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">
	<meta charset="utf-8">
	<link rel="icon" type="image/vnd.microsoft.icon" href="logo.ico" sizes="16x16 24x24 36x36 48x48">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/style_nav.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css.css">
	<link href="css/bootstrap-datetimepicker.css" rel="stylesheet">
	<title>Editar Cliente</title>
</head>
<center>
<body style="background-color: rgba(36,219,165,0.8);">

	



	<br>
	

	<div class="cuerpo" style="background-color: rgba(36,219,165,0.8);">

	<form style="background-color: rgba(36,219,165,0.8); border:1px; border-color: #000;" class="well form-horizontal" action="edicion.php" method="post" id="contact_form"> 

			<a href="index.html">
			 <button style="float: left;" type="button" class="btn btn-lg">
			 	<span class="glyphicon glyphicon-home">
				</span>
				</button>
				</a>
				
      <fieldset>


<!-- Form Name -->
<legend><center><h2><b>Editar datos de <?php 
			
					echo '
						<tr>
						<td>'.$row['nombre'].' '.$row['apellido'].'
						</td>';
					
	?> </b></h2></center></legend>
	<br>
	
	<input type="hidden" name="dniviejo" value="<?php echo$dniviejo;?>" >

<!-- Text input-->




  
  <div class="form-group">
  <label class="col-md-4 control-label">DNI</label>  
  <div class="col-md-4 inputGroupContainer">
  <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-credit-card"></i></span>
  <input name="dni" placeholder="DNI" class="form-control" value="<?php echo $row['dni']?>" type="text">
    </div>
  </div>
</div>
<!-- Text input-->





<div class="form-group">
  <label class="col-md-4 control-label">Nombre</label>  
  <div class="col-md-4 inputGroupContainer">
  <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
  <input name="nombre" placeholder="Nombre" class="form-control" value="<?php echo $row['nombre']?>"  type="text">
    </div>
  </div>
</div>

<!-- Text input-->

<div class="form-group">
  <label class="col-md-4 control-label">Apellido</label>  
  <div class="col-md-4 inputGroupContainer">
  <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
  <input name="apellido" placeholder="Apellido" class="form-control" value="<?php echo $row['apellido']?>"  type="text">
    </div>
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label" >Edad</label> 
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
  <input name="edad" placeholder="Edad" class="form-control"  type="text" value="<?php echo $row['edad'];?>" >
    </div>
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label">Teléfono de contacto</label> 
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
  <input name="numero" placeholder="Teléfono de contacto" class="form-control" value="<?php echo $row['numero'];?>" type="text">
    </div>
  </div>
</div>

<!-- Text input-->




<div class="form-group">
  <label class="col-md-4 control-label" >E-mail</label> 
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
  <input name="email" placeholder="E-mail" class="form-control" type="text" value="<?php echo $row['email'];?>" >
    </div>
  </div>
</div>

<div class="separadors"></div>
<h3>Completar en caso de ser menor de 13 años</h3>
<div class="separadors"></div>



<div class="form-group">
  <label class="col-md-4 control-label" >Nombre del adulto responsable</label> 
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
  <input name="nombreadulto" placeholder="Nombre del adulto responsable" class="form-control"  type="text" value="<?php echo $row['nombreadulto'];
  ?>">
    </div>
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label" >Teléfono del adulto responsable</label> 
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
  <input name="numeroadulto" placeholder="Teléfono del adulto responsable" class="form-control"  type="text" value="<?php echo $row['numeroadulto'];?>" >
    </div>
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label" >E-mail del adulto responsable</label> 
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
  <input name="emailadulto" placeholder="Teléfono del adulto responsable" class="form-control"  type="text" value="<?php echo $row['emailadulto'];?>" >
    </div>
  </div>
</div>


<!-- Select Basic -->


<!-- Button -->
<div style="margin-right: 50px;" class="form-group">
  <label class="col-md-4 control-label"></label>
  <div class="col-md-4"><br>
    &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<button type="submit" class="btn-lg btn-primary" >&nbsp&nbsp&nbsp&nbsp&nbsp&nbspEDITAR <span class="glyphicon glyphicon-send"></span>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</button>
  </div>
</div>

</fieldset>
</form>



		
	


	
</div>
<script type="text/javascript" src="./jquery/jquery-1.8.3.min.js" charset="UTF-8"></script>
<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
</body>
</center>
</html>   