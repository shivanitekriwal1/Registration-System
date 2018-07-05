<?php 

$db = mysqli_connect('localhost', 'root', '', 'users detail');

$query = "SELECT name, address, image FROM north_indian_restaurants";
$result = mysqli_query($db, $query);
$all_details = array();

while ($detail = mysqli_fetch_field($result)) {
    array_push($all_details, $detail->name);  
}

$image_path = "image";
$image_name = "";

while ($row = mysqli_fetch_array($result)) {
    //echo "<tr>";
    //foreach ($all_details as $item) {
    echo '<td>' . $row['name'] . '</td>';
    echo '<br>';
    echo '<td>' . $row['address'] . '</td>';
    $image_name = $row['image'];
    echo "<img src='".$image_path."/".$image_name."' width='100' height='100'>";
    echo '<br>';
    echo '<br>';
    //echo '</tr>';
}
echo "</table>";
?>