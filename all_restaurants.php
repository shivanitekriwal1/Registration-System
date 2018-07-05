<?php 

$db = mysqli_connect('localhost', 'root', '', 'users detail');

$query1 = "SELECT name, address, image FROM chinese_restaurants";
$result1 = mysqli_query($db, $query1);
$query2 = "SELECT name, address, image FROM north_indian_restaurants";
$result2 = mysqli_query($db, $query2);
$all_details = array();

while ($detail = mysqli_fetch_field($result1)) {
    array_push($all_details, $detail->name);  
}

while ($row = mysqli_fetch_array($result1)) {
    foreach ($all_details as $item) {
        echo '<td>' . $row[$item] . '</td>';
        echo '<br>';
    }
    echo '<br>';
}

while ($row = mysqli_fetch_array($result2)) {
    //echo "<tr>";
    foreach ($all_details as $item) {
        echo '<td>' . $row[$item] . '</td>';
        echo '<br>';
         //get items using property value
    }
    echo '<br>';
}


?>