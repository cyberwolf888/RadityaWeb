<?php
include_once ('layouts/header.php');
$query_barang = $mysqli->query("SELECT * FROM barang");
$query_konsumen = $mysqli->query("SELECT a.*, u.status FROM anggota AS a JOIN users AS u ON a.id_user=u.id WHERE u.status=10");
?>

        <div class="row wrapper border-bottom white-bg page-heading">
			<div class="col-lg-10">
				<h2>Kredit Baru</h2>
				<ol class="breadcrumb">
					<li>
						<a href="index.php">Beranda</a>
					</li>
					<li class="active">
						<strong>Kredit Baru</strong>
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
								$id_cust = $_POST['id_cust'];
								$id_brg = $_POST['id_brg'];
								$tglkre = date('Y-m-d');
								$harga = $_POST['harga'];
								$uangmuka = $_POST['uangmuka'];
								$bnga = $_POST['bnga'];
								$lc = $_POST['lc'];
								$tb = $_POST['uangmuka'];
								$sisa = $_POST['harga'] - $tb;
								$ket = $_POST['ket'];
								$sts = 1; // 1 proses, 2 lunas, 0 macet
								
								$query = $mysqli->query("insert into kredit values('','$id_cust' ,'$id_brg', '$tglkre', '$harga', '$uangmuka',
								'$bnga', '$lc', '$tb', '$sisa', '$ket', '$sts')");
								if($query){
										?>
											<div class="alert alert-success alert-dismissible" role="alert">
											<button type="button" class="close" data-dismiss="alert" aria-label="Close" ><span aria-hidden="true">&times;</span></button>
											<strong>Success!</strong> Berhasil tambah Data.
											</div>
											<?php
								}else{
										?>
											<div class="alert alert-danger alert-dismissible" role="alert">
											<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
											<strong>Danger!</strong> Gagal tambah data.
											</div>
										<?php
									}
								}
								?>
								<br/>
          
									 <form method="post">
									  <form>
									  <div class="form-group">
										<label for="id_cust">Customer</label>
										<select name="id_cust" id="id_cust" required class="form-control">
										<option value=""></option>
										<?php
											while($row = $query_konsumen->fetch_assoc()){
												echo '<option value="'.$row['id_anggota'].'">'.$row['nama'].'</option>';
											}
										?>
										</select>
									  </div>
									  <div class="form-group">
										<label for="id_brg">Barang</label>
										<select name="id_brg" id="id_brg" required class="form-control">
										<option value=""></option>
										<?php
											while($row = $query_barang->fetch_assoc()){
												echo '<option value="'.$row['id'].'">'.$row['nama_barang'].'</option>';
											}
										?>
										</select>
									  </div>
									  <div class="form-group">
										<label for="harga">Harga Barang</label>
										<input type="text" class="form-control" id="harga"  name="harga" placeholder="harga" required>
									  </div>
									  <div class="form-group">
										<label for="uangmuka">Uang Muka</label>
										<input type="text" class="form-control" id="uangmuka"  name="uangmuka" placeholder="Uang Muka" required>
									  </div>
									  <div class="form-group">
										<label for="bnga">Bunga</label>
										<select name="bnga" class="form-control" id="bnga" required>
										<option value="2"> 2% </option>
										<option value="5"> 5% </option>
										<option value="10"> 10% </option>
										</select>
									  </div>
									  <div class="form-group">
										<label for="lc">Lama Cicilan</label>
										<select name="lc" id="lc" required class="form-control" required>
										<option value="6">6 Bulan</option>
										<option value="9">9 Bulan</option>
										<option value="12">12 Bulan</option>
										<option value="15">15 Bulan</option>
										</select>
									  </div>
									  <div class="form-group">
										<label for="ket">Keterangan</label>
										<input type="text" class="form-control" id="ket"  name="ket" placeholder="keterangan">
									  </div>
									  
									  <button type="submit" class="btn btn-primary"  name="submit">Submit</button>
									  <a href="pengajuan1.php" class="btn btn-primary"><span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span>Back</a>
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
	
	<script>
	$("#id_brg").change(function(){
		var id_brg = $("#id_brg").val();
		var posting = $.post( "ajax_hrg_brg.php", { id_brg: id_brg} );
		posting.done(function(data){
			$("#harga").val(data);
		});
	});
	</script>
