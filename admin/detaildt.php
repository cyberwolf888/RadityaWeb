<?php
include '../config.php'; 

if(!isset($_SESSION['type']) || $_SESSION['type']!=1){
	echo "<script>window.location=('index.php')</script>";
}
?>
<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Sistem Penagihan Kredit</title>

    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../font-awesome/css/font-awesome.css" rel="stylesheet">

    <!-- Gritter -->
    <link href="../js/plugins/gritter/jquery.gritter.css" rel="stylesheet">

    <link href="../css/animate.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">

</head>
<body>
    <div id="wrapper">
        <nav class="navbar-default navbar-static-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav metismenu" id="side-menu">
                    <li class="nav-header">
                        <div class="dropdown profile-element"> <span>
                            <img alt="image" class="img-circle" src="../image/LOGO2.png" />
                             </span>
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold">Admin Raditya</strong>
                             </span> <span class="text-muted text-xs block"><b class="caret"></b></span> </span> </a>
                        </div>
                        <div class="logo-element">
                            RH
                        </div>
                    </li>
					<li>
                        <a href="index.php"><i class="fa fa-windows"></i> <span class="nav-label">Beranda</span> </a>
                    </li>
                    <li class="active">
                        <a href="#"><i class="fa fa-edit"></i> <span class="nav-label">Member Login</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level collapse">
							<li><a href="petugas super admin.php">Admin</a></li>
                            <li class="active"><a href="admin.php">Petugas</a></li>
                            <li><a href="customer.php">Konsumen</a></li>
                        </ul>
                    </li> 
					<li>
                        <a href="dtpetugas.php"><i class="fa fa-edit"></i> <span class="nav-label">Data Petugas</span> </a>
                    </li>
                </ul>

            </div>
        </nav>

        <div id="page-wrapper" class="gray-bg dashbard-1">
        <div class="row border-bottom">
        <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
        </div>
            <ul class="nav navbar-top-links navbar-right">
                
                <li>
                    <a href="../logout.php">
                        <i class="fa fa-sign-out"></i> Log out
                    </a>
                </li>
            </ul>

        </nav>
        </div>
        <div class="row wrapper border-bottom white-bg page-heading">
			<div class="col-lg-10">
				<h2>Detail</h2>
				
			</div>
				<div class="col-lg-2">
				</div>
		</div>
		<div class="row">
            <div class="col-lg-12">
                <div class="wrapper wrapper-content animated fadeInUp" style="padding-bottom: 5px;">

                    <div class="ibox" style="margin-bottom:0px;">
                        <div class="ibox-title">
							<h5>Data Customer</h5>
                        </div>
						<div class="ibox-content">
							<div class="row">
								<div class="col-md-2">Nama</div>
								<div class="col-md-4">asdasdasdad</div>
							</div>
							<div class="row">
								<div class="col-md-2">No HP</div>
								<div class="col-md-4">09828782828282</div>
							</div>
							<div class="row">
								<div class="col-md-2">Alamat</div>
								<div class="col-md-4">asdasdasdasdqeqweqweqweqwe</div>
							</div>
						</div>
                    </div>
                </div>
            </div>
		</div>
		<div class="row">
			<div class="col-lg-12">
                <div class="wrapper wrapper-content animated fadeInUp" style="padding-bottom: 5px;">

                    <div class="ibox" style="margin-bottom:20px;">
                        <div class="ibox-title">
                            <h5>Data Barang</h5>
                        </div>
						<div class="ibox-content">
							<div class="row">
								<div class="col-md-2">Nama Barang</div>
								<div class="col-md-4">asdasdasdad</div>
							</div>
							<div class="row">
								<div class="col-md-2">Harga</div>
								<div class="col-md-4">09828782828282</div>
							</div>
							<div class="row">
								<div class="col-md-2">Alamat</div>
								<div class="col-md-4">asdasdasdasdqeqweqweqweqwe</div>
							</div>
						</div>
                    </div>
                </div>
            </div>
			
      </div>
	
      
		<!-- Mainly scripts -->
            <div class="footer">
                    <div class="pull-right">
                       <strong>@pande</strong>
                    </div>
                    <div>
                        <strong>Copyright</strong> Raditya Hollding Company &copy; 2015-2016
                    </div>
                </div>
            </div> 
			
</div>
    <!-- Mainly scripts -->
    <script src="../js/jquery-2.1.1.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="../js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

   
    <!-- Peity -->
    <script src="../js/plugins/peity/jquery.peity.min.js"></script>
    <script src="../js/demo/peity-demo.js"></script>

    <!-- Custom and plugin javascript -->
    <script src="../js/inspinia.js"></script>
    <script src="../js/plugins/pace/pace.min.js"></script>

    <!-- jQuery UI -->
    <script src="../js/plugins/jquery-ui/jquery-ui.min.js"></script>

    <!-- GITTER -->
    <script src="../js/plugins/gritter/jquery.gritter.min.js"></script>

    <!-- Sparkline -->
    <script src="../js/plugins/sparkline/jquery.sparkline.min.js"></script>

    <!-- Sparkline demo data  -->
    <script src="../js/demo/sparkline-demo.js"></script>
</body>
</html>
