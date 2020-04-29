<!DOCTYPE html>
<html lang="zh">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="//code.z01.com/v4/dist/css/zico.min.css" >	
	<style>
		html::-webkit-scrollbar {
        	display:none
		}
		a{
			color: black;
		}
		 .icon {
       width: 3em; height: 2em;
       vertical-align: -0.3em;
       fill: currentColor;
       overflow: hidden;
		font-size: 2em;
    }
		
		#article img{
			height: auto;
			width: 100%;
		}
	</style>
</head>
<body>
	<div class="container justify-content-center w-100">
		<div class="row">
			<?php  require('menu/head.php');
				require('mysql/mysql_conn.php');
				$row2 = all_article($conn,$_GET['a_id']);
				$row = $row2[0];
				$result = $row2[1];
			?>
			</div>
		<div class="row justify-content-center" id="menu">
			<div class="col m-4">
				<div class="row"> 
					<a onClick="window.location.href ='index.php'" href="#">
						<i class="iconfont text-black-20">&#xe654;</i>返回
					</a>
				</div>
				<div class="row">
					<section class="border-bottom-1 w-100">
						<h2 class="text-left"><?php echo $row['a_title'];?></h2>
						<small class="d-inline-block text-muted mt-2 ml-1">
       				 		<span class="mr-3">
       				    		<i class="iconfont">&#xe65c;</i><?php echo $row['a_author'];?>
       				 		</span>
       				 		<span class="mr-3">
       				    		<i class="iconfont">&#xe66e;</i><?php echo $row['a_date'];?>
       				 		</span>
       				 		<span>
       				    		<i class="iconfont">&#xe739;</i><?php echo $row['a_view'];?>次浏览
       				 		</span>
    					</small>
					</section>
					 <div class="row m-2 border-bottom" id="article">
						<?php 
						 echo $row['a_content'];
						 ?>
					</div>
					<section id="changePost" class="w-100" style="width: 100%">
    	
						 <!--- 点赞---   item.href=""                -->
						<div class="row">
						<div class="col">
						<svg class="icon" aria-hidden="true" onclick="like(this)" id='a_likecount'>
    							<use xlink:href="#icondianzan" id="a_likecount1"></use>
								</svg>
						<span id="a_likecount2" class="h4 text-black-50"><?php echo $row['a_likecount'];?></span>
						 <!--- 收藏---->
 
						 <svg class="icon" aria-hidden="true" onclick="like(this)" id='a_collect' name=<?php if($row2[2]['count']=="1")
							  echo "1";
							  else
							echo "2";
							  ?> >
    							<use xlink:href="<?php if($row2[2]['count']>0)
							  echo "#iconaixin";
							  else
							echo "#iconshoucang-copy";?>" id="a_collect1"></use>
								</svg>
							 
							
							
						<span id="a_collect2" class="h4 text-black-50"><?php echo $row['a_collect'];?></span>
 						
						 <svg class="icon" aria-hidden="true" onclick="comments_show()" id='a_comments'>
    							<use xlink:href="#iconpinglun" id="a_comments1"></use>
								</svg>
						<span id="a_conmemts2" class="h4 text-black-50"><?php echo $row['a_comments'];?>
						</span>
						</div>
							<button type="button" class="btn btn-outline-info justify-content-end" onClick="comments_send()">发送</button>	
							
					 
 					 
 					  <div class="modal-content" >
 					    <textarea id="myTextarea"></textarea>
 					  </div>
						  <?php 
						   	
							$a_id = $_GET['a_id'];
							$str_url = "mysql/comment_show.php";
							include($str_url);
							$result_comments = comment();
							require('mysql/head_img.php');
							$index = 0;
								//$result_head = head_img();
							while($row_comments = mysqli_fetch_array($result_comments)){
								$index++;
							?>
 							<div class="card w-100 m-2">
								<div class="row m-2">
								<div class="col-2" style = "width: 100px">
									<img src="<?php  
													echo $row_comments['head_photo'];
											  
											  
											  ?>" alt="..." class="img-thumbnail">
								</div>
								<div class="col">
								<div class="row">
								<h3><?php echo $row_comments['nickname'];?> <small class="text-black-50"><?php echo $row_comments['c_date'];?> </small></h3>
							 
									<small style="position:absolute;right:10px;top:10px;width: auto;height: auto;background-color: red">#<?php echo $index;?></small>
								 
								</div>
								<div class="row">
  								<p><?php echo  $row_comments['c_context']; ?></p>
								</div>
								<div class="row justify-content-end">
								<?php if($row_comments['u_id']==$_SESSION['id']){
												 $c_id = $row_comments['c_id'];
												echo "<span onClick='comment_del(this)' href='#' id='".$c_id."'>删除</span>";  
											  }?>
								</div>
									</div>	
								</div>
                            </div>
						<?php }?>			
						</div>
					</section>
					<div class="row">	
					</div>
				</div> 
		</div>		
		<div id="222"></div>  
			<?php 
				$u_id= $row['u_id'];
			require('menu/rightmenu.php');?> 		 
		</div>
<script src="//at.alicdn.com/t/font_1759478_rdgqeho48b.js"></script>
<script src="js/jquery-3.4.1.js" type="text/javascript"></script>
<script src="js/bootstrap.js"></script>
<script src="js/hullabaloo.js"></script>
<script type="text/javascript" src="js/message.js"></script>
<script type="text/javascript" src="js/message_conf.js"></script>
<script src="tinymce/js/tinymce/tinymce.min.js"></script>
<script type="text/javascript">	
  tinymce.init({
    selector: '#myTextarea',
	menubar:false,
	language: 'zh_CN',
   
    plugins: [
      'advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker',
      'searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking',
      'table emoticons template paste help'
    ],
    toolbar: 
      'link image | preview  fullpage | ' +
      'forecolor backcolor emoticons ',
 	image_title: false, // 是否开启图片标题设置的选择，这里设置否
    automatic_uploads: true, // 图片异步上传处理函数
    images_upload_handler: (blobInfo, success, failure) => { 
        var xhr, formData;
        xhr = new XMLHttpRequest();
        xhr.withCredentials = false;
        xhr.open('POST', 'img_save.php');//第一个参数是请求方式，第二个参数是请求地址，我这里配置的是struts的action，如果是其他（PHP等）的可这样配置：xxx.php
        xhr.onload = function () {
            var json;
            if (xhr.status !== 200) {
                failure('HTTP Error: ' + xhr.status);
                return;
            }
            json = JSON.parse(xhr.responseText);            
            if (!json || typeof json.location !== 'string') {
            failure('Invalid JSON: ' + xhr.responseText);
                return;
            }
            success(json.location);
        };
 
        formData = new FormData();
        formData.append('file', blobInfo.blob(), blobInfo.filename());
        xhr.send(formData);
    }
  });
  </script>
<script>		//pinglunfasong plfs
	function comments_send(){
		str = tinyMCE.activeEditor.getContent();
		//alert(str);
		if (window.XMLHttpRequest) {
 		   // code for IE7+, Firefox, Chrome, Opera, Safari
 		   xmlhttp=new XMLHttpRequest();
 		 }
		else { // code for IE6, IE5
 		   xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
 		 }
	
	var a_id= $_GET['a_id'];
	url = "mysql/comment.php?a_id="+a_id+"&comment="+str;
  	xmlhttp.open("GET",url,true);
  	xmlhttp.send();
	
	xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) { 
		$.hulla = new hullabaloo();
		setTimeout(function() {
		  $.hulla.send("评论发送成功！", "success");
		}, 1000);
		str2 = this.responseText;
		location.reload();
		//alert(str2);
    }
	 
  }
	}
	
	function comments_show(){
			$('#comments').modal('show')
		}

	var $_GET = (function(){
    var url = window.document.location.href.toString(); //获取的完整url
    var u = url.split("?");
    if(typeof(u[1]) == "string"){
        u = u[1].split("&");
        var get = {};
        for(var i in u){
            var j = u[i].split("=");
            get[j[0]] = j[1];
        }
        return get;
    } else {
        return {};
    }
})();

function like(id) {

  if (window.XMLHttpRequest) {
    xmlhttp2=new XMLHttpRequest();
  } else { 
    xmlhttp2=new ActiveXObject("Microsoft.XMLHTTP");
  }
	
	var str = id.id;
	var str_id1 = id.id+"1";
	var str_id2 = id.id+"2";
	if( document.getElementById(str_id1).href.baseVal=="#icondianzan"){
		var color_love = "#icondianzan-copy";
		var type = "add";
	}
	if(document.getElementById(str_id1).href.baseVal=="#icondianzan-copy"){
		var color_love = "#icondianzan";
		var type = "sub";
	}
	if(document.getElementById(str_id1).href.baseVal=="#iconshoucang-copy"){
		var color_love = "#iconaixin";
		var type = "add";
	}
	if(document.getElementById(str_id1).href.baseVal=="#iconaixin"){
		var color_love = "#iconshoucang-copy";
		var type = "sub";
	}
  	var a_id= $_GET['a_id'];
	url = "mysql/like_love.php?a_id="+a_id+"&kind="+str+"&type="+type;
  	xmlhttp2.open("GET",url,true);                                                                                         //  typescript   
  	xmlhttp2.send();
	xmlhttp2.onreadystatechange=function() {
	  
    if (this.readyState == 4 && this.status==200) {
		document.getElementById(str_id2).innerHTML=this.responseText;
		document.getElementById(str_id1).href.baseVal=color_love;
    }
  }
}
</script>
<script>
	function comment_del(id){
		id = id.id;
		//alert(id);
		//初始化一个ajax对象
		if (window.XMLHttpRequest) {
  		  // code for IE7+, Firefox, Chrome, Opera, Safari
  		  xmlhttp=new XMLHttpRequest();
  		} else { // code for IE6, IE5
  		  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  		}	
		//发送请求 方式 ，url ，是否异步
    	xmlhttp.open("GET","mysql/comments_del.php?c_id="+id,true);
    	//发送请求
		xmlhttp.send();
		//等待请求回应
		xmlhttp.onreadystatechange=function(){
        if (xmlhttp.readyState==4 && xmlhttp.status==200){
            location.reload();
			$.hulla = new hullabaloo();
			setTimeout(1000,function(){
				$.hulla.send("删除成功！", "success");
			});
			
			
        	}
			//alert("yes");
    	}
		//
	}
		
</script>
</body>
</html>