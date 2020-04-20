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
	<div class="row">
	<div class="col">
  <form method="post">
	  <input type="text" class="form-control" id="exampleInputEmail1" placeholder="输入你的文章标题">  
    <textarea id="mytextarea2">Hello, World!</textarea>
  </form>
		</div>
	
		<?php require_once('menu/rightmenu.php')?>
		
		
	</div>
</div>	
	<script src="tinymce/js/tinymce/tinymce.min.js"></script>
	<script>
  tinymce.init({
	  
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
		height: '100%',	
        borderCollapse: 'collapse'
    },
    image_title: false, // 是否开启图片标题设置的选择，这里设置否
    automatic_uploads: true,
 // 图片异步上传处理函数
    images_upload_handler: (blobInfo, success, failure) => { 
        var xhr, formData;
 
        xhr = new XMLHttpRequest();
        xhr.withCredentials = false;
        xhr.open('POST', '6.php');//第一个参数是请求方式，第二个参数是请求地址，我这里配置的是struts的action，如果是其他（PHP等）的可这样配置：xxx.php
 
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
</body>
</html>
