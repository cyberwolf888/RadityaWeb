<?php
include '../config.php'; 

if(!isset($_SESSION['type']) || $_SESSION['type']!=3){
	echo "<script>window.location=('../login1.php')</script>";
}
$users = $mysqli->query("select * from users JOIN anggota ON users.id=anggota.id_user where email='".$_SESSION['email']."' ")->fetch_assoc();

?>
<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Sistem Penagihan Kredit</title>

    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../font-awesome/css/font-awesome.css" rel="stylesheet">

    <!-- Toastr style -->
    <link href="../css/plugins/toastr/toastr.min.css" rel="stylesheet">

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
        
            <ul class="nav navbar-top-links navbar-right">
                
                <li>
                    <a href="../logout.php">
                        <i class="fa fa-sign-out"></i> Log out
                    </a>
                </li>
            </ul>

        </nav>
        </div>
            <div class="row  border-bottom white-bg dashboard-header">
                <div class="col-sm-12">
                    <center><h2>Selamat Datang <?= $users['nama'] ?></h2></center>
                        <small></small>
                </div>
			</div>
		<div class="ibox-content">
			<div class="table-responsive">
                <table class="table table-striped">
                    <thead>
						<tr>
											
															
							<th>Nama Barang</th>
							<th>Tanggal Kredit</th>
							<th>Harga</th>
							<th>Uang Muka</th>
							<th>Keterangan</th>
							<th>Status</th>
						</tr>
                    </thead>
                    <tbody>
                    <?php
								$query = $mysqli->query("select kredit.*, barang.nama_barang from kredit JOIN barang ON kredit.id_barang = barang.id where kredit.id_cust='".$users['id_anggota']."' ");
								$no = 1;
								while($row = $query->fetch_assoc()){		
								?>	
								<tr>
												
										
								<td><?php echo $row['nama_barang'] ?></td>			
								<td><?php echo date('d F Y', strtotime($row['tgl_kredit'])) ?></td>			
								<td>Rp. <?= number_format($row['harga'],0,',','.') ?></td>			
								<td>Rp. <?= number_format($row['uang_muka'],0,',','.') ?></td>
                                
                                <td><?php echo $row['keterangan'] ?></td>
								<td><?php echo $row['status']==1?"Proses":"Lunas" ?></td>
								<td>
								<td class="project-actions">       
								<a href="detail_kredit.php?id=<?php echo $row ['id'] ?>" class="btn btn-white btn-sm"><i class="fa fa-eye"></i> View </a>
								</td>
                                </td>    
							</tr>
							<?php
								}
							?>
                    </tbody>
                </table>
            </div>
		</div>
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

    <!-- Flot -->
    <script src="../js/plugins/flot/jquery.flot.js"></script>
    <script src="../js/plugins/flot/jquery.flot.tooltip.min.js"></script>
    <script src="../js/plugins/flot/jquery.flot.spline.js"></script>
    <script src="../js/plugins/flot/jquery.flot.resize.js"></script>
    <script src="../js/plugins/flot/jquery.flot.pie.js"></script>

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

    <!-- Toastr -->
    <script src="../js/plugins/toastr/toastr.min.js"></script>

</body>
</html>