<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>无标题文档</title>
</head>
<?php
    if (!session_id()) 
				session_start();
    $_SESSION=array();
    session_destroy();
    header("refresh:0.1;url='../index.php'") ;
    ?>
<body>
</body>
</html>