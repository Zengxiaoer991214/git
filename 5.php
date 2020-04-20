<!DOCTYPE html>
<html>
<head>
  <script
    type="text/javascript"
    src='https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js'
    referrerpolicy="origin">
  </script>
  <script type="text/javascript">
  tinymce.init({
    selector: '#myTextarea',
	menubar:false,
    width: 600,
    height: 300,
    plugins: [
      'advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker',
      'searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking',
      'table emoticons template paste help'
    ],
    toolbar: 
      'link image | preview  fullpage | ' +
      'forecolor backcolor emoticons ',
 
    
    
  });
  </script>
</head>

<body>
  <textarea id="myTextarea"></textarea>
</body>
</html>
