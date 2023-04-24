<!DOCTYPE html>
<html lang="en">
<head>
	<meta name="description" content="Vali is a responsive and free admin theme built with Bootstrap 4, SASS and PUG.js. It's fully customizable and modular.">
	<!-- Twitter meta-->
	<title>Error Page - Vali Admin</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Main CSS-->
	<link rel="stylesheet" type="text/css" href="<?= media(); ?>/css/main.css">
	<!-- Font-icon css-->
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<div class="container text-center">
	<main class="app-content">
		<div class="page-error tile">
			<h1><i class="fa fa-exclamation-circle"></i> Error 404: página no encontrada</h1>
			<p>No se encuentra la página que ha solicitado.</p>
			<p><a class="btn btn-primary" href="javascript:window.history.back();">Regresar</a></p>
			
		</div>
		
	</main>
</div>
<!-- Essential javascripts for application to work-->
<script src="<?= media(); ?>/js/jquery-3.3.1.min.js"></script>
<script src="<?= media(); ?>/js/popper.min.js"></script>
<script src="<?= media(); ?>/js/bootstrap.min.js"></script>
<script src="<?= media(); ?>/js/main.js"></script>
<!-- The javascript plugin to display page loading on top-->
<script src="<?= media(); ?>/js/plugins/pace.min.js"></script>

</body>
</html>