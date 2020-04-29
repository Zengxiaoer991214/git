<?php
	$conn = mysqli_connect("localhost","root","12345678","db_web") or die(mysql_error());
	mysqli_query($conn,'set names utf8');
	function show($conn){
		//mysqli_query($conn,"SELECT * FROM article WHERE 1");
		$result=mysqli_query($conn,"SELECT article.a_id,article.a_date,article.a_title,article.a_abstract,article.a_headimg,
		user.nickname FROM article,user where article.u_id = user.id order by a_date desc");
		if (!$result) {
    		printf("Error: %s\n", mysqli_error($conn));
    		exit();
			}
		return $result;
	}
	function show2($conn,$sort){
		//echo "1111".$sort;
		$result=mysqli_query($conn,"SELECT article.a_id,article.a_date,article.a_title,article.a_abstract,article.a_headimg,
		user.nickname FROM article,user where article.u_id = user.id order by $sort desc");
		if (!$result) {
    		printf("Error: %s\n", mysqli_error($conn));
    		exit();
			}
		return $result;
		
	}
	function all_article($conn,$a_id){
		$result = mysqli_query($conn,"SELECT * FROM article where a_id=$a_id");
		mysqli_query($conn,"update article set a_view = a_view + 1 where a_id =$a_id");
		mysqli_query($conn,"update user set view_count = view_count + 1 where id = select u_id from article where a_id = $a_id");
		 $id = $_SESSION['id'];
		if (!$result) {
    		printf("Error: %s\n", mysqli_error($conn));
    		exit();
			}
		$row = mysqli_fetch_array($result);
		$result2 = mysqli_query($conn,"SELECT * FROM comment where a_id = $a_id");
		$result3 = mysqli_query($conn,"SELECT count(*) as count FROM user_collect where a_id = $a_id and u_id = $id");
		$row2[0] = $row;
		$row2[1] = $result2;
		$row2[2] =  mysqli_fetch_array($result3);
		
		return $row2;
		
	}

	function user_message(){
		$id = $_SESSION['id'];
		$conn = mysqli_connect("localhost","root","12345678","db_web");
		$result = mysqli_query($conn,"select * from user where id = $id");
		$row = mysqli_fetch_array($result);
		return $row;
		
	}
	function users_article(){
		$id = $_SESSION['id'];
		$conn = mysqli_connect("localhost","root","12345678","db_web");
		$sql = "select * from article where u_id = $id";
		return mysqli_query($conn,$sql);
	}
	function action($u_id){
		
		$id = $_SESSION['id'];
		//echo $u_id."////".$id;
		$conn = mysqli_connect("localhost","root","12345678","db_web");
		$res = mysqli_query($conn,"select * from user_friend where u_id = '$id' and other_id = '$u_id'");
		//echo mysqli_num_rows($res);
		return mysqli_num_rows($res);
		
	}

?>
	
