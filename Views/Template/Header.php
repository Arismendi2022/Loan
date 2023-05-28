<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<meta name="description" content="Gestión de Préstamos EBank">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="author" content="Arismendi Güiza">
	<meta name="theme-color" content="#009688">
	<link rel="shortcut icon" href="<?= media(); ?>/images/favicon.ico">
	<title><?= $data['page_tag'] ?></title>
	<!-- Google Font: Source Sans Pro -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
	<!-- Ionicons -->
	<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
	<link rel="stylesheet" type="text/css" href="<?= media(); ?>/css/main.css">
	<link rel="stylesheet" type="text/css" href="<?= media(); ?>/css/bootstrap-select.min.css">
	<link rel="stylesheet" type="text/css" href="<?= media(); ?>/css/style.css">
</head>
<body class="app sidebar-mini">
<!-- Navbar-->
<header class="app-header"><a class="app-header__logo" href="<?= base_url(); ?>/dashboard">MiCredit</a>
	<!-- Sidebar toggle button--><a class="app-sidebar__toggle" href="#" data-toggle="sidebar"
																	aria-label="Hide Sidebar"></a>
	<!-- Navbar Right Menu-->
	<ul class="app-nav">
		<!--Notification Menu-->
		<li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Show notifications"><i
								class="fa fa-bell-o fa-lg"></i></a>
			<ul class="app-notification dropdown-menu dropdown-menu-right">
				<li class="app-notification__title">Tienes 3 Notificaciones Nuevas.</li>
			
			</ul>
		</li>
		<!-- User Menu-->
		<li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Open Profile Menu"><i
								class="fa fa-user fa-lg"></i></a>
			<ul class="dropdown-menu settings-menu dropdown-menu-right">
				<li><a class="dropdown-item" href="<?= base_url(); ?>/opciones"><i class="fa fa-cog fa-lg"></i> Opciones</a>
				</li>
				<li><a class="dropdown-item" href="<?= base_url(); ?>/usuarios/perfil"><i class="fa fa-user fa-lg"></i> Perfil</a></li>
				<li><a class="dropdown-item" href="<?= base_url(); ?>/logout"><i class="fa fa-sign-out fa-lg"></i> Cerrar Sesión</a>
				</li>
			</ul>
		</li>
	</ul>
</header>
<?php require_once("Navbar.php"); ?>
