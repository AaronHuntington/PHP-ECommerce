<?php 
    require_once("../resources/config.php"); 
    include(TEMPLATE_FRONT . DS . "header.php");
?>

    <!-- Page Content -->
    <div class="container">

        <!-- Jumbotron Header -->
        <header>
            <h1>Shop</h1>
        </header>

        <hr>
        <!-- Page Features -->
        <div class="row text-center">

           <!--  <div class="col-md-3 col-sm-6 hero-feature">
                <div class="thumbnail">
                    <img src="http://placehold.it/800x500" alt="">
                    <div class="caption">
                        <h3>Feature Label</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                        <p>
                            <a href="#" class="btn btn-primary">Buy Now!</a> <a href="#" class="btn btn-default">More Info</a>
                        </p>
                    </div>
                </div>
            </div> -->0

            <?php get_products_in_shop_page(); ?>
        </div>
        <!-- /.row -->

<?php include(TEMPLATE_FRONT . DS . "footer.php"); ?>
