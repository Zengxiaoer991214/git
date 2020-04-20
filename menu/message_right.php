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
  src: url('//at.alicdn.com/t/font_1759478_sxj8tx9064.eot');
  src: url('//at.alicdn.com/t/font_1759478_sxj8tx9064.eot?#iefix') format('embedded-opentype'),
  url('//at.alicdn.com/t/font_1759478_sxj8tx9064.woff2') format('woff2'),
  url('//at.alicdn.com/t/font_1759478_sxj8tx9064.woff') format('woff'),
  url('//at.alicdn.com/t/font_1759478_sxj8tx9064.ttf') format('truetype'),
  url('//at.alicdn.com/t/font_1759478_sxj8tx9064.svg#iconfont') format('svg');
}
	
.iconfont{
    font-family:"iconfont" !important;
    font-size:16px;font-style:normal;
    -webkit-font-smoothing: antialiased;
    -webkit-text-stroke-width: 0.2px;
    -moz-osx-font-smoothing: grayscale;
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
        <div class="card-header"><span class="iconfont">&#x33;</span>相关标签</div>
        <div class="card-body d-flex flex-column align-items-center">
     
        </div>

         

    </div>
		</section> 
	<section id="recommend" class="mb-lg-4 mb-5">
                <div class="card">
                    <div class="card-header"><i class="fas fa-list-ul mr-2"></i>相关推荐</div>
                    <div class="card-body p-0">
                        <ul class="list-group list-group-flush">
                                    <a href="https://www.zengxiaoer.net/2020/04/javastudy"
                                       class="list-group-item list-group-item-action">纠结了一个月最终开始了spring的学习
                                    </a>
                        </ul>
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
</body>
</html>