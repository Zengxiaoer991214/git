	<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title></title>
<link rel="stylesheet" href="../css/bootstrap.css">
<style>
#ageoradd{
		font-size: 14px;
	}
@font-face {
  font-family: 'iconfont';  /* project id 1759478 */
  src: url('//at.alicdn.com/t/font_1759478_rdgqeho48b.eot');
  src: url('//at.alicdn.com/t/font_1759478_rdgqeho48b.eot?#iefix') format('embedded-opentype'),
  url('//at.alicdn.com/t/font_1759478_rdgqeho48b.woff2') format('woff2'),
  url('//at.alicdn.com/t/font_1759478_rdgqeho48b.woff') format('woff'),
  url('//at.alicdn.com/t/font_1759478_rdgqeho48b.ttf') format('truetype'),
  url('//at.alicdn.com/t/font_1759478_rdgqeho48b.svg#iconfont') format('svg');
}	
.iconfont{
    font-family:"iconfont" !important;
    font-size:20px;font-style:normal;
    -webkit-font-smoothing: antialiased;
    -webkit-text-stroke-width: 0.2px;
    -moz-osx-font-smoothing: grayscale;
	}
.icon {
    width: 1.2em; height: 1.2em;
    vertical-align: -0.15em;
    fill: currentColor;
    overflow: hidden;
   }
</style>
</head>
<body>
	<?php 
		require_once('mysql/mysql_login.php');	
		require_once('mysql/mysql_conn.php');	
		$row = login_check();
		if($u_id){
			$row = login_check2($u_id);
		}	
	?>		
	<div class="col-3 m-1 sticky-top d-none d-sm-block" id="mostdiv">
	 	<section id="profile" class="m-1 bg-white d-xl-block d-none">
   			 <div class="card">
        		<div class="card-header">
					<i class="iconfont">&#xe703;</i>
					个人信息
				</div>
        		<div class="card-body justify-content-center">
            		 
                		<div class="row">
							<img class="img-circle ml-2" style="border-radius:50%;width: 220px;height: 220px;overflow: hidden;border:1px solid #BBA5A5; " src="<?php echo $row['head_photo'];?>" alt="头像"/>
                		</div>
                		<div class="row justify-content-center">
                    		<h4 class="w-100 text-center" ><?php echo $row['nickname'];?></h4>
                        	<h6 class="text-muted text-truncate">
                            	<i class="fas fa-map-marker-alt mr-1"></i>
                            	<?php echo $row['address'];?>
                        	</h6>
                		</div>
            	 

            		<div class="w-100 border-top"></div>
            		<div class="mt-4 w-100 d-flex justify-content-around">
                		<div class="w-100 text-center">
                    		<small class="text-muted">文章数量</small>
                    		<span class="d-block h2 mt-2">
                           		<?php echo $row['article_count']?>
                    		</span>
                		</div>
                		<div class="w-100 text-center">
                    		<small class="text-muted">获赞数量</small>
                    		<span class="d-block h2 mt-2">
                           		<?php echo $row['like_count']?>
                    		</span>
                		</div>
                		<div class="w-100 text-center">
                    		<small class="text-muted">浏览数量</small>
                    		<span class="d-block h2 mt-2">
                          			<?php echo $row['view_count']?>
                    		</span>
                		</div>
            		</div>
					
					
        		</div>

        		<div class="m-1 mt-n2">
                	<span class="d-block text-center text-muted px-3"><?php echo $row['say']?></span>
					<?php  if(isset($u_id)){
			echo	"<div class='row w-100 m-1 justify-content-around'><button  type='button' class='btn border-1 btn-outline-success' id = ";?><?php echo "'".$u_id."'"; ?><?php echo "onclick = 'atten(this)'>";?><?php  
								   	//echo $u_id;
									$action = action($u_id);
									if($action>0){
										echo "已关注</button></div>";
									}
									else{
										echo "关注作者</button></div>";
									}
									
					}?>
				
        		</div>
				
    		</div>
	</section> 
	<section id="tags" class="mt-4 m-1 bg-white">
    	<div class="card">
            <div class="card-header">
            	<svg class="icon" aria-hidden="true">
    			<use xlink:href="#iconremen"></use>
					</svg>
                    最近热门
            </div>
            <div class="card-body">
            	 <?php 
					if(!isset($u_id)){
						$u_id = $_SESSION['id'];
					}
					$res = hot_article($u_id);
					$index = 0;
					while($rowss = mysqli_fetch_array($res)){
					$index++;
				?><h6>
                   <a href="../article_show.php?a_id=<?php echo $rowss['a_id'];?>"><?php echo $index.".".$rowss['a_title'];?></a>  
				  </h6>
				<?php }?>
             </div>
         </div>
    </section>
</div>	
<!--</div>-->
	</div>
	<script>
		function login(){
			$('#exampleModalCenter').modal('show')
		}
		function my_pswcheck(){
		   
		   //alert ("name1");
		   var name=document.getElementById("name");
		   
		   var password=document.getElementById("password");
		   var form1=document.getElementById("login-form");
		    
		   $.hulla = new hullabaloo();
		    
		if(name.value==""){	
			 
			$.hulla.send("账号不能为空！", "warning");
			alert("111");	
			name.focus();
			return false;
		 	}
		 else if(password.value==""){	
			$.hulla.send("密码不能为空！","warning");
			password.focus();
			return false;														
			}
		 else
			return true;   
	  }  
		function atten(id){
			o_id = id.id;
			//alert(id.innerHTML);
			if(id.innerHTML=="关注作者"){
				type = "add";
				//otype = "已关注";
				id.innerHTML="已关注"
			}
			else{
				type = "del";
				//otype = "关注作者";
				id.innerHTML="关注作者"
			}
			if (window.XMLHttpRequest) {
  		  		xmlhttp=new XMLHttpRequest();
  			} 
			else { // code for IE6, IE5
  		  		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  			}	
		 	//alert(type);
    		xmlhttp.open("GET","mysql/atten.php?o_id="+o_id+"&type="+type,true);
    	 
			xmlhttp.send();
			 
			xmlhttp.onreadystatechange=function(){
        		if (xmlhttp.readyState==4 && xmlhttp.status==200){
     				$.hulla = new hullabaloo();
					if(this.responseText=="addyes"){
						$.hulla.send("关注成功！", "success");
					}
					else if(this.responseText=="delyes"){
						$.hulla.send("删除成功！", "success");
					}
					else{
						$.hulla.send(this.responseText, "warning");
					}
					id.innerHTML=otype;
				}
    		}	
		} 
		
		function my_pswcheck2(){
			$.hulla = new hullabaloo();
			var name=document.getElementById("name2");
			var password2=document.getElementById("password2");
			var password3=document.getElementById("password3");
			
			if(name.value==""||password2.value==""||password3.value==""){		
				$.hulla.send("账号或密码不能为空！", "warning");
				return false;
			}
			else{
				if(password2.value!=password3.value){
					 
					$.hulla.send("两次密码不一致","warning");
					return false;
					}
				 	else {
						var reg = '/^([a-zA-Z]|[0-9])(\w|\-)+@[a-zA-Z0-9]+\.([a-zA-Z]{2,4})$/';
						if(reg.test(name)){
							alert("邮箱格式正确");
							return true;				
						}	
						else{
							$.hulla.send("邮箱格式格式不正确","warning");
							return false;
						}
				}			
			}
		}
		
	</script>
	<script src="//at.alicdn.com/t/font_1759478_osdj2hrt5w8.js"></script>
</body>
</html>