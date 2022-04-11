<?php
	require_once("../../config/conexion.php");
	if (isset($_SESSION["usu_id"])) {
?>
<!DOCTYPE html>
<html>
    <?php require_once("../mainhead/head.php");?>
    <title>SolicitudesTI - Usuarios</title>
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
							<h3>Usuarios</h3>
							<ol class="breadcrumb breadcrumb-simple">
								<li><a href="../home/">Inicio</a></li>
								<li class="active">Mantenimiento Usuario</li>
							</ol>
						</div>
					</div>
				</div>
			</header>

			<div class="box-typical box-typical-padding">
				<button type="button" id="btnnuevo" class="btn btn-inline btn-primary">Nuevo Registro</button>
				<table id="usuario_data" class="table table-bordered table-striped table-vcenter js-dataTable-full">
					<thead>
						<tr>
							<th style="width: 10%;">Nombre</th>
							<th style="width: 10%;">Apellido</th>
							<th class="d-none d-sm-table-cell" style="width: 40%;">Correo</th>
							<th class="d-none d-sm-table-cell" style="width: 10%;">Contraseña</th>
							<th class="d-none d-sm-table-cell" style="width: 10%;">Rol</th>
							<th class="text-center" style="width: 10%;">Editar</th>
							<th class="text-center" style="width: 10%;">Eliminar</th>
						</tr>
					</thead>
					<tbody>

					</tbody>
				</table>
			</div>

		</div>
	</div>
	<?php require_once("modalmantenimiento.php");?>
    <?php require_once("../mainjs/js.php");?>
	<script type="text/javascript" src="usuario.js"></script>
</body>
<?php require_once("../footer/footer.php");?>
</html>
<?php
 	} else {
		header("Location:".Conectar::ruta()."index.php");
	}
 ?>