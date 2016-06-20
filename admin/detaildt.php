<?php include_once('layouts/header.php') ?>

<?php
if(isset($_GET['id'])){
    $user_id = $_GET['id'];
    $user = $mysqli->query('SELECT * FROM users WHERE id="'.$user_id.'"')->fetch_assoc();
    $type = [1=>'Admin', 2=>'Petugas', 3=>'Customer'];
    $status = [10=>'Aktif',11=>'Suspend'];
    if($user){
        if($user['type'] == 1){

        }elseif ($user['type'] == 2){
            $profile = $mysqli->query('SELECT * FROM petugas WHERE id_user="'.$user_id.'"')->fetch_assoc();
        }else{
            $profile = $mysqli->query('SELECT * FROM anggota WHERE id_user="'.$user_id.'"')->fetch_assoc();
        }
    }
}
?>
        <div class="row wrapper border-bottom white-bg page-heading">
			<div class="col-lg-10">
				<h2>Detail</h2>
				
			</div>
				<div class="col-lg-2">
				</div>
		</div>
		<div class="row">
            <div class="col-lg-12">
                <div class="wrapper wrapper-content animated fadeInUp" style="padding-bottom: 5px;">

                    <div class="ibox" style="margin-bottom:0px;">
                        <div class="ibox-title">
							<h5>Data User</h5>
                        </div>
						<div class="ibox-content">
							<div class="row">
								<div class="col-md-2">Usrname</div>
								<div class="col-md-4"><?= $user['username'] ?></div>
							</div>
							<div class="row">
								<div class="col-md-2">Email</div>
								<div class="col-md-4"><?= $user['email'] ?></div>
							</div>
                            <div class="row">
                                <div class="col-md-2">Type</div>
                                <div class="col-md-4"><?= $type[$user['type']] ?></div>
                            </div>
							<div class="row">
								<div class="col-md-2">Status</div>
								<div class="col-md-4"><?= $status[$user['status']] ?></div>
							</div>
						</div>
                    </div>
                </div>
            </div>
		</div>
        <?php if($user['type'] !=1): ?>
		<div class="row">
			<div class="col-lg-12">
                <div class="wrapper wrapper-content animated fadeInUp" style="padding-bottom: 5px;">

                    <div class="ibox" style="margin-bottom:20px;">
                        <div class="ibox-title">
                            <h5>Data Profile</h5>
                        </div>
						<div class="ibox-content">
							<div class="row">
								<div class="col-md-2">Nama Lengkap</div>
                                <?php if($user['type']==2): ?>
								    <div class="col-md-4"><?= $profile['nama_petugas'] ?></div>
                                <?php else: ?>
                                    <div class="col-md-4"><?= $profile['nama'] ?></div>
                                <?php endif; ?>
							</div>
							<div class="row">
								<div class="col-md-2">No Hp</div>
                                <div class="col-md-4"><?= $profile['telepon'] ?></div>
							</div>
							<div class="row">
								<div class="col-md-2">Area</div>
                                <div class="col-md-4"><?= $profile['area'] ?></div>
							</div>
						</div>
                    </div>
                </div>
            </div>
      </div>
    <?php endif; ?>
<?php include_once('layouts/footer.php'); ?>