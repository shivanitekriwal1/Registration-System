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
        $category['parent_categories'][$row['parent_id']][] = $row['id'];
    }


function buildCategory($parent, $category) {
    $html = "";
    if (isset($category['parent_categories'][$parent])) {
        $html .= "<ul>\n";
        foreach ($category['parent_categories'][$parent] as $category_id) {
            if (!isset($category['parent_categories'][$category_id])) {
                $html .= "<li>\n  <a href='" . $category['categories'][$category_id]['category_link'] . "'>" . $category['categories'][$category_id]['category_name'] . "</a>\n</li> \n";
            }
            if (isset($category['parent_categories'][$category_id])) {
                $html .= "<li>\n  <a href='" . $category['categories'][$category_id]['category_link'] . "'>" . $category['categories'][$category_id]['category_name'] . "</a> \n";
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

