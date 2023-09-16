<?php
include_once "conex.php";
$sql = "SELECT * from turno WHERE id_turno=".$_GET['dni'];
$res=mysqli_query($conexion, $sql);
$row= mysqli_fetch_assoc($res);
$dni=$_GET['dni'];
$sqldni= mysqli_query($conexion, "SELECT nombre, apellido FROM alta WHERE dni='$dni'");
$tipo = "";
$row1 = mysqli_fetch_assoc($sqldni);
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
	<title>Nuevo Turno </title>
</head>
<center>
<body style="background-color: rgba(249,238,245,1);">

	



	<br>
	

	<div class="cuerpo" style="background-color: rgba(249,238,245,1);">

	<form style="background-color: rgba(249,238,245,1); border:1px; border-color: #000;" class="well form-horizontal" action="altaturno.php" method="post" id="contact_form"> 
		
				<center><a href="index.html">
			 <button style="margin-right: 500px;" type="button" class="btn btn-lg">
			 	<span class="glyphicon glyphicon-home">
				</span>
				</button>
				</a>
				</center>

      <fieldset>


<!-- Form Name -->
<legend><center><h2><b>Nuevo turno de <?php 
			
					echo '
						<tr>
						<td>'.$row1['nombre'].' '.$row1['apellido'].'
						</td>';
					
	?> </b></h2></center></legend>
	<br>

  <?php 
    if ((isset($row['tipo']))){
      $tipo = $row['tipo'];
    }
    if ((isset($row['tipo']))){
      $tipo = $row['tipo'];
    }
    if ((isset($row['tipo']))){
      $tipo = $row['tipo'];
    }
  ?>

<!-- Text input-->
<div class="form-group form-check">
	<input type="hidden" value="<?php echo $dni?>" name="dni">

				  <input type="radio" <?php if ($tipo==1) {
				  	echo "checked";
				  }else{
				  	echo "unchecked";
          } ?> class="form-check-input" id="materialGroupExample2" name="tipo" value="1" required >
				  <label class="form-check-label" for="materialGroupExample2"><h4 style="margin-right: 7px;">Depilación</h4></label>
				  <input type="radio" class="form-check-input" id="materialGroupExample1" name="tipo" <?php if ($tipo==2) {
				  	echo "checked";
				  }else{
				  	echo "unchecked";
          } ?> value="2">
				  <label class="form-check-label" for="materialGroupExample1"><h4>Estética</h4></label>
				</div>
<div class="form-group">
  <label class="col-md-4 control-label">Fecha</label>  
  <div class="col-md-4 inputGroupContainer">
  <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
  <div style="float: left;" class="input-group date form_date col-md-12" data-date="" data-date-format="dd/mm/yyyy" data-link-field="dtp_input2" data-link-format="yyyy/mm/dd">
					
                    <input name="fecha" class="form-control" size="16" type="text" value="<?php echo $row['fecha'] ?? 'Seleccionar fecha';?>"readonly>
                    <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
					
                </div>

    </div>
  </div>
</div>
<!-- Text input-->

<div class="form-group">
  <label class="col-md-4 control-label">Hora</label>  
  <div class="col-md-4 inputGroupContainer">
  <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>

  <div style="float: left;" class="input-group date form_time col-md-12" data-date="" data-date-format="hh:ii" data-link-format="hh:ii">
                    <input required name="hora" class="form-control" size="16" type="text" value="Seleccionar Hora" readonly>
                    <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
					
                </div>
				
  </div>
</div>
</div>

  
  
<!-- Text input Descripción-->


<div class="form-group">
  <label class="col-md-4 control-label">Descripción</label>  
  <div class="col-md-4 inputGroupContainer">
  <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-align-center"></i></span>
  <input name="descripcion" placeholder="Descripcion" class="form-control" value="<?php echo $row['descripcion'] ?? ''?> "  type="text">
    </div>
  </div>
</div>

<!-- Text input-->

<div class="form-group">
  <label class="col-md-4 control-label">Detalle</label> 
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-tasks"></i></span>
  <input name="detalle" placeholder="Detalle" class="form-control" value="<?php echo $row['detalle'] ?? '';?> " type="text">
    </div>
  </div>
</div>

<!-- Text input-->

<div class="form-group">
  <label class="col-md-4 control-label" >Zona</label> 
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-unchecked"></i></span>
  <input name="zona" placeholder="Zona" class="form-control"  type="text" value="<?php echo $row['zona'] ?? '';?> " >
    </div>
  </div>
</div>



<!-- Select Basic -->


<!-- Button -->
<div style="margin-right: 50px;" class="form-group">
  <label class="col-md-4 control-label"></label>
  <div class="col-md-4"><br>
    &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<button type="submit" class="btn-lg btn-success" >&nbsp&nbsp&nbsp&nbsp&nbsp&nbspENVIAR <span class="glyphicon glyphicon-send"></span>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</button>
  </div>
</div>

</fieldset>
</form>



		
	


	
</div>
<script type="text/javascript" src="./jquery/jquery-1.8.3.min.js" charset="UTF-8"></script>
<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
<script type="text/javascript" src="js/locales/bootstrap-datetimepicker.fr.js" charset="UTF-8"></script>
<script type="text/javascript">
    $('.form_datetime').datetimepicker({
        language:  'en',
        weekStart: 1,
        todayBtn:  0,
		autoclose: 1,
		todayHighlight: 1,
		startView: 2,
		forceParse: 0,
        showMeridian: 1
    });
	$('.form_date').datetimepicker({
        language:  'en',
        weekStart: 1,
        todayBtn:  0,
		autoclose: 1,
		todayHighlight: 1,
		startView: 2,
		minView: 2,
		forceParse: 0
    });
	$('.form_time').datetimepicker({
        language:  'en',
        weekStart: 1,
        todayBtn:  0,
		autoclose: 1,
		todayHighlight: 0,
		startView: 1,
		minView: 0,
		maxView: 1,
		forceParse: 0
    });
</script>
</body>
</center>
</html>   