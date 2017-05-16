<?php
    $upload_directory = "uploads";

    ///////////////////////////
    //Helper Function - START
    // function last_id(){
    //     global $connection;
    //     return mysqli_insert_id($connection);
    // }
    // function set_message($msg){
    //     if(!empty($msg)){
    //         $_SESSION['message'] = $msg;
    //     } else {
    //         $msg = "not work";
    //         $_SESSION['message'] = $msg;
    //     }
    // }
    // function display_message(){
    //     if(isset($_SESSION['message'])){
    //         echo $_SESSION['message'];
    //         unset($_SESSION['message']);
    //     }
    // }
    // function redirect($location){
    //     header("Location: $location ");
    // }
    // function query($sql){
    //     //Lets the function know that you are using a global variable inside its function. 
    //     global $connection;
    //     return mysqli_query($connection, $sql);
    // }
    // function confirm($result){
    //     global $connection; 
    //     if(!$result){
    //         die("QUERY FAILED " . mysqli_error($connection));
    //     }
    // }
    // function escape_string($string){
    //     global $connection;
    //     return mysqli_real_escape_string($connection, $string);
    // }
    // function fetch_array($result){
    //     return mysqli_fetch_array($result);
    // }
        //Helper Functions - END
        /////////////////////////

    /*********************************************
            Front End Function - START
*********************************************/
    //////////////////////
    //Get Product - START
    // function get_products(){
    //     $query =utility::query("SELECT * FROM  products");
    //    utility::confirm($query);

    //     $pagination                 = new pagination;
    //     $pagination->page           = $_GET['page'];
    //     $pagination->total_products = mysqli_num_rows($query);
    //     $pagination->start();
    // } //get_products()

//     function get_categories(){
//         $query =utility::query("SELECT * FROM categories");
//        utility::confirm($query);

//         while($row = mysqli_fetch_array($query)){
//             // echo "<a href='' class='list-group-item'>{$row['cat_title']}</a>";

// $category_links = <<<DELIMETER

// <a href='category.php?id={$row['cat_id']}' class='list-group-item'>{$row['cat_title']}</a>

// DELIMETER;
        
//             echo $category_links;
//         }

    // }//get_categories

//     function get_products_in_category_page(){
//         $query =utility::query("SELECT * FROM  products WHERE product_category_id = ".escape_string($_GET['id'])."");
//        utility::confirm($query);

//         while($row = utility::fetch_array($query)){

//             $product_image = display_image($row['product_image']);

// $product = <<<DELIMETER

// <div class="col-md-3 col-sm-6 hero-feature">
//     <div class="thumbnail">
//         <a href="item.php?id={$row['product_id']}">
//             <img src="../resources//{$product_image}" alt="">
//         </a>
//         <div class="caption">
//             <h3>{$row['product_title']}</h3>
//             <p>{$row['short_description']}</p>
//             <p>
//                 <a href="../resources/cart.php?add={$row['product_id']}" class="btn btn-primary">
//                     Buy Now!
//                 </a> 
//                 <a href="item.php?id={$row['product_id']}" class="btn btn-default">
//                     More Info
//                 </a>
//             </p>
//         </div>
//     </div>
// </div>

// DELIMETER;

//             echo $product;

//         }
//     } //get_products_in_category_page()

//     function get_products_in_shop_page(){
//         $query =utility::query("SELECT * FROM  products");
//        utility::confirm($query);

//         while($row = utility::fetch_array($query)){

//             $product_image = display_image($row['product_image']);

// $product = <<<DELIMETER

// <div class="col-md-3 col-sm-6 hero-feature">
//     <div class="thumbnail">
//         <a href="item.php?id={$row['product_id']}">
//             <img src="../resources/{$product_image}" alt="">
//         </a>
//         <div class="caption">
//             <h3>{$row['product_title']}</h3>
//             <p>{$row['short_description']}</p>
//             <p>
//                 <a href="../resources/cart.php?add={$row['product_id']}" class="btn btn-primary">
//                     Buy Now!
//                 </a> 
//                 <a href="item.php?id={$row['product_id']}" class="btn btn-default">
//                     More Info
//                 </a>
//             </p>
//         </div>
//     </div>
// </div>

// DELIMETER;

//             echo $product;

//         }
//     } //get_products_in_shop_page()

    // function login_user(){

    //     if(isset($_POST['submit'])){
    //         $username = utility::escape_string($_POST['username']);
    //         $password = utility::escape_string($_POST['password']);

    //         $query =utility::query("SELECT * FROM users WHERE username='{$username}' AND password='{$password}'" );
    //        utility::confirm($query);

    //         if(mysqli_num_rows($query) == 0){
    //             set_message("Your Password or Username are wrong.");
    //             redirect("login.php");
    //         } else {
    //             $_SESSION['username'] = $username;
    //             // set_message('Welcome to Admin {$username}!');
    //             redirect("admin");
    //         }
    //     }
    // }

    // function send_message(){
    //     if(isset($_POST['submit'])){
    //         $to         = "YOUR_EMAIL@gmail.com";
    //         $from_name  = $_POST['name'];
    //         $subject    = $_POST['subject'];
    //         $email      = $_POST['email'];
    //         $message    = $_POST['message'];

    //         $headers = "From: {$from_name} {$email}";

    //         $result = mail($to, $subject, $message, $headers);

    //         if(!$result){
    //             set_message("Sorry we could not send your message.");
    //             redirect("contact.php");
    //         } else {
    //             set_message("Your message has been sent.");
    //         }
    //     }
    // }

/*********************************************
        Front End Function - END
*********************************************/

//     function display_orders(){

//         $query = utility::query("SELECT * FROM orders");
//         utility::confirm($query);

//         while($row = utility::fetch_array($query)){

// $orders = <<<DELIMETER
// <tr>    
//     <td>{$row['order_id']}</td>
//     <td>{$row['order_amount']}</td>
//     <td>{$row['order_transaction']}</td>
//     <td>{$row['order_currency']}</td>
//     <td>{$row['order_status']}</td>
//     <td>    
//         <a 
//          class="btn btn-danger" 
//          href="../../resources/templates/back/delete_order.php?id={$row['order_id']}">
//             <span class="glyphicon glyphicon-remove">
//             </span>
//         </a>
//     </td>
// </tr>
// DELIMETER;

//         echo $orders;
//         } //While Loop
//     }

/********* Admin Products *********/
function display_image($picture){
    global $upload_directory;

    return $upload_directory.DS.$picture;
}

// function get_products_in_admin(){
//     $query = utility::query("SELECT * FROM  products");
//         utility::confirm($query);

//         while($row = utility::fetch_array($query)){

//             $category = show_product_category_title($row['product_category_id']);

//             $product_image = display_image($row['product_image']);

// $product = <<<DELIMETER

// <tr>
//     <td>{$row['product_id']}</td>
//     <td>{$row['product_title']}<br>
//         <a href="index.php?edit_product&id={$row['product_id']}">
//             <img src="../../resources/{$product_image}" alt="" width="100">
//         </a>
//     </td>
//     <td>{$category}</td>
//     <td>{$row['product_price']}</td>
//     <td>{$row['product_quantity']}</td>
//     <td>    
//         <a 
//          class="btn btn-danger" 
//          href="../../resources/templates/back/delete_product.php?id={$row['product_id']}">
//             <span class="glyphicon glyphicon-remove">
//             </span>
//         </a>
//     </td>
// </tr>

// DELIMETER;
//             echo $product;
//         }
// }

// function show_product_category_title($product_category_id){

//     $category_query = utility::query("SELECT * FROM categories WHERE cat_id = '{$product_category_id}'");
//     utility::confirm($category_query);

//     while($category_row = utility::fetch_array($category_query)){
//         return $category_row['cat_title']; 
//     }

// }

/********* Add Products in Admin *********/

// function add_product(){
//     if(isset($_POST['publish'])){
//         $product_title          = utility::escape_string($_POST['product_title']);
//         $product_category_id    = utility::escape_string($_POST['product_category_id']);
//         $product_price          = utility::escape_string($_POST['product_price']);
//         $product_description    = utility::escape_string($_POST['product_description']);
//         $product_short_desc     = utility::escape_string($_POST['product_short_desc']);
//         $product_quantity       = utility::escape_string($_POST['product_quantity']);
//         $product_image          = $_FILES['file']['name'];
//         $image_temp_location    = $_FILES['file']['tmp_name'];
//         $upload_directory       = UPLOAD_DIRECTORY.DS.$product_image;

//         move_uploaded_file($image_temp_location, $upload_directory);
        
//         $query = utility::query("INSERT INTO products(product_title, product_category_id, product_price, product_description, short_description, product_quantity, product_image) 
//                         VALUES('{$product_title}','{$product_category_id}','{$product_price}','{$product_description}','{$product_short_desc}','{$product_quantity}','{$product_image}')");
//         $last_id = utility::last_id();
//         utility::confirm($query);
//         utility::set_message('New product with ID {$last_id} was added!');
//         utility::redirect("index.php?products");
//     }
// }

// function show_categories_add_product_page(){
//     $query = utility::query("SELECT * FROM categories");
//     utility::confirm($query);

//     while($row = mysqli_fetch_array($query)){
//         // echo "<a href='' class='list-group-item'>{$row['cat_title']}</a>";

// $category_options = <<<DELIMETER

// <option value="{$row['cat_id']}">{$row['cat_title']}</option>

// DELIMETER;
    
//         echo $category_options;
//     }

// }//show_categories_add_product_page()

/***************** Updating Product **************************/
// function update_product(){
//     if(isset($_POST['update'])){
//         $product_title          = utility::escape_string($_POST['product_title']);
//         $product_category_id    = utility::escape_string($_POST['product_category_id']);
//         $product_price          = utility::escape_string($_POST['product_price']);
//         $product_description    = utility::escape_string($_POST['product_description']);
//         $product_short_desc     = utility::escape_string($_POST['product_short_desc']);
//         $product_quantity       = utility::escape_string($_POST['product_quantity']);
//         $product_image          = $_FILES['file']['name'];
//         $image_temp_location    = $_FILES['file']['tmp_name'];
//         $upload_directory       = UPLOAD_DIRECTORY.DS.$product_image;

//         if(empty($product_image)){
//             $get_pic = utility::query("SELECT product_image FROM products WHERE product_id =" .utility::escape_string($_GET['id'])."");
//            utility::confirm($get_pic);

//             while($pic = utility::fetch_array($get_pic)){
//                 $product_image = $pic['product_image'];
//             }
//         }        

//         move_uploaded_file($image_temp_location, $upload_directory);

//         $query = "UPDATE products SET ";
//         $query .= "product_title        = '{$product_title}'        , ";
//         $query .= "product_category_id  = '{$product_category_id}'  , ";
//         $query .= "product_price        = '{$product_price}'        , ";
//         $query .= "product_description  = '{$product_description}'  , ";
//         $query .= "short_description    = '{$product_short_desc}'   , ";
//         $query .= "product_quantity     = '{$product_quantity}'     , ";
//         $query .= "product_image        = '{$product_image}'          ";
//         $query .= "WHERE product_id = " . utility::escape_string($_GET['id']);

//         $send_update_query = utility::query($query);
//         utility::confirm($send_update_query);
//         utility::set_message('Product has been updated.');
//         utility::redirect("index.php?products");
//     }
// }

/***************** Categories in Admin **************************/
// function show_categories_in_admin(){
//     $category_query = utility::query("SELECT * FROM categories");
//    utility::confirm($category_query);

//     while($row = utility::fetch_array($category_query)){
//         $cat_id = $row['cat_id'];
//         $cat_title = $row['cat_title'];

// $category = <<<DELIMETER

// <tr>
//     <td>{$cat_id}</td>
//     <td>{$cat_title}</td>
//     <td>    
//         <a 
//          class="btn btn-danger" 
//          href="../../resources/templates/back/delete_category.php?id={$row['cat_id']}">
//             <span class="glyphicon glyphicon-remove">
//             </span>
//         </a>
//     </td>
// </tr>

// DELIMETER;

//         echo $category;
//     }
// }

// function add_category(){
//     if(isset($_POST['add_category'])){
//         $cat_title = utility::escape_string($_POST['cat_title']);

//         if(empty($cat_title) || $cat_title == " "){
//             echo "<p class='bg-danger'>This cannot be empty.</p>";
//         } else {

//             $insert_cat = utility::query("INSERT INTO categories(cat_title) VALUES('{$cat_title}')");
//             utility::confirm($insert_cat);
//             utility::set_message("Category Created.");
//         }
//     }
// }

/***************** Admin Users **************************/
// function display_users(){
//     $category_query = utility::query("SELECT * FROM users");
//    utility::confirm($category_query);

//     while($row = utility::fetch_array($category_query)){
//         $user_id    = $row['user_id'];
//         $username   = $row['username'];
//         $email      = $row['email'];
//         $password   = $row['password'];

// $user = <<<DELIMETER

// <tr>
//     <td>{$user_id}</td>
//     <td>{$username}</td>
//     <td>{$email}</td>
//     <td>    
//         <a 
//          class="btn btn-danger" 
//          href="../../resources/templates/back/delete_user.php?id={$row['user_id']}">
//             <span class="glyphicon glyphicon-remove">
//             </span>
//         </a>
//     </td>
// </tr>

// DELIMETER;

//         echo $user;
//     }
// }
// function add_user(){
//     if(isset($_POST['add_user'])){
//         $username   = utility::escape_string($_POST['username']);
//         $email      = utility::escape_string($_POST['email']);
//         $password   = utility::escape_string($_POST['password']);
//         $user_photo = utility::escape_string($_FILES['file']['name']);
//         $photo_temp = utility::escape_string($_FILES['file']['tmp_name']);

//         move_uploaded_file($photo_temp, UPLOAD_DIRECTORY.DS.$user_photo);

//         $query = utility::query("INSERT INTO users(username,email,password,user_photo) VALUES('{$username}','{$email}','{$password}','{$user_photo}')");
//         utility::confirm($query);

//         utility::set_message("User Created.");

//         utility::redirect("index.php?users");
//     }
// }

// function get_reports(){
//     $query = utility::query("SELECT * FROM  reports");
//         utility::confirm($query);

//         while($row = utility::fetch_array($query)){

// $report = <<<DELIMETER

// <tr>
//     <td>{$row['report_id']}</td>
//     <td>{$row['product_id']}</td>
//     <td>{$row['order_id']}</td>
//     <td>{$row['product_price']}</td>
//     <td>{$row['product_title']}</td>
//     <td>{$row['product_quantity']}</td>
//     <td>    
//         <a 
//          class="btn btn-danger" 
//          href="../../resources/templates/back/delete_report.php?id={$row['report_id']}">
//             <span class="glyphicon glyphicon-remove">
//             </span>
//         </a>
//     </td>
// </tr>

// DELIMETER;

//             echo $report;

//         }
// }

/************ Home Slider Functions **************/

function add_slides(){
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
}

function get_current_slide_in_admin(){
    $query =utility::query("SELECT * FROM slides ORDER BY slide_id DESC LIMIT 1");
   utility::confirm($query);

    while($row = utility::fetch_array($query)){

        $slide_image = display_image($row['slide_image']);

$slide_active_admin = <<< DELIMETER

    <img class="img-responsive" src="../../resources/{$slide_image}" alt="">    

DELIMETER;

        echo $slide_active_admin;
    }
}

function get_active_slide(){
    global $database;

    $query = $database->query("SELECT * FROM slides ORDER BY slide_id DESC LIMIT 1");
    $database->confirm($query);

    while($row = utility::fetch_array($query)){

        $slide_image = display_image($row['slide_image']);

$slide_active = <<< DELIMETER

<div class="item active">
    <img class="slide-image" src="../resources/{$slide_image}" alt="">
</div>
    

DELIMETER;

        echo $slide_active;
    }
}

function get_slides(){
    global $database;

    $query = $database->query("SELECT * FROM slides");
    $database->confirm($query);

    while($row = utility::fetch_array($query)){

        $slide_image = display_image($row['slide_image']);

$slides = <<< DELIMETER

<div class="item">
    <img class="slide-image" src="../resources/{$slide_image}" alt="">
</div>
    

DELIMETER;

        echo $slides;
    }
}

function get_slide_thumbnails(){
    $query =utility::query("SELECT * FROM slides ORDER BY slide_id ASC");
   utility::confirm($query);

    while($row = utility::fetch_array($query)){

        $slide_image = display_image($row['slide_image']);

$slide_thumb_admin = <<< DELIMETER

<div class="col-xs-6 col-md-3 image_container">
    <a href="index.php?delete_slide_id={$row['slide_id']}">
        <img  class="img-responsive slide_image" src="../../resources/{$slide_image}" alt=""> 
    </a>
    <div class="caption">
        <p>{$row['slide_title']}</p>
    </div>
</div>  

DELIMETER;

        echo $slide_thumb_admin;
    }
}
?>