<body class="page-header-fixed compact-menu page-horizontal-bar">
	<div class="overlay"></div>

	<main class="page-content content-wrap">
		<div class="navbar">
			<div class="navbar-inner container">
				<div class="sidebar-pusher">
					<a href="javascript:void(0);" class="waves-effect waves-button waves-classic push-sidebar">
						<i class="fa fa-bars"></i>
					</a>
				</div>
                <div class="logo-box">
                        <a href="<?= base_url('rekom'); ?>" class="logo-text"><img src="<?= base_url('assets/images/hanura.png'); ?>" width="40" alt="<?= base_url('rekom'); ?>"></a>
                    </div><!-- Logo Box -->
				<div class="topmenu-outer">
					<div class="top-menu">
						<ul class="nav navbar-nav navbar-left">
							<li>
								<a href="javascript:void(0);"
									class="waves-effect waves-button waves-classic sidebar-toggle"><i
										class="fa fa-bars"></i></a>
							</li>
							<li>
								<a href="#cd-nav" class="waves-effect waves-button waves-classic cd-nav-trigger"><i
										class="fa fa-diamond"></i></a>
							</li>
							<li>
								<a href="javascript:void(0);"
									class="waves-effect waves-button waves-classic toggle-fullscreen"><i
										class="fa fa-expand"></i></a>
							</li>
						</ul>
						<ul class="nav navbar-nav navbar-right">
							<li class="dropdown">
								<a href="#" class="dropdown-toggle waves-effect waves-button waves-classic"
									data-toggle="dropdown">
                                    <img class="img-circle avatar" src="<?= base_url('assets/images/admin.jpg'); ?>" width="40" height="40" alt="">
								</a>
							</li>
                            <li>
                                    <a href="<?= base_url('auth') ?>"><i class="fa fa-sign-out m-r-xs"></i>Log out</a>
                            </li>   
						</ul><!-- Nav -->
					</div><!-- Top Menu -->
				</div>
			</div>
		</div><!-- Navbar -->
		<div class="page-sidebar sidebar horizontal-bar">
			<div class="page-sidebar-inner">
				<ul class="menu accordion-menu">
					<li class="nav-heading"><span>Navigation</span></li>
					<li><a href="<?= base_url(); ?>rekom"><span class="menu-icon fa fa-th-list"></span>
							<p>Data Rekom</p>
						</a></li>
					<li><a href="<?= base_url(); ?>chart"><span class="menu-icon fa fa-pie-chart"></span>
							<p>Chart</p>
						</a></li>
					<li><a href="<?= base_url(); ?>surat"><span class="menu-icon fa fa-envelope"></span>
							<p>Master Surat</p>
						</a></li>
					<li class="droplink"><a href="#"><span class="menu-icon fa fa-user"></span>
							<p>Pengguna Manajemen</p><span class="arrow"></span>
						</a>
					</li>
				</ul>
			</div><!-- Page Sidebar Inner -->
		</div><!-- Page Sidebar -->
