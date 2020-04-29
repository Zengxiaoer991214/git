<!DOCTYPE html>
<html lang="zh">
<head>	
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="//code.z01.com/v4/dist/css/zico.min.css" >
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
<body>
<div class="container"> 
	<div class="row">
		<?php require('menu/head.php');
		  require('mysql/mysql_conn.php');
			$rows = user_message();
			//print_r($rows);
		?>
	</div>
	<div class="row">
		<div class="col">
			<div class="row m-1">
				<div class="col-12 col-md-6">
				<img id="img_a" src="<?php echo $rows['head_photo'];?>" class="rounded img-thumbnail float-left w-100" alt="..." onClick="img_up()"  data-toggle="tooltip" data-placement="left" title="您可以通过点击您的头像，上传图片，修改头像。">
				<input style="display: none" type="file" id="head_img" name="head_img" onChange="head_img_up()">
				</div>
				<div class="col-12 col-md-6"> 
				<div class="">
					<input type="text" class="w-100" id="nickname" style="font-size: 30px;" value="<?php echo $rows['nickname'];?>" onChange="change_nickname(this)" data-toggle="tooltip" data-placement="left" title="您可以通过点击您的昵称，来修改昵称。"> </input> 
				<textarea class="form-control" id="textarea" rows="3" name="say" style="border:1; height: #50151600px" maxlength="94" onChange="change_say(this)" data-toggle="tooltip" data-placement="left" title="您可以通过点击，来修改你的个性签名。"><?php  echo $rows['say'];?></textarea>	
				</div>	
					<div>
     					<label for="validationServer01">真实姓名</label>
     						 <input type="text" class="form-control" id="realname" onChange="change_nickname(this)" placeholder="realname"  value="<?php echo $rows['realname'];?>">
    				</div>
					<div>
     					<div class="row">
							<div class="col-4">
								<label>选择省份</label>
									<select id="province" name="provice" class="w-100 form-control">
    							</select>
							</div>
							<div class="col-4">
								<label>选择市</label>
									<select id="city" name="city" class="w-100 form-control">
    								</select>
							</div>
							<div class="col-4">
								<label >选择县</label>
								<select id="county" name="county" class="w-100 form-control" onChange="loc_save()">
    							</select>
							</div>
						</div>	
        		 
					</div>  
				</div>				 
			</div>
			<div class="row m-2">
				<nav>
  					<div class="nav nav-tabs m-2 w-100" id="nav-tab" role="tablist">
    					<a class="nav-item nav-link active"  data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true" onClick="collect(this)" id='11'>我的文章</a>
    					<a class="nav-item nav-link"  data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false" onClick="collect(this)" id='22'>我的收藏</a>
    					<a class="nav-item nav-link"  data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false" onClick="collect(this)" id='33'>我的关注</a>
  					</div>
				</nav>
 				<div id="class" class="w-100">
		
				</div>
				<div class="modal fade" id="del1" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  					<div class="modal-dialog modal-dialog-centered" role="document">
  					  <div class="modal-content">
  					    <div class="modal-header">
  					      <h3 class="modal-title" id="exampleModalCenterTitle">删除文章</h3>
  					      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
  					        <span aria-hidden="true">&times;</span>
  					      </button>
  					    </div>
  					    <div class="modal-body">
  					      删除文章之后，将无法恢复，你确定要删除吗？
  					    </div>
  					    <div class="modal-footer">
  					      <button type="button" class="btn btn-secondary" data-dismiss="modal">取消</button>
  					      <button type="button" class="btn btn-warning" id="1" onClick="del_conf(this)">确认删除</button>
  					    </div>
  					  </div>
  					</div>
				</div>
				<div class="modal fade" id="del2" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  					<div class="modal-dialog modal-dialog-centered" role="document">
  					  <div class="modal-content">
  					    <div class="modal-header">
  					      <h3 class="modal-title" id="exampleModalCenterTitle">取消收藏</h3>
  					      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
  					        <span aria-hidden="true">&times;</span>
  					      </button>
  					    </div>
  					    <div class="modal-body">
  					     取消收藏之后，你讲无法在个人中心看到你喜爱的文章，确定？
  					    </div>
  					    <div class="modal-footer">
  					      <button type="button" class="btn btn-secondary" data-dismiss="modal">取消</button>
  					      <button type="button" class="btn btn-warning" id ="2"onClick="del_conf(this)">确认</button>
  					    </div>
  					  </div>
  					</div>
				</div>
				<div class="modal fade" id="del3" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
 					<div class="modal-dialog modal-dialog-centered" role="document">
 					  <div class="modal-content">
 					    <div class="modal-header">
 					      <h3 class="modal-title" id="exampleModalCenterTitle">取消关注</h3>
 					      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
 					        <span aria-hidden="true">&times;</span>
 					      </button>
 					    </div>
 					    <div class="modal-body">
 					      取消关注之后，将无法在个人中心看到他/她，你确定要取消关注吗？
 					    </div>
 					    <div class="modal-footer">
 					      <button type="button" class="btn btn-secondary" data-dismiss="modal">取消</button>
 					      <button type="button" class="btn btn-warning" id="3" onClick="del_conf(this)">确认</button>
 					    </div>
 					  </div>
 					</div>
				</div>
			</div>	
		</div>
		<?php require('menu/rightmenu.php');?>
	</div>
</div>	
<script src="//at.alicdn.com/t/font_1759478_z8jbcshk3v.js"></script>
<script src="js/jquery-3.4.1.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" type="text/javascript"></script>
<script src="js/bootstrap.js"></script>
<script src="js/hullabaloo.js"></script>
<script type="text/javascript" src="js/message.js"></script>
<script type="text/javascript" src="js/area.js"></script>	
	<script>
		setup();
		a_ids ="";
		function change(id){	
			
		}
		function loc_save(){
			loc = document.getElementById("province").value+document.getElementById("county").value;
			alert(loc);
			if(window.XMLHttpRequest){
     			xmlhttps=new XMLHttpRequest();
			}
			else{
				xmlhttps=new ActiveXObject("Microsoft.XMLHTTP");	
			}
			xmlhttps.onreadystatechange=function() {
				if (this.readyState==4 && this.status==200) { 	
					$.hulla = new hullabaloo();
					$.hulla.send("地区修改成功！", "success");
					 
				}
			}
			fd = new FormData("loc",loc);
			xmlhttps.open("post","mysql/loc_save.php",true);
			xmlhttps.send(fd);
}
		 
		function img_up(){
			document.getElementById("head_img").click();
		}
		function del(id) {
			$('#del1').modal('show');
			a_ids = id.id;
		}
		function del2(id){
			$('#del2').modal('show');
			a_ids = id.id;
		}
		function del3(id){
			$('#del3').modal('show');
			a_ids = id.id;
		}
		var a_id = "";
		function collect(id){
			if(window.XMLHttpRequest){
 		   		xmlhttps=new XMLHttpRequest();
 		 	}
			else{
 		   		xmlhttps=new ActiveXObject("Microsoft.XMLHTTP");	
			}
 
			xmlhttps.onreadystatechange=function() {
    			if (this.readyState==4 && this.status==200) { 	
					document.getElementById("class").innerHTML=this.responseText;
			}
		}
			xmlhttps.open("post","mysql/collect_show.php?type="+id.id,true);
			xmlhttps.send();	
	}	
		function del_conf(id){
			var modalid = "#del"+id.id;
			alert(modalid);
			$(modalid).modal('hide');
			str = "";
			a_idss ="";
			var a_id = a_ids;
			if(id.id==1){
				str = "文章删除成功！";
			}
			if(id.id==2){
				str = "取消收藏成功！";
			}
			if(id.id==3){
				str = "取消关注成功！";a_id=document.getElementById("other_id").name;
			}
			if(window.XMLHttpRequest){
 		   		xmlhttps=new XMLHttpRequest();
 		 	}
			else{
 		   		xmlhttps=new ActiveXObject("Microsoft.XMLHTTP");	
			}
			var formdata = new FormData();
			formdata.set("a_id",a_id);
			formdata.set("type",id.id);
			xmlhttps.onreadystatechange=function() {
    			if (this.readyState==4 && this.status==200) { 
					$.hulla = new hullabaloo();
					$.hulla.send(str,"warning");
					collect(document.getElementById(id.id));
				 }
			}
			xmlhttps.open("post","mysql/article_del.php",true);
			xmlhttps.send(formdata);		
		}
		window.onload=collect(document.getElementById("1"));
	</script>
<script>

	
</script>
</body>
</html>
