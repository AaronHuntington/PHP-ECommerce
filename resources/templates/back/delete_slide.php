<?php
    require_once("../../resources/config.php");

    if(isset($_GET['delete_slide_id'])){

        $query_find_image = utility::query("SELECT slide_image FROM slides 
            WHERE slide_id=".utility::escape_string($_GET['delete_slide_id'])." LIMIT 1");
        utility::confirm($query_find_image);
        $row = utility::fetch_array($query_find_image);
        $target_path = UPLOAD_DIRECTORY.DS.$row['slide_image'];
        unlink($target_path);

        $query = utility::query("DELETE FROM slides WHERE slide_id = ".utility::escape_string($_GET['delete_slide_id'])."");
        utility::confirm($query);

        utility::set_message("Slide Deleted.");
        utility::redirect("index.php?slides");
    } else {
        utility::redirect("index.php?slides");
    }
?>