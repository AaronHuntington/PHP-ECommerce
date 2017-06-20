<?php

class mfg extends db_objects{

    function get_mfgs_in_homePage(){
        global $database;

        $query = $database->query("SELECT * FROM mfg");
        $database->confirm($query);

        $base_url = BASE_URL;

        while($row = utility::fetch_array($query)){

$mfg = <<<DELIMETER
<a href="{$base_url}{$row['mfg']}">
    <p>{$row['mfg']}</p>
</a>
DELIMETER;
            echo $mfg;
        }   
    }

    public function get_mfg_logo($mfg){
        $image_filePath = "../../resources/images/".$mfg."/logo.jpg";
        // echo "http://placehold.it/350x150";
        echo $image_filePath;
    }

    public function get_mfg_intro_img($mfg){
        $image_filePath = "../../resources/images/".$mfg."/intro.jpg";
        // echo "http://placehold.it/350x350";
        echo $image_filePath;
    }




}//class mfg
?>