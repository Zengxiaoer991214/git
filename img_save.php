<?php 
	//var_dump($_FILES);
	$temp = current($_FILES);
	$dir = "img/".date("Y-m-d");
	//echo $dir;
	if (!file_exists($dir)){
    mkdir ($dir,0777,true);
	}
	$str_img_path = $dir."/".$temp['name'];
	move_uploaded_file($temp['tmp_name'], $str_img_path);	
	//echo $str_img_path;
	echo json_encode(array('location'=>$str_img_path));





?>