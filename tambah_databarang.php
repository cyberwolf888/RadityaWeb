<?php include_once ('layouts/header.php'); ?>
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
							$nmbrg = $_POST['nmbrg'];
							$harga = $_POST['harga'];
							$satuan = $_POST['satuan'];
							$query = $mysqli->query("insert into barang values('','$nmbrg','$harga','$satuan')");
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
								<label for="nmbrg">Nama Barang</label>
								<input type="text" class="form-control" id="nmbrg"  name="nmbrg" placeholder="Nama barang" required>
							  </div>
							  <div class="form-group">
								<label for="harga">Harga</label>
								<input type="text" class="form-control" id="harga"  name="harga" placeholder="Harga" required>
							  </div>
							  <div class="form-group">
								<label for="satuan">Satuan</label>
								<input type="text" class="form-control" id="satuan"  name="satuan" placeholder="Satuan" required>
							  </div>
							  <button type="submit" class="btn btn-primary"  name="submit">Submit</button>
							  <a href="dtbarang.php" class="btn btn-primary"><span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span>Back</a>
							</form>
                               
                                </div>
                            </div>
                       
                    </div>
                </div>
            </div>
<?php include_once ('layouts/footer.php'); ?>