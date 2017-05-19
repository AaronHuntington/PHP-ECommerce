<?php

class seo {
    static $page_title = 'default';
    public $mainTitle;
    public $metaTitle;
    public $metaContent;

    public static function set_pageTitle($title){
        self::$page_title = $title;
    }

    public function get_header_meta_tags(){
        global $database;

        $query = $database->query("SELECT * FROM seo_header WHERE page='".utility::escape_string(self::$page_title)."'");
        $database->confirm($query);

        while($row = utility::fetch_array($query)){
            if($row['name'] == 'main_title'){
                echo '<title>'.$row["content"].'</title>';
            } else {
                echo '<meta name="'.$this->get_title($row["name"]).'" content="'.$row["content"].'">';
            }
        }
    }//get_header_meta_tags()

    public function get_title($string){
        $name = substr($string, 5);
        return $name;
    }//get_title($string)
}//class seo
?>