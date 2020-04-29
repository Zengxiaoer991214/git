<?php
	$type = $_POST['type'];
	$id = $_SESSION['id'];
	$a_id = $_POST['a_id'];
	$conn = mysqli_connect("localhost","root","12345678","db_web");
	if ($type=="1"){
		$sql = "delete FROM article where a_id = $a_id";
		$result = mysqli_query($conn,$sql);
		if($result){
			echo "yes";
		}
		else{
			echo "error";
		}
	}
	if ($type=="2"){
		$sql = "delete from user_collect where u_id =$id and a_id = $a_id";
		$result = mysqli_query($conn,$sql);
		if($result){
			echo "yes";
		}
		else{
			echo "error";
		}
	}
	if ($type=="3"){
		$sql = "delete from user_friend where u_id =$id and other_id = $a_id";
		$result = mysqli_query($conn,$sql);
		if($result){
			echo "yes";
		}
		else{
			echo "error";
		}
	}








?>

