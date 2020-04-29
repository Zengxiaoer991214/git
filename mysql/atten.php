<?php
	$type = $_GET['type'];
	//echo $type;
	$u_id = $_SESSION['id'];
	$other_id = $_GET['o_id'];
	if($type=="add"){
		$conn = mysqli_connect("localhost","root","12345678","db_web");
		$result = mysqli_query($conn,"insert user_friend (u_id,other_id) values ('$u_id','$other_id')");
		if($result){
			echo "addyes";
		}
		else{
			echo "adderror";
		}

	}
	else{
		$conn = mysqli_connect("localhost","root","12345678","db_web");
		$result = mysqli_query($conn,"delete from user_friend where u_id='$u_id' and other_id='$other_id' ");
		if($result){
			echo "delyes";
		}
		else{
			echo "delerror";
		}

	}
	
?>