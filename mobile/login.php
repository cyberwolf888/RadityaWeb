<?php
header('Content-Type: application/json');
include "../config.php";

$username = $_POST['username'];
$password = md5($_POST['password']);

$hsl = mysqli_query($mysqli,"select * from users where username='$username' and password='$password' and type = '2'");
$data = mysqli_fetch_array($hsl);
$id_user = $data['id'];
$profile = mysqli_fetch_array(mysqli_query($mysqli,"SELECT * FROM petugas WHERE id_user = '$id_user'"));
if($username==$data['username'] && $password==$data['password']){
    $return = ['status'=>1,'username'=>$data['username'],'password'=>$data['password'],'id'=>$profile['id']];
}else{
    $return = ['status'=>0,'username'=>'','password'=>'','id'=>0];
}

echo str_replace("\"", "'", json_encode($return));
