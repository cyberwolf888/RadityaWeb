<?php
include_once ("../config.php");

$id_petugas = $_POST['id_petugas'];
$list_tagihan = array();
$return = array();
$petugas = $mysqli->query("SELECT * FROM petugas WHERE id='$id_petugas'")->fetch_assoc();
$customer = $mysqli->query("SELECT * FROM anggota WHERE area='".$petugas['area']."'");

$return['status'] = 0;

if($customer->num_rows>0){
    $id_customer = "(";
    while($row = $customer->fetch_assoc()){
        $id_customer.="id_cust = '".$row['id_anggota']."' OR ";
    }

    $id_customer = substr($id_customer,0,-4).")";

    $kredit = $mysqli->query("SELECT * FROM kredit WHERE $id_customer AND status = '1'");

    if($kredit->num_rows>0){
        while($row = $kredit->fetch_assoc()){
            $id_kredit = $row['id'];
            $month = date("m");
            $year = date("Y");
            $angsuran = $mysqli->query("SELECT * FROM angsuran WHERE id_kredit = '$id_kredit' AND month(tgl_angsuran) = '$month' AND year(tgl_angsuran) = '$year'")->fetch_assoc();
            if($angsuran == null){
                array_push($list_tagihan,$id_kredit);
            }
        }
    }
    if(count($list_tagihan)>0){
        $no = 0;
        foreach ($list_tagihan as $id){
            $kredit = $mysqli->query("SELECT k.*, a.nama, a.alamat, a.telepon, b.nama_barang FROM kredit AS k JOIN anggota AS a ON a.id_anggota = k.id_cust JOIN barang AS b ON b.id = k.id_barang WHERE k.id = '$id'")->fetch_assoc();
            $id_kredit = $kredit['id'];
            $angsuran = $mysqli->query("SELECT * FROM angsuran WHERE id_kredit='$id_kredit'");
            $angsuran_ke = $angsuran->num_rows + 1;
            $tgl_kredit = date('d',strtotime($kredit['tgl_kredit']));
            $tgl_angsuran = date('d');
            $bunga = $kredit['bunga'];
            $sisa = $kredit['sisa'];
            $total_bunga = round($sisa*($bunga/100));
            $denda = 0;

            if($tgl_angsuran > $tgl_kredit){
                $denda = $sisa*(2/100);
            }

            $bayar = round(($kredit['harga']/$kredit['lama_cicilan']) + $total_bunga + $denda);

            $return['list_tagihan'][$no] = $kredit;
            $return['list_tagihan'][$no]['bunga'] = $total_bunga;
            $return['list_tagihan'][$no]['denda'] = $denda;
            $return['list_tagihan'][$no]['angsuran_ke'] = $angsuran_ke;
            $return['list_tagihan'][$no]['total_bayar'] = $bayar;

            $no++;
        }
        $return['status'] = 1;
    }
}

echo json_encode($return);
