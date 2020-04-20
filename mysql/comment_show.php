<?php 
	function comment(){
		$u_id = $_SESSION['id'];
	 	$a_id = $_GET['a_id'];
		$conn = mysqli_connect("localhost","root","12345678","db_web");
		$result_comments = mysqli_query($conn,"select * from comment where a_id = $a_id order by c_date desc");
		return $result_comments;
	}
	
	





?>