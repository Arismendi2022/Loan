<?php headerAdmin($data); ?>
<main class="app-content">
	<div class="app-title">
		<div>
			<h1><i class="fa fa-dashboard"></i> <?= $data['page_title'] ?></h1>
		</div>
		<ul class="app-breadcrumb breadcrumb">
			<li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
			<li class="breadcrumb-item"><a href="<?= base_url(); ?>/dashboard">Dashboard</a></li>
		</ul>
	</div>
	<!--  Tarjetas Dashboard -->
	<div class="row">
		<div class="col-md-6 col-lg-3">
			<div class="widget-small info coloured-icon"><i class="icon fa fa-users fa-3x"></i>
				<div class="info">
					<h4>Clientes</h4>
					<p><b>15</b></p>
				</div>
			</div>
		</div>
		<div class="col-md-6 col-lg-3">
			<div class="widget-small info coloured-icon"><i class="icon fa fa-thumbs-o-up fa-3x"></i>
				<div class="info">
					<h4>Prestamos</h4>
					<p><b>25</b></p>
				</div>
			</div>
		</div>
		<div class="col-md-6 col-lg-3">
			<div class="widget-small warning coloured-icon"><i class="icon fa fa-files-o fa-3x"></i>
				<div class="info">
					<h4>Pagos</h4>
					<p><b>10</b></p>
				</div>
			</div>
		</div>
		<div class="col-md-6 col-lg-3">
			<div class="widget-small danger coloured-icon"><i class="icon fa fa-star fa-3x"></i>
				<div class="info">
					<h4>Capital</h4>
					<p><b>$600</b></p>
				</div>
			</div>
		</div>
	</div>
	
	<!-- /.row -->
</main>
<?php footerAdmin($data); ?>
