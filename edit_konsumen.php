<?php include_once ('layouts/header.php'); ?>
        <div class="row wrapper border-bottom white-bg page-heading">
			<div class="col-lg-10">
				<h2>Data Konsumen</h2>
				<ol class="breadcrumb">
					<li>
						<a href="index.php">Beranda</a>
					</li>
					<li class="active">
						<strong>Data Konsumen</strong>
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
                                 $id = $_GET['id'];
								if(isset($_POST['submit'])){
                                $result = $mysqli->query("select * from anggota where id_anggota='$id'");
                                $row = $result->fetch_assoc();

                                $username = $_POST['user'];
                                $email = $_POST['em'];
								$nama = $_POST['nama'];
								$alamat = $_POST['alamat'];
								$telepon = $_POST['telepon'];
                                $area = $_POST['area'];
                                $sts = $_POST['sts'];
								$query = $mysqli->query("update anggota set nama='$nama', alamat='$alamat', telepon='$telepon', area='$area' where id_anggota='$id'");
								if($query){
                                    $mysqli->query("update users set username='$username', email='$email', status='$sts' where id='".$row['id_user']."'");
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

                                 if(isset($id)){
                                     $result = $mysqli->query("select * from anggota where id_anggota='$id'");
                                     $row = $result->fetch_assoc();
                                     $result = $mysqli->query("select * from users where id='".$row['id_user']."'");
                                     $user = $result->fetch_assoc();
                                 }
								?>
								<br/>
									 <form method="post">
                                     <div class="form-group">
                                         <label for="user">Username</label>
                                         <input type="text" class="form-control" id="user"  name="user" value="<?php echo $user['username']?>" required>
                                     </div>
                                     <div class="form-group">
                                         <label for="em">Email</label>
                                         <input type="text" class="form-control" id="em"  name="em" value="<?php echo $user['email']?>" required>
                                     </div>
									  <div class="form-group">
										<label for="nama">Nama Customer</label>
										<input type="text" class="form-control" id="nama"  name="nama" value="<?php echo $row['nama']?>" required>
									  </div>
									  
									  <div class="form-group">
										<label for="alamat">Alamat</label>
										<input type="text" class="form-control" id="alamat"  name="alamat" value="<?php echo $row['alamat']?>" required>
									  </div>
									
									  <div class="form-group">
										<label for="telepon">No Telepon</label>
										<input type="text" class="form-control" id="telepon"  name="telepon" value="<?php echo $row['telepon']?>" required>
										
									  </div>
                                     <div class="form-group">
                                         <label for="area">Area</label>
                                         <select name="area" id="area" class="form-control" required>
                                             <option value="Kuta" <?= $row['area']=='Kuta' ? 'selected' : '' ?>>Kuta</option>
                                             <option value="Denpasar Utara" <?= $row['area']=='Denpasar Utara' ? 'selected' : '' ?>>Denpasar Utara</option>
                                             <option value="Denpasar Timur" <?= $row['area']=='Denpasar Timur' ? 'selected' : '' ?>>Denpasar Timur</option>
                                             <option value="Denpasar Selatan" <?= $row['area']=='Denpasar Selatan' ? 'selected' : '' ?>>Denpasar Selatan</option>
                                             <option value="Buduk" <?= $row['area']=='Buduk' ? 'selected' : '' ?>>Buduk</option>
                                             <option value="Mengwi" <?= $row['area']=='Mengwi' ? 'selected' : '' ?>>Mengwi</option>
                                             <option value="Kapal" <?= $row['area']=='Kapal' ? 'selected' : '' ?>>Kapal</option>
                                             <option value="Canggu" <?= $row['area']=='Canggu' ? 'selected' : '' ?>>Canggu</option>
                                         </select>
                                     </div>
                                     <div class="form-group">
                                         <label for="sts">Status</label>
                                         <select name="sts" id="sts" class="form-control" required>
                                             <option value="10" <?= $user['status']=='10' ? 'selected' : '' ?> >Active</option>
                                             <option value="11" <?= $user['status']=='11' ? 'selected' : '' ?> >Suspend</option>
                                         </select>
                                     </div>
									  <button type="submit" class="btn btn-primary"  name="submit">Submit</button>
									  <a href="dtbarang.php" class="btn btn-primary"><span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span>Back</a>
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
