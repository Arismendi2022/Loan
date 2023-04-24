// Función para alertas
function alerta(titulo, msg, icono) {
	Swal.fire({
		icon: icono,
		title: titulo,
		text: msg,
		confirmButtonColor: '#009688',
		confirmButtonText: 'Aceptar'
	})
}

function alertaDel(titulo, msg, icono) {
	Swal.fire({
		icon: icono,
		title: titulo,
		text: msg,
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: "Si, eliminar!",
		cancelButtonText: "No, cancelar!",
	}).then((result) => {
		if (result.isConfirmed) {


		}
	});
}