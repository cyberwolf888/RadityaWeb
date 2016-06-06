<?php 

	if($_SERVER['REQUEST_METHOD']=='GET'){
		
		$id  = $_GET['id'];
		
		require_once('dbConnect.php');
		
		
		$sql = "SELECT * FROM petugas WHERE id='".$id."'";
		
		$r = mysqli_query($con,$sql);
		
		$res = mysqli_fetch_array($r);
		
		$result = array();
		
		array_push($result,array(
			"id"=>$res['id_petugas'],
			"nama"=>$res['nama_petugas'],
			"tlp"=>$res['telepon'],
			"status"=>$res['status']
			)
		);
		
		echo json_encode(array("result"=>$result));
		
		mysqli_close($con);
		
	}
	?>
	