<?php
include 'config.php'; 
if(!isset($_SESSION['type']) || $_SESSION['type']!=2){
	echo "<script>window.location=('index.php')</script>";
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
                            <img alt="image" class="img-circle" src="image/LOGO2.png" />
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
                            <li><a href="pembayaran.php">Tagihan Kredit</a></li>
                            <li><a href="pengajuan1.php">Kredit Baru</a></li>
                            <li class="active"><a href="infokredit.php">Info Kredit</a></li>
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
                    <span class="m-r-sm text-muted welcome-message">Welcome </span>
                </li>
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
				<h2>Info Kredit</h2>
				<ol class="breadcrumb">
					<li>
						<a href="index.php">Beranda</a>
					</li>
					<li class="active">
						<strong>Info Kredit</strong>
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
                            <h5>Data Tagihan Kredit</h5>
                            
                        </div>
                        <div class="ibox-content">
                            <div class="row m-b-sm m-t-sm">
                                <div class="col-md-1">
                                    <button type="button" id="loading-example-btn" class="btn btn-white btn-sm" ><i class="fa fa-refresh"></i> Refresh</button>
                                </div>
                                <div class="col-md-11">
                                    <div class="input-group"><input type="text" placeholder="Search" class="input-sm form-control"> <span class="input-group-btn">
                                        <button type="button" class="btn btn-sm btn-primary"> Go!</button> </span></div>
                                </div>
                            </div>

                            <div class="project-list">
							<div class="table-responsive">
                                <table class="table table-hover">
                                    <tbody>
                                    <tr>
										
											
										<th>Nama Customer</th>	
										<th>Nama Petugas</th>
										<th>Bayar</th>
										<th>Angsuran Ke</th>
										<th>Bunga</th>
										<th>Sisa Kredit</th>
										<th>Denda</th>
										<th>Tgl Angsuran</th>
										<th>Keterangan</th>
										
									</tr>
								 <?php
								$query = $mysqli->query("SELECT 
														angsuran.*, 
														petugas.id as petugas_id, petugas.nama_petugas, 
														users.id as users_id, 
														anggota.id_anggota, anggota.nama 
														FROM angsuran 
														JOIN petugas ON angsuran.id_petugas = petugas.id
														JOIN users ON angsuran.id_cust = users.id 
														JOIN anggota ON users.id= anggota.id_user 
														ORDER by id DESC");
								$no = 1;
								while($row = $query->fetch_assoc()){		
								?>	
								<tr>
												
								
								<td><?php echo $row['nama'] ?></td>	
								<td><?php echo $row['nama_petugas'] ?></td>
								<td>Rp. <?= number_format($row['bayar'],0,',','.') ?></td>			
								<td><?php echo $row['angsuran_ke'] ?> </td>			
								<td>Rp. <?= number_format($row['bunga'],0,',','.') ?></td>			
								<td>Rp. <?= number_format($row['sisa_kredit'],0,',','.') ?></td>
                                <td>Rp. <?= number_format($row['denda'],0,',','.') ?></td>			
                                <td><?php echo date('d F Y', strtotime($row['tgl_angsuran'])) ?></td>		
                                <td><?php echo $row['keterangan'] ?></td>
                                
								<td>
								<form  action="detail_kredit.php" name="valueToSearch"id="valueToSearch" method="post">
                                <a type="submit" name="search" href="detail_kredit.php?id=<?php echo $row ['id'] ?>" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span></a>
                                </form>
								</td>    
							</tr>
							<?php
								}
							?>
                                    </tbody>
                                </table>
                            </div>
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
