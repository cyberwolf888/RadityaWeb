<?php include_once ('layouts/header.php'); ?>
        <div class="row wrapper border-bottom white-bg page-heading">
			<div class="col-lg-10">
				<h2>Data Barang</h2>
				<ol class="breadcrumb">
					<li>
						<a href="index.php">Beranda</a>
					</li>
					<li class="active">
						<strong>Data Barang</strong>
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
                            <div class="ibox-tools">
                                <a href="tambah_databarang.php" class="btn btn-primary btn-xs dim">Tambah Data Barang</a>
                            </div>
                        </div>
                        <div class="ibox-content">

                            <div class="project-list">
							<div class="table-responsive">
                                <table class="table table-hover">
                                    <tbody>
                                    <tr>
										<th>id</th>
										<th>Nama Barang</th>	
										<th>Harga</th>
										<th>Satuan</th>
										<th>Action</th>
									</tr>
								 <?php
								$query = $mysqli->query("select * from barang");
								$no = 1;
								while($row = $query->fetch_assoc()){		
								?>	
								<tr>
								<td><?php echo $row['id'] ?></td>					
								<td><?php echo $row['nama_barang'] ?></td>				
								<td>Rp. <?= number_format($row['harga'],0,',','.') ?></td>			
								<td><?php echo $row['satuan'] ?></td>			
								<td><a href="editdt_barang.php?id=<?php echo $row ['id'] ?>" class="btn btn-warning btn-sm"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
                        <a onClick="return confirm('Anda Yakin Ingin Menghapus data')" href="hapus_barang.php?id=<?php echo $row ['id'] ?>" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
								
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
<?php include_once ('layouts/footer.php'); ?>