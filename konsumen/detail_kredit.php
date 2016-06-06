<?php
include '../config.php'; 

if(!isset($_SESSION['type']) || $_SESSION['type']!=3){
	echo "<script>window.location=('index.php')</script>";
}
$id = $_GET['id'];
if(isset($id)){
	$result = $mysqli->query("select * from kredit where id='$id' ");
	$kredit = $result->fetch_assoc();
	$users = $mysqli->query("select * from users where id='".$kredit['id_cust']."' ");
	$users = $users->fetch_assoc();
	$anggota = $mysqli->query("select * from anggota where id_user='".$users['id']."' ");
	$anggota = $anggota->fetch_assoc();
	$barang = $mysqli->query("select * from barang where id='".$kredit['id_barang']."' ");
	$barang = $barang->fetch_assoc();
	$angsuran = $mysqli->query("select * from angsuran where id_kredit='".$id."' ");
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
<body class="canvas-menu">
    <div id="wrapper">
        

        <div id="page-wrapper" class="gray-bg dashbard-1">
        <div class="row border-bottom">
        <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <a class=" btn btn-info " href="index.php"><i class="fa fa-back"></i> </a>
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
                <div class="col-lg-8">
                    <h2>Detail Kredit</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="index.php">Home</a>
                        </li>
                        <li class="active">
                            <strong>Detail</strong>
                        </li>
                    </ol>
                </div>
                <div class="col-lg-4">
                    <div class="title-action">
                        <a href="printdt.php" target="_blank" class="btn btn-info"><i class="fa fa-print"></i> Print Detail Kredit </a>
                    </div>
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
								<div class="col-md-4"><?= $anggota['nama'] ?></div>
							</div>
							<div class="row">
								<div class="col-md-2">No HP</div>
								<div class="col-md-4"><?= $anggota['telepon'] ?></div>
							</div>
							<div class="row">
								<div class="col-md-2">Alamat</div>
								<div class="col-md-4"><?= $anggota['alamat'] ?></div>
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
								<div class="col-md-4"><?= $barang['nama_barang'] ?></div>
							</div>
							<div class="row">
								<div class="col-md-2">Harga</div>
								<div class="col-md-4">Rp. <?= number_format($barang['harga'],0,',','.') ?></div>
							</div>
							<div class="row">
								<div class="col-md-2">Satuan</div>
								<div class="col-md-4"><?= $barang['satuan'] ?></div>
							</div>
						</div>
                    </div>
                </div>
            </div>
			
      </div>
	
	 <div class="row">
		
        <div class="col-md-12">
		
        <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h5>Data Tagihan  </h5>
            <div class="ibox-tools">
                <a class="collapse-link">
                    <i class="fa fa-chevron-up"></i>
                </a>
                
                <a class="close-link">
                    <i class="fa fa-times"></i>
                </a>
            </div>
        </div>
        <div class="ibox-content">
            
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                    <tr>

                        <th>NO</th>
                        <th>Tanggal </th>
                        <th>Bayar </th>
                        <th>Bunga </th>
                        <th>Sisa Kredit</th>
                        <th>Keterangan </th>
                        
                    </tr>
                    </thead>
                    <?php while($row = $angsuran->fetch_assoc()): ?>
                <tr>
                    <td><?php echo $row['angsuran_ke'];?></td>
                    <td><?php echo date('d F Y', strtotime($row['tgl_angsuran']));?></td>
                    <td>Rp. <?= number_format($row['bayar'],0,',','.') ?></td>
                    <td>Rp. <?= number_format($row['bunga'],0,',','.') ?></td>
					<td>Rp. <?= number_format($row['sisa_kredit'],0,',','.') ?></td>
					<td><?php echo $row['keterangan'];?></td>
                </tr>
                <?php endwhile;?>
            </table>
                </table>
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


</html>
