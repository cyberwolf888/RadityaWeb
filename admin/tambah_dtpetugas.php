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
                    <li>
                        <a href="#"><i class="fa fa-edit"></i> <span class="nav-label">Member Login</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level collapse">
							<li><a href="petugas super admin.php">Admin</a></li>
                            <li><a href="admin.php">Petugas</a></li>    
                            <li class="active"><a href="customer.php">Konsumen</a></li>
                        </ul>
                    </li>
					<li class="active">
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
				<h2>Data Petugas</h2>
				<ol class="breadcrumb">
					<li>
						<a href="index.php">Beranda</a>
					</li>
					<li class="active">
						<strong>Data Petugas</strong>
					</li>
				</ol>
			</div>
				<div class="col-lg-2">
				</div>
		</div>
		<div class="row">
            <div class="col-lg-12">
                <div class="wrapper wrapper-content animated fadeInUp">
                    <div class="ibox">
                        <div class="ibox-title">
                            <h5>Tambah Data Petugas</h5>
                            
                        </div>       
                            <div class="ibox-content">
								 <div class="project-list">
							<?php
							if(isset($_POST['submit'])){
							$nama_petugas = $_POST['nama_petugas'];
							$telepon = $_POST['telepon'];
							$status = $_POST['status'];
							$query = $mysqli->query("insert into users values('','','$nama_petugas','$telepon','$status')");
							if($query){
									?>
										<div class="alert alert-success alert-dismissible" role="alert">
										<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
										<strong>Success!</strong> Berhasil Tambah Data.
										</div>
										<?php
							}else{
									?>
										<div class="alert alert-danger alert-dismissible" role="alert">
										<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
										<strong>Danger!</strong> Gagal insert data.
										</div>
									<?php
								}
							}
							?>
							<br/>
							<form method="post">
							  <div class="form-group">
								<label for="nama_petugas">Nama Petugas</label>
								<input type="text" class="form-control" id="nama_petugas"  name="nama_petugas" placeholder="Nama Petugas" required>
							  </div>
							  <form>
							  <div class="form-group">
								<label for="telepon">No Telepon/HP</label>
								<input type="number_format" class="form-control" id="telepon"  name="telepon" placeholder="No Telepon" required>
							  </div>
							   <form>
							  <div class="form-group">
								<label for="status">Status</label>
								<input type="text" class="form-control" id="status"  name="status" placeholder="Status" required>
							  </div>
							  <button type="submit" class="btn btn-primary"  name="submit">Submit</button>
							  <a href="dtpetugas.php" class="btn btn-primary"><span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span>Back</a>
							</form>
                               
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