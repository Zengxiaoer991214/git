<?php 
	function comment(){
		$u_id = $_SESSION['id'];
	 	$a_id = $_GET['a_id'];
		$conn = mysqli_connect("localhost","root","12345678","db_web");
		$result_comments = mysqli_query($conn,"select comment.c_date,comment.c_context,		comment.a_id,comment.u_id,user.nickname,user.head_photo from comment,user where a_id = $a_id and user.id = comment.u_id order by c_date ");
		return $result_comments;
	}
	
	





?>