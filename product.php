<?php


$db = mysqli_connect('localhost', 'root', '', 'users detail');


$id = $_GET['cateId'];

$query1 = "SELECT id FROM category WHERE parent_id = '$id'";
$result1 = mysqli_query($db, $query1);

$rowCount = mysqli_num_rows($result1);

if($rowCount > 0){
    while ($rslt = mysqli_fetch_array($result1)) {
        $rsltNew[] = "'".$rslt['id']."'";
    }
    $query = "SELECT * FROM products WHERE category_id IN ('". trim(implode(',', $rsltNew), "'") ."')";
} else {
    $query = "SELECT * FROM products WHERE category_id = '". $id ."'";
}


$queryResult = mysqli_query($db, $query);

$image_path = "image";
$image_name = "";

echo "<table>";
while ($row = mysqli_fetch_array($queryResult)){
            echo '<td>' . $row['name'] . '</td>';
            echo '<br>';
            echo '<td>' . $row['address'] . '</td>';
            $image_name = $row['image'];
            echo "<img src='".$image_path."/".$image_name."' width='100' height='100'>";
            echo '<br>';
            echo '<br>';
            }
        echo "</table>";    


    

