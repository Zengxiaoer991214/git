<?php //session_start();?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>无标题文档</title>
<style>
/*
	 #mostdiv{
		background-color: aqua;
		width:auto;
		align-items;
		border:5px solid red;
		text-align: center; 
	}
	
	#mostdiv>div{
		
	}
	*/
	#ageoradd{
		font-size: 14px;
	}
	/*一个标签项的样式*/
.tag {
    display: inline-block;
    margin-right: .3rem;
    margin-top: .6rem;
    margin-bottom: .6rem;
    font-size: .85rem;
    color: #4a4a4a;
    font-family: "Courier New", -apple-system, BlinkMacSystemFont, "Segoe UI", "Roboto", "Helvetica Neue", Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol";
}

/*标签项中的a标签划过效果*/
.tag a:hover {
    font-weight: bold;
}

/*标签项的左半部分*/
.tag .tag-left {
    border: 1px solid #d6d6d6;
    border-radius: .25rem 0 0 .25rem;
    padding: .25rem .5rem;
    background: #f5f5f5 !important;
    margin-right: 0;
}

/*标签项的右半部分*/
.tag .tag-right {
    border: 1px solid #d6d6d6;
    border-left: none;
    border-radius: 0 .25rem .25rem 0;
    padding: .25rem .5rem;
    margin-left: -.52rem;
    background: #e7e7e7 !important;
    /*font-weight: bold;*/
}
	/*返回顶部*/
.back-top {
    position: fixed;
    display: none;
    z-index: 20;
    bottom: 1.5rem;
    right: 1rem;
    background: rgba(0, 0, 0, .4);
    width: 2rem;
    height: 2rem;
    color: #ffffff;
    text-align: center;
    line-height: 1.8rem;
    border-radius: 1rem;
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
       width: 1em; height: 1em;
       vertical-align: -0.15em;
       fill: currentColor;
       overflow: hidden;
    }
</style>
 
   
 
</head>

<body>
	<?php 
		
		require('mysql/mysql_login.php');	
		$row = login_check();
	?>		<div class="col-3 mt-3 sticky-top d-none d-sm-block" id="mostdiv">
	 	<section id="profile" class="mt-4 bg-white d-xl-block d-none">
    <div class="card">
        <div class="card-header"><i class="iconfont">&#xe703;</i>个人信息</div>
        <div class="card-body d-flex flex-column align-items-center">
            <div class="mt-4 mb-4point5 w-100 d-flex justify-content-center">
                <div class="w-50 text-right mr-3">
                    <i style="display: inline-block;
                            width: 6.5rem; height: 6.5rem;
                            background-image: url('<?php echo $row['head_photo'];?>');
                            background-size: cover;"
                       class="rounded-circle"></i>
                </div>
                <div class="w-50 text-left ml-3 d-flex flex-column justify-content-center">
                    <span class="h4 d-block"><?php echo $row['nickname'];?></span>
                        <span class="text-muted text-truncate">
                            <i class="fas fa-map-marker-alt mr-1"></i>
                            <?php echo $row['address'];?>
                        </span>
                </div>
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

        <div class="mb-4 mt-n2">
                <span class="d-block text-center text-muted px-3"><?php echo $row['say']?></span>
        </div>

    </div>
</section> 
	 <section id="tags" class="mt-4 mb-5 bg-white">
            <div class="card">
                <div class="card-header">
                    <i class="iconfont">&#xe62b;</i>
                    所有标签
                </div>
                <div class="card-body">
                        <div class="tag">
                            <a href="https://www.zengxiaoer.net/tags/css" class="text-muted">
                                <span class="tag-left">css</span>
                                <span class="tag-right">1</span>
                            </a>
                        </div>
                        <div class="tag">
                            <a href="https://www.zengxiaoer.net/tags/html" class="text-muted">
                                <span class="tag-left">html</span>
                                <span class="tag-right">1</span>
                            </a>
                        </div>
                        <div class="tag">
                            <a href="https://www.zengxiaoer.net/tags/springboot" class="text-muted">
                                <span class="tag-left">spring boot</span>
                                <span class="tag-right">0</span>
                            </a>
                        </div>
                        <div class="tag">
                            <a href="https://www.zengxiaoer.net/tags/javaspring" class="text-muted">
                                <span class="tag-left">java spring</span>
                                <span class="tag-right">1</span>
                            </a>
                        </div>
                        <div class="tag">
                            <a href="https://www.zengxiaoer.net/tags/java" class="text-muted">
                                <span class="tag-left">java</span>
                                <span class="tag-right">1</span>
                            </a>
                        </div>
                        <div class="tag">
                            <a href="https://www.zengxiaoer.net/tags/network" class="text-muted">
                                <span class="tag-left">计算机网络</span>
                                <span class="tag-right">0</span>
                            </a>
                        </div>
                        <div class="tag">
                            <a href="https://www.zengxiaoer.net/tags/python" class="text-muted">
                                <span class="tag-left">python</span>
                                <span class="tag-right">0</span>
                            </a>
                        </div>
                        <div class="tag">
                            <a href="https://www.zengxiaoer.net/tags/cc" class="text-muted">
                                <span class="tag-left">c/c++</span>
                                <span class="tag-right">0</span>
                            </a>
                        </div>
                        <div class="tag">
                            <a href="https://www.zengxiaoer.net/tags/php" class="text-muted">
                                <span class="tag-left">php</span>
                                <span class="tag-right">1</span>
                            </a>
                        </div>
                        <div class="tag">
                            <a href="https://www.zengxiaoer.net/tags/mysql" class="text-muted">
                                <span class="tag-left">mysql</span>
                                <span class="tag-right">1</span>
                            </a>
                        </div>
                        <div class="tag">
                            <a href="https://www.zengxiaoer.net/tags/blog" class="text-muted">
                                <span class="tag-left">blog</span>
                                <span class="tag-right">2</span>
                            </a>
                        </div>
                        <div class="tag">
                            <a href="https://www.zengxiaoer.net/tags/情感" class="text-muted">
                                <span class="tag-left">情感</span>
                                <span class="tag-right">1</span>
                            </a>
                        </div>
                    <div class="tag">
                        <a href="https://www.zengxiaoer.net/tags" class="text-muted">
                            <span class="tag-left">所有标签</span>
                            <span class="tag-right">
                                6
                        </span>
                        </a>
                    </div>
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
	<script src="//at.alicdn.com/t/font_1759478_rdgqeho48b.js"></script>
</body>
</html>