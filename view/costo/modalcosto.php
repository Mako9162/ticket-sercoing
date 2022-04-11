<div class="modal fade bd-example-modal-lg" id="modalcosto" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="modal-close" data-dismiss="modal" aria-label="Close">
									<i class="font-icon-close-2"></i>
								</button>
								<h4 class="modal-title" id="mdltitulo"></h4>
							</div>
							<form action="post" id="costo_form">
								<div class="modal-body">

									<input type="hidden" name="cos_id" id="cos_id"> 

									<cdiv class="form-group">
										<label class="form-label" for="cos_nom">Categoría</label>
										<input type="text"  class="form-control" id="cos_nom" name="cos_nom" placeholder="Ingrese Categoría" required>
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