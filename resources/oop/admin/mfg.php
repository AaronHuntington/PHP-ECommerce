<?php

class mfg_admin{

    public $id;
    public $mfg;
    public $mfg_title;

    public function display_mfgs(){

        $query = utility::query("SELECT * FROM mfg");
        utility::confirm($query);

        while($row = utility::fetch_array($query)){
$orders = <<<DELIMETER
<tr>    
    <td>{$row['id']}</td>
    <td>{$row['mfg']}</td>
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

    public function add_mfg(){
        if(isset($_POST['publish'])){
            $mfg          = $this->mfg = utility::escape_string($_POST['mfg']);
            $mfg_title    = $this->mfg_title = utility::escape_string($_POST['mfg_title']);
            
            $query = utility::query("INSERT INTO mfg(mfg, title) 
                            VALUES('{$mfg}','{$mfg_title}')");
            utility::confirm($query);

            $this->add_mfg_folder();

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
        $this->make_mfg_homePage();
    }

    public function make_mfg_homePage(){
        $myfile = fopen(PUBLIC_DIRECTORY.$this->mfg."/newfile.php", "w") or die("Unable to open file!");
        $txt = $this->mfg_html_template();
        file_put_contents(PUBLIC_DIRECTORY.$this->mfg.'/newfile.php', $txt.PHP_EOL , FILE_APPEND | LOCK_EX);
    }

    public function del_mfg_folder(){
        $folder_path = PUBLIC_DIRECTORY.$this->mfg;
        utility::del_folder($folder_path);
    }

    public function del_mfg(){
        if(isset($_GET['del'])){
            $this->id = $id = $_GET['del'];

            $this->set_classVars_byId();

            $query = utility::query("DELETE FROM mfg WHERE id = ".utility::escape_string($id)."");
            utility::confirm($query);

            $this->del_mfg_folder();

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

$mfg_template = <<<DELIMETER
<?php
    require_once("../../resources/config.php"); 
    seo::set_pageTitle('{$this->mfg}');
    include(TEMPLATE_FRONT . DS . "header.php");
?>
    <div class="container borderRed">
        <div class="row">
            <?php include(TEMPLATE_FRONT . DS . "side_nav.php"); ?>
            <div class="col-md-9">
                <div class="col-md-12 borderRe">
                    <h1>
                        <img width="50" src="<?php echo RESOURCE_URL; ?>uploads/coolfiles-6.jpg" style="margin: -10px 0 0 0;">
                        Offices To Go Furniture
                    </h1>
                </div>
                <div class="col-md-12">
                    <img height="400" width="800" src="<?php echo RESOURCE_URL; ?>uploads/coolfiles-6.jpg">
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