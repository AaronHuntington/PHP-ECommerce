<?php
    require_once("../../resources/config.php"); 
    seo::set_pageTitle('testMFG');
    include(TEMPLATE_FRONT . DS . "header.php");
    $mfg = new mfg;
?>
    <div class="container borderRed">
        <div class="row">
            <?php include(TEMPLATE_FRONT . DS . "side_nav.php"); ?>
            <div class="col-md-9">
                <div class="col-md-12 borderRe">
                    <h1>
                        <img width="50" src="<?php $mfg->get_mfg_logo("testMFG") ?>" style="margin: -10px 0 0 0;">
                        testTitle
                    </h1>
                </div>
                <div class="col-md-12">
                    <img height="400" class="img-responsive" width="800" src="<?php $mfg->get_mfg_intro_img("testMFG") ?>">
                </div>
            </div>
        </div>
    </div>
    <!-- /.container -->
<?php include(TEMPLATE_FRONT . DS . "footer.php"); ?>    
