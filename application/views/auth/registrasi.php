<!DOCTYPE html>
<html>
    <head>
        
        <!-- Title -->
        <title>Modern | Login - Sign up</title>
        
        <meta content="width=device-width, initial-scale=1" name="viewport"/>
        <meta charset="UTF-8">
        <meta name="description" content="Admin Dashboard Template" />
        <meta name="keywords" content="admin,dashboard" />
        <meta name="author" content="Steelcoders" />
        
        <!-- Styles -->
        <link href='http://fonts.googleapis.com/css?family=Ubuntu:300,400,500,700' rel='stylesheet' type='text/css'>
        <link href="<?= base_url(); ?>assets/plugins/pace-master/themes/blue/pace-theme-flash.css" rel="stylesheet"/>
        <link href="<?= base_url(); ?>assets/plugins/uniform/css/uniform.default.min.css" rel="stylesheet"/>
        <link href="<?= base_url(); ?>assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="<?= base_url(); ?>assets/plugins/fontawesome/css/font-awesome.css" rel="stylesheet" type="text/css"/>
        <link href="<?= base_url(); ?>assets/plugins/line-icons/simple-line-icons.css" rel="stylesheet" type="text/css"/>	
        <link href="<?= base_url(); ?>assets/plugins/waves/waves.min.css" rel="stylesheet" type="text/css"/>	
        <link href="<?= base_url(); ?>assets/plugins/switchery/switchery.min.css" rel="stylesheet" type="text/css"/>
        <link href="<?= base_url(); ?>assets/plugins/3d-bold-navigation/css/style.css" rel="stylesheet" type="text/css"/>	
        
        <!-- Theme Styles -->
        <link href="<?= base_url(); ?>assets/css/modern.min.css" rel="stylesheet" type="text/css"/>
        <link href="<?= base_url(); ?>assets/css/custom.css" rel="stylesheet" type="text/css"/>
        
        <script src="<?= base_url(); ?>assets/plugins/3d-bold-navigation/js/modernizr.js"></script>
        
        
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        
    </head>
    <body class="page-register">
        <main class="page-content">
            <div class="page-inner">
                <div id="main-wrapper">
                    <div class="row">
                        <div class="col-md-3 center">
                            <div class="login-box">
                            <a href="index.html" class="logo-name text-lg text-center">
                                    <span style="color:orange;">PARTAI HANURA</span>
                                </a>
                                <p class="text-center m-t-md">Silakan isi data untuk registrasi</p>
                                <form class="m-t-md" action="login.html">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Nama Lengkap" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="email" class="form-control" placeholder="Email" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control" placeholder="Password" required>
                                    </div>
                                    <label>
                                        <input type="checkbox">Setuju dengan persyaratan dan kebijakan
                                    </label>
                                    <button type="submit" class="btn btn-success btn-block m-t-xs">Submit</button>
                                    <p class="text-center m-t-xs text-sm">Apakah telah mempunyai akun?</p>
                                    <a href="<?= base_url('auth/login') ?>" class="btn btn-default btn-block m-t-xs">Login</a>
                                </form>
                                <p class="text-center m-t-xs text-sm">2020 &copy; Partai Hanura.</p>
                            </div>
                        </div>
                    </div><!-- Row -->
                </div><!-- Main Wrapper -->
            </div><!-- Page Inner -->
        </main><!-- Page Content -->
	

        <!-- Javascripts -->
        <script src="<?= base_url(); ?>assets/plugins/jquery/jquery-2.1.4.min.js"></script>
        <script src="<?= base_url(); ?>assets/plugins/jquery-ui/jquery-ui.min.js"></script>
        <script src="<?= base_url(); ?>assets/plugins/pace-master/pace.min.js"></script>
        <script src="<?= base_url(); ?>assets/plugins/jquery-blockui/jquery.blockui.js"></script>
        <script src="<?= base_url(); ?>assets/plugins/bootstrap/js/bootstrap.min.js"></script>
        <script src="<?= base_url(); ?>assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js"></script>
        <script src="<?= base_url(); ?>assets/plugins/switchery/switchery.min.js"></script>
        <script src="<?= base_url(); ?>assets/plugins/uniform/jquery.uniform.min.js"></script>
        <script src="<?= base_url(); ?>assets/plugins/classie/classie.js"></script>
        <script src="<?= base_url(); ?>assets/plugins/waves/waves.min.js"></script>
        <script src="<?= base_url(); ?>assets/js/modern.min.js"></script>
        
    </body>
</html>