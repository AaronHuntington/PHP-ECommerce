<?php

class products_admin {



////////////////////////////////////////////////////
    public static $db_table = "";
    public static $db_table_fields = array('id','product_title','product_category_id','product_price','product_quantity','product_description','product_image');

    public $id; 
    public $product_title; 
    public $product_category_id; 
    public $product_price; 
    public $product_quantity;
    public $product_description; 
    public $product_image; 

    public $filename;
    public $tmp_path;
    public $type;
    public $size; 
    public static $img_directory; 
    public $image_placeholder = "http://placehold.it/400x400text=image";




//////////////////////////////////////////////////////////////////


    public $product_title;          
    public $product_category_id;    
    public $product_price;          
    public $product_description;    
    public $product_short_desc;     
    public $product_quantity;       
    public $product_image;

    public function __construct(){}

    public function get_products(){
        $query = utility::query("SELECT * FROM  products");
        utility::confirm($query);

        while($row = utility::fetch_array($query)){
            $category = categories_admin::show_product_category_title($row['product_category_id']);
            $product_image = utility::display_image($row['product_image']);

$product = <<<DELIMETER
<tr>
    <td>{$row['product_id']}</td>
    <td>{$row['product_title']}<br>
        <a href="index.php?edit_product&id={$row['product_id']}">
            <img src="../../resources/{$product_image}" alt="" width="100">
        </a>
    </td>
    <td>{$category}</td>
    <td>{$row['product_price']}</td>
    <td>{$row['product_quantity']}</td>
    <td>    
        <a 
         class="btn btn-danger del_product" 
         href="index.php?products&del={$row['product_id']}">
            <span class="glyphicon glyphicon-remove">
            </span>
        </a>
    </td>
</tr>
DELIMETER;
            echo $product;
        }
    }//get_products()

    public function delete_product(){
        if(isset($_GET['del'])){
            $query = utility::query("DELETE FROM products WHERE product_id = ".utility::escape_string($_GET['del'])."");
            utility::confirm($query);

            utility::set_message("Product Deleted.");
            utility::redirect("index.php?products");
        } 
    }//delete_product()

    public function update_product(){
        if(isset($_POST['update'])){
            $product_title          = utility::escape_string($_POST['product_title']);
            $product_category_id    = utility::escape_string($_POST['product_category_id']);
            $product_price          = utility::escape_string($_POST['product_price']);
            $product_description    = utility::escape_string($_POST['product_description']);
            $product_short_desc     = utility::escape_string($_POST['product_short_desc']);
            $product_quantity       = utility::escape_string($_POST['product_quantity']);
            $product_image          = $_FILES['file']['name'];
            $image_temp_location    = $_FILES['file']['tmp_name'];
            $upload_directory       = UPLOAD_DIRECTORY.DS.$product_image;

            if(empty($product_image)){
                $get_pic = utility::query("SELECT product_image FROM products WHERE product_id =" .utility::escape_string($_GET['id'])."");
               utility::confirm($get_pic);

                while($pic = utility::fetch_array($get_pic)){
                    $product_image = $pic['product_image'];
                }
            }        

            move_uploaded_file($image_temp_location, $upload_directory);

            $query = "UPDATE products SET ";
            $query .= "product_title        = '{$product_title}'        , ";
            $query .= "product_category_id  = '{$product_category_id}'  , ";
            $query .= "product_price        = '{$product_price}'        , ";
            $query .= "product_description  = '{$product_description}'  , ";
            $query .= "short_description    = '{$product_short_desc}'   , ";
            $query .= "product_quantity     = '{$product_quantity}'     , ";
            $query .= "product_image        = '{$product_image}'          ";
            $query .= "WHERE product_id = " . utility::escape_string($_GET['id']);

            $send_update_query = utility::query($query);
            utility::confirm($send_update_query);
            utility::set_message('Product has been updated.');
            utility::redirect("index.php?products");
        }//if(isset($_POST['update']))
    }//update_product()

    public function get_content_for_edit_form(){
        global $database;

        $query = $database->query("SELECT * FROM products WHERE product_id = " . utility::escape_string($_GET['id']) . " ");
        $database->confirm($query);

        while($row = utility::fetch_array($query)){
            $this->product_title          = utility::escape_string($row['product_title']);
            $this->product_category_id    = utility::escape_string($row['product_category_id']);
            $this->product_price          = utility::escape_string($row['product_price']);
            $this->product_description    = utility::escape_string($row['product_description']);
            $this->product_short_desc     = utility::escape_string($row['short_description']);
            $this->product_quantity       = utility::escape_string($row['product_quantity']);
            $this->product_image          = utility::display_image($row['product_image']);
        }
    }

    public function add_product(){
        if(isset($_POST['publish'])){
            $product_title          = utility::escape_string($_POST['product_title']);
            $product_category_id    = utility::escape_string($_POST['product_category_id']);
            $product_price          = utility::escape_string($_POST['product_price']);
            $product_description    = utility::escape_string($_POST['product_description']);
            $product_short_desc     = utility::escape_string($_POST['product_short_desc']);
            $product_quantity       = utility::escape_string($_POST['product_quantity']);
            $product_image          = $_FILES['file']['name'];
            $image_temp_location    = $_FILES['file']['tmp_name'];
            $upload_directory       = UPLOAD_DIRECTORY.DS.$product_image;

            move_uploaded_file($image_temp_location, $upload_directory);
            
            $query = utility::query("INSERT INTO products(product_title, product_category_id, product_price, product_description, short_description, product_quantity, product_image) 
                            VALUES('{$product_title}','{$product_category_id}','{$product_price}','{$product_description}','{$product_short_desc}','{$product_quantity}','{$product_image}')");
            $last_id = utility::last_id();
            utility::confirm($query);
            utility::set_message('New product with ID {$last_id} was added!');
            utility::redirect("index.php?products");
        }
    }//add_product()
}//class products
?>