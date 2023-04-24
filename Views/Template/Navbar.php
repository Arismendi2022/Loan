<!-- Sidebar menu-->
<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar">
  <div class="app-sidebar__user"><img class="app-sidebar__user-avatar" src="<?= media(); ?>/images/avatar.png"
                                      alt="User Image">
    <div>
      <p class="app-sidebar__user-name"><?= $_SESSION['userData']['nombres']; ?></p>
      <p class="app-sidebar__user-designation"><?= $_SESSION['userData']['nombrerol']; ?></p>
    </div>
  </div>
  <ul class="app-menu">
    <?php if(!empty($_SESSION['permisos'][1]['r'])){ ?>
    <li><a class="app-menu__item" href="<?= base_url(); ?>/dashboard"><i
          class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Dashboard</span></a></li>
    <?php } ?>
    <?php if(!empty($_SESSION['permisos'][2]['r'])){ ?>
	    <li><a class="app-menu__item" href="<?= base_url(); ?>/clientes">
			    <i class="app-menu__icon fa fa-users" aria-hidden="true"></i><span class="app-menu__label">Clientes</span></a>
	    </li>
    <?php } ?>
    <?php if(!empty($_SESSION['permisos'][3]['r'])){ ?>
    <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fas fa-sack-dollar"></i>
        <span class="app-menu__label">Préstamos</span><i class="treeview-indicator fa fa-angle-right"></i></a>
      <ul class="treeview-menu">
        <li><a class="treeview-item" href="<?= base_url(); ?>/nPrestamos"><i class="icon fa fa-circle-o"></i> Nuevo Préstamo</a></li>
        <li><a class="treeview-item" href="<?= base_url(); ?>/vPrestamos"><i class="icon fa fa-circle-o"></i> Ver Prestamos</a></li>
      </ul>
    </li>
    <?php } ?>
    <?php if(!empty($_SESSION['permisos'][4]['r'])){ ?>
    <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fas fa-hand-holding-usd"></i>
        <span class="app-menu__label">Pagos</span><i class="treeview-indicator fa fa-angle-right"></i></a>
      <ul class="treeview-menu">
        <li><a class="treeview-item" href="<?= base_url(); ?>/nPagos"><i class="icon fa fa-circle-o"></i> Agregar Pagos</a></li>
        <li><a class="treeview-item" href="<?= base_url(); ?>/vPagos"><i class="icon fa fa-circle-o"></i> Ver Pagos</a></li>
      </ul>
    </li>
    <?php } ?>
    <?php if(!empty($_SESSION['permisos'][5]['r'])){ ?>
    <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa-solid fa-shield-halved"></i>
        <span class="app-menu__label"> Seguridad</span><i class="treeview-indicator fa fa-angle-right"></i></a>
      <ul class="treeview-menu">
        <li><a class="treeview-item" href="<?= base_url(); ?>/usuarios"><i class="icon fa fa-circle-o"></i> Usuarios</a></li>
        <li><a class="treeview-item" href="<?= base_url(); ?>/roles"><i class="icon fa fa-circle-o"></i> Roles</a></li>
      </ul>
    </li>
    <?php } ?>
    <?php if(!empty($_SESSION['permisos'][6]['r'])){ ?>
    <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fas fa-chart-pie"></i>
        <span class="app-menu__label"> Reportes</span><i class="treeview-indicator fa fa-angle-right"></i></a>
      <ul class="treeview-menu">
        <li><a class="treeview-item" href="<?= base_url(); ?>/iPrestamos"><i class="icon fa fa-circle-o"></i> Informe de Préstamo</a></li>
        <li><a class="treeview-item" href="<?= base_url(); ?>/iPagos"><i class="icon fa fa-circle-o"></i> Informe de Pagos</a></li>
        <li><a class="treeview-item" href="<?= base_url(); ?>/iVencida"><i class="icon fa fa-circle-o"></i> Cartera Vencida</a></li>
      </ul>
    </li>
    <?php } ?>
    <?php if(!empty($_SESSION['permisos'][7]['r'])){ ?>
    <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa-solid fa-scale-balanced"></i>
        <span class="app-menu__label"> Contabilidad</span><i class="treeview-indicator fa fa-angle-right"></i></a>
      <ul class="treeview-menu">
        <li><a class="treeview-item" href="<?= base_url(); ?>/fAcumulado"><i class="icon fa fa-circle-o"></i> Flujo de Caja Acumulado</a></li>
        <li><a class="treeview-item" href="<?= base_url(); ?>/fMensual"><i class="icon fa fa-circle-o"></i> Flujo de Caja Mensual</a></li>
      </ul>
    </li>
    <?php } ?>
    <li><a class="app-menu__item" href="<?= base_url(); ?>/logout"><i class="app-menu__icon fa fa-sign-out"></i>
        <span class="app-menu__label"> Cerrar Sesión</span></a>
    </li>
  </ul>
</aside>
