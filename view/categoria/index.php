<?php
	require_once("../../config/conexion.php");
	if (isset($_SESSION["usu_id"])) {
?>
<!DOCTYPE html>
<html>
    <?php require_once("../mainhead/head.php");?>
    <title>SolicitudesTI - Categorías</title>
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
							<h3>Categorías</h3>
							<ol class="breadcrumb breadcrumb-simple">
								<li><a href="../home/">Inicio</a></li>
								<li class="active">Categorías</li>
							</ol>
						</div>
					</div>
				</div>
			</header>
			<div class="box-typical box-typical-padding">
				<button type="button" id="btnnuevo" class="btn btn-inline btn-primary">Nuevo Registro</button>
				<table id="categoria_data" class="table table-bordered table-striped table-vcenter js-dataTable-full">
					<thead>
						<tr>
							<th style="width: 5%;">ID</th>
							<th style="width: 75%;">Categoria</th>
							<th class="text-center" style="width: 10%;">Editar</th>
							<th class="text-center" style="width: 10%;">Eliminar</th>
						</tr>
					</thead>
					<tbody>

					</tbody>
				</table>
			</div>
		</div><!--.container-fluid-->
	</div><!--.page-content-->
	<?php require_once("modalcategoria.php");?>
	<?php require_once("../mainjs/js.php");?>
	<script type="text/javascript" src="categoria.js"></script>
</body>
<?php require_once("../footer/footer.php");?>
</html>
<?php
 	} else {
		header("Location:".Conectar::ruta()."index.php");
	}
 ?>