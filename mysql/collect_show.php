<?php	
	$id = $_SESSION['id'];
	$type = $_GET['type'];
	//echo $type;
	$conn = mysqli_connect("localhost","root","12345678","db_web");
	mysqli_query($conn,'set names utf8');
	if($type=="22"){
					$result = mysqli_query($conn,"select user_collect.a_id,article.a_title,article.a_id,article.a_date,article.a_view,article.a_collect,article.a_comments,article.a_likecount from user_collect,article where user_collect.a_id=article.a_id and user_collect.u_id = '$id'");
				while($row_article=mysqli_fetch_array($result)){
				
				?>
			<div class="row alert alert-secondary w-100 ml-md-2 mr-md-2  ml-2 mr-1" role="alert">
				<div class="col-12 col-md-6 w-100 justify-content-around">
			 
					
	  			<a  class="text-truncate" href="article_show.php?a_id=<?php echo $row_article['a_id'];?>"><?php  
				if (mb_strlen($row_article['a_title'])>18)
		echo mb_substr($row_article['a_title'],0,18)."···";
					else
					echo $row_article['a_title'];	
					
					?> </a>
			 	
				<span class="mr-3 justify-content-end" style="float: right">
       			<i class="iconfont">&#xe66e;</i><?php echo explode(" ",$row_article['a_date'])[0];?>
       			</span>
				 
				</div>
				<div class="col-12 col-md-6" >
					<div class="row">
					<div class="col">
					<svg class="icon" aria-hidden="true">
    					<use xlink:href="#iconliulan"></use>
					</svg>
					<span>
					<?php echo $row_article['a_view'];?>
					</span>
					</div>
						
					<div class="col">
					<svg class="icon" aria-hidden="true">
    					<use xlink:href="#icondianzan"></use>
					</svg>
					<span>
					<?php echo $row_article['a_likecount'];?>
					</span>
					</div>
					<div class="col">
					<svg class="icon" aria-hidden="true">
    					<use xlink:href="#iconshoucang-copy"></use>
					</svg>	
					<span>
					<?php echo $row_article['a_collect'];?>
					</span>
					</div>
						
					<div class="col">
					<svg class="icon" aria-hidden="true">
    					<use xlink:href="#iconpinglun"></use>
					</svg>	
					<span>
					<?php echo $row_article['a_comments'];?>
					</span>
					</div>
					<div class="col-1">
					<svg class="icon" aria-hidden="true" onclick="del2(this)" id="<?php echo 
				substr($row_article['a_id'],0,10);?>" style="">
    					<use xlink:href="#iconshanchu"></use>
					</svg>
						</div>
				 
						</div>
					</div>
						</div>
					</div>
 <?php }}?>
<?php
	if($type=="11"){
		$sql = "select * from article where u_id = $id";
		$result = mysqli_query($conn,$sql);
	while($row_article=mysqli_fetch_array($result)){
				
				?>
			<div class="row alert alert-secondary w-100 ml-md-2 mr-md-2  ml-2 mr-1" role="alert">
				<div class="col-12 col-md-6 w-100 justify-content-around">
			 
					
	  			<a  class="text-truncate" href="article_show.php?a_id=<?php echo $row_article['a_id'];?>"><?php  
				if (mb_strlen($row_article['a_title'])>18)
		echo mb_substr($row_article['a_title'],0,18)."···";
					else
					echo $row_article['a_title'];	
					
					?> </a>
			 	
				<span class="mr-3 justify-content-end" style="float: right">
       			<i class="iconfont">&#xe66e;</i><?php echo explode(" ",$row_article['a_date'])[0];?>
       			</span>
				 
				</div>
				<div class="col-12 col-md-6" >
					<div class="row">
					<div class="col">
					<svg class="icon" aria-hidden="true">
    					<use xlink:href="#iconliulan"></use>
					</svg>
					<span>
					<?php echo $row_article['view_count'];?>
					</span>
					</div>
						
					<div class="col">
					<svg class="icon" aria-hidden="true">
    					<use xlink:href="#icondianzan"></use>
					</svg>
					<span>
					<?php echo $row_article['a_likecount'];?>
					</span>
					</div>
					<div class="col">
					<svg class="icon" aria-hidden="true">
    					<use xlink:href="#iconshoucang-copy"></use>
					</svg>	
					<span>
					<?php echo $row_article['a_collect'];?>
					</span>
					</div>
						
					<div class="col">
					<svg class="icon" aria-hidden="true">
    					<use xlink:href="#iconpinglun"></use>
					</svg>	
					<span>
					<?php echo $row_article['a_comments'];?>
					</span>
					</div>
<!--

					<div class="col-1">
					<svg class="icon" aria-hidden="true" onclick="change(this)"  id="<?php //echo $row_article['a_id'];?>" >
    					<use xlink:href="#iconhuabanfuben"></use>
					</svg>
					</div>
-->
					<div class="col-1">
					<svg class="icon" aria-hidden="true" onclick="del(this)" id="<?php echo 
				substr($row_article['a_id'],0,10);?>" style="">
    					<use xlink:href="#iconshanchu"></use>
					</svg>
						</div>
					</div>
						</div>
					</div>
 <?php }}?>
<?php 
	if($type=="33"){
		
		$sql = " select user.id,user.nickname,user.head_photo,user.article_count,user.view_count,user.like_count,user.say,user.address from user where user.id in (select other_id from user_friend where u_id = $id)";
		$result = mysqli_query($conn,$sql);


		while($row = mysqli_fetch_array($result)){
			
		?>
				<div class="row alert alert-secondary w-100 ml-md-2 mr-md-2  ml-2 mr-1" role="alert">
				<div class="col-12 col-md-6 w-100 justify-content-around">	
				 
	  			<a  class="text-truncate"id="other_id" name="<?php echo $row['id']; ?>"  ><?php  
				if (mb_strlen($row['nickname'])>10)
					echo mb_substr($row['nickname'],0,10)."···";
					else
					echo $row['nickname'];	
					
					?> </a>
			 	<span class="mr-3 justify-content-end" style="float: right">
				<svg class="icon" aria-hidden="true">
    					<use xlink:href="#icondiqu"></use>
					</svg>
					<span>
					<?php echo $row['address'];?>
					</span>
				 	</span>
				</div>
				<div class="col-12 col-md-6" >
					<div class="row">
					<div class="col">
					
       			<svg class="icon" aria-hidden="true">
    					<use xlink:href="#iconshuliangtongji"></use>
					</svg>
					<span>
					<?php echo $row['article_count'];?>
					</span>
       		
						</div>
					<div class="col">
					<svg class="icon" aria-hidden="true">
    					<use xlink:href="#iconliulan"></use>
					</svg>
					<span>
					<?php echo $row['view_count'];?>
					</span>
					</div>
						
					<div class="col">
					<svg class="icon" aria-hidden="true">
    					<use xlink:href="#icondianzan"></use>
					</svg>
					<span>
					<?php echo $row['like_count'];?>
					</span>
					</div>
<!--
					<div class="col">
					<svg class="icon" aria-hidden="true">
    					<use xlink:href="#iconshoucang-copy"></use>
					</svg>	
					<span>
					<?php //echo $row_article['a_collect'];?>
					</span>
					</div>
-->
						
<!--
					<div class="col">
					<svg class="icon" aria-hidden="true">
    					<use xlink:href="#iconpinglun"></use>
					</svg>	
					<span>
					<?php //echo $row_article['a_comments'];?>
					</span>
					</div>
-->
<!--

					<div class="col-1">
					<svg class="icon" aria-hidden="true" onclick="change(this)"  id="<?php //echo $row_article['a_id'];?>" >
    					<use xlink:href="#iconhuabanfuben"></use>
					</svg>
					</div>
-->
					<div class="col-1">
					<svg class="icon" aria-hidden="true" onclick="del3(this)" id="<?php echo 
				substr($row_article['a_id'],0,10);?>" style="">
    					<use xlink:href="#iconshanchu"></use>
					</svg>
						</div>
					</div>
						</div>
					</div>	
	
	
	
<?php	
	}}







?>
