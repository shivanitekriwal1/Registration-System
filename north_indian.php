<?php 

$db = mysqli_connect('localhost', 'root', '', 'users detail');

$query = "SELECT name, address FROM north_indian_restaurants";
$result = mysqli_query($db, $query);
$all_details = array();

while ($detail = mysqli_fetch_field($result)) {
    array_push($all_details, $detail->name);  
}

while ($row = mysqli_fetch_array($result)) {
    echo "<tr>";
    foreach ($all_details as $item) {
        echo '<td>' . $row[$item] . '</td>';
        echo '<br>'; //get items using property value
    }
    echo '<br>';
    echo '</tr>';
}
echo "</table>";

?>