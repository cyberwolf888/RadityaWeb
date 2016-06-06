<?php

include 'config.php';
$nim = $_POST['id_cust'];
$nama = $_POST['id_barang'];
$jurusan = $_POST['tgl_kredit'];
$alamat = $_POST['harga'];
$jk = $_POST['uang_muka'];
$input = mysql_query("insert into kredit('$id_cust','$id_barang','$tgl_kredit','$harga','$uang_muka')");
if ($input) {
    header("location:pengajuan1.php");
} else {
    echo "gagal";
}
?>