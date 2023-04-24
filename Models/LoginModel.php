<?php

	class LoginModel extends Mysql
	{
		private $intIdUsuario;
		private $strUsuario;
		private $strPassword;
		private $strToken;

		public function __construct()
		{
			parent::__construct();
		}

		public function loginUser(string $usuario, string $password)
		{
			$this->strUsuario = $usuario;
			$this->strPassword = $password;
			$sql = "SELECT idusuario,estado FROM usuarios WHERE
              email_user = '$this->strUsuario' and
              clave = '$this->strPassword' and
              estado != 0 ";
			$request = $this->select($sql);
			return $request;
		}
		
		public function sessionLogin(int $iduser){
			$this->intIdUsuario = $iduser;
			//BUSCAR ROL
			$sql = "SELECT u.idusuario,
							u.identificacion,
							u.nombres,
							u.apellidos,
							u.telefono,
							u.email_user,
							r.idrol,r.nombrerol,
							u.estado
					FROM usuarios u
					INNER JOIN rol r
					ON u.rolid = r.idrol
					WHERE u.idusuario = $this->intIdUsuario";
			$request = $this->select($sql);
			$_SESSION['userData'] = $request;
			return $request;
		}
	}
