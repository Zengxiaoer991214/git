<!DOCTYPE html>
<html lang="zh">
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="//code.z01.com/v4/dist/css/zico.min.css">
	<title>Document</title>	
	<style>
		html::-webkit-scrollbar {
        	display:none
		}
		article{
			font-size: 12px;
		}
		a:focus{
			text-decoration: none
		}
	</style>
</head>
<body>
	<div class="container">
		<div class="row" >
			<?php  require 'menu/head.php';
				   require('mysql/mysql_conn.php');
			?>
		</div>
		<div class="row">
 
		<div class="col">
			<div class="row">
				<div class="card-columns">
			<?php
				if(isset($_GET['sort'])){
					$result = show2($conn,$_GET['sort']);
				}
				else{
				$result = show($conn);
					}
				 while($row = mysqli_fetch_array($result))
				{
				?>
				 
				
					
  				<div class="card">
   				<img class="card-img-top p-2" onClick="location.href='article_show.php?a_id=<?php echo $row['a_id'];?>'" src="<?php echo $row['a_headimg'];?>" alt="Card image cap">
    			<div class="card-body">
      			<h4 class="card-title"><a  class="text-reset" href="article_show.php?a_id=<?php echo $row['a_id'];?>"><?php echo $row['a_title'];?></a></h4>
      			<p class="card-text"><?php echo $row['a_abstract'];?></p>
    			</div>
					<footer class="blockquote-footer">
 				       <small class="text-muted">
 				         <span class="h5"> <?php echo $row['nickname'];?></span><p class="text-right">------<?php echo $row['a_date'];?></p>
 				       </small>
 				     </footer>
  				</div>
					
<!--
 				 <div class="card p-0">
 				   <blockquote class="blockquote mb-0 card-body">
 				     <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
 				     <footer class="blockquote-footer">
 				       <small class="text-muted">
 				         Someone famous in <cite title="Source Title">Source Title</cite>
 				       </small>
 				     </footer>
 				   </blockquote>
 				 </div>
					<div class="card p-2">
 				   <blockquote class="blockquote mb-0 card-body">
 				     <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
 				     <footer class="blockquote-footer">
 				       <small class="text-muted">
 				         Someone famous in <cite title="Source Title">Source Title</cite>
 				       </small>
 				     </footer>
 				   </blockquote>
 				 </div>
  <div class="card">
    <img class="card-img-top" src="img/W@O1_XT([X[B0Y6]K3$U}GX.png" alt="Card image cap">
    <div class="card-body">
      <h5 class="card-title">Card title</h5>
      <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
      <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
    </div>
  </div>
  <div class="card bg-primary text-white text-center p-3">
    <blockquote class="blockquote mb-0">
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat.</p>
      <footer class="blockquote-footer">
        <small>
          Someone famous in <cite title="Source Title">Source Title</cite>
        </small>
      </footer>
    </blockquote>
  </div>
  <div class="card text-center">
    <div class="card-body">
      <h5 class="card-title">Card title</h5>
      <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
      <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
    </div>
  </div>
  <div class="card">
    <img class="card-img" src="img/663896912b38a6e33b6e6fcc74ccbf8d.jpg" alt="Card image">
  </div>
  <div class="card">
    <div class="card-body">
      <h5 class="card-title">Card title</h5>
      <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.</p>
      <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
    </div>
  </div>
-->

				<?php } ?>
				</div>
			</div>

			</div>
			
			 <?php 
			require('menu/rightmenu.php');
			?>	
			
								
		</div>
		</div>
		<footer class="py-4 border-top bg-white">
    <div class="container d-flex flex-md-row flex-column justify-content-between align-items-center px-lg-2">
        <div>
            <span class="text-muted">    蜀ICP备19036844号-1 @旧恋</span>
        </div>
    </div>
</footer>
		<div id="backTop" class="back-top bg-danger">
        <span><i class="fas fa-caret-up"></i><eqq/qspan>
    </div>
	
<script src="js/jquery-3.4.1.js"></script>
<script src="https://unpkg.com/@popperjs/core@2/dist/umd/popper.js"></script>	
<script src="js/bootstrap.js"></script>
<script src="js/hullabaloo.js"></script>
</body>
</html>