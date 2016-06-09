<?php
include_once ("../config.php");

$id_kredit = $_POST['id_kredit'];
//$id_kredit = 1;
$list_angsuran = array();
$angsuran = $mysqli->query("SELECT tgl_angsuran,bayar FROM angsuran WHERE id_kredit = '$id_kredit'");

if($angsuran->num_rows>0){
    while ($row = $angsuran->fetch_assoc()){
        $row['tgl_angsuran'] = Date("d/m/Y",strtotime($row['tgl_angsuran']));
        array_push($list_angsuran,$row);
    }
    echo json_encode(array("status"=>"1","list_angsuran"=>$list_angsuran));
}else{
    echo json_encode(array("status"=>"0"));
}

