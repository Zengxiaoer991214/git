<?php 
	$u_id = $_SESSION['id'];
	$a_id = $_GET['a_id'];
    $comment = $_GET['comment'];
	echo $comment;
	//echo $u_id.$a_id;
	$conn = mysqli_connect("localhost","root","12345678","db_web");
	$time=date("Y/m/d H:i:s");
    $sql = "insert into comment (a_id,u_id,c_date,c_context)values ($a_id,$u_id,'$time','$comment')";
	echo $sql;
	mysqli_query($conn,$sql);
		
?>