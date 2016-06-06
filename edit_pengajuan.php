<?php include_once ('layouts/header.php'); ?>
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
								 $id = $_GET['id'];

								if(isset($_POST['submit'])){
								$sts = $_POST['sts'];
								
								$query = $mysqli->query("update kredit set status='$sts' where id='$id'");
								if($query){
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
									 $result = $mysqli->query("select * from kredit where id='$id' ");
									 $row = $result->fetch_assoc();
								 }
								?>
								<br/>
          
									 <form method="post">
									  <div class="form-group">
										<label for="sts">Status</label>
										  <select class="form-control" id="sts" name="sts" required>
											  <option value="1" <?= $row['status']==1 ? 'selected':'' ?>>Proses</option>
											  <option value="2" <?= $row['status']==2 ? 'selected':'' ?>>Lunas</option>
											  <option value="0" <?= $row['status']==0 ? 'selected':'' ?>>Macet</option>
										  </select>
									  </div>
									  <button type="submit" class="btn btn-primary"  name="submit">Submit</button>
									  <a href="pengajuan1.php" class="btn btn-primary"><span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span>Back</a>
									</form>
									
                </div>
            </div>
		</div>
<?php include_once ('layouts/footer.php'); ?>
