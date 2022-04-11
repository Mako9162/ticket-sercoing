<?php
	require_once("../../config/conexion.php");
	if (isset($_SESSION["usu_id"])) {
?>
<!DOCTYPE html>
<html>
    <?php require_once("../mainhead/head.php");?>
    <title>SolicitudesTI - Perfil</title>
	<link rel="shortcut icon" href="../../public/img/Icono.ico">
</head>
<body class="with-side-menu">
    <?php require_once("../mainheader/header.php");?>
	<div class="mobile-menu-left-overlay"></div>
    <?php require_once("../mainnav/nav.php");?>
	<div class="page-content">
		<div class="container-fluid">
		<header class="section-header">
				<div class="tbl">
					<div class="tbl-row">
						<div class="tbl-cell">
							<h3>Perfil de usuario</h3>
							<ol class="breadcrumb breadcrumb-simple">
								<li><a href="../home/">Inicio</a></li>
								<li class="active">Perfil de usuario</li>
							</ol>
						</div>
					</div>
				</div>
			</header>
			<div class="box-typical box-typical-padding">
				<h5 class="m-t-lg with-border">Información de Usuario</h5>
				<div class="row">
				 
					<div class="col-lg-6">
						<label class="form-group">
						<label class="form-label semibold" for="usu_nom">Nombres</label>
						<input type="text" class="form-control" id="usu_nom" name="usu_nom" readonly>
						</label>
					</div>
					<div class="col-lg-6">
						<label class="form-group">
						<label class="form-label semibold" for="usu_ape">Apellidos</label>
						<input type="text" class="form-control" id="usu_ape" name="usu_ape" readonly>
						</label>
					</div>
					<div class="col-lg-12">
						<label class="form-group">
							<label class="form-label semibold" for="usu_correo">Correo</label>
							<input type="email" class="form-control" id="usu_correo" name="usu_correo" readonly>
						</label>
					</div>

			
				</div>
			</div>
			<div class="box-typical box-typical-padding">
			<h5 class="m-t-lg with-border">Cambiar contraseña</h5>
				
				<div class="row">
					<div class="col-lg-6">
						<fieldset class="form-group">
							<label class="form-label semibold" for="txtpass">Nueva Contraseña</label>
							<input type="password" class="form-control" id="txtpass" name="txtpass" placeholder="*************">
						</fieldset>
					</div>
					<div class="col-lg-6">
						<fieldset class="form-group">
							<label class="form-label semibold" for="txtpassnew">Confirmar contraseña</label>
							<input type="password" name="txtpassnew" id="txtpassnew" class="form-control" placeholder="*************">
						</fieldset>
					</div>
					<div class="col-lg-12">
						<button type="button" id="btnactualizar" name="btnactualizar"  class="btn btn-rounded btn-inline btn-primary">Actualizar</button>
					</div>
				</div>
			</div>
		</div>
	</div>
    <?php require_once("../mainjs/js.php");?>
	<script type="text/javascript" src="perfil.js"></script>
</body>
<?php require_once("../footer/footer.php");?>
</html>
<?php
 	} else {
		header("Location:".Conectar::ruta()."index.php");
	}
?>