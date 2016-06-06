<?php
include 'config.php'; 

if(!isset($_SESSION['type']) || $_SESSION['type']!=2){
	echo "<script>window.location=('index.php')</script>";
}
$id = $_GET['id'];
if(isset($id)){
	$result = $mysqli->query("select * from angsuran where id='$id' ");
	$row = $result->fetch_assoc();
}

?>
<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Sistem Penagihan Kredit</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">

    <!-- Gritter -->
    <link href="js/plugins/gritter/jquery.gritter.css" rel="stylesheet">

    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

</head>
<body>
    <div id="wrapper">
        <nav class="navbar-default navbar-static-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav metismenu" id="side-menu">
                    <li class="nav-header">
                        <div class="dropdown profile-element"> <span>
                            <img alt="image" class="img-circle" src="image/LOGO2.php" />
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
                        <a href="pembayaran.php"><i class="fa fa-th-large"></i> <span class="nav-label">Kredit</span> <span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level collapse">
                            <li class="active"><a href="pembayaran.php">Tagihan Kredit</a></li>
                            <li><a href="pengajuan1.php">Kredit Baru</a></li>
                            <li><a href="infokredit.php">Info Kredit</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="dtkonsumen.php"><i class="fa fa-laptop"></i> <span class="nav-label">Data Konsumen</span></a>
                    </li>  
					<li>
                        <a href="dtbarang.php"><i class="fa fa-laptop"></i> <span class="nav-label">Data Barang</span></a>
                    </li>             
                </ul>

            </div>
        </nav>

        <div id="page-wrapper" class="gray-bg dashbard-1">
        <div class="row border-bottom">
        <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <a class="navbar-minimalize minimalize-styl-2 btn btn-info " href="#"><i class="fa fa-bars"></i> </a>
        </div>
            <ul class="nav navbar-top-links navbar-right">
                <li>
                    <a href="logout.php">
                        <i class="fa fa-sign-out"></i> Log out
                    </a>
                </li>
            </ul>

        </nav>
        </div>
        <div class="row wrapper border-bottom white-bg page-heading">
			<div class="col-lg-10">
				<h2>Tagihan Kredit</h2>
				<ol class="breadcrumb">
					<li>
						<a href="index.php">Beranda</a>
					</li>
					<li class="active">
						<strong>Tagihan Kredit</strong>
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
                            
                        </div>   
							
                            <div class="ibox-content">
								 <div class="project-list">
								 
								 <?php
								if(isset($_POST['submit'])){
								$id_kredit = $_POST['id_kredit'];
								$id_cust = $_POST['id_cust'];
								$id_petugas= $_POST['id_petugas'];
								$bayar = $_POST['bayar'];
								$angsuran_ke = $_POST['angsuran_ke'];
								$bunga = $_POST['bunga'];
								$sisa_kredit = $_POST['sisa_kredit'];
								$denda = $_POST['denda'];
								$tgl_angsuran = $_POST['tgl_angsuran'];
								$keterangan = $_POST['keterangan'];					
								
								$query = $mysqli->query("update angsuran set  id_kredit='$id_kredit', id_cust='$id_cust', id_petugas='$id_petugas', bayar='$bayar',
								angsuran_ke='$angsuran_ke', bunga='$bunga',sisa_kredit='$sisa_kredit', denda='$denda',tgl_angsuran='$tgl_angsuran',keterangan='$keterangan' where id='$id_cust'");
								
								if($query){
										?>
											<div class="alert alert-success alert-dismissible" role="alert">
											<button type="button" class="close" data-dismiss="alert" aria-label="Close" ><span aria-hidden="true">&times;</span></button>
											<strong>Success!</strong> Berhasil Ubah Data.
											</div>
											<?php
								}else{	
										?>
											<div class="alert alert-danger alert-dismissible" role="alert">
											<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
											<strong>Danger!</strong> Gagal Ubah data.
											</div>
										<?php
									}
								}
								?>
								<br/>
          
									
									 <form method="post">
									  <div class="form-group">
										<label for="id_kredit">No PK</label>
										<input type="text" class="form-control" id="id_kredit"  name="id_kredit"  value="<?php echo $row['id_kredit']?>" required>
									  </div>
									  <form>
									  <div class="form-group">
										<label for="id_cust">Nama Customer</label>
										<input type="text" class="form-control" id="id_cust"  name="id_cust" value="<?php echo $row['id_cust']?>" required>
									  </div>
									   <form>
									  <div class="form-group">
										<label for="id_petugas">Nama Petugas</label>
										<input type="text" class="form-control" id="id_petugas"  name="id_petugas" value="<?php echo $row['id_petugas']?>" required>
									  </div>
									   <form>
									  <div class="form-group">
										<label for="bayar">Bayar</label>
										<input type="text" class="form-control" id="bayar"  name="bayar" value="<?php echo $row['bayar']?>" required>
									  </div>
									  <div class="form-group">
										<label for="angsuran_ke">Angsuran Ke</label>
										<input type="text" class="form-control" id="angsuran_ke"  name="angsuran_ke" value="<?php echo $row['angsuran_ke']?>"required>
									  </div>
									  <div class="form-group">
										<label for="bunga">Bunga</label>
										<input type="text" class="form-control" id="bunga"  name="bunga" value="<?php echo $row['bunga']?>"required>
									  </div>
									  <div class="form-group">
										<label for="sisa_kredit">Sisa Kredit</label>
										<input type="text" class="form-control" id="sisa_kredit"  name="sisa_kredit" value="<?php echo $row['sisa_kredit']?>"required>
									  </div>
									  <div class="form-group">
										<label for="denda">Denda</label>
										<input type="text" class="form-control" id="denda"  name="denda" value="<?php echo $row['denda']?>"required>
									  </div>
									  <div class="form-group">
										<label for="tgl_angsuran">Tanggal Angsuran</label>
										<input type="date" class="form-control" id="tgl_angsuran"  name="tgl_angsuran" value="<?php echo $row['tgl_angsuran']?>"required>
									  </div>
									  <div class="form-group">
										<label for="keterangan">Keterangan</label>
										<input type="text" class="form-control" id="keterangan"  name="keterangan" value="<?php echo $row['keterangan']?>"required>
									  </div>
									
									  <button type="submit" class="btn btn-primary"  name="submit">Submit</button>
									  <a href="pembayaran.php" class="btn btn-primary"><span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span>Back</a>
									</form>
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
</div>
    <!-- Mainly scripts -->
    <script src="js/jquery-2.1.1.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <!-- Peity -->
    <script src="js/plugins/peity/jquery.peity.min.js"></script>
    <script src="js/demo/peity-demo.js"></script>

    <!-- Custom and plugin javascript -->
    <script src="js/inspinia.js"></script>
    <script src="js/plugins/pace/pace.min.js"></script>

    <!-- jQuery UI -->
    <script src="js/plugins/jquery-ui/jquery-ui.min.js"></script>

    <!-- GITTER -->
    <script src="js/plugins/gritter/jquery.gritter.min.js"></script>

    <!-- Sparkline -->
    <script src="js/plugins/sparkline/jquery.sparkline.min.js"></script>

    <!-- Sparkline demo data  -->
    <script src="js/demo/sparkline-demo.js"></script>

</body>
</html>
