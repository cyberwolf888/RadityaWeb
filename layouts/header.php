<?php
include 'config.php';

if(!isset($_SESSION['type']) || $_SESSION['type']!=2){
    echo "<script>window.location=('login1.php')</script>";
}
$query = $mysqli->query("select * from users where email = '".$_SESSION['email']."'");
$user = $query->fetch_assoc();
$query = $mysqli->query("select * from petugas where id_user = '".$user['id']."'");
$petugas = $query->fetch_assoc();
$status = ['10'=>'<span style="color: green;">Active</span>','11'=>'<span style="color: red;">Suspend</span>'];
$url = $_SERVER['REQUEST_URI'];
$explode = explode('/',$url);
$count = count($explode);
$page = explode('.',$explode[$count-1]);
$page = $page[0];
?>
<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Sistem Penagihan Kredit</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">

    <!-- Toastr style -->
    <link href="css/plugins/toastr/toastr.min.css" rel="stylesheet">

    <!-- Gritter -->
    <link href="js/plugins/gritter/jquery.gritter.css" rel="stylesheet">

    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

</head>
<body>
<div id="wrapper">
    <nav class="navbar-default navbar-static-side" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav metismenu" id="side-menu">
                <li class="nav-header">
                    <div class="dropdown profile-element"> <span>
                            <img alt="image" class="img-circle" src="image/LOGO2.png" />
                             </span>


                    </div>
                    <div class="logo-element">
                        RH
                    </div>
                </li>
                <li <?= $page =='' || $page == 'index' ? 'class="active"':'' ?>>
                    <a href="index.php"><i class="fa fa-windows"></i> <span class="nav-label">Beranda</span> </a>
                </li>
                <li <?= $page =='pengajuan1' || $page == 'tambah_pengajuan' || $page == 'edit_pengajuan' ? 'class="active"':'' ?>>
                    <a href="pengajuan1.php"><i class="fa fa-laptop"></i> <span class="nav-label">Kredit</span> </a>
                </li>
                <li <?= $page =='pembayaran' || $page == 'tambah_tagihan' ? 'class="active"':'' ?>>
                    <a href="pembayaran.php"><i class="fa fa-laptop"></i> <span class="nav-label">Angsuran</span> </a>
                </li>
                <li <?= $page =='dtkonsumen' || $page == 'tambah_konsumen' || $page == 'edit_konsumen' ? 'class="active"':'' ?>>
                    <a href="dtkonsumen.php"><i class="fa fa-laptop"></i> <span class="nav-label">Data Konsumen</span></a>
                </li>
                <li <?= $page =='dtbarang' || $page == 'tambah_databarang' || $page == 'editdt_barang' ? 'class="active"':'' ?>>
                    <a href="dtbarang.php"><i class="fa fa-laptop"></i> <span class="nav-label">Data Barang</span></a>
                </li>
            </ul>

        </div>
    </nav>

    <div id="page-wrapper" class="gray-bg dashbard-1">
        <div class="row border-bottom">
            <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
                <div class="navbar-header">
                    <a class="navbar-minimalize minimalize-styl-2 btn btn-info " href="#"><i class="fa fa-bars"></i> </a>

                </div>
                <ul class="nav navbar-top-links navbar-right">
                    <li>
                        <a href="logout.php">
                            <i class="fa fa-sign-out"></i> Log out
                        </a>
                    </li>
                </ul>

            </nav>
        </div>