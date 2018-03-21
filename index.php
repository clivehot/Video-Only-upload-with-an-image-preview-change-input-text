<html>
<head>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	 <script src='changeInputText.js'></script>
</head>
<body>
<script type="text/javascript">
	function getFiles(event) {
		var videofile = {};
		videofile = event.target.files;
		var displayvideo = "<video width='320' height='240' > <source src='"+URL.createObjectURL(videofile[0])+"' type='video/mp4' ></video>";
		$("#video-preview").append(displayvideo);
	}

    $(document).ready(function(){
	   $('#input-label').inputFileText({
          text: 'Select Video File'
       });
    });

</script>



//This is the code for  video uploading you will make a folder of videos and save your videos there and if you want to save your videos in database you just have to save its name like i have done
//create a folder called video for videos to be uploaded 
<?php
if (isset($_REQUEST['upload']))
{
$name=$_FILES['uploadvideo']['name'];
 $type=$_FILES['uploadvideo']['type'];
//$size=$_FILES['uploadvideo']['size'];
$cname=str_replace(" ","_",$name);
$tmp_name=$_FILES['uploadvideo']['tmp_name'];
$target_path="video/";
$target_path=$target_path.basename($cname);
if(move_uploaded_file($_FILES['uploadvideo']['tmp_name'],$target_path))
{
	/*
echo "
<video width='320' height='240' >
  <source src='video/vid.mp4' type='video/mp4'>
Your browser does not support the video tag.
</video>
";

*/
}
}
?>
<form name="video" enctype="multipart/form-data" method="post" action="">
<input name="MAX_FILE_SIZE" value="100000000000000"  type="hidden"/>
<input type="file" id="input-label" name="uploadvideo" onchange="getFiles(event)" />
<input type="submit" name="upload" value="SUBMIT" />
</form>

<div id="video-preview" ></div>

</body>
</html>