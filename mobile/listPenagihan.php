<?php
include_once ("../config.php");

$id_petugas = "2";
$list_tagihan = array();
$return = array();
$petugas = $mysqli->query("SELECT * FROM petugas WHERE id='$id_petugas'")->fetch_assoc();
$customer = $mysqli->query("SELECT * FROM anggota WHERE area='".$petugas['area']."'");

$id_customer = "(";
while($row = $customer->fetch_assoc()){
    $id_customer.="k.id_cust = '".$row['id_anggota']."' OR ";
}
$id_customer = substr($id_customer,0,-4).")";

$kredit = $mysqli->query("SELECT k.*,a.nama FROM kredit AS k JOIN anggota AS a ON a.id_anggota = k.id_cust WHERE $id_customer");
while($row = $kredit->fetch_assoc()){
    $id_kredit = $row['id'];
    $month = date("m");
    $year = date("Y");
    $angsuran = $mysqli->query("SELECT * FROM angsuran WHERE id_kredit = '$id_kredit' AND month(tgl_angsuran) = '$month' AND year(tgl_angsuran) = '$year'")->fetch_assoc();
    if($angsuran == null){
        array_push($list_tagihan,$id_kredit);
    }
}

if(count($list_tagihan)>0){
    $no = 0;
    foreach ($list_tagihan as $id){
        $kredit = $mysqli->query("SELECT * FROM kredit WHERE id = '$id'")->fetch_assoc();
        $return['list_tagihan'][$no] = $kredit;
        $no++;
    }
    $return['status'] = 1;
}else{
    $return['status'] = 0;
}
echo json_encode($return);
