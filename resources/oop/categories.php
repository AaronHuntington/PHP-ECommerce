<?php

class categories {

    function get_categories_sideNav(){
        global $database;
        $query = $database->query("SELECT * FROM categories");
        $database->confirm($query);

        while($row = mysqli_fetch_array($query)){
$category_links = <<<DELIMETER

<a href='category.php?id={$row['cat_id']}' class='list-group-item'>{$row['cat_title']}</a>

DELIMETER;
            echo $category_links;
        }
    }
}
?>