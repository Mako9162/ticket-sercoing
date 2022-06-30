<?php
	require_once("../../config/conexion.php");
	if (isset($_SESSION["usu_id"])) {
?>
<script src="../../public/js/lib/jquery/jquery.min.js"></script>
<script src="../../public/js/lib/tether/tether.min.js"></script>
<script src="../../public/js/lib/bootstrap/bootstrap.min.js"></script>
<script src="../../public/js/plugins.js"></script>
<script src="../../public/js/app.js"></script>

<script src="../../public/js/lib/datatables-net/datatables.min.js"></script>

<script src="../../public/js/lib/bootstrap-sweetalert/sweetalert.min.js"></script>

<script src="../../public/js/lib/summernote/summernote.min.js"></script>

<script src="../../public/js/lib/fancybox/jquery.fancybox.pack.js"></script>

<script src="../../public/js/summernote-ES.js"></script>

<script src="../../public/js/lib/select2/select2.full.min.js"></script>

<?php
 	} else {
		header("Location:".Conectar::ruta()."index.php");
	}
 ?>