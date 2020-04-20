<?php
	$conn = mysqli_connect("localhost","root","12345678","db_web") or die(mysql_error());
	mysqli_query($conn,'set names utf8');

	function show($conn){
		//mysqli_query($conn,"SELECT * FROM article WHERE 1");
		$result=mysqli_query($conn,"SELECT * FROM article ORDER BY a_id DESC");
		if (!$result) {
    		printf("Error: %s\n", mysqli_error($conn));
    		exit();
			}
		return $result;
	}
	function show2($conn,$sort){
		//echo "1111".$sort;
		$result=mysqli_query($conn,"SELECT * FROM article ORDER BY $sort DESC");
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
		$result_about0 = mysqli_query($conn,"select *  from article where a_id = $a_id-1");
		$result_about1 = mysqli_query($conn,"select *  from article where a_id = $a_id+1");
		if ($result_about0){
			$row_about0 = mysqli_fetch_array($result_about0);
		}
		else{
			$row_about0['a_title'] = "没有了";
		}
		if ($result_about1){
			$row_about1 = mysqli_fetch_array($result_about1);
		}
		else{
			$row_about1['a_title'] = "没有了";
		}
		
		if (!$result) {
    		printf("Error: %s\n", mysqli_error($conn));
    		exit();
			}
		$row = mysqli_fetch_array($result);
		$result2 = mysqli_query($conn,"SELECT * FROM comment where a_id = $a_id");
		$row2[0] = $row;
		$row2[1] = $result2;
		$row2[2] = $row_about0;
		$row2[3] = $row_about1;
		return $row2;
		
	}
?>
	
