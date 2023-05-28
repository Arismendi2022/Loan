let tableClientes;
let rowTable = "";
document.addEventListener('DOMContentLoaded', function () {

	tableClientes = $('#tableClientes').dataTable({
		"aProcessing": true,
		"aServerSide": true,
		"language": {
			url: "//cdn.datatables.net/plug-ins/1.13.1/i18n/es-ES.json",
		},
		"ajax": {
			"url": " " + base_url + "/Clientes/getClientes", "dataSrc": ""
		},
		"columns": [{"data": "idcliente"}, {"data": "identificacion"}, {"data": "nombres"}, {"data": "apellidos"}, {"data": "correo"}, {"data": "telefono"}, {"data": "municipio"}, {"data": "options"}],
		'dom': 'lBfrtip',
		'buttons': [{
			"extend": "copyHtml5", "text": "<i class='far fa-copy'></i> Copiar", "titleAttr": "Copiar", "className": "btn btn-secondary"
		}, {
			"extend": "excelHtml5", "text": "<i class='fas fa-file-excel'></i> Excel", "titleAttr": "Esportar a Excel", "className": "btn btn-success"
		}, {
			"extend": "pdfHtml5", "text": "<i class='fas fa-file-pdf'></i> PDF", "titleAttr": "Esportar a PDF", "className": "btn btn-danger"
		}, {
			"extend": "csvHtml5", "text": "<i class='fas fa-file-csv'></i> CSV", "titleAttr": "Esportar a CSV", "className": "btn btn-info"
		}],
		"resonsieve": "true",
		"bDestroy": true,
		"iDisplayLength": 10,
		"order": [[0, "desc"]]
	});

	window.addEventListener('load', function () {
		fntDepartamentos();
		fntMunicipios();
	}, false);

	//Cargamos los Departamentos
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

	//Cargamos las Municipios por Departamentos
	function fntMunicipios() {
		$(document).ready(function () {
			$('#listDepto').change(function () {
				const $idDepto = $(this).val();
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
			let strDirFiscal = document.querySelector('#txtDirFiscal').value;

			if (strIdentificacion == '' || strApellido == '' || strNombre == '' || strEmail == '' || intTelefono == '' || strlistDepto == '' || strlistMcpio == '' || strlistOcup == '' || strDirFiscal == '') {
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
			request.onreadystatechange = function () {
				if (request.readyState == 4 && request.status == 200) {
					let objData = JSON.parse(request.responseText);
					if (objData.status) {

						$('#modalFormCliente').modal("hide");
						formCliente.reset();
						alerta("Usuarios", objData.msg, "success");
						tableClientes.api().ajax.reload();
					} else {
						alerta("Error", objData.msg, "error");
					}
				}
				return false;
			}
		}
	}

}, false);

// * ver información de clientes
function fntViewInfo(idcliente) {
	let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
	let ajaxUrl = base_url + '/Clientes/getCliente/' + idcliente;
	request.open("GET", ajaxUrl, true);
	request.send();
	request.onreadystatechange = function () {
		if (request.readyState == 4 && request.status == 200) {
			let objData = JSON.parse(request.responseText);
			if (objData.status) {
				if (objData.status) {
				}
				const oficio = objData.data.ocupacion;
				const ocupCliente = oficio == 1 ? 'Empleado' : oficio == 2 ? 'Estudiante' : oficio == 3 ? 'Pensionado' : oficio == 4 ? 'Independiente' : oficio == 5 ? 'Desempleado' :

				document.querySelector("#idUsuario").value = objData.data.idcliente;
				document.querySelector("#celIdentificacion").innerHTML = objData.data.identificacion;
				document.querySelector("#celNombre").innerHTML = objData.data.nombres;
				document.querySelector("#celApellido").innerHTML = objData.data.apellidos;
				document.querySelector("#celTelefono").innerHTML = objData.data.telefono;
				document.querySelector("#celEmail").innerHTML = objData.data.correo;
				document.querySelector("#celNomDepto").innerHTML = objData.data.departamento;
				document.querySelector("#celNomCiudad").innerHTML = objData.data.municipio;
				document.querySelector("#celDirFiscal").innerHTML = objData.data.direccion;
				document.querySelector("#celOcupacion").innerHTML = ocupCliente;
				document.querySelector("#celFechaRegistro").innerHTML = objData.data.fechaRegistro;
				$('#modalViewCliente').modal('show');
			} else {
				alerta("Error", objData.msg, "error");
			}
		}
	}
}

// * editar cliente
function fntEditInfo(element, idcliente) {
	document.querySelector('#titleModal').innerHTML = "Actualizar Cliente";
	document.querySelector('.modal-header').classList.replace("headerRegister", "headerUpdate");
	document.querySelector('#btnActionForm').classList.replace("btn-primary", "btn-info");
	document.querySelector('#btnText').innerHTML = "Actualizar"

	let request = window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject("Microsoft.XMLHTTP");
	let ajaxUrl = base_url + "/Clientes/getCliente/" + idcliente;
	request.open("GET", ajaxUrl, true);
	request.send();
	request.onreadystatechange = function () {

		if (request.readyState == 4 && request.status == 200) {
			let objData = JSON.parse(request.responseText);

			if (objData.status) {
				document.querySelector("#idUsuario").value = objData.data.idcliente;
				document.querySelector("#txtIdentificacion").value = objData.data.identificacion;
				document.querySelector("#txtNombre").value = objData.data.nombres;
				document.querySelector("#txtApellido").value = objData.data.apellidos;
				document.querySelector("#txtTelefono").value = objData.data.telefono;
				document.querySelector("#txtEmail").value = objData.data.correo;
				document.querySelector("#listDepto").value = objData.data.departamentoid;
				document.querySelector("#listMcpio").value = objData.data.municipioid;
				document.querySelector("#txtDirFiscal").value = objData.data.direccion;
				$('#listDepto').selectpicker('render');
				$('#listMcpio').selectpicker('render');
				// * opcupación
				if (objData.data.ocupacion == 1) {
					document.querySelector("#listOcup").value = 1;
				}
				if (objData.data.ocupacion == 2) {
					document.querySelector("#listOcup").value = 2;
				}
				if (objData.data.ocupacion == 3) {
					document.querySelector("#listOcup").value = 3;
				}
				if (objData.data.ocupacion == 4) {
					document.querySelector("#listOcup").value = 4;
				}
				$('#listOcup').selectpicker('render');
			}
		}
		$("#modalFormCliente").modal("show");
	}
}

// * Modal /clientes
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