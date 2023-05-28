<!-- Modal -->
<div class="modal fade" id="modalFormCliente" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header headerRegister">
				<h5 class="modal-title" id="titleModal">Nuevo Usuario</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="tile">
					<form id="formCliente" name="formCliente" class="form-horizontal">
						<input type="hidden" id="idUsuario" name="idUsuario" value="">
						<p class="text-primary">Los campos con asterisco (<span class="required">*</span>) son obligatorios.</p>
						
						<div class="form-row">
							<div class="form-group col-md-4">
								<label for="txtIdentificacion">Identificación <span class="required">*</span></label>
								<input type="text" class="form-control valid validNumber" id="txtIdentificacion" name="txtIdentificacion" onkeypress="return controlTag(event);">
							</div>
							<div class="form-group col-md-4">
								<label for="txtNombre">Nombres <span class="required">*</span></label>
								<input type="text" class="form-control valid validText" id="txtNombre" name="txtNombre">
							</div>
							<div class="form-group col-md-4">
								<label for="txtApellido">Apellidos <span class="required">*</span></label>
								<input type="text" class="form-control valid validText" id="txtApellido" name="txtApellido">
							</div>
						</div>
						<div class="form-row">
							<div class="form-group col-md-6">
								<label for="txtTelefono">Teléfono <span class="required">*</span></label>
								<input type="text" class="form-control valid validNumber" id="txtTelefono" name="txtTelefono" onkeypress="return controlTag(event);">
							</div>
							<div class="form-group col-md-6">
								<label for="txtEmail">Email <span class="required">*</span></label>
								<input type="email" class="form-control valid validEmail" id="txtEmail" name="txtEmail">
							</div>						</div>
						<hr>
						<p class="text-primary">Datos Fiscales.</p>
						<div class="form-row">
							<div class="form-group col-md-4">
								<label>Departamento <span class="required">*</span></label>
								<select class="form-control" data-live-search="true" title="Seleccione departamento" id="listDepto" name="listDepto">
									<option value="0"> Departamento</option>
								</select>
							</div>
							<div class="form-group col-md-4">
								<label>Ciudad <span class="required">*</span></label>
								<select class="form-control" data-live-search="true" title="Seleccione ciudad" id="listMcpio" name="listMcpio">
									<option value=0""> Seleccione ciudad</option>
								</select>
							</div>
							<div class="form-group col-md-4">
								<label>Ocupación <span class="required">*</span></label>
								<select class="form-control selectpicker" title="Ocupación" id="listOcup" name="listOcup" onchange="ver()">
									<option value="1">Empleado</option>
									<option value="2">Estudiante</option>
									<option value="3">Pensionado</option>
									<option value="4">Independiente</option>
									<option value="5">Desempleado</option>
								</select>
							</div>
							<div class="form-group col-md-12">
								<label>Dirección <span class="required">*</span></label>
								<input class="form-control" type="text" id="txtDirFiscal" name="txtDirFiscal">
							</div>
						</div>
						<div class="form-row">
						
						</div>
						<div class="tile-footer">
							<button id="btnActionForm" class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i><span id="btnText">Guardar</span>
							</button>&nbsp;&nbsp;&nbsp;
							<button class="btn btn-danger" type="button" data-dismiss="modal"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cerrar</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- Modal -->
<div class="modal fade" id="modalViewCliente" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header header-primary">
				<h5 class="modal-title" id="titleModal">Datos del cliente</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<table class="table table-bordered">
					<tbody>
					<tr>
						<td>Identificación:</td>
						<td id="celIdentificacion">654654654</td>
					</tr>
					<tr>
						<td>Nombres:</td>
						<td id="celNombre">Jacob</td>
					</tr>
					<tr>
						<td>Apellidos:</td>
						<td id="celApellido">Jacob</td>
					</tr>
					<tr>
						<td>Teléfono:</td>
						<td id="celTelefono">Larry</td>
					</tr>
					<tr>
						<td>Email (Cliente):</td>
						<td id="celEmail">Larry</td>
					</tr>
					<tr>
						<td>Departamento:</td>
						<td id="celNomDepto">Madrid</td>
					</tr>
					<tr>
						<td>Ciudad:</td>
						<td id="celNomCiudad">Madrid</td>
					</tr>
					<tr>
						<td>Dirección:</td>
						<td id="celDirFiscal">Larry</td>
					</tr>
					<tr>
						<td>Ocupación:</td>
						<td id="celOcupacion">Larry</td>
					</tr>
					<tr>
						<td>Fecha registro:</td>
						<td id="celFechaRegistro">Larry</td>
					</tr>
					</tbody>
				</table>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
			</div>
		</div>
	</div>
</div>



