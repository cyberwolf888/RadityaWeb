<?php
include_once ("../config.php");

$id_petugas = $_POST['id_petugas'];
$id_kredit = $_POST['id_kredit'];
$total_bayar = $_POST['total_bayar'];
$bunga = $_POST['bunga'];
$denda = $_POST['denda'];
$angsuran_ke = $_POST['angsuran_ke'];

$kredit = $mysqli->query("SELECT * FROM kredit WHERE id = '$id_kredit'")->fetch_assoc();

$id_cust = $kredit['id_cust'];
$tgl_angsuran = date('Y-m-d');
$sisa_kredit = $kredit['sisa']-$total_bayar;
$telah_bayar = $kredit['telah_bayar']+$total_bayar;

$query = $mysqli->query("INSERT INTO angsuran(id_kredit,id_cust,id_petugas,bayar,angsuran_ke,bunga,sisa_kredit,denda,tgl_angsuran) VALUES( '$id_kredit', '$id_cust', '$id_petugas', '$total_bayar','$angsuran_ke', '$bunga','$sisa_kredit', '$denda','$tgl_angsuran' )");

if($query) {
    if ($sisa_kredit <= 0) {
        $mysqli->query("UPDATE kredit SET sisa=$sisa_kredit, telah_bayar=$telah_bayar, status='2' WHERE id=$id_kredit");
    } else {
        $mysqli->query("UPDATE kredit SET sisa=$sisa_kredit, telah_bayar=$telah_bayar WHERE id=$id_kredit");
    }
    echo json_encode(array("status"=>"1"));
}else{
    echo json_encode(array("status"=>"0","error"=>mysqli_error($mysql)));
}
