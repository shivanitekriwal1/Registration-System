<?php 

$db = mysqli_connect('localhost', 'root', '', 'users detail');

$query1 = "SELECT name, address, image FROM chinese_restaurants";
$result1 = mysqli_query($db, $query1);
$query2 = "SELECT name, address, image FROM north_indian_restaurants";
$result2 = mysqli_query($db, $query2);
$all_details = array();

$image_path = "image";
$image_name = "";

while ($detail = mysqli_fetch_field($result1)) {
    array_push($all_details, $detail->name);  
}

while ($row = mysqli_fetch_array($result1)) {
    echo '<td>' . $row['name'] . '</td>';
    echo '<br>';
    echo '<td>' . $row['address'] . '</td>';
    $image_name = $row['image'];
    echo "<img src='".$image_path."/".$image_name."' width='100' height='100'>";
    echo '<br>';
    echo '<br>';
}

while ($row = mysqli_fetch_array($result2)) {
    echo '<td>' . $row['name'] . '</td>';
    echo '<br>';
    echo '<td>' . $row['address'] . '</td>';
    $image_name = $row['image'];
    echo "<img src='".$image_path."/".$image_name."' width='100' height='100'>";
    echo '<br>';
    echo '<br>';
}


?>