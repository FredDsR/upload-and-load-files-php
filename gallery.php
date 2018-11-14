<?php
include 'back-process.php';	
$imageList = array();
$message= 'Sorry, gallery does not exist yet!';
								
//passes the path of the images to a vector
$path = "figures/";
if(is_dir($path)){
	$directory = new RecursiveDirectoryIterator($path);
	foreach($directory as $file){
		if ($file->isFile()) {
			if(isJPG($file) ||  isPNG($file)){	
			$imageList[] = $path.$file->getBasename();
			$message = 'Gallery loaded successfully!';
			}
		}else{
			$message = 'Empty gallery!';
		}
	}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Gallery</title>
	<style>
	img{
		width:20%;
		padding: 5px;
		float:left;
		border-style: outset;
	}
	</style>
</head>
<body>

    <h1>Your picture's gallery</h1>
    <p><?=$message;?></p>
    
	<?php
	foreach($imageList as $file){echo '<img src="'.$file.'">';}
	?>
	
</body>
</html>