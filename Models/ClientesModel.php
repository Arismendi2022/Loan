<?php
	
	class ClientesModel extends Mysql
	{
		private $intIdUsuario;
		private $strIdentificacion;
		private $strNombre;
		private $strApellido;
		private $intTelefono;
		private $strEmail;
		private $strPassword;
		private $strToken;
		private $intTipoId;
		private $intStatus;
		private $strNit;
		
		
		public function __construct()
		{
			parent::__construct();
		}
		
		// Departamentos
		public function selectDepto()
		{
			
			//EXTRAE DEPARTAMENTOS
			$sql = "SELECT * FROM departamentos ORDER BY nombre ";
			$request = $this->select_all($sql);
			return $request;
		}
		// Ciudades
		public function selectMcpio(int $idDepto)
		{
			//EXTRAE CIUDAD
			$this->intIdDepto = $idDepto;
			$sql = "SELECT * FROM municipios WHERE departamentoid = $this->intIdDepto";
			$request = $this->select_all($sql);
			return $request;
		}
		
	}
	// fin ClientesModal
