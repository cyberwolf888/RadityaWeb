<?php include_once ('layouts/header.php'); ?>
<?php
function generateRandomString($length = 6) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyz';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

?>
        <div class="row wrapper border-bottom white-bg page-heading">
			<div class="col-lg-10">
				<h2>Data Konsumen</h2>
				<ol class="breadcrumb">
					<li>
						<a href="index.php">Beranda</a>
					</li>
					<li class="active">
						<strong>Tambah Data Konsumen</strong>
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
							$nm = $_POST['nm'];
                            $email = $_POST['email'];
							$alamt = $_POST['alamt'];
							$tlp = $_POST['tlp'];
                            $area = $_POST['area'];
                            $sts = $_POST['sts'];
                            $typ = '3';
                            $username = generateRandomString();
                            $password = generateRandomString();
                            $hash = md5($password);
							$query = $mysqli->query("INSERT INTO users (username, password, email, type, status) VALUES ('$username', '$hash', '$email', '$typ', '$sts')");
                            $last_id = mysqli_insert_id($mysqli);
							if($query){
                                $mysqli->query("INSERT INTO anggota (id_user,nama,telepon,alamat,area) VALUES ('$last_id','$nm','$tlp','$alamt','$area')");

                                $msg = "Terimaskasih telah menjadi konsumen Raditya Dewata Perkasa\n";
                                $msg.= "Berikut ini adalah username dan password untuk mengkases sistem kami:\n";
                                $msg.= "Username : ".$username."\n";
                                $msg.= "Password : ".$password."\n";
                                $msg.= "Harap data ini disimpan dengan aman!";
                                $msg = wordwrap($msg,70);
                                mail($email, 'New Account', $msg);
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
                                    <label for="nm">Email</label>
                                    <input type="email" class="form-control" id="email"  name="email" placeholder="Alamat email" required>
                                </div>
                                <div class="form-group">
                                    <label for="nm">Nama Konsumen</label>
                                    <input type="text" class="form-control" id="nm"  name="nm" placeholder="Nama lengkap" required>
                                </div>
                                <div class="form-group">
                                    <label for="tlp">No Telepon</label>
                                    <input type="text" class="form-control" id="tlp"  name="tlp" placeholder="No telepon" required>
                                </div>
                                <div class="form-group">
                                    <label for="area">Area</label>
                                    <select name="area" id="area" class="form-control" required>
                                        <option value="Kuta" >Kuta</option>
                                        <option value="Denpasar Utara" >Denpasar Utara</option>
                                        <option value="Denpasar Timur" >Denpasar Timur</option>
                                        <option value="Denpasar Selatan" >Denpasar Selatan</option>
                                        <option value="Buduk" >Buduk</option>
                                        <option value="Mengwi" >Mengwi</option>
                                        <option value="Kapal" >Kapal</option>
                                        <option value="Canggu" >Canggu</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="alamt">Alamat</label>
                                    <input type="text" class="form-control" id="alamt"  name="alamt" placeholder="Alamat" required>
                                </div>
                                <div class="form-group">
                                    <label for="sts">Status</label>
                                    <select name="sts" id="sts" class="form-control" required>
                                        <option value="10" >Active</option>
                                        <option value="11" >Suspend</option>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-primary"  name="submit">Submit</button>
                                <a href="dtkonsumen.php" class="btn btn-primary"><span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span>Back</a>
							</form>   
                            </div>
                      
                    </div>
                </div>
            </div>
		</div>
		</div>
<?php include_once ('layouts/footer.php'); ?>
