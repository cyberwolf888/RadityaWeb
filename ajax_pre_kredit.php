<?php
include "config.php";

$id_kredit = $_POST['id_kredit'];

$kredit = $mysqli->query("SELECT * FROM kredit WHERE id=$id_kredit");
$kredit = $kredit->fetch_assoc();

$angsuran = $mysqli->query("SELECT * FROM angsuran WHERE id_kredit=$id_kredit");
$angsuran_ke = $angsuran->num_rows + 1;

$tgl_kredit = date('d',strtotime($kredit['tgl_kredit']));
$tgl_angsuran = date('d');
$bunga = $kredit['bunga'];
$sisa = $kredit['sisa'];
$total_bunga = round($sisa*($bunga/100));
$denda = 0;

if($tgl_angsuran > $tgl_kredit){
	$denda = $sisa*(3/100);
}

$bayar = round(($kredit['harga']/$kredit['lama_cicilan']) + $total_bunga + $denda);

$return = ['bunga'=>$total_bunga, 'denda'=>$denda, 'angsuran_ke'=>$angsuran_ke, 'bayar'=>$bayar, 'sisa'=>$sisa, 'telah_bayar'=>$kredit['telah_bayar']];

echo json_encode($return);