<?php

$db = mysqli_connect('localhost', 'root', '', 'users detail');

$query = "SELECT * FROM category";
$result = mysqli_query($db, $query);


	$category = array(
        'categories' => array(),
        'parent_categories' => array()
    );

    while ($row = mysqli_fetch_assoc($result)) {
        $category['categories'][$row['id']] = $row; 
        //echo '<pre>';
        //print_r($row);
        $category['parent_categories'][$row['parent_id']][] = $row['id'];
        //echo '<pre>';
        //print_r($category['parent_categories']);

    }
    echo '<pre>';
    print_r($category);



function buildCategory($parent, $category) {
    $html = "";
    if (isset($category['parent_categories'][$parent])) {
        $html .= "<ul>\n";
        foreach ($category['parent_categories'][$parent] as $category_id) {

            if(!isset($category['parent_categories'][$category_id])){

                $html .= "<li>\n  <a href='product.php?cateId=".$category_id."'>" . $category['categories'][$category_id]['category_name'] . "</a>\n</li> \n";
                //$sql = "SELECT id FROM category WHERE parent_id = '".$category_id."'";
                //$row = mysqli_query($db, $sql);
                //$result = mysqli_fetch_array($row);
                //print_r($result);


            }

            if(isset($category['parent_categories'][$category_id])){

                $cat_id = $category['parent_categories']['1'];
                //print_r($cat_id);

                $html .= "<li>\n  <a href='product.php?cateId=".$category_id."'>" . $category['categories'][$category_id]['category_name'] . "</a>\n</li> \n";
                $html .= buildCategory($category_id, $category);
                $html .= "</li> \n";
            }
        }

        $html .= "</ul> \n";
    }
    return $html;
}


echo buildCategory(0, $category);

?>

