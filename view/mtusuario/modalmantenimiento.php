<div class="modal fade bd-example-modal-lg" id="modalmantenimiento" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="modal-close" data-dismiss="modal" aria-label="Close">
									<i class="font-icon-close-2"></i>
								</button>
								<h4 class="modal-title" id="mdltitulo"></h4>
							</div>
							<form action="post" id="usuario_form">
								<div class="modal-body">

									<input type="hidden" name="usu_id" id="usu_id"> 

									<cdiv class="form-group">
										<label class="form-label" for="usu_nom">Nombres</label>
										<input type="text"  class="form-control" id="usu_nom" name="usu_nom" placeholder="Ingrese Nombres" required>
									</cdiv>

									<cdiv class="form-group">
										<label class="form-label" for="usu_ape">Apellidos</label>
										<input type="text"  class="form-control" id="usu_ape" name="usu_ape" placeholder="Ingrese Apellidos" required>
									</cdiv>

									<cdiv class="form-group">
										<label class="form-label" for="usu_pass">Contraseña</label>
										<input type="text"  class="form-control" id="usu_pass" name="usu_pass" placeholder="************" required>
									</cdiv>

									<cdiv class="form-group">
										<label class="form-label" for="usu_correo">E-mail</label>
										<input type="email"  class="form-control" id="usu_correo" name="usu_correo" placeholder="Ingrese e-mail" required>
									</cdiv>

									<cdiv class="form-group">
										<label class="form-label" for="rol_id">Rol</label>
										<select class="select2" id="rol_id" name="rol_id">
											<option value="1">Usuario</option>
											<option value="2">Administrador</option>
											<option value="3">Técnico</option>
										</select>
									</cdiv>

								</div>
							
								<div class="modal-footer">
									<button type="button" class="btn btn-rounded btn-default" data-dismiss="modal">Cerrar</button>
									<button type="submit"  name="action" id="#" value="add" class="btn btn-rounded btn-primary">Guardar</button>
								</div>
							</form>
						</div>
					</div>
				</div>