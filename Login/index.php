<?php
session_start();
  if (isset($_SESSION['usuario'])) {
    header('Location: ../vistas/admin.php');
  } 
?>
<!DOCTYPE HTML>
<html lang="zxx">
<head>
	<title>WARMI JARK'AY</title>
	<link rel="shortcut icon" href="_plantilla/images/LogoCom.png">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="UTF-8" />
	<meta name="keywords" content="Full Screen Enroll Form Responsive Widget,Login form widgets, Sign up Web forms , Login signup Responsive web form,Flat Pricing table,Flat Drop downs,Registration Forms,News letter Forms,Elements" />
	<link rel="stylesheet" href="bootstrap.min.css" crossorigin="anonymous">
	</script>
	<link rel="stylesheet" href="_plantilla/css/estilos.css" type="text/css" media="all" />
	<link rel="stylesheet" href="_plantilla/css/fontawesome-all.css">
	<!--<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">-->
	
	<link rel="stylesheet" href="_plantilla/js/sweetalert.css">   
	
<header class="main-header">
		<img class="img1" src="_plantilla/images/LogoCom.png">  
        <h2 class="l">COMISARIA PNP HUASCAR <br> WARMI JARK'AY</h2>
</header>
</head>

<body>


<div class="container">
	<div class="d-flex justify-content-center h-100">
		<div class="card">
			<div class="card-header">
				<h3>INICIAR SESIÓN</h3>
			</div>
			<div class="card-body">
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-user"></i></span>
						</div>
						<input type="text" class="form-control" placeholder="Usuario" id="txt_usuario">
					</div>
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-key"></i></span>
						</div>
						<input type="password" class="form-control" placeholder="Contraseña" id="txt_pass">
					</div>
					<center>
					<!--<a href="seguimiento.php" class="btn btn-default" style="box-shadow: 0 0 0 .2rem rgba(0,0,0,0);">Seguimiento Documentario</a><br><br> -->
					<button onclick="VerificarUsuario()"  class="btn">INGRESAR</button></br>

					</center>
					<center><h8><i class='fa fa-download'></i><u><a style='color:black' href='../../../APK/Warmi_Jarkay.apk' download='Warmi_Jarkay.apk'>Descargar APK </a></u></h8></center>

			</div>

		</div>

		
	</div>
	
		<div class="panel panel-default">
            <div class="panel-body">
              <div style="text-align: center;" align="center">
              <img class="imagen" style="text-align: center;" align="center" src="_plantilla/images/index.png">
            </div>
            </div>  
        </div>
</div>


<footer class="main-footer"><center>
    <b>Dirección: </b> Av. Juliaca con Jr. Tupac Catari <br>
	<b>Celular: </b> 945191118 <br>
    <strong> <a target="_blank" >COMISARIA PNP HUASCAR PUNO</a></strong> &copy; Copyright 2021 
      reservados.
</center></footer>

<script src="../vistas/_recursos/js/jquery.min.js"></script>
<script src="../vistas/_recursos/js/consola_usuario.js"></script>
<script src="_plantilla/js/sweetalert.min.js"></script>
</body>
</html>

