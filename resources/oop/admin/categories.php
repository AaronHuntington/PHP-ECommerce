<?php
 
class categories_admin {

    public function __construct(){
        $this->add_categories();
        $this->delete_category();
    }

    public function show_categories(){
        $category_query = utility::query("SELECT * FROM categories");
        utility::confirm($category_query);

        while($row = utility::fetch_array($category_query)){
            $cat_id = $row['cat_id'];
            $cat_title = $row['cat_title'];
$category = <<<DELIMETER
<tr>
    <td>{$cat_id}</td>
    <td>{$cat_title}</td>
    <td>    
        <a 
         class="btn btn-danger" 
         href="index.php?categories&del={$row['cat_id']}">
            <span class="glyphicon glyphicon-remove">
            </span>
        </a>
    </td>
</tr>
DELIMETER;
            echo $category;
        }
    }//show_categories()

    public function add_categories(){
        if(isset($_POST['add_category'])){
            $cat_title = utility::escape_string($_POST['cat_title']);

            if(empty($cat_title) || $cat_title == " "){
                echo "<p class='bg-danger'>This cannot be empty.</p>";
            } else {

                $insert_cat = utility::query("INSERT INTO categories(cat_title) VALUES('{$cat_title}')");
                utility::confirm($insert_cat);
                utility::set_message("Category Created.");
            }
        }
    }//add_categories()

    public function delete_category(){
        if(isset($_GET['del'])){
            $query = utility::query("DELETE FROM categories WHERE cat_id = ".utility::escape_string($_GET['del'])."");
            utility::confirm($query);

            utility::set_message("Category Deleted.");
            utility::redirect("index.php?categories");
        }
    }

    public static function show_categories_dropdown(){
        $query = utility::query("SELECT * FROM categories");
        utility::confirm($query);

        while($row = mysqli_fetch_array($query)){
$category_options = <<<DELIMETER
<option value="{$row['cat_id']}">{$row['cat_title']}</option>
DELIMETER;
            echo $category_options;
        }
    }//show_categories_dropdown()

    public static function show_product_category_title($product_category_id){
        $query = utility::query("SELECT * FROM categories WHERE cat_id = '{$product_category_id}'");
        utility::confirm($query);

        while($category_row = utility::fetch_array($query)){
            return $category_row['cat_title']; 
        }
    }


}//class categories
?>