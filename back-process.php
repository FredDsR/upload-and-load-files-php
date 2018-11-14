<?php
	if(isset($_POST['op'])) $operation = $_POST['op'];

	//operations list
	if(isset($operation)){
		switch($operation){
			case 'upload':
			uploadFiles();
			break;

			case 'close':
			uploadCompleted();
			break;
		}
	}
	
	//completion of file upload and targeting to next page
	function uploadCompleted(){
			header('Location: gallery.php');	
	}
	
	//receiving the file
	function uploadFiles(){
		if($_FILES['picture']['error'] !== UPLOAD_ERR_NO_FILE){
			$file = $_FILES['picture']['name'];
			$name_file_old = $_FILES['picture']['name'];
			
			if( isJPG($file) ||  isPNG($file)){
				
				$nameFile = 'pic_user'. mt_rand(11111, 99999) .'.png';
				
				$directory = "figures/";

				//verifies the existence of the desired directory and creates if it does not exist
				if(!is_dir($directory)){mkdir(getcwd().'/'.$directory);}
				
				$loadedFile = move_uploaded_file($_FILES['picture']['tmp_name'], $directory.$nameFile);		
				
				if($loadedFile){
					//File uploaded successfully
					header('Location: index.php?error=0&namefile='.$file);
				}else{
					//File could not be processed
					header('Location: index.php?error=1');
				}
				
			}else{
				//File extension not allowed
				header('Location: index.php?error=2');
			}
		}else{
			//File not found
			header('Location: index.php?error=3');
		}
	}
	
	//verifies that the file is PNG
	function  isPNG($file){
		$allowed = ['png'];
		
		$extension = pathinfo($file, PATHINFO_EXTENSION);
		
		if(in_array($extension, $allowed)){return true;}else{return false;};
	}
	
	//verifies that the file is JPG
	function  isJPG($file){
		$allowed = ['jpg'];
		
		$extension = pathinfo($file, PATHINFO_EXTENSION);
		
		if(in_array($extension, $allowed)){return true;}else{return ;};
	}