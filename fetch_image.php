<?php

$db = mysqli_connect('localhost', 'root', '', 'users detail');

$select_path="select * from pictures";

$var=mysqli_query($db, $select_path);
$row = mysqli_fetch_array($var);
print_r($row);

while($row=mysql_fetch_array($var))
{
 $image_name=$row["image"];
 //$image_path=$row["imagepath"];
 echo "img src=".$image_name." width=100 height=100";
}
?>