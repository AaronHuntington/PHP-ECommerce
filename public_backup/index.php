<?php
    require_once("../resources/config.php"); 
    seo::set_pageTitle('home_page');
    include(TEMPLATE_FRONT . DS . "header.php");
?>
    <div class="container">
        <div class="row">
            <?php include(TEMPLATE_FRONT . DS . "side_nav.php"); ?>
            <div class="col-md-9">
                <div class="row carousel-holder">
                    <div class="col-md-12">

                        <?php 
                            include(TEMPLATE_FRONT . DS . "slider.php"); 

                            //5/16/17, Tried to get this class and function work but no.
                            // $slider = new home_slider;
                            // $slider->slider_html();
                        ?>
                    </div>
                </div>
                <div class="row">
                    <?php  
                        $products = new products;
                        $products->get_products();
                    ?>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container -->
<?php include(TEMPLATE_FRONT . DS . "footer.php"); ?>


    
