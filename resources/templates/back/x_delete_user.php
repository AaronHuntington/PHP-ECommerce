<?php
    require_once("../../config.php");

    if(isset($_GET['id'])){
        $query = utility::query("DELETE FROM users WHERE user_id = ".utility::escape_string($_GET['id'])."");
        utility::confirm($query);

        utility::set_message("Users Deleted.");
        utility::redirect("../../../public/admin/index.php?users");
    } else {
        utility::redirect("../../../public/admin/index.php?users");
    }
?>