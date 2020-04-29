<?php 
	//var_dump($_FILES);
    $id = $_SESSION['id'];
	$temp = current($_FILES);
	$dir = "../img/".date("Y-m-d");
	//echo $dir;
	if (!file_exists($dir)){
    mkdir ($dir,0777,true);
	}
	$str_img_path = $dir."/".$temp['name'];
	 	
	move_uploaded_file($temp['tmp_name'], $str_img_path);	
	//echo $str_img_path;
	 
	$conn = mysqli_connect("localhost","root","12345678","db_web");
    $sql = "update user set head_photo = '$str_img_path' where id = $id";
	
	$result = mysqli_query($conn,$sql);
	if ($result){
		echo $str_img_path;
	}
		
		





?>