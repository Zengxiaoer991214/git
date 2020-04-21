<?php
    $article = $_POST['article'];
    $title = $_POST['title'];
    $text = $_POST['html'];
    $conn =mysqli_connect("localhost","root","12345678","db_web");
    $u_id = $_SESSION['id'];
    $nickname = $_SESSION['nickname'];
    $date = date("Y/m/d H:i:s");
    $a_head = substr($text,30);
    $a_headimg = '';
    $sql = "insert into article 
            (u_id,a_author,a_title,a_abstract,a_date,a_content) 
            values ($u_id,'$nickname','$title','$article','$date','$a_head')";
    $result = mysqli_query($conn,$sql);
    if ($result){
        echo "yes";
    }
    else{
        echo "no";
    }

?>
