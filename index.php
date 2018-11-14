<?php
$message = null;
$color_message = null;
//Error handling
if(isset($_GET['error'])){
	if($_GET['error'] == 0){
		$message = 'File "'.$_GET['namefile'].'" uploaded successfully!';
		$color_message = 'green';
	}
	if($_GET['error'] == 1){
		$message = 'File could not be processed!';
		$color_message = 'red';
	}
	if($_GET['error'] == 2){
		$message = 'File extension not allowed!';
		$color_message = 'red';
	}
	if($_GET['error'] == 3){
		$message = 'File not found!';
		$color_message = 'red';
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
		.button{
			padding: 3px;
			margin: 3px;
			border-radius: 5px;
			border: 1px solid #333;
			background-color: Teal;
			color: #fff;
			height: 30px;
			width: 46px;
		}
		.message{
			color:<?=$color_message?>;
		}
	</style>
</head>
<body>
<p>Add files to your gallery:</p>
    <form method="post" action="back-process.php" enctype="multipart/form-data">
		<input type="submit" value="Send" class="button"> 
		<input type="file" name="picture" accept="image/*">
        <input type="hidden" name="op" value="upload">
    </form>
	<form method="post" action="back-process.php">
		<input type="submit" value="Close" class="button">
		<input type="hidden" name="op" value="close">
	</form>	
	<p class="message"><?=$message?></p>
	<br>
	<?php  
	require('gallery.php');
	?>
</body>
</html>