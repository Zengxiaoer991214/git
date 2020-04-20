<?php 
function head_img(){
	$conn = mysqli_connect("localhost","root","12345678","db_web");
	$result_head = mysqli_query($conn,"select * from user where 1");
	$row_head = array();
	while($row_heads = mysqli_fetch_array($result_head)){
		$row_head[$row_heads['id']] = $row_heads['head_photo'];
	}
	return $row_head;
	}
?>