<?php 
	require('../模板.php');
	$context = $_POST['content_form'];
	$a_id = $_GET['a_id'];
	$date = date('Y/m/d H:i:s');
	//echo $date;
	$conn = mysqli_connect("localhost","root","12345678","db_web") or die(mysqli_error());
	$result = mysqli_query($conn,"INSERT INTO comment(a_id, c_date, c_author, c_context) VALUES ($a_id,'$date','test','$context')");
	echo "
	<div class='row'>
	<div class='d-flex justify-content-center'>
  	<div class='spinner-border' role='status'  style='width: 10rem; height: 10rem;'>
    </div>
  	</div>
	<br>
	<br>
	<br>
	<div class='row'>
	<h1>Loading...</h1>
	</div>
  	</div>";	



	if($result){
		echo"<script>window.location.href='../article_show.php?a_id=".$a_id."';</script>";
	}
else{
	echo "error".mysqli_error();
}
?>