<?php
    require_once("../../config.php");

    if(isset($_GET['id'])){
        $query = utility::query("DELETE FROM categories WHERE cat_id = ".utility::escape_string($_GET['id'])."");
        utility::confirm($query);

        utility::set_message("Category Deleted.");
        utility::redirect("../../../public/admin/index.php?categories");
    } else {
        utility::redirect("../../../public/admin/index.php?categories");
    }
?>