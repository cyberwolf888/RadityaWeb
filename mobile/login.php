<?php
header('Content-Type: application/json');
include "../config.php";

$username = $_POST['username'];
$password = md5($_POST['password']);

$hsl = mysqli_query($mysqli,"select * from users where username='$username' and password='$password'");
$data = mysqli_fetch_array($hsl);

if($username==$data['username'] && $password=$data['password']){
$return = ['status'=>1,'username'=>$data['username'],'password'=>$data['password'],'id'=>$data['id']];
}else{
$return = ['status'=>0,'username'=>'','password'=>'','id'=>0];
}

echo str_replace("\"", "'", json_encode($return));
