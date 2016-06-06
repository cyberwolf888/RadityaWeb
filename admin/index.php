<?php include_once('layouts/header.php') ?>
    <div class="row  border-bottom white-bg dashboard-header">
        <div class="col-sm-12">
            <center><h1>Selamat Datang Admin</h1></center>
            <center><h3>Pande Komang Alit</h3></center>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>User Admin Terbaru </h5>
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
                                <th>id</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Status</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php

                                        $query = $mysqli->query("select * from users where type = 1 order by id DESC LIMIT 5");
                                        $no = 1;
                                        while($row = $query->fetch_assoc()){
                                        ?>
                                        <tr>
                                        <td><?php echo $row['id'] ?></td>
                                        <td><?php echo $row['username'] ?></td>
                                        <td><?php echo $row['email'] ?></td>
                                        <td><?php echo $status[$row['status']] ?></td>

                                        <td></td>
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

        <div class="col-md-6">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>User Petugas Terbaru </h5>
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
                                <th>id</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Status</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $query = $mysqli->query("select * from users where type = 2 order by id DESC LIMIT 5");
                            $no = 1;
                            while($row = $query->fetch_assoc()){
                                ?>
                                <tr>
                                    <td><?php echo $row['id'] ?></td>
                                    <td><?php echo $row['username'] ?></td>
                                    <td><?php echo $row['email'] ?></td>
                                    <td><?php echo $status[$row['status']] ?></td>

                                    <td></td>
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
		
    <div class="row">
        <div class="col-md-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>User Konsumen Terbaru</h5>
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
						<th>id</th>
						<th>Username</th>										
						<th>Email</th>
						<th>Status</th>				
					</tr>
                    </thead>
                    <tbody>
                    <?php
								$query = $mysqli->query("select * from users where type = 3 order by id DESC LIMIT 5");
								$no = 1;
								while($row = $query->fetch_assoc()){		
								?>	
								<tr>
								<td><?php echo $row['id'] ?></td>					
								<td><?php echo $row['username'] ?></td>		
								<td><?php echo $row['email'] ?></td>
								<td><?php echo $status[$row['status']] ?></td>
								
								<td></td>    
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
<?php include_once('layouts/footer.php'); ?>