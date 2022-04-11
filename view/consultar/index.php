<?php
	require_once("../../config/conexion.php");
	if (isset($_SESSION["usu_id"])) {
?>
<!DOCTYPE html>
<html>
    <?php require_once("../mainhead/head.php");?>
    <title>SolicitudesTI - Consultar Ticket</title>
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
							<h3>Consultar Ticket</h3>
							<ol class="breadcrumb breadcrumb-simple">
								<li><a href="../home/">Inicio</a></li>
								<li class="active">Consultar Ticket</li>
							</ol>
						</div>
					</div>
				</div>
			</header>
			<div class="box-typical box-typical-padding">
				<table id="ticket_data" class="table table-bordered table-striped table-vcenter js-dataTable-full">
					<thead>
						<tr>
							<th style="width: 5%;">Nro.Ticket</th>
							<th style="width: 10%;">Categoria</th>
							<th style="width: 10%;">Subcategoria</th>
							<th style="width: 10%;">Contrato</th>
							<th class="d-none d-sm-table-cell" style="width: 30%;">Asunto</th>
							<th class="d-none d-sm-table-cell" style="width: 5%;">Estado</th>
							<th class="d-none d-sm-table-cell" style="width: 10%;">Fecha Creación</th>
							<th class="d-none d-sm-table-cell" style="width: 10%;">Fecha Asignación</th>
							<th class="d-none d-sm-table-cell" style="width: 10%;">Soporte</th>
							<th class="text-center" style="width: 5%;">Ver</th>
						</tr>
					</thead>
					<tbody>

					</tbody>
				</table>
			</div>
		</div><!--.container-fluid-->
	</div><!--.page-content-->

	<?php require_once("modalasignar.php");?>

    <?php require_once("../mainjs/js.php");?>
	<script type="text/javascript" src="consultar.js"></script>
</body>
<?php require_once("../footer/footer.php");?>
</html>
<?php
 	} else {
		header("Location:".Conectar::ruta()."index.php");
	}
 ?>