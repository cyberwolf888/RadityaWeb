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
                            <h5>Tambah Data User Konsumen</h5>
                            
                        </div>       
                            <div class="ibox-content">
								 <div class="project-list">
							<?php
							if(isset($_POST['submit'])){
							$user = $_POST['user'];
							$pass = $_POST['pass'];
							$em = $_POST['em'];
							$sts = $_POST['sts'];
                            $typ = '3';
                            $nama = $_POST['nama'];
                            $telepon = $_POST['telepon'];
                            $alamat = $_POST['alamat'];
                            $area = $_POST['area'];
							$query = $mysqli->query("insert into users (username,password,email,type,status)  values ('$user','$pass','$em','$typ','$sts')");
                            $last_id = mysqli_insert_id($mysqli);
							if($query){
                                $mysqli->query("insert into anggota (id_user,nama,telepon,alamat,area)  values ('$last_id','$nama','$telepon','$alamat','$area')");
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
								<label for="user">Username</label>
								<input type="text" class="form-control" id="user"  name="user" placeholder="Username" required>
							  </div>
							  <div class="form-group">
								<label for="em">Email</label>
								<input type="text" class="form-control" id="em"  name="em" placeholder="Email" required>
							  </div>
                                <div class="form-group">
                                    <label for="pass">Password</label>
                                    <input type="password" class="form-control" id="pass"  name="pass" placeholder="Password" required>
                                </div>
                                <div class="form-group">
                                    <label for="nama">Nama Customer</label>
                                    <input type="text" class="form-control" id="nama"  name="nama" placeholder="Nama Customer" required>
                                </div>
                                <div class="form-group">
                                    <label for="telepon">Telepon</label>
                                    <input type="text" class="form-control" id="telepon"  name="telepon" placeholder="Telepon" required>
                                </div>
                                <div class="form-group">
                                    <label for="alamat">Alamat</label>
                                    <input type="text" class="form-control" id="alamat"  name="alamat" placeholder="Alamat" required>
                                </div>
                                <div class="form-group">
                                    <label for="area">Area</label>
                                    <select name="area" id="area" class="form-control" required>
                                        <option value="Kuta" >Kuta</option>
                                        <option value="Denpasar Utara" >Denpasar Utara</option>
                                        <option value="Denpasar Timur" >Denpasar Timur</option>
                                        <option value="Denpasar Selatan" >Denpasar Selatan</option>
                                        <option value="Buduk" >Buduk</option>
                                        <option value="Mengwi" >Mengwi</option>
                                        <option value="Kapal" >Kapal</option>
                                        <option value="Canggu" >Canggu</option>
                                    </select>
                                </div>
							  <div class="form-group">
								<label for="sts">Status</label>
                                  <select name="sts" id="sts" class="form-control" required>
                                      <option value="10" >Active</option>
                                      <option value="11" >Suspend</option>
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

<?php include_once('layouts/footer.php'); ?>