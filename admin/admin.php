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
                            <h5>User Admin</h5>
                            <div class="ibox-tools">
                                <a href="tambahdt_admin.php" class="btn btn-primary btn-xs">Tambah Data User Admin</a>
                            </div>
                        </div>
                        <div class="ibox-content">


                            <div class="project-list">
							<div class="table-responsive">
                                <table class="table table-hover">
                                    <tbody>
                                    <tr>
										<th>id</th>
										<th>Username</th>
										<th>Email</th>
										<th>Status</th>
										<th>Creat_at</th>
										<th>Action</th>
									</tr>
								<?php
								$query = $mysqli->query("select * from users where type=1");
								$no = 1;
								while($row = $query->fetch_assoc()){
								?>	
								<tr>
								<td><?php echo $row['id'] ?></td>					
								<td><?php echo $row['username'] ?></td>
								<td><?php echo $row['email'] ?></td>
								<td><?php echo $status[$row['status']] ?></td>
								<td><?php echo date('d-m-Y',strtotime($row['create_at'])) ?></td>
								<td>
						<a href="editdt_admin.php?id=<?php echo $row ['id'] ?>" class="btn btn-warning btn-sm"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
                        <a onClick="return confirm('Anda Yakin Ingin Menghapus data')" href="hapus_admin.php?id=<?php echo $row ['id'] ?>" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
						<a href="detaildt.php?id=<?php echo $row ['id'] ?>" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span></a>
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

<?php include_once('layouts/footer.php'); ?>