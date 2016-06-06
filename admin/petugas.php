<?php include_once('layouts/header.php') ?>
		<div class="row">
            <div class="col-lg-12">
                <div class="wrapper wrapper-content animated fadeInUp">
                <div class="ibox">
                        <div class="ibox-title">
                            <h5>User Petugas</h5>
                            <div class="ibox-tools">
                                <a href="tambahdt_petugas.php" class="btn btn-primary btn-xs">Tambah User Petugas</a>
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
                                        <th>Nama Petugas</th>
                                        <th>Telepon</th>
										<th>Email</th>
										<th>Area</th>
										<th>Status</th>
										<th>Creat_at</th>
                                        <th>Action</th>
									</tr>
								<?php
								
								$query  = $mysqli->query("select u.*, p.nama_petugas, p.telepon, p.area from users as u join petugas as p on p.id_user=u.id where u.type = 2");
								
								if(isset($_POST['qcari'])){
									$qcari=$_POST['qcari'];
									$query1="SELECT * FROM  users 
									where id like '%$qcari%'
									or username like '%$qcari%'  ";
								}
								$no = 1;									
								while($row = $query->fetch_assoc()){		
								?>	
								<tr>
								<td><?php echo $row['id'] ?></td>					
								<td><?php echo $row['username'] ?></td>
                                <td><?php echo $row['nama_petugas'] ?></td>
                                <td><?php echo $row['telepon'] ?></td>
								<td><?php echo $row['email'] ?></td>
								<td><?php echo $row['area'] ?></td>
								<td><?php echo $status[$row['status']] ?></td>
								<td><?php echo date("d-m-Y",strtotime($row['create_at'])) ?></td>
								<td>
						<a href="editdt_petugas.php?id=<?php echo $row ['id'] ?>" class="btn btn-warning btn-sm"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
                        <a onClick="return confirm('Anda Yakin Ingin Menghapus data')" href="hapus_petugas.php?id=<?php echo $row ['id'] ?>" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
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
		</div>
<?php include_once('layouts/footer.php'); ?>
