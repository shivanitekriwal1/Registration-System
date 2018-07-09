<!-- ?php


$db = mysqli_connect('localhost', 'root', '', 'users detail');


$id = $_GET['cateId'];

// $query = "SELECT id FROM category WHERE parent_id = '$id'";
// $row = mysqli_query($db, $query);
// if($row){
//     while($result = mysqli_fetch_array($row)){
//         $query2 = "SELECT * FROM products WHERE category_id = '$result['id']'";
//         $result2 = mysqli_query($db, $query2);
//         $all_details = array();

//         while($detail = mysqli_fetch_field($result2)){
//             array_push($all_details, $detail->name);
//         }
//         $image_path1 = "image";
//         $image_name1 = "";

//         while ($row = mysqli_fetch_array($result1)){
//         //print_r($row); die;
//         //echo "<tr>";
//         //foreach ($all_details as $item) {
//             echo '<td>' . $row['name'] . '</td>';
//             echo '<br>';
//             echo '<td>' . $row['address'] . '</td>';
//             $image_name = $row['image'];
//             echo "<img src='".$image_path."/".$image_name."' width='100' height='100'>";
//             echo '<br>';
//             echo '<br>';
//             }
//         echo "</table>";

//     }

// }

// //print_r($result);
// else{

    $query1 = "SELECT * FROM products WHERE category_id = '$id'";
    $result1 = mysqli_query($db, $query1);
    $all_details = array();

    while ($detail = mysqli_fetch_field($result1)) {
        array_push($all_details, $detail->name);
    }

    $image_path = "image";
    $image_name = "";

    while ($row = mysqli_fetch_array($result1)){
            //print_r($row); die;
            //echo "<tr>";
            //foreach ($all_details as $item) {
        echo '<td>' . $row['name'] . '</td>';
        echo '<br>';
        echo '<td>' . $row['address'] . '</td>';
        $image_name = $row['image'];
        echo "<img src='".$image_path."/".$image_name."' width='100' height='100'>";
        echo '<br>';
        echo '<br>';
        }
    echo "</table>";

?>
 -->


<?php


$db = mysqli_connect('localhost', 'root', '', 'users detail');


$id = $_GET['cateId'];

$query1 = "SELECT id FROM category WHERE parent_id = '$id'";
$result1 = mysqli_query($db, $query1);

$row = mysqli_num_rows($result1);


if($row>0){
    while($row = mysqli_fetch_array($result1)){
        
        echo $query = "SELECT * FROM products WHERE category_id = '". $row['id'] ."'";
        //echo $query = "SELECT * FROM category JOIN products WHERE category.parent_id = '$id' AND category.id = products.category_id  ";
        $result = mysqli_query($db, $query);
        //echo "$result";
        $detail = mysqli_fetch_array($result);
        echo "<pre>";
        print_r($detail);
        $all_details = array();

        while ($detail = mysqli_fetch_array($result)) {
            array_push($all_details, $detail);
        }

        $image_path = "image";
        $image_name = "";

        while ($row = mysqli_fetch_array($result)){
            echo '<td>' . $row['name'] . '</td>';
            echo '<br>';
            echo '<td>' . $row['address'] . '</td>';
            $image_name = $row['image'];
            echo "<img src='".$image_path."/".$image_name."' width='100' height='100'>";
            echo '<br>';
            echo '<br>';
            }
        echo "</table>";    


    }
}

