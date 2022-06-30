<?php
	require_once("../../config/conexion.php");
	if (isset($_SESSION["usu_id"])) {
?>

<?php
	if ($_SESSION["rol_id"]==1){
		?>
			<nav class="side-menu">
				<ul class="side-menu-list">
					<li class="blue-dirty">
						<a href="..\home\">
							<span class="glyphicon glyphicon-home"></span>
							<span class="lbl">Inicio</span>
						</a>
					<li class="blue-dirty">
						<a href="..\nuevo\">
							<span class="glyphicon glyphicon-tag"></span>
							<span class="lbl">Nuevo Ticket</span>
						</a>
					</li>
					<li class="blue-dirty">
						<a href="..\consultar\">
							<span class="glyphicon glyphicon-tags"></span>
							<span class="lbl">Consultar Ticket</span>
						</a>
					</li>
					</li>
				</ul>
			</nav>
		<?php
	}else if ($_SESSION["rol_id"]==2){
		?>
			<nav class="side-menu">
				<ul class="side-menu-list">
					<li class="blue-dirty">
						<a href="..\home\">
							<span class="glyphicon glyphicon-home"></span>
							<span class="lbl">Inicio</span>
						</a>
					</li>	
					<li class="blue-dirty">
						<a href="..\nuevo\">
							<span class="glyphicon glyphicon-tag"></span>
							<span class="lbl">Nuevo Ticket</span>
						</a>
					</li>
					<li class="blue-dirty">
						<a href="..\consultar\">
							<span class="glyphicon glyphicon-tags"></span>
							<span class="lbl">Consultar Ticket</span>
						</a>
					</li>
					<li class="blue-dirty">
						<a href="..\mtusuario\">
							<span class="glyphicon glyphicon-user"></span>
							<span class="lbl">Usuarios</span>
						</a>
					</li>
					<li class="blue-dirty">
						<a href="..\costo\">
							<span class="glyphicon glyphicon-th"></span>
							<span class="lbl">Contratos</span>
						</a>
					</li>
					<li class="blue-dirty">
						<a href="..\categoria\">
							<span class="glyphicon glyphicon-tasks"></span>
							<span class="lbl">Categorías</span>
						</a>
					</li>
				</ul>
			</nav>

		<?php
	}else if ($_SESSION["rol_id"]==3){
?>

<nav class="side-menu">
				<ul class="side-menu-list">
					<li class="blue-dirty">
						<a href="..\home\">
							<span class="glyphicon glyphicon-home"></span>
							<span class="lbl">Inicio</span>
						</a>
					<li class="blue-dirty">
						<a href="..\nuevo\">
							<span class="glyphicon glyphicon-tag"></span>
							<span class="lbl">Nuevo Ticket</span>
						</a>
					</li>
					<li class="blue-dirty">
						<a href="..\consultar\">
							<span class="glyphicon glyphicon-tags"></span>
							<span class="lbl">Consultar Ticket</span>
						</a>
					</li>
					</li>
				</ul>
			</nav>
			<?php
	}
?>
<?php
 	} else {
		header("Location:".Conectar::ruta()."index.php");
	}
 ?>