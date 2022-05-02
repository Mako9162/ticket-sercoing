<?php
	require_once("../../config/conexion.php");
	if (isset($_SESSION["usu_id"])) {
?>
<!DOCTYPE html>
<html>
    <?php require_once("../mainhead/head.php");?>
    <title>SolicitudesTI - Ayuda</title>
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
							<h3>Manual de usuario</h3>
							<ol class="breadcrumb breadcrumb-simple">
								<li><a href="../home/">Inicio</a></li>
								<li class="active">Manual de usuario</li>
							</ol>
						</div>
					</div>
				</div>
			</header>
            <div class="box-typical box-typical-padding">
			<!-- <iframe src="https://drive.google.com/file/d/15-_AOVCUtdeVvmYBgU7p7GhBKVEHJ5m4/preview"  width="100%" height="600px" allow="autoplay"></iframe> -->
            	<embed src="Manual de Usuario - SolicitudesTI_V1.0.pdf" type="application/pdf" width="100%" height="600px"  />
								
            </div>	

		</div><!--.container-fluid-->
	</div><!--.page-content-->

	<?php require_once("../mainjs/js.php");?>
	<!-- <script type="text/javascript" src="categoria.js"></script> -->
</body>
<?php require_once("../footer/footer.php");?>
</html>
<?php
 	} else {
		header("Location:".Conectar::ruta()."index.php");
	}
 ?>