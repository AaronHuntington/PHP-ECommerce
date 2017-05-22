<?php
    require_once("../../resources/config.php"); 
    seo::set_pageTitle('home_page');
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

