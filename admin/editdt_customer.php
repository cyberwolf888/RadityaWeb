<?php include_once('layouts/header.php') ?>
        <div class="row wrapper border-bottom white-bg page-heading">
			<div class="col-lg-10">
				<h2>Konsumen</h2>
				<ol class="breadcrumb">
					<li>
						<a href="index.php">Beranda</a>
					</li>
					<li class="active">
						<strong>Konsumen</strong>
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
                            <h5></h5>
                            
                        </div>       
                            <div class="ibox-content">
								 <div class="project-list">
								 <?php
                                 $id = $_GET['id'];
								if(isset($_POST['submit'])){
								$user = $_POST['user'];
								$em = $_POST['em'];
								$sts = $_POST['sts'];
                                $nama = $_POST['nama'];
                                $telepon = $_POST['telepon'];
                                $area = $_POST['area'];
								$query = $mysqli->query("update users set username='$user', email='$em', status='$sts' where id='$id'");
								if($query){
                                    $mysqli->query("update anggota set nama='$nama', telepon='$telepon', area='$area' where id_user='$id'");
										?>
											<div class="alert alert-success alert-dismissible" role="alert">
											<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
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
                                     $result = $mysqli->query("select * from users where id='$id' ");
                                     $row = $result->fetch_assoc();
                                     $result = $mysqli->query("select * from anggota where id_user='$id'");
                                     $anggota = $result->fetch_assoc();
                                 }
								?>
								<br/>
								  
								 <form method="post">
								  <div class="form-group">
									<label for="user">Username</label>
									<input type="text" class="form-control" id="user"  name="user" value="<?php echo $row['username']?>" required>
								  </div>
								  <div class="form-group">
									<label for="em">Email</label>
									<input type="text" class="form-control" id="em"  name="em" value="<?php echo $row['email']?>" required>
								  </div>
                                     <div class="form-group">
                                         <label for="nama">Nama Customer</label>
                                         <input type="text" class="form-control" id="nama"  name="nama" placeholder="Nama Customer" value="<?php echo $anggota['nama']?>" required>
                                     </div>
                                     <div class="form-group">
                                         <label for="telepon">Telepon</label>
                                         <input type="text" class="form-control" id="telepon"  name="telepon" placeholder="Telepon" value="<?php echo $anggota['telepon']?>" required>
                                     </div>
                                     <div class="form-group">
                                         <label for="alamat">Alamat</label>
                                         <input type="text" class="form-control" id="alamat"  name="alamat" placeholder="Alamat" value="<?php echo $anggota['alamat']?>" required>
                                     </div>
                                     <div class="form-group">
                                         <label for="area">Area</label>
                                         <select name="area" id="area" class="form-control" required>
                                             <option value="Kuta" <?= $anggota['area']=='Kuta' ? 'selected' : '' ?>>Kuta</option>
                                             <option value="Denpasar Utara" <?= $anggota['area']=='Denpasar Utara' ? 'selected' : '' ?>>Denpasar Utara</option>
                                             <option value="Denpasar Timur" <?= $anggota['area']=='Denpasar Timur' ? 'selected' : '' ?>>Denpasar Timur</option>
                                             <option value="Denpasar Selatan" <?= $anggota['area']=='Denpasar Selatan' ? 'selected' : '' ?>>Denpasar Selatan</option>
                                             <option value="Buduk" <?= $anggota['area']=='Buduk' ? 'selected' : '' ?>>Buduk</option>
                                             <option value="Mengwi" <?= $anggota['area']=='Mengwi' ? 'selected' : '' ?>>Mengwi</option>
                                             <option value="Kapal" <?= $anggota['area']=='Kapal' ? 'selected' : '' ?>>Kapal</option>
                                             <option value="Canggu" <?= $anggota['area']=='Canggu' ? 'selected' : '' ?>>Canggu</option>
                                         </select>
                                     </div>
								  <div class="form-group">
									<label for="sts">Status</label>
                                      <select name="sts" id="sts" class="form-control" required>
                                          <option value="10" <?= $row['status']=='10' ? 'selected' : '' ?> >Active</option>
                                          <option value="11" <?= $row['status']=='11' ? 'selected' : '' ?> >Suspend</option>
                                      </select>
                                  </div>
								  <button type="submit" class="btn btn-primary"  name="submit">Submit</button>
								  <a href="customer.php" class="btn btn-primary"><span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span>Back</a>
								</form>
                                </div>
                            </div>
                       
                    </div>
                </div>
            </div>
		</div>
<?php include_once('layouts/footer.php'); ?>