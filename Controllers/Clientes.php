<?php
	
	class Clientes extends Controllers
	{
		public function __construct()
		{
			parent::__construct();
			session_start();
			if (empty($_SESSION['login'])) {
				header('Location: ' . base_url() . '/login');
			}
			getPermisos(2);
		}
		
		public function Clientes()
		{
			if (empty($_SESSION['permisosMod']['r'])) {
				header("Location:" . base_url() . '/dashboard');
			}
			$data['page_tag'] = "Clientes";
			$data['page_title'] = "CLIENTES <small> Sistema de Crédito</small>";
			$data['page_name'] = "clientes";
			$data['page_functions_js'] = "functions_clientes.js";
			$this->views->getView($this, "clientes", $data);
		}
		
		public function setCliente()
		{
			if ($_POST) {
				if (empty($_POST['txtIdentificacion']) || empty($_POST['txtNombre']) || empty($_POST['txtApellido']) || empty($_POST['txtTelefono'])
					|| empty($_POST['txtEmail']) || empty($_POST['listDepto']) || empty($_POST['listMcpio']) || empty($_POST['listOcup'])
					|| empty($_POST['dirFiscal'])) {
					$arrResponse = array("status" => false, "msg" => 'Datos incorrectos.');
				} else {
					$idUsuario = intval($_POST['idUsuario']);
					$strIdentificacion = intval(strClean($_POST['txtIdentificacion']));
					$strNombre = ucwords(strClean($_POST['txtNombre']));
					$strApellido = ucwords(strClean($_POST['txtApellido']));
					$intTelefono = intval(strClean($_POST['txtTelefono']));
					$strEmail = strtolower(strClean($_POST['txtEmail']));
					$intlistDepto = intval(strClean($_POST['listDepto']));
					$intlistMcpio = intval(strClean($_POST['listMcpio']));
					$intlistMcpio = intval(strClean($_POST['listMcpio']));
					$intlistOcup = intval(strClean($_POST['listOcup']));
					$strdirFiscal = intval(strClean($_POST['dirFiscal']));
					
					$request_user = "";
					
					if ($idUsuario == 0) {
						$option = 1;
						if ($_SESSION['permisosMod']['w']) {
							$request_user = $this->model->insertCliente($strIdentificacion,
								$strNombre,
								$strApellido,
								$intTelefono,
								$strEmail,
								$intlistDepto ,
								$intlistMcpio,
								$intlistOcup,
								$strdirFiscal);
						}
					} else {
						/*$option = 2;
						$strPassword = empty($_POST['txtPassword']) ? "" : hash("SHA256", $_POST['txtPassword']);
						if ($_SESSION['permisosMod']['u']) {
							$request_user = $this->model->updateUsuario($idUsuario,
								$strIdentificacion,
								$strNombre,
								$strApellido,
								$intTelefono,
								$strEmail,
								$strPassword,
								$intTipoId,
								$intStatus);
						}*/
					}
					if ($option == 1) {
						if ($request_user != 'exist') {
							
							$arrResponse = array('status' => true, 'msg' => 'Datos guardados correctamente.');
						} elseif ($request_user === 'exist') {
							$arrResponse = array('status' => false, 'msg' => '¡Atención! el email o la identificación ya existe, ingrese otro.');
						} else {
							$arrResponse = array("status" => false, "msg" => 'No es posible almacenar los datos.');
						}
					} else {
						$arrResponse = array('status' => true, 'msg' => 'Datos Actualizados correctamente.');
					}
				}
				echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
			}
			die();
		}
		
		// * Selecionamos Departamentos
		public function getSelectDepto()
		{
			$htmlOptions = "";
			$arrData = $this->model->selectDepto();
			if (count($arrData) > 0) {
				for ($i = 0; $i < count($arrData); $i++) {
					$htmlOptions .= '<option value="' . $arrData[$i]['iddepartamento'] . '">' . $arrData[$i]['nombre'] . '</option>';
				}
			}
			echo $htmlOptions;
			die();
		}
		
		// * Selecionamos minicipios
		public function getSelectMcpio($idDepto)
		{
			$htmlOptions = "";
			$intIdDepto = intval(strClean($idDepto));
			$arrData = $this->model->selectMcpio($intIdDepto);
			if (count($arrData) > 0) {
				for ($i = 0; $i < count($arrData); $i++) {
					$htmlOptions .= '<option value="' . $arrData[$i]['idmunicipio'] . '">' . $arrData[$i]['nombre'] . '</option>';
				}
			}
			echo $htmlOptions;
			die();
			
		}
	}
	// * fin archivo clientes.php