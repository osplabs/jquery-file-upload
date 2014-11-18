<?php
	if(isset($_FILES)) {

		//below two lines are just to get name of sub directory where this project is running. This is then used to display evaluate the url image where it has been uploaded.
		$path_only = implode("/", (explode('/', $_SERVER['SCRIPT_NAME'], -1)));
		$SITE_NAME = $path_only."/";

		$result = array('status'=>'fail','file_url'=>'');

		foreach($_FILES as $file) { //Although we have used forloop, but there will be always one file only

			$upload_path = 'uploads/'.$file['name'];

			if(move_uploaded_file($file['tmp_name'], $upload_path)) {

				//If File uploaded then get the URL of image
				$result['file_url'] = "http://" . $_SERVER['HTTP_HOST'].$SITE_NAME.$upload_path;  //Note that in our case there will be always one file only.
				$result['status'] = 'success';
			} 
		
		}
		
		echo json_encode($result);
	}	
?>