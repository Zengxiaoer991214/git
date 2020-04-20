<?php 
 if ($_REQUEST['act'] == 'upload')
{
	require_once(ROOT_PATH . 'includes/cls_image.php');
	$image = new cls_image();
	
    //$uploadFilename = $_FILES['upload']['name']; 
    $uploadFilesize = $_FILES['upload']['size'];
	//上传图片不大于2M
    if($uploadFilesize > 1024*2*1000){
		$arr = array(
			'res' => false,
			'msg' => 'Pictures larger than 2M'
		);
		$json = stripslashes(json_encode($arr)); //去除反斜杠
		echo $json;
		exit;
    }
    //上传图片
	$headimg_original = $image->upload_image($_FILES['upload'],'actimage');
	if($headimg_original){
		$arr = array(
			'res' => true,
			'url' => $headimg_original
		);
	}else{
		$arr = array(
			'res' => false,
			'msg' => 'Image upload failure'
		);
	}
	$json = stripslashes(json_encode($arr)); //去除反斜杠
	//error_log($json, 3, "errors.log");
	echo $json;
}

?>