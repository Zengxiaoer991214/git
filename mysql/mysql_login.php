<?php
	function login_check(){
		//session_start();
		$conn = mysqli_connect("localhost","root","12345678","db_web") or die(mysql_error());
		mysqli_query($conn,"set names utf8");
		if(isset($_SESSION['id'])){
			
		}
		else{
			$_SESSION['id'] = 0;
			//$id = $_SESSION['id'];
		}
		$id = $_SESSION['id'];	
		$result = mysqli_query($conn,"select * from user where id = $id");
		$row = mysqli_fetch_array($result);
		return $row; 
	}

	function login_check2($u_id){
		$conn = mysqli_connect("localhost","root","12345678","db_web") or die(mysql_error());
		mysqli_query($conn,"set names utf8");
		$result = mysqli_query($conn,"select * from user where id = $u_id");
		$row = mysqli_fetch_array($result);
		return $row; 
	}
	function hot_article($u_id){
		$conn = mysqli_connect("localhost","root","12345678","db_web") or die(mysql_error());
		mysqli_query($conn,"set names utf8");
		$result = mysqli_query($conn,"select a_title,a_id from article where u_id = $u_id");
		
		return $result;
	}




?>