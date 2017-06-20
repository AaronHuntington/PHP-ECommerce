<?php

class seo_admin{

    public $page_name;
    public $main_title;
    public $meta_title;
    public $meta_description;
    public $meta_keywords;


    public function display_header_seo(){
        $query = utility::query("SELECT * FROM seo_header");
        utility::confirm($query);

        while($row = utility::fetch_array($query)){

$seo = <<<DELIMETER
<tr>    
    <td>
        <a class="btn btn-default" href="index.php?edit_seoHeader&page={$row['page']}" role="button">
            {$row['page']}
        </a>
    </td>
    <td>{$row['name']}</td>
    <td>{$row['content']}</td>
    <td>
        <a class="btn btn-default del_seoHeader" href="index.php?seoHeader&del={$row['page']}" role="button">
            Del
        </a>
    </td>
</tr>
DELIMETER;

        echo $seo;
        } //While Loop
    }//display_orders()

    public function add_seoHeader(){
        global $database;

         if(isset($_POST['publish'])){
            $page_name          = utility::escape_string($_POST['page_name']);
            $main_title         = utility::escape_string($_POST['main_title']);
            $meta_title         = utility::escape_string($_POST['meta_title']);
            $meta_description   = utility::escape_string($_POST['meta_description']);
            $meta_keywords      = utility::escape_string($_POST['meta_keywords']);
                
            $sql = "INSERT INTO seo_header (page, name, content) 
                    VALUES('{$page_name}','main_title','{$main_title}');";
            $sql .= "INSERT INTO seo_header (page, name, content) 
                    VALUES('{$page_name}','meta_titles','{$meta_title}');";
            $sql .= "INSERT INTO seo_header(page, name, content) 
                    VALUES('{$page_name}','meta_description','{$meta_description}');";
            $sql .= "INSERT INTO seo_header(page, name, content) 
                    VALUES('{$page_name}','meta_keywords','{$meta_keywords}')";

            $query = $database->multi_query($sql);
            $last_id = utility::last_id();
            utility::confirm($query);
            utility::set_message('New product with ID {$last_id} was added!');
            utility::redirect("index.php?seoHeader");
        }
    }

    public function del_seoHeader(){
        if(isset($_GET['del'])){
            $query = utility::query("DELETE FROM seo_header WHERE page = '".utility::escape_string($_GET['del'])."'");
            utility::confirm($query);

            utility::set_message("SEO Header Deleted.");
            utility::redirect("index.php?seoHeader");
        } 
    }//del_seoHeader()

    public function get_content_for_edit_form(){
        global $database;

        $query = $database->query("SELECT * FROM seo_header WHERE page = '" . utility::escape_string($_GET['page']) . "' ");
        $database->confirm($query);

        while($row = utility::fetch_array($query)){

            $this->page_name = utility::escape_string($row['page']);

            if($row['name'] == 'main_title'){
                $this->main_title = utility::escape_string($row['content']);
            } 
            elseif($row['name'] == 'meta_title'){
                $this->meta_title = utility::escape_string($row['content']);
            }
            elseif($row['name'] == 'meta_description'){
                $this->meta_description = trim(utility::escape_string($row['content']));
            }
            elseif($row['name'] == 'meta_keywords'){
                $this->meta_keywords = utility::escape_string($row['content']);
            }
        }
    }//get_content_for_edit_form()

    public function update_seo(){
        if(isset($_POST['update'])){
            global $database;

            $page_name          = utility::escape_string($_POST['page_name']);
            $main_title         = utility::escape_string($_POST['main_title']);
            $meta_title         = utility::escape_string($_POST['meta_title']);
            $meta_description   = utility::escape_string($_POST['meta_description']);
            $meta_keywords      = utility::escape_string($_POST['meta_keywords']);

            $sql = "UPDATE seo_header SET content='".$main_title."' 
                WHERE page='{$page_name}' AND name='main_title';";
            $sql .= "UPDATE seo_header SET content='".$meta_title."' 
                WHERE page='{$page_name}' AND name='meta_title';";
            $sql .= "UPDATE seo_header SET content='".$meta_description."' 
                WHERE page='{$page_name}' AND name='meta_description';";
            $sql .= "UPDATE seo_header SET content='".$meta_keywords."' 
                WHERE page='{$page_name}' AND name='meta_keywords'";

            $query = $database->multi_query($sql);
            utility::confirm($query);

            utility::set_message("SEO Header Changed.");
            sleep(1);
            utility::redirect("index.php?seoHeader");
        }//if(isset($_POST['update']))
    }//update_seo()

}//class seo
?>  