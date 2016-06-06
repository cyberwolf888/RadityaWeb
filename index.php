<?php include_once ('layouts/header.php'); ?>
            
        <div class="row">
		
        <div class="col-md-12">
		
        <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h5>Data Tagihan Terbaru </h5>
            <div class="ibox-tools">
                <a class="collapse-link">
                    <i class="fa fa-chevron-up"></i>
                </a>
                <a class="close-link">
                    <i class="fa fa-times"></i>
                </a>
            </div>
        </div>
        <div class="ibox-content">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                 <tr>
						<th>Nama Customer</th>
						<th>Angsuran Ke</th>
						<th>Sisa Kredit</th>
						<th>Tgl Angsuran</th>
						<th>Keterangan</th>
										
					</tr>
                    </thead>
                    <tbody>
                     <?php
								$query = $mysqli->query("select a.*, ag.nama from angsuran as a join anggota as ag on ag.id_anggota = a.id_cust order by a.id DESC LIMIT 5");
								$no = 1;
								while($row = $query->fetch_assoc()){		
								?>	
								<tr>
								<td><?php echo $row['nama'] ?></td>
								<td><?php echo $row['angsuran_ke'] ?></td>
								<td><?php echo "Rp. ".number_format($row['sisa_kredit'],0,',','.') ?></td>
                                <td><?php echo date('d/m/Y',strtotime($row['tgl_angsuran'])) ?></td>		
                                <td><?php echo $row['keterangan'] ?></td>
                                 
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

		 <div class="col-md-12">
		
        <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h5>Data Pengajuan Kredit Terbaru </h5>
            <div class="ibox-tools">
                <a class="collapse-link">
                    <i class="fa fa-chevron-up"></i>
                </a>
                <a class="close-link">
                    <i class="fa fa-times"></i>
                </a>
            </div>
        </div>
        <div class="ibox-content">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
						<tr>
							<th>Nama Barang</th>
							<th>Tanggal Kredit</th>
							<th>Harga</th>
							<th>Uang Muka</th>
                            <th>Status</th>
							<th>Keterangan</th>
						</tr>
                    </thead>
                    <tbody>
                    <?php
								$query = $mysqli->query("select k.*, b.nama_barang from kredit as k join barang as b on b.id = k.id_barang order by k.id DESC LIMIT 5");
								$no = 1;
                                $status = ['1'=>'<span style="color: blue;">Proses</span>','2'=>'<span style="color: green;">Lunas</span>','0'=>'<span style="color: red;">Macet</span>'];
								while($row = $query->fetch_assoc()){		
								?>	
								<tr>
                                    <td><?php echo $row['nama_barang'] ?></td>
                                    <td><?php echo date('d/m/Y',strtotime($row['tgl_kredit'])) ?></td>
                                    <td><?php echo "Rp. ".number_format($row['harga'],0,',','.') ?></td>
                                    <td><?php echo "Rp. ".number_format($row['uang_muka'],0,',','.') ?></td>
                                    <td><?php echo $status[$row['status']] ?></td>
                                    <td><?php echo $row['keterangan'] ?></td>
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
		
		
           
<?php include_once ('layouts/footer.php'); ?>
