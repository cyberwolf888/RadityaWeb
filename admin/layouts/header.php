<?php
include '../config.php';
if(!isset($_SESSION['type']) || $_SESSION['type']!=1){
    echo "<script>window.location=('../login1.php')</script>";
}
$query = $mysqli->query("select * from users where email = '".$_SESSION['email']."'");
$user = $query->fetch_assoc();
$status = ['10'=>'<span style="color: green;">Active</span>','11'=>'<span style="color: red;">Suspend</span>'];
$url = $_SERVER['REQUEST_URI'];
$explode = explode('/',$url);
$count = count($explode);
$page = explode('.',$explode[$count-1]);
$page = $page[0];
//echo $page;
?>
<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Sistem Penagihan Kredit</title>

    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../font-awesome/css/font-awesome.css" rel="stylesheet">

    <!-- Toastr style -->
    <link href="../css/plugins/toastr/toastr.min.css" rel="stylesheet">

    <!-- Gritter -->
    <link href="../js/plugins/gritter/jquery.gritter.css" rel="stylesheet">

    <link href="../css/animate.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">

</head>
<body>
<div id="wrapper">
    <nav class="navbar-default navbar-static-side" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav metismenu" id="side-menu">
                <li class="nav-header">
                    <div class="dropdown profile-element">
                        <span>
                            <img alt="image" class="img-circle" src="../image/LOGO2.png" />
                        </span>
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="clear">
                                <span class="block m-t-xs"> <strong class="font-bold"><?= $user['username'] ?></strong></span>

                            </span>
                        </a>
                    </div>
                    <div class="logo-element">
                        RH
                    </div>
                </li>
                <li <?= $page =='' || $page == 'index' ? 'class="active"':'' ?>>
                    <a href="index.php"><i class="fa fa-windows"></i> <span class="nav-label">Beranda</span> </a>
                </li>
                <li <?= $page == 'admin' || $page =='tambahdt_admin' || $page == 'editdt_admin' ? 'class="active"':'' ?>>
                    <a href="admin.php"><i class="fa fa-edit"></i> <span class="nav-label">Data Admin</span> </a>
                </li>
                <li <?= $page == 'petugas' || $page =='tambahdt_petugas' || $page == 'editdt_petugas' ? 'class="active"':'' ?>>
                    <a href="petugas.php"><i class="fa fa-edit"></i> <span class="nav-label">Data Petugas</span> </a>
                </li>
                <li <?= $page == 'customer' || $page =='tambahdt_customer' || $page == 'editdt_customer' ? 'class="active"':'' ?>>
                    <a href="customer.php"><i class="fa fa-edit"></i> <span class="nav-label">Data Konsumen</span> </a>
                </li>
            </ul>
        </div>
    </nav>

    <div id="page-wrapper" class="gray-bg dashbard-1">
        <div class="row border-bottom">
            <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
                <div class="navbar-header">
                    <a class="navbar-minimalize minimalize-styl-2 btn btn-info " href="#"><i class="fa fa-bars"></i> </a>
                    <form role="search" class="navbar-form-custom" action="#">

                    </form>
                </div>
                <ul class="nav navbar-top-links navbar-right">
                    <li>
                        <a href="../logout.php">
                            <i class="fa fa-sign-out"></i> Log out
                        </a>
                    </li>
                </ul>
            </nav>
        </div>