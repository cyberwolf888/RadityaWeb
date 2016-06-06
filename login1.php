<?php 
include('config.php');

if(isset($_SESSION['type'])){
	if($_SESSION['type']=='1'){
			echo "<script>location.assign('admin')</script>";
		}elseif($_SESSION['type']=='2'){
			echo "<script>location.assign('index.php')</script>";
		}else{
			echo "<script>location.assign('konsumen')</script>";
		}
}
?>
<!DOCTYPE html>
<html>



<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

</head>

<body class="gray-bg">

    <div class="middle-box text-center loginscreen animated fadeInDown">
        <div>
            
            <h2>Selamat Datang</h2>
			
            
            <p>Silahkan Login...</p>
        <form  action="login.php" name="frmLogin" role="form" class="login-form" id="frmLogin" method="post">
			                    	<div class="form-group">
			                    		<label class="sr-only" for="form-username">Username</label>
			                        	<input type="text" name="username" placeholder="Username..." id="username" class="form-username form-control" id="form-username">
			                        </div>
			                        <div class="form-group">
			                        	<label class="sr-only" for="form-password">Password</label>
			                        	<input type="password" name="password" placeholder="Password..." id="password" class="form-password form-control" id="form-password">
			                        </div>
			                        <button type="submit" name="login" class="btn btn-info dim block full-width m-b">Log In</button>
									
			                    </form>
            <p class="m-t"> <small>Sistem Penagihan Kredit Raditya Holding &copy; 2016</small> </p>
        </div>
    </div>

    <!-- Mainly scripts -->
    <script src="js/jquery-2.1.1.js"></script>
    <script src="js/bootstrap.min.js"></script>




</html>
