<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>无标题文档</title>
</head>

<body>
	<?php
    //session_start();
    $conn = mysqli_connect("localhost","root","12345678","db_web");
    if(!$conn){
        echo "die";
    }
    mysqli_query($conn , "set names utf8");
    $name=$_POST['name2'];
    $password=$_POST['password2'];
    $time=date("Y/m/d H:i:s");
    $sql = "INSERT INTO user ".
        "(username,password,resign_time) ".
        "VALUES ".
        "('$name','$password','$time')";
    $retval = mysqli_query( $conn, $sql );
    if(! $retval )
        {
        die('注册失败: ' . mysqli_error($conn));
        }
    else{
        echo "
            <script> alert('注册成功！'); </script>";
         header("refresh:0.1;url='../index.php'") ;
    }
        
        mysqli_close($conn);

    ?>
</body>
</html>