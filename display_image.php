<html>

<body>
		
<form method="GET" action=" " >
 <input type="file" name="image_name">
 <input type="submit" name="display_image" value="Display">
</form>
<?php

$db = mysqli_connect('localhost', 'root', '', 'users detail');

$image_name= "";

$select_path="select * from pictures";

$var=mysqli_query($db, $select_path);
$row = mysqli_fetch_array($var);

$image_path = "image";
while($row=mysqli_fetch_array($var))
{
 $image_name=$row["image"];
 echo "<img src='".$image_path."/".$image_name."' width='100' height='100'>";
}

?>
</body>
</html>
