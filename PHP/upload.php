<?php

$folder=$_POST['folder'];
$name=$_POST['name'];
$uploaddir = '/var/www/externalfiledhis/'.$folder."/";
$uploadfile = $uploaddir.basename($name);
if(!file_exists($uploaddir))
	mkdir ($uploaddir);
if (move_uploaded_file($_FILES['file']['tmp_name'], $uploadfile)) {
    echo '{"url":"'.$uploadfile.'",'
		.'"name":"'.$name.'",'
		. '"status":"success",'
		. '"description":"success"}';
						
} else {
    echo '{"url":"'.$uploadfile.'",'
		.'"name":"",'
		.'"status":"error",'
	.'"description":"failed to upload, because the file was empty."}';
					
}
?>