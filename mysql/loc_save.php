<?php
	$id = $_SESSION['id'];
	$address = $_POST['loc'];
	$conn = mysqli_connect("localhost","root","12345678","db_web");
	mysqli_query($conn,'set names utf8');
	$result = mysqli_query($conn,"update user set address = '$address'");
	if($result){
		echo "yes";
	}
	else{
		echo "error";
	}
?>
