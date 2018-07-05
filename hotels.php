<?php 

$db = mysqli_connect('localhost', 'root', '', 'users detail');

$query = "SELECT name, address, image FROM hotels";
$result = mysqli_query($db, $query);
$all_details = array();

while ($detail = mysqli_fetch_field($result)) {
    array_push($all_details, $detail->name);  
}

while ($row = mysqli_fetch_array($result)) {
    foreach ($all_details as $item) {
        echo '<td>' . $row[$item] . '</td>';
        echo '<br>';
    }
    echo '<br>';
}
echo "</table>";

?>