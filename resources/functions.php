<?php
    ///////////////////////////
    //Helper Function - START
    function redirect($location){
        header("Location: $location ");
    }
    function query($sql){
        //Lets the function know that you are using a global variable inside its function. 
        global $connection;
        return mysqli_query($connection, $sql);
    }
    function confirm($result){
        global $connection; 
        if(!$result){
            die("QUERY FAILED " . mysqli_error($connection));
        }
    }
    function escape_string($string){
        global $connection;
        return mysqli_real_escape_string($connection, $string);
    }
    function fetch_array($result){
        return mysqli_fetch_array($result);
    }
    //Helper Functions - END
    /////////////////////////


    //////////////////////
    //Get Product - START
    function get_products(){
        $query = query("SELECT * FROM  products");
        confirm($query);

        while($row = fetch_array($query)){

$product = <<<DELIMETER

<div class="col-sm-4 col-lg-4 col-md-4">
    <div class="thumbnail">
        <a href="item.php?id={$row["product_id"]}">
            <img src="{$row['product_image']}" alt="">
        </a>
        <div class="caption">
            <h4 class="pull-right">&#36;{$row['product_price']}</h4>
            <h4><a href="product.html">{$row['product_title']}</a>
            </h4>
            <p>See more snippets like this online store item at <a target="_blank" href="http://www.bootsnipp.com">Bootsnipp - http://bootsnipp.com</a>.</p>
        </div>
        <a class="btn btn-primary" href="item.php?id={$row["product_id"]}">Add To Cart</a>
    </div>
</div>

DELIMETER;

            echo $product;

        }
    }
    //Get Products - END 
    /////////////////////

    function get_categories(){
        $query = query("SELECT * FROM categories");
        confirm($query);

        while($row = mysqli_fetch_array($query)){
            // echo "<a href='' class='list-group-item'>{$row['cat_title']}</a>";

$category_links = <<<DELIMETER

<a href='category.php?id={$row['cat_id']}' class='list-group-item'>{$row['cat_title']}</a>

DELIMETER;
        
            echo $category_links;
        }

    }

?>