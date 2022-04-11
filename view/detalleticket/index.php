<?php
	require_once("../../config/conexion.php");
	if (isset($_SESSION["usu_id"])) {
?>
<!DOCTYPE html>
<html>
    <?php require_once("../mainhead/head.php");?>
    <title>SolicitudesTI - Detalle de Ticket</title>
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
							<h3 id="lblnomidticket"></h3>
							<span  id="lblestado"></span>
							<span class="label label-pill label-primary" id="lblnomusuario"></span>
							<span class="label label-pill label-default" id="lblfechcrea"></span> 
							<ol class="breadcrumb breadcrumb-simple">
								<li><a href="../home/">Inicio</a></li>
								<li class="active">Detalle de Ticket</li>
							</ol>
						</div>
					</div>
				</div>
			</header>
			<div class="box-typical box-typical-padding">
				<div class="row">
						<div class="col-lg-4">
							<fieldset class="form-group">
							<label class="form-label semibold" for="cat_id">Categoría</label>
							<input type="text" class="form-control" name="cat_nom" id="cat_nom" readonly>
							</fieldset>
						</div>
						<div class="col-lg-4">
							<fieldset class="form-group">
							<label class="form-label semibold" for="cats_id">Subcategoría</label>
							<input type="text" class="form-control" name="cats_nom" id="cats_nom" readonly>
							</fieldset>
						</div>
						<div class="col-lg-4">
							<fieldset class="form-group">
							<label class="form-label semibold" for="cos_id">Contrato</label>
							<input type="text" id="cos_nom" name="cos_nom" class="form-control" readonly>
							</fieldset>
						</div>
						<div class="col-lg-12">
							<fieldset class="form-group">
								<label class="form-label semibold" for="titulo">Asunto</label>
								<input type="text" class="form-control" id="titulo" name="titulo" readonly>
							</fieldset>
						</div>
						<div class="col-lg-12">
							<fieldset class="form-group">
								<label class="form-label semibold" for="titulo">Documentos Adicionales</label>
									<table id="documentos_data" class="table table-bordered table-striped table-vcenter js-dataTable-full">
										<thead>
											<tr>
												<th style="width: 90%;">Nombre</th>
												<th class="text-center" style="width: 10%;"></th>
											</tr>
										</thead>
										<tbody>

										</tbody>
									</table>
							</fieldset>
						</div>

						<div class="col-lg-12">
							<fieldset class="form-group">
								<label class="form-label semibold" for="descripd">Descripción</label>
								<div class="summernote-theme-2">
									<textarea class="summernote" id="descripd" name="descripd" ></textarea>
								</div>
							</fieldset>
						</div>
				</div>
			</div>
			<section class="activity-line" id="lbldetalle">
			
			</section>
			<div class="box-typical box-typical-padding" id="pnldetalle">
				<p>
					Ingrese su duda o consulta
				</p>
				<div class="row">
					<div class="col-lg-12">
						<fieldset class="form-group">
							<label class="form-label semibold" for="descrip">Descripción</label>
							<div class="summernote-theme-2">
								<textarea class="summernote" id="descrip" name="descrip" ></textarea>
							</div>
						</fieldset>
					</div>
					<div class="col-lg-12">
						<button type="button" id="btnenviartk" class="btn btn-rounded btn-inline btn-primary">Enviar</button>
						<?php
							if ($_SESSION["rol_id"]==2){
						?>
							<button type="button" id="btncerrartk" class="btn btn-rounded btn-inline btn-danger float-right">Cerrar Ticket</button>
						<?php
							} else {
		
						}
 						?>
					</div>
				</div>
			</div>
		</div>
	</div>
    <?php require_once("../mainjs/js.php");?>
	<script type="text/javascript" src="detalleticket.js"></script>
</body>
<?php require_once("../footer/footer.php");?>
</html>
<?php
 	} else {
		header("Location:".Conectar::ruta()."index.php");
	}
 ?>