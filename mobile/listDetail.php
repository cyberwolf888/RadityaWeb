<?php
include_once ("../config.php");

$kredit = $mysqli->query("SELECT k.*, a.nama, a.telepon, a.alamat, b.nama_barang FROM kredit AS k JOIN anggota AS a ON a.id_anggota = k.id_cust JOIN barang AS b ON b.id = k.id_barang");
$list_kredit = array();

if($kredit->num_rows>0){
    while($row = $kredit->fetch_assoc()){
        array_push($list_kredit,$row);
    }
    echo json_encode(array("status"=>"1","list_detail"=>$list_kredit));
}else{
    echo json_encode(array("status"=>"0"));
}
