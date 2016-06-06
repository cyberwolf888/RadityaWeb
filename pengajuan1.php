<?php include_once ('layouts/header.php'); ?>
        <div class="row wrapper border-bottom white-bg page-heading">
			<div class="col-lg-10">
				<h2>Tambah Kredit</h2>
				<ol class="breadcrumb">
					<li>
						<a href="index.php">Beranda</a>
					</li>
					<li class="active">
						<strong>Tambah Kredit</strong>
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
                            <h5>Data Kredit Baru</h5>
                            <div class="ibox-tools">
                                <a href="tambah_pengajuan.php" class="btn btn-primary btn-xs">Tambah Data Kredit Baru</a>
                            </div>
                        </div>
                        <div class="ibox-content">

                            <div class="project-list">
							<div class="table-responsive">
                                <table class="table table-hover">
                                    <tbody>
                                    <tr>
										
																			
										<th>Nama Barang</th>
										<th>Tanggal Kredit</th>
										<th>Harga</th>
										<th>Bunga</th>
										<th>Lama Cicilan</th>
										<th>Telah Bayar</th>
										<th>Sisa</th>
										<th>Keterangan</th>
										<th>Status</th>
                                        <th>Action</th>
									</tr>
								 <?php
								$query = $mysqli->query("select k.*, b.nama_barang from kredit as k, barang as b where k.id_barang=b.id order by k.id desc");
								$no = 1;
							    $status = ['1'=>'<span style="color: blue;">Proses</span>','2'=>'<span style="color: green;">Lunas</span>','0'=>'<span style="color: red;">Macet</span>'];
								while($row = $query->fetch_assoc()){		
								?>	
								<tr>
									<td><?php echo $row['nama_barang'] ?></td>
									<td><?php echo date('d/m/Y', strtotime($row['tgl_kredit'])) ?></td>
									<td><?php echo "Rp. ".number_format($row['harga'],0,',','.') ?></td>
									<td><?php echo $row['bunga'] ?>%</td>
									<td><?php echo $row['lama_cicilan'] ?> Bulan</td>
									<td><?php echo "Rp. ".number_format($row['telah_bayar'],0,',','.') ?></td>
									<td><?php echo "Rp. ".number_format($row['sisa'],0,',','.') ?></td>
									<td><?php echo $row['keterangan'] ?></td>
									<td><?php echo $status[$row['status']] ?></td>
								<td>
                                <a href="edit_pengajuan.php?id=<?php echo $row ['id'] ?>" class="btn btn-warning btn-sm"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
								<a onClick="return confirm('Anda Yakin Ingin Menghapus data')" href="hapus_pengajuan.php?id=<?php echo $row ['id'] ?>" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>         
								<a href="detail_kredit.php?id=<?php echo $row ['id'] ?>" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span></a>
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
