document.addEventListener('DOMContentLoaded', function () {

	if (document.querySelector("#formCliente")) {
		let formCliente = document.querySelector("#formCliente");
		formCliente.onsubmit = function (e) {
			e.preventDefault();
			let strIdentificacion = document.querySelector('#txtIdentificacion').value;
			let strNombre = document.querySelector('#txtNombre').value;
			let strApellido = document.querySelector('#txtApellido').value;
			let strEmail = document.querySelector('#txtEmail').value;
			let intTelefono = document.querySelector('#txtTelefono').value;
			let strlistDepto = document.querySelector('#listDepto').value;
			let strlistMcpio = document.querySelector('#listMcpio').value;
			let strlistOcup = document.querySelector('#listOcup').value;
			let strDirFiscal = document.querySelector('#dirFiscal').value;

			if (strIdentificacion == '' || strApellido == '' || strNombre == '' || strEmail == '' || intTelefono == '' || strlistDepto == '' || strlistMcpio == ''
				|| strlistOcup == '' || strDirFiscal == '') {
				alerta("Atención", "Todos los campos son obligatorios.", "error");
				return false;
			}

			let elementsValid = document.getElementsByClassName("valid");
			for (let i = 0; i < elementsValid.length; i++) {
				if (elementsValid[i].classList.contains('is-invalid')) {
					alerta("Atención", "Por favor verifique los campos en rojo.", "error");
					return false;
				}
			}
			let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
			let ajaxUrl = base_url + '/Clientes/setCliente';
			let formData = new FormData(formCliente);
			request.open("POST", ajaxUrl, true);
			request.send(formData);
			/*request.onreadystatechange = function () {
				if (request.readyState == 4 && request.status == 200) {
					let objData = JSON.parse(request.responseText);
					if (objData.status) {

						$('#modalFormCliente').modal("hide");
						formCliente.reset();
						alerta("Usuarios", objData.msg, "success");
					} else {
						alerta("Error", objData.msg, "error");
					}
				}
				return false;
			}*/
		}
	}

}, false);

window.addEventListener('load', function () {
	fntDepartamentos();
	fntMunicipios();
}, false);

// * Cargamos los Departamentos
function fntDepartamentos() {
	const ajaxUrl = base_url + '/Clientes/getSelectDepto';
	const request = window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject("Microsoft.XMLHTTP");
	request.open("GET", ajaxUrl, true);
	request.send();
	request.onreadystatechange = function () {
		if (request.readyState == 4 && request.status == 200) {
			document.querySelector('#listDepto').innerHTML = request.responseText;
			$('#listDepto').selectpicker('render');
		}
	}

}

// * Cargamos las Municipios por Departamentos
function fntMunicipios() {
	$(document).ready(function (e) {
		$('#listDepto').change(function () {
			const $idDepto = $('#listDepto').val();
			const ajaxUrl = base_url + '/Clientes/getSelectMcpio/' + $idDepto;
			const request = window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject("Microsoft.XMLHTTP");
			request.open("GET", ajaxUrl, true);
			request.send();
			request.onreadystatechange = function () {
				if (request.readyState == 4 && request.status == 200) {
					document.querySelector('#listMcpio').innerHTML = request.responseText;
					$('#listMcpio').selectpicker('refresh');
				}
			}
		});
	})

}

function openModal() {
	rowTable = "";
	document.querySelector('#idUsuario').value = "";
	document.querySelector('.modal-header').classList.replace("headerUpdate", "headerRegister");
	document.querySelector('#btnActionForm').classList.replace("btn-info", "btn-primary");
	document.querySelector('#btnText').innerHTML = "Guardar";
	document.querySelector('#titleModal').innerHTML = "Nuevo Cliente";
	document.querySelector("#formCliente").reset();
	$('#modalFormCliente').modal('show');
}