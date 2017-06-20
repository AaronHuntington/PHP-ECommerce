<?php

class mfg_admin extends db_objects{

    protected static $db_table = "mfg";
    protected static $db_table_fields = array('id','mfg','title');

    public $id;
    public $mfg;
    public $title;

    //Delete when ready.
    // public $mfg_title;

    //Uploading image variables
    public $filename;
    public $imgTmp_path;
    public $type;
    public $size;

    public $errors = array();

    public function save(){
        if($this->id){
            $this->update();
        } else {
            if(!empty($this->errors)){
                return false;
            }
            // if(empty($this->filename) || empty($this->tmp_path)){
            //     $this->errors[] = "The file was not available.";
            //     return false;
            // }

            // $target_path = SITE_ROOT.'admin'.DS.$this->upload_directory.DS.$this->filename;

            // if(file_exists($target_path)){
            //     $this->errors[] = "The file {$this->filename} already exists";
            //     return false;
            // }
            // if(move_uploaded_file($this->tmp_path, $target_path)){
            //     if($this->create()){
            //         unset($this->tmp_path);
            //         return true;
            //     }
            // } else {
            //     $this->error[] = "The file directory probably does not have permission.";
            //     return false;
            // }
        }
    }//save()

    public function display_mfgs(){

        $query = utility::query("SELECT * FROM mfg");
        utility::confirm($query);

        while($row = utility::fetch_array($query)){
$orders = <<<DELIMETER
<tr>    
    <td>{$row['id']}</td>
    <td>
        <a href="index.php?edit_mfg&id={$row['id']}">
            {$row['mfg']}
        </a>
    </td>
    <td>{$row['title']}</td>
    <td>    
        <a 
         class="btn btn-danger" 
         href="index.php?mfg&del={$row['id']}">
            <span class="glyphicon glyphicon-remove">
            </span>
        </a>
    </td>
</tr>
DELIMETER;
        echo $orders;
        } //While Loop
    }//display_mfgs()

    public function get_content_for_editForm(){
        global $database;

        $query = $database->query("SELECT * FROM mfg WHERE id = " . utility::escape_string($_GET['id']) . " ");
        $database->confirm($query);

        while($row = utility::fetch_array($query)){
            $this->id          = utility::escape_string($row['id']);
            $this->mfg    = utility::escape_string($row['mfg']);
            $this->mfg_title          = utility::escape_string($row['title']);
        }
    }

    public function update_mfg(){
        global $database;

        if(isset($_POST["update"])){
            $id         = utility::escape_string($_GET['id']);
            $mfg_name   = utility::escape_string($_POST['mfg_name']);
            $mfg_title  = utility::escape_string($_POST['mfg_title']); 
            $intro_imgName = $_FILES['intro_img_file']['name'];
            $intro_imgTemp = $_FILES['intro_img_file']['tmp_name'];
            $intro_imgPath = "";

            $this->mfg = $mfg_name;

            // echo $id." / ".$mfg_name." / ".$mfg_title." / ".$intro_imgName." / ".$intro_imgTemp;

            $query = "UPDATE mfg SET ";
            $query .= "mfg      = '{$mfg_name}', ";
            $query .= "title    = '{$mfg_title}' ";
            $query .= "WHERE id = " . $id;

            $query = $database->query($query);
            $database->confirm($query);
            $this->add_mfg_introImg($intro_imgTemp);
            utility::redirect("index.php?mfg");
        }
    }

    public function add_mfg(){
        if(isset($_POST['publish'])){
            $mfg          = $this->mfg = utility::escape_string($_POST['mfg']);
            $mfg_title    = $this->mfg_title = utility::escape_string($_POST['mfg_title']);
            
            $query = utility::query("INSERT INTO mfg(mfg, title) 
                            VALUES('{$mfg}','{$mfg_title}')");
            utility::confirm($query);

            $this->add_mfg_folder();
            if(isset($_FILES['logo_img'])){
                $this->set_imgFile($_FILES['logo_img']);
                $this->add_mfg_logoImg();
            }
            // utility::set_message('New product with ID {$last_id} was added!');
            utility::redirect("index.php?mfg");
        }
    }

    public function add_mfg_to_db(){
        if(isset($_POST['publish'])){
            $mfg          = $this->mfg = utility::escape_string($_POST['mfg']);
            $mfg_title    = $this->mfg = utility::escape_string($_POST['mfg_title']);
            
            $query = utility::query("INSERT INTO mfg(mfg, title) 
                            VALUES('{$mfg}','{$mfg_title}')");
            utility::confirm($query);
            // utility::set_message('New product with ID {$last_id} was added!');
            utility::redirect("index.php?mfg");
        }
    }//add_mfg_to_db()

    public function add_mfg_folder(){
        mkdir(PUBLIC_DIRECTORY.$this->mfg);
        mkdir(RESOURCES_DIRECTORY."images/".$this->mfg);
        $this->make_mfg_homePage();
    }

    public function set_imgFile($file){
        if(empty($file) || !$file || !is_array($file)){
            $this->errors[] = "There was no file uploaded here";
            return false;
        } elseif($file['error'] != 0){
            $this->errors[] = $this->upload_errors_array[$file['error']];
            return false;
        } else {
            $this->filename = basename($file['name']);
            $this->imgTmp_path = $file['tmp_name'];
            $this->type     = $file['type'];
            $this->size     = $file['size'];
        }
    }//set_file()

    public function add_mfg_logoImg(){
        $target_path = RESOURCES_DIRECTORY."images/".$this->mfg."/logo.jpg";

        move_uploaded_file($this->imgTmp_path, $target_path);
    }

    public function add_mfg_introImg($tmpFile){
        if($tmpFile !== ""){
            $target_path = RESOURCES_DIRECTORY."images/".$this->mfg."/intro.jpg";
            move_uploaded_file($tmpFile, $target_path);
        } else{
        }
    }

    public function make_mfg_homePage(){
        $myfile = fopen(PUBLIC_DIRECTORY.$this->mfg."/index.php", "w") or die("Unable to open file!");
        $txt = $this->mfg_html_template();
        file_put_contents(PUBLIC_DIRECTORY.$this->mfg.'/index.php', $txt.PHP_EOL , FILE_APPEND | LOCK_EX);
    }

    public function del_mfg_folder(){
        $folder_path = PUBLIC_DIRECTORY.$this->mfg.DS;
        utility::del_folder($folder_path);
    }

    public function del_mfg(){
        if(isset($_GET['del'])){
            $this->id = $id = $_GET['del'];

            $this->set_classVars_byId();

            $query = utility::query("DELETE FROM mfg WHERE id = ".utility::escape_string($id)."");
            utility::confirm($query);

            // $this->del_mfg_folder();
            // Also delete image folder. 5/30/17

            utility::set_message("MFG Deleted.");
            utility::redirect("index.php?mfg");
        } 
    }

    public function set_classVars_byId(){
        global $database;

        $query = $database->query("SELECT * FROM mfg WHERE id = " . utility::escape_string($this->id) . " ");
        $database->confirm($query);

        while($row = utility::fetch_array($query)){
            $this->id     = utility::escape_string($row['id']);
            $this->mfg    = utility::escape_string($row['mfg']);
            $this->title  = utility::escape_string($row['title']);
        }
    }


    public function mfg_html_template(){

        $newClass   = '$mfg = new mfg;';
        $mfgLogo    = '$mfg->get_mfg_logo("'.$this->mfg.'")';
        $mfg_image  = '$mfg->get_mfg_intro_img("'.$this->mfg.'")'; 

$mfg_template = <<<DELIMETER
<?php
    require_once("../../resources/config.php"); 
    seo::set_pageTitle('{$this->mfg}');
    include(TEMPLATE_FRONT . DS . "header.php");
    {$newClass}
?>
    <div class="container borderRed">
        <div class="row">
            <?php include(TEMPLATE_FRONT . DS . "side_nav.php"); ?>
            <div class="col-md-9">
                <div class="col-md-12 borderRe">
                    <h1>
                        <img width="50" src="<?php {$mfgLogo} ?>" style="margin: -10px 0 0 0;">
                        {$this->mfg_title}{$hello}
                    </h1>
                </div>
                <div class="col-md-12">
                    <img height="400" width="800" src="<?php {$mfg_image} ?>">
                </div>
            </div>
        </div>
    </div>
    <!-- /.container -->
<?php include(TEMPLATE_FRONT . DS . "footer.php"); ?>    
DELIMETER;
    
    return $mfg_template;
    }//mfg_html_template(){



}//class mfg_admin

?>