<?php
	$temp = current($_FILES);
	if(!empty($temp['tmp_name'])){
	$dir = "../img/".date("Y-m-d");
	if (!file_exists($dir)){
    mkdir ($dir,0777,true);
	}
	$str_img_path = $dir."/".$temp['name'];
	move_uploaded_file($temp['tmp_name'], $str_img_path);	
	
	$img_head = "/img/".date("Y-m-d")."/".$temp['name'];
	}
	else{
		$num = mt_rand(1,6);
		
		$img_head = "../img/img_show/".$num.".png";
	}
    $article = $_POST['article'];
    $title = $_POST['title'];
    $text = $_POST['html'];
	$conn =mysqli_connect("localhost","root","12345678","db_web");
	$u_id = $_SESSION['id'];
	$nickname = $_SESSION['nickname'];
	$date = date("Y/m/d H:i:s");
	$a_head = substr($text,0,30);
    $sql = "insert into article 
            (u_id,a_title,a_abstract,a_date,a_content,a_headimg) 
            values ($u_id,'$title','$a_head','$date','$article','$img_head')";
    $result = mysqli_query($conn,$sql);
    if ($result){
        echo "yes";
    }
    else{
        echo "no";
    }

?>
