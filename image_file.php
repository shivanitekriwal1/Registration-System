<?php

$db = mysqli_connect('localhost', 'root', '', 'users detail');

$folder="C:/xampp/htdocs/user login/image/";
$upload_image = $folder . basename($_FILES[ "myimage" ][ "name" ]);
$image_name = $_FILES["myimage"]["name"];
//echo $image_name;

//$upload_name=addslashes (file_get_contents($_FILES['myimage']['tmp_name']));

move_uploaded_file($_FILES[ "myimage" ][ "tmp_name"], "$folder".$_FILES[ "myimage" ][ "name" ]);

$insert_path="INSERT INTO pictures (image) VALUES ('$image_name')";
$result = mysqli_query($db, $insert_path);
if($result){
	echo "uploaded";
}
else{
	echo "not uploaded";
}





