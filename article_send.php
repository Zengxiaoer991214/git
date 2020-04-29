<!DOCTYPE html>
<html lang="zh">
<head>	
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<!--	<link rel="stylesheet" href="css/index.css">-->
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
	</style>	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<!--	<link rel="stylesheet" href="css/index.css">-->
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
		<?php require('menu/head.php');?>
	</div>
	<div class="row mt-4">
		<div class="col ">
  			<form enctype="multipart/form-data" id="uploadImg">
	  			<input type="text" class="form-control" id="title" placeholder="输入你的文章标题">
				<input type="file" class="form-control-file"id= "file" name ='file'multiple>
				<small id="passwordHelpBlock" class="form-text text-muted">
					你可以选择设置你的封面图片，以便于展示到主页面，如果你不设置，系统将默认随机选取封面图片
					</small>
			</form>
    			<textarea id="mytextarea2" class="w-100" style="height: 500px">在这里记录下你的文章吧~~~</textarea>
  			 
			<button class="btn" onclick="article_send()">提交</button>
<div id="test"></div>

		</div>

		<?php require_once('menu/rightmenu.php'); ?>
	</div>
</div>	
<script src="//at.alicdn.com/t/font_1759478_rdgqeho48b.js"></script>
<script src="js/jquery-3.4.1.js" type="text/javascript"></script>
<script src="js/bootstrap.js"></script>
<script src="js/hullabaloo.js"></script>

<script src="tinymce/js/tinymce/tinymce.min.js"></script>
<script>
 
  tinymce.init({
	  //???
    selector: 'textarea#mytextarea2',//意思是将TinyMCE插件放入‘textarea’ID为mytextarea的标签里
	language: 'zh_CN',
    plugins: [ //配置插件：可自己随意选择，但如果是上传本地图片image和imagetools是必要的
      'advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker',
      'searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking',
      'save table contextmenu directionality emoticons template paste imagetools textcolor'
    ],
 
//工具框，也可自己随意配置
    toolbar: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image |  forecolor backcolor emoticons',  
    toolbar3: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image |  forecolor backcolor emoticons',  
    image_advtab: true,
    table_default_styles: {
        width: '50%',
		height: '500px',	
        borderCollapse: 'collapse'
    },
    image_title: false, // 是否开启图片标题设置的选择，这里设置否
    automatic_uploads: true,
    images_upload_handler: (blobInfo, success, failure) => { 
        var xhr, formData;
        xhr = new XMLHttpRequest();
        xhr.withCredentials = false;
        xhr.open('POST', 'img_save.php');
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

  function article_send(){
	var str = tinyMCE.activeEditor.getContent();
	var activeEditor = tinymce.activeEditor; 
	var editBody = activeEditor.getBody(); 
	activeEditor.selection.select(editBody); 
	var text = activeEditor.selection.getContent( { 'format' : 'text' } );
	var title = document.getElementById("title").value;
	var file = document.getElementById("headimg");
//	var file = document.querySelector('[type=file]');
    // 通过FormData将文件转成二进制数据
    
    //
 	//var headimg = document.getElementById("headimg");
	var formdata = new FormData()
	
	//Array.from(headimg.files).forEach(function(file){
     //       formData.append("fileName",file);
    //    })
	
    formdata.append('photo',  document.getElementById("file").files[0]);
    formdata.append('title', title)
    formdata.append('html', text)
    formdata.append('article', str)
	//alert("file"+formData.getAll("file")['file']);
	//alert("title"+formdata.getAll("title"));
	//alert("html"+formdata.getAll("html"));
	//alert("article"+formdata.getAll("article"));
		//alert(str);
		if (window.XMLHttpRequest) {
 		   // code for IE7+, Firefox, Chrome, Opera, Safari
 		   xmlhttp=new XMLHttpRequest();
 		 }
		else { // code for IE6, IE5
 		   xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
 		 }
	 
	//var a_id= $_GET['a_id'];
	url = "mysql/article_save.php";
  	xmlhttp.open("post",url,true);
	  
//	xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
  	xmlhttp.send(formdata);
	xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) { 
		// setTimeout(function() {
		//   $.hulla.send("文章发送成功！", "success");
		// }, 1000);
		//location.href('index.php');
		
	var	str2 = this.responseText;
	if (str2 == "yes"){
		$.hulla = new hullabaloo();
		$.hulla.send("文章发送成功！", "success");
	  	setTimeout(function(){
			location.href="index.php"; 
		},2000);
    		}
  		}
	
		
  	}
  }
  </script>
</body>
</html>
