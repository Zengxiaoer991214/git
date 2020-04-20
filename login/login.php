<?php
 	
    $con = mysqli_connect("localhost","root","12345678","db_web");
    if(!$con){
        echo "die";
    }
    $name = $_POST['name'];//post获得用户名表单值
    $passowrd = $_POST['password'];//post获得用户密码单值
	echo $name.$passowrd;
    if ($name && $passowrd){//如果用户名和密码都不为空
    	$sql = "select * from user where (username = '$name') and (password='$passowrd')";//检测数据库是否有对应的username和password的sql
    $result = mysqli_query($con,$sql);//执行sql
    $rows=mysqli_num_rows($result);//返回一个数值
    $row = mysqli_fetch_array($result);
	$_SESSION['id'] = $row['id'];
	$_SESSION['nickname'] =$row['nickname'];
	//echo $_SESSION['id'];
	//echo $_SESSION['a'];
		//print_r($rows);
             if($rows){//0 false 1 true
				 	 
				 //echo $_SESSION['id'];
				 echo "
				 <script>
				 setTimeout(function(){window.location.href='../index.php';},1000);
				 </script>";				 
				 
				 
			 }
		else
		{ 
			echo"<script>history.go(-1);</script>";
			$_POST['warning']=1;
		}
		
	}
	?>