<?php include_once ('layouts/header.php'); ?>
        <div class="row wrapper border-bottom white-bg page-heading">
			<div class="col-lg-10">
				<h2>Tagihan Kredit</h2>
				<ol class="breadcrumb">
					<li>
						<a href="index.php">Beranda</a>
					</li>
					<li class="active">
						<strong>Tagihan Kredit</strong>
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
                            <h5>Data Tagihan Kredit</h5>
                            <div class="ibox-tools">
                                <a href="tambah_tagihan.php" class="btn btn-primary btn-xs">Tambah Data Tagihan Kredit</a>
                            </div>
                        </div>
                        <div class="ibox-content">
                            <div class="project-list">
							<div class="table-responsive">
                                <table class="table table-hover">
                                    <tbody>
                                    <tr>
										<th>Tgl Angsuran</th>
										<th>Nama Customer</th>	
										<th>Nama Petugas</th>
										<th>Bayar</th>
										<th>Angsuran Ke</th>
										<th>Bunga</th>
										<th>Sisa Kredit</th>
										<th>Keterangan</th>
										
									</tr>
								 <?php
								$query = $mysqli->query("SELECT 
															a.*, 
															p.id as petugas_id, p.nama_petugas, 
															ag.id_anggota, ag.nama 
														FROM angsuran AS a 
														JOIN petugas AS p ON a.id_petugas = p.id
														JOIN anggota AS ag ON ag.id_anggota= a.id_cust 
														ORDER by id DESC");
								$no = 1;
								while($row = $query->fetch_assoc()){		
								?>	
								<tr>
								<td><?php echo date('d F Y', strtotime($row['tgl_angsuran'])) ?></td>
								<td><?php echo $row['nama'] ?></td>	
								<td><?php echo $row['nama_petugas'] ?></td>
								<td>Rp. <?= number_format($row['bayar'],0,',','.') ?></td>			
								<td><?php echo $row['angsuran_ke'] ?> </td>			
								<td>Rp. <?= number_format($row['bunga'],0,',','.') ?></td>			
								<td>Rp. <?= number_format($row['sisa_kredit'],0,',','.') ?></td>
                                <td><?php echo $row['keterangan'] ?></td>
                                
								<td>
                        		<a onClick="return confirm('Anda Yakin Ingin Menghapus data')" href="hapus_tagihan.php?id=<?php echo $row ['id'] ?>" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
                                <a href="detail_kredit.php?id=<?php echo $row ['id_kredit'] ?>" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span></a>
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
