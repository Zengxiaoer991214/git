// JavaScript Document
 
		function check_is_null(){
			var nick_name = document.getElementById("nick_name");
			var real_name = document.getElementById("real_name");
			var profession = document.getElementById("profession");
			var sex_man = document.getElementById("sex_man");
			var age = document.getElementById("age");
			var province = document.getElementById("province");
			var city = document.getElementById("city");
			var county = document.getElementById("county");
			var tel = document.getElementById("tel");
			
			str=nick_name.value+real_name.value+profession.value+sex_man.value+age.value+province.value+city.value+county.value;
			alert(str);
		}

		 function self_message_change(){
			 var item=document.getElementById("Textarea1");
			 
			 var button1=document.getElementById("change_message");
			  var button2=document.getElementById("change_message2"); 
			 
			 item.removeAttribute("disabled");
			 button1.style.display="none"; 
			  button2.style.display="block"; 
			 }
			 function self_message_change2(){
			  	 var item=document.getElementById("Textarea1");	 
				 var button2=document.getElementById("change_message2"); 
				 var data = sessionStorage.getItem('say');
				 //alert(item.value);
				 $.hulla = new hullabaloo();	
			if(item.value==data){
			  $.hulla.send("你并未修改任何内容","warning");
			   return false;
			   }
			else{
			   return true;
			   }
			   
			 }
		


	function head_pic_upload(){
		var oInput = document.getElementById('inputGroupFile02');
		oInput.onchange = function() {
    		if(this.value == '') {
        	alert('empty');
    			}else {
        	alert(this.value);
    }
}
		}