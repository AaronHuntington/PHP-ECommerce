<?php

class products{

    function get_products(){
        global $database;
        $query = $database->query("SELECT * FROM  products");
        $database->confirm($query);

        $pagination                 = new pagination;
        $pagination->page           = $_GET['page'];
        $pagination->total_products = mysqli_num_rows($query);
        $pagination->start();
    } //get_products() 

    function get_products_in_category_page(){
        global $database;

        $query = $database->query("SELECT * FROM  products WHERE product_category_id = ".utility::escape_string($_GET['id'])."");
        $database->confirm($query);

        while($row = utility::fetch_array($query)){

            $product_image = display_image($row['product_image']);

$product = <<<DELIMETER
<div class="col-md-3 col-sm-6 hero-feature">
    <div class="thumbnail">
        <a href="item.php?id={$row['product_id']}">
            <img src="../resources//{$product_image}" alt="">
        </a>
        <div class="caption">
            <h3>{$row['product_title']}</h3>
            <p>{$row['short_description']}</p>
            <p>
                <a href="../resources/cart.php?add={$row['product_id']}" class="btn btn-primary">
                    Buy Now!
                </a> 
                <a href="item.php?id={$row['product_id']}" class="btn btn-default">
                    More Info
                </a>
            </p>
        </div>
    </div>
</div>
DELIMETER;
            echo $product;
        }
    } //get_products_in_category_page()

    function get_products_in_shop_page(){
        $query = query("SELECT * FROM  products");
        confirm($query);

        while($row = fetch_array($query)){

            $product_image = display_image($row['product_image']);

$product = <<<DELIMETER

<div class="col-md-3 col-sm-6 hero-feature">
    <div class="thumbnail">
        <a href="item.php?id={$row['product_id']}">
            <img src="../resources/{$product_image}" alt="">
        </a>
        <div class="caption">
            <h3>{$row['product_title']}</h3>
            <p>{$row['short_description']}</p>
            <p>
                <a href="../resources/cart.php?add={$row['product_id']}" class="btn btn-primary">
                    Buy Now!
                </a> 
                <a href="item.php?id={$row['product_id']}" class="btn btn-default">
                    More Info
                </a>
            </p>
        </div>
    </div>
</div>

DELIMETER;

            echo $product;

        }
    } //get_products_in_shop_page()


}
?>