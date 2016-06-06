<?php include_once ('layouts/header.php'); ?>
<?php
$id = $_GET['id'];
if(isset($id) && $id!=''){
	$result = $mysqli->query("select * from angsuran where id='$id' ");
	$result = $result->fetch_assoc();
	$kredit = $mysqli->query("select * from kredit where id='".$result['id_kredit']."' ");
	$kredit = $kredit->fetch_assoc();
	$anggota = $mysqli->query("select * from anggota where id_anggota='".$kredit['id_cust']."' ");
	$anggota = $anggota->fetch_assoc();
	$barang = $mysqli->query("select * from barang where id='".$kredit['id_barang']."' ");
	$barang = $barang->fetch_assoc();
	$angsuran = $mysqli->query("select * from angsuran where id_kredit='".$result['id_kredit']."' ");
	//$angsuran = $angsuran->fetch_assoc();
	
//print_r($barang);
}else{
	echo "<script>window.location=('infokredit.php')</script>";
}

?>

        <div class="row wrapper border-bottom white-bg page-heading">
			<div class="col-lg-10">
				<h2>Detail Kredit</h2>
				
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

                        <th>Angsuran Ke</th>
                        <th>Tanggal </th>
                        <th>Bayar </th>
                        <th>Bunga</th>
                        <th>Sisa </th>
                        <th>Denda</th>
                        <th>Keterangan </th>
                    
                    </tr>
                    </thead>
                    <tbody>
                    
                        <?php while($row = $angsuran->fetch_assoc()): ?>
                <tr>
                    <td><?php echo $row['angsuran_ke'];?></td>
                    <td><?php echo date('d F Y', strtotime($row['tgl_angsuran']));?></td>
                    <td>Rp. <?= number_format($row['bayar'],0,',','.') ?></td>
                    <td>Rp. <?= number_format($row['bunga'],0,',','.') ?></td>
					<td>Rp. <?= number_format($row['sisa_kredit'],0,',','.') ?></td>
                    <td>Rp. <?= number_format($row['denda'],0,',','.') ?></td>
					<td><?php echo $row['keterangan'];?></td>
                </tr>
                <?php endwhile;?>
                    
                    </tbody>
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
