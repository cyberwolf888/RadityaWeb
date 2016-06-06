<?php include_once('layouts/header.php') ?>
        <div class="row wrapper border-bottom white-bg page-heading">
			<div class="col-lg-10">
				<h2>Admin</h2>
				<ol class="breadcrumb">
					<li>
						<a href="index.php">Beranda</a>
					</li>
					<li class="active">
						<strong>Admin</strong>
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
							if(isset($_POST['submit'])){
							$user = $_POST['user'];
							$pass = md5($_POST['pass']);
							$em = $_POST['em'];
							$typ = '1';
							$sts = $_POST['sts'];
								$query = $mysqli->query("insert into users (username,password,email,type,status)  values ('$user','$pass','$em','$typ','$sts')");
							if($query){
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
								<label for="pass">Password</label>
								<input type="text" class="form-control" id="pass"  name="pass" placeholder="Password" required>
							  </div>
							  <div class="form-group">
								<label for="em">Email</label>
								<input type="text" class="form-control" id="em"  name="em" placeholder="Email" required>
							  </div>
							  <div class="form-group">
								<label for="sts">Status</label>
                                  <select name="sts" id="sts" class="form-control" required>
                                      <option value="10" >Active</option>
                                      <option value="11" >Suspend</option>
                                  </select>
							  </div>
								<button type="submit" class="btn btn-primary"  name="submit">Submit<span class="glyphicon glyphicon-menu-right" ></span></button>
								<a href="admin.php" class="btn btn-primary"><span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span>Back</a>
							</form>
                               
                                </div>
                            </div>
                       
                    </div>
                </div>
            </div>
<?php include_once('layouts/footer.php'); ?>