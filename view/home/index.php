<?php
	require_once("../../config/conexion.php");
	if (isset($_SESSION["usu_id"])) {
?>
<!DOCTYPE html>
<html>
    <?php require_once("../mainhead/head.php");?>
	<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
    <title>SolicitudesTI - Sercoing </title>
	<link rel="shortcut icon" href="../../public/img/Icono.ico">
</head>
<body class="with-side-menu">
    <?php require_once("../mainheader/header.php");?>
	<div class="mobile-menu-left-overlay"></div>
    <?php require_once("../mainnav/nav.php");?>
	<div class="page-content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-xl-12">
					<div class="row">
						<div class="col-sm-4">
							<article class="statistic-box yellow">
								<div> 
									<div class="number" id="lbltotal"></div>
									<div class="caption"><div>Tickets Totales</div></div>
								</div>
							</article>
						</div>	
						<div class="col-sm-4">
							<article class="statistic-box green">
								<div> 
									<div class="number" id="lblabiertos"></div>
									<div class="caption"><div>Tickets Abiertos</div></div>
								</div>
							</article>
						</div>
						<div class="col-sm-4">
							<article class="statistic-box red">
								<div> 
									<div class="number" id="lblcerrados"></div>
									<div class="caption"><div>Tickets Cerrados</div></div>
								</div>
							</article>
						</div>
					</div>	
				</div>
			</div>
			
			<section class="card">
				<header class="card-header">
					Tickets por categorías
				</header>
				<div class="card-block">
					<div id="divgrafico" style="height: 250px;"></div>
				</div>
			</section>

		</div><!--.container-fluid-->
	</div><!--.page-content-->
    <?php require_once("../mainjs/js.php");?>

	<script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>

	<script type="text/javascript" src="home.js"></script>
</body>
<?php require_once("../footer/footer.php");?>
</html>
<?php
 	} else {
		header("Location:".Conectar::ruta()."index.php");
	}
 ?>