<?php
	
	class ClientesModel extends Mysql
	{
		private $intIdUsuario;
		private $strIdentificacion;
		private $strNombre;
		private $strApellido;
		private $intTelefono;
		private $strEmail;
		private $intlistDepto;
		private $intlistMcpio;
		private $intlistOcup;
		private $strDirFiscal;
		
		public function __construct()
		{
			parent::__construct();
		}
		// * Insertamos clientes a mysql
		public function insertCliente(string $identificacion, string $nombre, string $apellido, int $telefono, string $email, int  $departamento, int
		$municipio, int $ocupacion, string $dirFiscal){
			
			$this->strIdentificacion = $identificacion;
			$this->strNombre = $nombre;
			$this->strApellido = $apellido;
			$this->intTelefono = $telefono;
			$this->strEmail = $email;
			$this->listDepto = $departamento;
			$this->intlistMcpio = $municipio;
			$this->intlistOcup = $ocupacion;
			$this->strDirFiscal = $dirFiscal;
			
			$return = 0;
			$sql = "SELECT * FROM clientes WHERE
				correo = '{$this->strEmail}' or identificacion = '{$this->strIdentificacion}' ";
			$request = $this->select_all($sql);
			
			if(empty($request))
			{
				$query_insert  = "INSERT INTO clientes(identificacion,nombres,apellidos,telefono,correo,departamentoid,municipioid,ocupacion,direccion)
							  VALUES(?,?,?,?,?,?,?,?,?)";
				$arrData = array($this->strIdentificacion,
				$this->strNombre,
				$this->strApellido,
				$this->intTelefono,
				$this->strEmail,
				$this->listDepto ,
				$this->intlistMcpio,
				$this->intlistOcup,
				$this->strDirFiscal);
				$request_insert = $this->insert($query_insert,$arrData);
				$return = $request_insert;
			}else{
				$return = "exist";
			}
			return $return;
		}
		
		
		// * Departamentos
		public function selectDepto()
		{
			
			// * EXTRAE DEPARTAMENTOS
			$sql = "SELECT * FROM departamentos ORDER BY nombre ";
			$request = $this->select_all($sql);
			return $request;
		}
		// * Ciudades
		public function selectMcpio(int $idDepto)
		{
			// * EXTRAE CIUDAD
			$this->intIdDepto = $idDepto;
			$sql = "SELECT * FROM municipios WHERE departamentoid = $this->intIdDepto";
			$request = $this->select_all($sql);
			return $request;
		}
		
	}
	 /* end of file clientesModal.php */
	
