<?php
include "config.php";
if(isset($_POST['login'])){
	$username = $_POST['username'];
	$password = md5($_POST['password']);
	$hsl = mysqli_query($mysqli,"select * from users where username='$username' and password='$password' and status=10");
	$data = mysqli_fetch_array($hsl);
	
	$username = $data['username'];
	$password = $data['password'];
	$type = $data['type'];
	$email = $data['email'];
	if($username==$username && $password=$password){
		
		$_SESSION['email'] = $email;
		$_SESSION['type'] = $type;
		if($type=='1'){
			echo "<script>location.assign('admin')</script>";
		}elseif($type=='2'){
			echo "<script>location.assign('index.php')</script>";
		}else{
			echo "<script>location.assign('konsumen')</script>";
		}
	}else{
		echo "Login Gagal, anda akan diredirect ke halaman awal!";
		echo '<META http-equiv="refresh" content="2;URL=login1.php"> ';
	}
}
?>
