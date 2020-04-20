<?php
	$c_id = $_GET['c_id'];
	$conn = mysqli_connect("localhost","root","12345678","db_web");
	$sql = "delete from comment where c_id = $c_id";
	mysqli_query($conn,$sql);
?>