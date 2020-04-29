		function head_img_up(){
			if(window.XMLHttpRequest){
 		   		xmlhttp=new XMLHttpRequest();
 		 	}
			else{
 		   		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");	
			}
			var formdata = new FormData();
			var file = document.getElementById("head_img");
			formdata.set("file",file.files[0]);
			xmlhttp.onreadystatechange=function() {
    			if (this.readyState==4 && this.status==200) { 
					$.hulla = new hullabaloo();
					$.hulla.send("头像修改成功！", "success");
					document.getElementById("img_a").src = this.responseText;
				}
			}
			xmlhttp.open("post","mysql/head_img_change.php",true);
			xmlhttp.send(formdata);		
		}
			
		function change_say(id){
			//id.disabled = "";
			
			if (window.XMLHttpRequest) {
 		   		xmlhttp=new XMLHttpRequest();
 		 	}
			else { 
 		   		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");	
			}
			var formdata = new FormData();
			
			formdata.set("mess",id.value)
			xmlhttp.onreadystatechange=function() {
    			if(this.readyState==4 && this.status==200) { 
					if(this.responseText != ""){
						$.hulla = new hullabaloo();
						$.hulla.send("个性签名修改成功！", "success");
					}
					id.value = this.responseText;
				}
			}
			xmlhttp.open("post","mysql/nickname.php?type="+id.id,true);
			xmlhttp.send(formdata);	
		}
		function change_nickname(id){
			//alert(id.id);
			var str2 = "真实姓名";
			if(id.id=="nickname"){
				var str2 = "个性签名";
			}
			 
			
			if (window.XMLHttpRequest) {
 		  // code for IE7+, Firefox, Chrome, Opera, Safari
 		   		xmlhttp=new XMLHttpRequest();
 		 	}
			else { // code for IE6, IE5
 		   		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");	
			}
			var formdata = new FormData();
			
			formdata.set("mess",id.value)
			xmlhttp.onreadystatechange=function() {
    			if (this.readyState==4 && this.status==200) { 
					//alert(this.responseText);
					if(this.responseText != ""){
						$.hulla = new hullabaloo();
						$.hulla.send(str2+"修改成功！", "success");
					}
					id.value = this.responseText;
				}
			}
			xmlhttp.open("post","mysql/nickname.php?type="+id.id,true);
			xmlhttp.send(formdata);
			
			
			
		}
		$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})
  		 