<?php include_once ('layouts/header.php'); ?>
<?php
$sql_konsumen = "SELECT a.*, u.status FROM anggota AS a JOIN users AS u ON a.id_user=u.id WHERE u.status=10";

$query_konsumen = $mysqli->query($sql_konsumen);

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
								$id_kredit = $_POST['id_kredit'];
								$id_cust = $_POST['id_cust'];
								$id_petugas= $petugas['id'];
								$bayar = $_POST['bayar'];
								$angsuran_ke = $_POST['angsuran_ke'];
								$bunga = $_POST['bunga'];
								$sisa_kredit = $_POST['sisa']-$bayar;
								$denda = $_POST['denda'];
								$tgl_angsuran = date('Y-m-d');
								$keterangan = $_POST['keterangan'];
								$telah_bayar = $_POST['telah_bayar']+$bayar;
								if($sisa_kredit<0){
									$sisa_kredit = 0;
								}
								$query = $mysqli->query("insert into angsuran values( ' ','$id_kredit', '$id_cust', '$id_petugas', '$bayar',
								'$angsuran_ke', '$bunga','$sisa_kredit', '$denda','$tgl_angsuran','$keterangan' )");
								if($query){
										if($sisa_kredit<=0){
											$mysqli->query("UPDATE kredit SET sisa=$sisa_kredit, telah_bayar=$telah_bayar, status='2' WHERE id=$id_kredit");
										}else{
											$mysqli->query("UPDATE kredit SET sisa=$sisa_kredit, telah_bayar=$telah_bayar WHERE id=$id_kredit");
										}
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
										<label for="id_kredit">Kredit</label>
										<select name="id_kredit" id="id_kredit" required class="form-control">
										
										</select>
									  </div>
									  <div class="form-group">
										<label for="bunga">Bunga</label>
										<input type="text" class="form-control" id="bunga"  name="bunga" placeholder="Bunga"required>
									  </div>
									  <div class="form-group">
										<label for="denda">Denda</label>
										<input type="text" class="form-control" id="denda"  name="denda" placeholder="Denda"required>
									  </div>
									  <div class="form-group">
										<label for="bayar">Total Bayar</label>
										<input type="text" class="form-control" id="bayar"  name="bayar" placeholder="Total bayar" >
									  </div>
									  <div class="form-group">
										<label for="keterangan">Keterangan</label>
										<input type="text" class="form-control" id="keterangan"  name="keterangan" placeholder="Keterangan">
									  </div>
										<input type="hidden" name="angsuran_ke" id="angsuran_ke" value="0">
										<input type="hidden" name="sisa" id="sisa" value="0">
										<input type="hidden" name="telah_bayar" id="telah_bayar" value="0">
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
	
	<script>
	$("#id_cust").change(function(){
		var id_cust = $("#id_cust").val();
		var posting = $.post( "ajax_kredit.php", { id_cust: id_cust} );
		posting.done(function(data){
			$("#id_kredit").empty().append(data);
		});
	});
	$("#id_kredit").change(function(){
		var id_kredit = $("#id_kredit").val();
		var posting = $.post( "ajax_pre_kredit.php", { id_kredit: id_kredit} );
		posting.done(function(data){
			var obj = jQuery.parseJSON( data );
			$("#bunga").val(obj.bunga);
			$("#denda").val(obj.denda);
			$("#bayar").val(obj.bayar);
			$("#angsuran_ke").val(obj.angsuran_ke);
			$("#sisa").val(obj.sisa);
			$("#telah_bayar").val(obj.telah_bayar);
		});
	});
	</script>
