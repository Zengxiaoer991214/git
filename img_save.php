<?php 
	//var_dump($_FILES);
	$temp = current($_FILES);
	$str_img_path = "img"."/".$temp['name'];
	move_uploaded_file($temp['tmp_name'], $str_img_path);	
	//echo $str_img_path;
	echo json_encode(array('location'=>$str_img_path));
?>