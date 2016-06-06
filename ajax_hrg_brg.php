<?php
include "config.php";

$id_brg = $_POST['id_brg'];
$barang = $mysqli->query("SELECT * FROM barang WHERE id=$id_brg");
$row = $barang->fetch_assoc();
$harga = $row['harga'];

echo $harga;