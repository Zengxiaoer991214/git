<!doctype html>
<html>
<head>
<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>无标题文档</title>
</head>

<body>
<nav class="navbar navbar-expand-sm navbar-light bg-light md-2 w-100 ">
  <a class="navbar-brand" href="index.php">主 页</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#" onClick="check_login(this)" id="<?php echo $_SESSION['id'];?>">个人中心<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="article_send.php">发帖子</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          默认排序
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
			<a class="dropdown-item" href="index.php?sort=a_comments">评论↓</a>
          	<a class="dropdown-item" href="index.php?sort=a_view">热度↓</a>
          	<a class="dropdown-item" href="index.php?sort=a_likecount">点赞↓</a>
        </div>
      </li>
	
      <li class="nav-item">
        <a class="nav-link"  href="#"data-target="#exampleModalCenter" onClick=
			<?php
			if($_SESSION['id']==0)
				echo "'login()'>登录";
			else
				echo "'exit()'>退出";
		      ?>
		  </a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0 justify-content-end">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>
	
	
				<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
					 
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                 
                <h4 class="modal-title" id="myModalLabel">
                    欢迎你登录
                </h4>
            </div>

            <div class="modal-body">				
     <!--    登录框    -->
				
				
				
				
	<ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#login_div" role="tab" aria-controls="home" aria-selected="true" name="name">登录</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#design" role="tab" aria-controls="profile" aria-selected="true" >注册</a>
  </li>
</ul>
	
				
				
				
	<!------------------------------------------登录-------------------------------------------->
<div class="tab-content" id="myTabContent">
  <div class="tab-pane fade show active" id="login_div" role="tabpanel" aria-labelledby="home-tab">
	  
	  <form class="form-horizontal" role="form" id="login-form" action="login/login.php" onsubmit="return my_pswcheck();" method="post">
  <div class="form-group">
    <label for="firstname" class="col-sm-2 control-label">邮箱</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="name" name="name"placeholder="请输入账号">
    </div>
  </div>
  <div class="form-group">
    <label for="lastname" class="col-sm-2 control-label">密码</label>
    <div class="col-sm-10">
      <input type="password" class="form-control" id="password" autocomplete="off" name="password" placeholder="请输入密码">
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <div class="checkbox">
        <label>
          <input type="checkbox">请记住我
        </label>
      </div>
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">                                  
      <button type="submit" class="btn btn-dark" id="login_button">登录</button>
    </div>
  </div>
</form> 
	</div>
	<!--design------------->

	
  <div class="tab-pane fade" id="design" role="tabpanel" aria-labelledby="profile-tab">
	  <form class="form-horizontal" role="form" action="login/resign.php" method="post" onSubmit="return my_pswcheck2();">
  <div class="form-group">
    <label for="firstname" class="col-sm-2 control-label" data->邮箱</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="name2" name="name2" autocomplete="off" placeholder="请输入账号">
    </div>
  </div>
  <div class="form-group">
    <label for="lastname" class="col-sm-2 control-label">密码</label>
    <div class="col-sm-10">
      <input type="password" class="form-control" id="password2" autocomplete="off" name="password2" placeholder="请输入密码">
    </div>
  </div>
  <div class="form-group">
    <label for="lastname" class="col-sm-4 control-label">确认密码</label>
    <div class="col-sm-10">
      <input type="password" class="form-control" id="password3" autocomplete="off" placeholder="请再次输入密码">
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="sumbit" class="btn btn-success">注册</button>
    </div>
  </div>
</form>
	</div>
</div>
           

            <div class="modal-footer">
                <button type="button" class="btn btn-warning" data-dismiss="modal">关闭
                </button> 
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal -->
</div>
</div>	
	<div class="modal" tabindex="-1" role="dialog" id="exitmodal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">退出登录</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p class="control-label fa-lg">你确定要退出吗？</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" data-dismiss="modal">关闭</button>
        <button type="button" class="btn btn-danger"><a href="../login/out.php">确认退出</a></button>
      </div>
    </div>
  </div>
	<script>
		function login(){
			$('#exampleModalCenter').modal('show')
		}
		function exit(){
			$('#exitmodal').modal('show')
		}
		function my_pswcheck(){
		   
		   //alert ("name1");
		   var name=document.getElementById("name");
		   
		   var password=document.getElementById("password");
		   var form1=document.getElementById("login-form");
		    
		   $.hulla = new hullabaloo();
		    
		if(name.value==""){	
			 
			$.hulla.send("账号不能为空！", "warning");
			//alert("111");	
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
		 function check_login(id){
			 var data = id.id;
			 if(data!="0"){
				 window.location.href = "../user_init.php";
			 }
			 else{
				 $.hulla = new hullabaloo();
				 $.hulla.send("对不起，您尚未登录，请登录后重试","warning");
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
						var reg = /^([a-zA-Z0-9]+[_|\_|\.]?)*[a-zA-Z0-9]+@([a-zA-Z0-9]+[_|\_|\.]?)*[a-zA-Z0-9]+\.[a-zA-Z]{2,3}$/;
					 	
						if(reg.test(name.value)){
							
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
