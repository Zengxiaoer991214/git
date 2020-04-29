<?php 
	session_start();
	$id=$_SESSION['id'];
	$say=$_POST['say'];
	$conn=mysqli_connect("localhost","root","12345678","db_blog");
	mysqli_query($conn,"set names utf8");
	 
	mysqli_query($conn,"update user2 set say='$say' where id=$id ");
	header("Location:http://39.97.127.220/user/user_message.php");
 	$_SESSION['say_change']=1;
?>