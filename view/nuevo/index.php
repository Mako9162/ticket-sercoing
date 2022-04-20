<?php
	require_once("../../config/conexion.php");
	if (isset($_SESSION["usu_id"])) {
?>
<!DOCTYPE html>
<html>
    <?php require_once("../mainhead/head.php");?>
    <title>SoporteTI/title>
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
							<h3>Nuevo Ticket</h3>
							<ol class="breadcrumb breadcrumb-simple">
								<li><a href="../home/">Inicio</a></li>
								<li class="active">Nuevo Ticket</li>
							</ol>
						</div>
					</div>
				</div>
			</header>
			<div class="box-typical box-typical-padding">
				<p>
					Desde esta ventana podrá generar nuevos tickets. Puede usar Windows + Shift + S e ingresar un print de pantalla completo o parcial.				</p>

				<h5 class="m-t-lg with-border">Ingresar Información</h5>
				<div class="row">
				<form method="post" id="ticket_form">
					<input type="hidden" id= "usu_id" name="usu_id" value="<?php echo $_SESSION['usu_id']?>">
					<div class="col-lg-4">
						<fieldset class="form-group">
						<label class="form-label semibold" for="cat_id">Categoría</label>
						<select id="cat_id" name="cat_id" class="form-control">
						</select>
						</fieldset>
					</div>
					<div class="col-lg-4">
						<fieldset class="form-group">
						<label class="form-label semibold" for="cats_id">Subcategoría</label>
						<select id="cats_id" name="cats_id" class="form-control" data-placeholder="Seleccionar">
						<option label="Seleccionar"></option>
						</select>
						</fieldset>
					</div>
					<div class="col-lg-4">
						<fieldset class="form-group">
						<label class="form-label semibold" for="cos_id">Contrato</label>
						<select id="cos_id" name="cos_id" class="form-control">
						</select>
						</fieldset>
					</div>
					<div class="col-lg-6">
						<fieldset class="form-group">
							<label class="form-label semibold" for="tick_titulo">Asunto</label>
							<input type="text" class="form-control" id="tick_titulo" name="tick_titulo" placeholder="Ingrese título">
						</fieldset>
					</div>
					<div class="col-lg-6">
						<fieldset class="form-group">
							<label class="form-label semibold" for="fileElem">Documentos Adicionales</label>
							<input type="file" name="fileElem" id="fileElem" class="form-control" multiple>
						</fieldset>
					</div>
					<div class="col-lg-12">
						<fieldset class="form-group">
							<label class="form-label semibold" for="tick_descrip">Descripción</label>
							<div class="summernote-theme-2">
								<textarea class="summernote" id="tick_descrip" name="tick_descrip" ></textarea>
							</div>
						</fieldset>
					</div>
					<div class="col-lg-12">
						<button type="submit" name="action" value="add" class="btn btn-rounded btn-inline btn-primary">Guardar</button>
					</div>
				</form>	
				</div>
			</div>
		</div>
	</div>
    <?php require_once("../mainjs/js.php");?>
	<script type="text/javascript" src="nuevo.js"></script>
</body>

<?php require_once("../footer/footer.php");?>


</html>
<?php
 	} else {
		header("Location:".Conectar::ruta()."index.php");
	}
?>