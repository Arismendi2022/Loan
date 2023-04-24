<?php

	class Dashboard extends Controllers
	{
		public function __construct()
		{
			parent::__construct();
			session_start();
			if (empty($_SESSION['login'])) {
				header('Location: ' . base_url() . '/login');
			}
			getPermisos(1);
		}
		public function dashboard()
		{
			$data['page_id'] = 1;
			$data['page_tag'] = "Dashboard - Sistema de Préstamos";
			$data['page_title'] = "Dashboard - <small> Sistema de Crédito</small>";
			$data['page_name'] = "dashboard";
			$data['page_functions_js'] = "functions_dashboard.js";
			$this->views->getView($this, "dashboard", $data);
		}
	}