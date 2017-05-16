<?php
    require_once("../../config.php");

    if(isset($_GET['id'])){
        $query = utility::query("DELETE FROM reports WHERE report_id = ".utility::escape_string($_GET['id'])."");
        utility::confirm($query);

        utility::set_message("Report Deleted.");
        utility::redirect("../../../public/admin/index.php?reports");
    } else {
        utility::redirect("../../../public/admin/index.php?reports");
    }
?>