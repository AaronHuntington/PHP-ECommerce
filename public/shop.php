<?php 
    require_once("../resources/config.php"); 
    include(TEMPLATE_FRONT . DS . "header.php");
?>
    <div class="container">
        <header>
            <h1>Shop</h1>
        </header>
        <hr>
        <div class="row text-center">
            <?php 
                $products = new products;
                $products->get_products_in_shop_page();
            ?>
        </div>
<?php include(TEMPLATE_FRONT . DS . "footer.php"); ?>
