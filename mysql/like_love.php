<?php
	
	$u_id = $_SESSION['id'];
	$kind = $_GET['kind'];
	$a_id = $_GET['a_id'];
	$type = $_GET['type'];
 	if($type == 'add'){
		$kinds = "+1";
	}
	else{
		$kinds = "-1";
	}
	$conn = mysqli_connect('localhost','root','12345678','db_web');
			/*  mysql_connect()  */
			
	if (!$conn) {
		die('Could not connect: ' . mysqli_error($conn));
	}

	if($kind=="a_likecount"){
	$sqll="update article set $kind = $kind $kinds WHERE a_id = $a_id";
	//echo $sqll;
	mysqli_query($conn,$sqll);
	$sql="SELECT $kind FROM article WHERE a_id = $a_id";
	// echo $sql;
	 //echo $sqll;
	$result = mysqli_query($conn,$sql);
	$row = mysqli_fetch_array($result);
	echo $row[$kind];
	}	
	if($kind=="a_collect"){
		$date = date("Y/m/d H:i:s");
	if($type == "add"){
		$sqll = "insert into user_collect (u_id,a_id,date) values ($u_id,$a_id,'$date')";
	}
	else{
		$sqll = "delete FROM user_collect where u_id = $u_id and a_id = $a_id";
	}	
		//echo $sqll;
		mysqli_query($conn,$sqll);
		$sqlll ="update article set $kind = $kind $kinds where a_id = $a_id";
		//echo $sqlll;
		mysqli_query($conn,$sqlll);
		$result = mysqli_query($conn,"SELECT $kind FROM article WHERE a_id = $a_id");
		$row = mysqli_fetch_array($result);
		echo $row[$kind];
	}
?>