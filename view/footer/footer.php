<?php
	require_once("../../config/conexion.php");
	if (isset($_SESSION["usu_id"])) {
?>
<style>
footer {
  background-color: #fff;
  position: fixed;
  bottom: 0;
  width: 100%;
  height: 50px;
  color: black;
  padding: 0.5%;
}
</style>
<footer style="background-color: #fff;">
  <div class="text-center p-8" style="background-color: #fff;">
  © Copyright - Innovación y Desarrollo
    <a class="text-dark" href="https://www.sercoing.cl/">Sercoing Ltda.</a>
  </div>
</footer>

<?php
 	} else {
		header("Location:".Conectar::ruta()."index.php");
	}
 ?>