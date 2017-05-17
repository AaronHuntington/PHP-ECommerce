<?php

class home_slider_admin{

    public function add_slide(){
        if(isset($_POST['add_slide'])){
            $slide_title        = utility::escape_string($_POST['slide_title']);
            $slide_image        = $_FILES['file']['name'];
            $slide_image_loc    = $_FILES['file']['tmp_name'];

            if(empty($slide_title || empty($slide_image))){
                echo "<p class='bg-danger'>This field cannot be empty</p>";
            } else {
                move_uploaded_file($slide_image_loc, UPLOAD_DIRECTORY.DS.$slide_image);

                $query =utility::query("INSERT INTO slides(slide_title, slide_image) 
                               VALUES ('{$slide_title}','{$slide_image}')");
                utility::confirm($query);
                utility::set_message('Slide Added.');
                utility::redirect('index.php?slides');
            }
        }
    }//add_slides()

    function get_current_slide_in_admin(){
        global $database;

        $query = $database->query("SELECT * FROM slides ORDER BY slide_id DESC LIMIT 1");
        $database->confirm($query);

        while($row = $database->fetch_array($query)){
            $slide_image = utility::display_image($row['slide_image']);

$slide_active_admin = <<< DELIMETER
    <img class="img-responsive" src="../../resources/{$slide_image}" alt="">    
DELIMETER;

            echo $slide_active_admin;
        }
    }//get_current_slide_in_admin()

    function get_slide_thumbnails(){
        global $database;

        $query = $database->query("SELECT * FROM slides ORDER BY slide_id ASC");
        $database->confirm($query);

        while($row = $database->fetch_array($query)){
            $slide_image = utility::display_image($row['slide_image']);

$slide_thumb_admin = <<< DELIMETER
<div class="col-xs-6 col-md-3 image_container">
    <a href="index.php?slides&delete_slide_id={$row['slide_id']}">
        <img  class="img-responsive slide_image" src="../../resources/{$slide_image}" alt=""> 
    </a>
    <div class="caption">
        <p>{$row['slide_title']}</p>
    </div>
</div>  
DELIMETER;
            echo $slide_thumb_admin;
        }
    }//get_slide_thumbnails()

    public function delete_slide(){
        if(isset($_GET['delete_slide_id'])){
            global $database;

            $query_find_image = $database->query("SELECT slide_image FROM slides 
                WHERE slide_id=".utility::escape_string($_GET['delete_slide_id'])." LIMIT 1");
            $database->confirm($query_find_image);
            $row = $database->fetch_array($query_find_image);
            $target_path = UPLOAD_DIRECTORY.DS.$row['slide_image'];
            unlink($target_path);

            $query = $database->query("DELETE FROM slides WHERE slide_id = ".utility::escape_string($_GET['delete_slide_id'])."");
            $database->confirm($query);

            utility::set_message("Slide Deleted.");
            utility::redirect("index.php?slides");
        }
    }//delete_slide()
}//class home_slider_admin
?>