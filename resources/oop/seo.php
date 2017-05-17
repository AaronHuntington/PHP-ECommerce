<?php

class seo {
    public $mainTitle;
    public $metaTitle;
    public $metaContent;

    public function get_header_meta_tags($page_name){
        global $database;

        $query = $database->query("SELECT * FROM  seo_header WHERE page='".utility::escape_string($page_name)."'");
        $database->confirm($query);

        // echo '<pre>';
        // var_dump($query);
        // echo $query['field_count'];
        // // var_dump(utility::fetch_array($query));

        while($row = utility::fetch_array($query)){

$tags = <<< DELIMETER

    <br>
        {$row['page']}
        {$row['name']}
        {$row['content']}
DELIMETER;

            echo $tags;
        }


    }//header_meta_tags()
}//class seo
?>