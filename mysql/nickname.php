<?php 
	$id = $_SESSION['id'];
	$mess = $_POST['mess'];
 
	$type = $_GET['type'];
 	//print_r($_POST);
	if ($type == "nickname"){
		$conn = mysqli_connect("localhost","root","12345678","db_web");
    	$sql = "update user set nickname = '$mess' where id = $id";
		$result = mysqli_query($conn,$sql);
		//echo $sql;
		if ($result){
			echo $mess;
		}
		else{
			echo "error";
		}
		
	}
	if ($type == "textarea"){
		$conn = mysqli_connect("localhost","root","12345678","db_web");
    	$sql = "update user set say = '$mess' where id = $id";
		$result = mysqli_query($conn,$sql);
		//echo $sql;
		if ($result){
			echo $mess;
		}
		else{
			echo "error";
		}
		
	}
	if ($type == "realname"){
		$conn = mysqli_connect("localhost","root","12345678","db_web");
    	$sql = "update user set realname = '$mess' where id = $id";
		//echo $sql;
		$result = mysqli_query($conn,$sql);
		//echo $sql;
		if ($result){
			echo $mess;
		}
		else{
			echo "error";
		}
		
	}
	

?>