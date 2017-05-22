<?php 
    require_once('../../resources/config.php');
    include(TEMPLATE_BACK . "/header.php");

    if(!isset($_SESSION['username'])){
        utility::redirect("../../public/");
    }
?>


        <div id="page-wrapper">

            <div class="container-fluid">

                <?php
                    if($_SERVER['REQUEST_URI'] == "/gitHub/PHP-Ecommerce/public/admin/" ||
                       $_SERVER['REQUEST_URI'] == "/gitHub/PHP-Ecommerce/public/admin/index.php"){
                        include(TEMPLATE_BACK . "/admin_content.php");
                    }

                    if(isset($_GET['orders'])){
                        include(TEMPLATE_BACK."/orders.php");
                    }
                    if(isset($_GET['products'])){
                        include(TEMPLATE_BACK."/products.php");
                    }
                    if(isset($_GET['add_product'])){
                        include(TEMPLATE_BACK."/add_product.php");
                    }
                    if(isset($_GET['categories'])){
                        include(TEMPLATE_BACK."/categories.php");
                    }
                    if(isset($_GET['edit_product'])){
                        include(TEMPLATE_BACK."/edit_product.php");
                    }
                    if(isset($_GET['users'])){
                        include(TEMPLATE_BACK."/users.php");
                    }
                    if(isset($_GET['add_user'])){
                        include(TEMPLATE_BACK."/add_user.php");
                    }
                    if(isset($_GET['edit_user'])){
                        include(TEMPLATE_BACK."/edit_user.php");
                    }
                    if(isset($_GET['reports'])){
                        include(TEMPLATE_BACK."/reports.php");
                    }
                    if(isset($_GET['slides'])){
                        include(TEMPLATE_BACK."/slides.php");
                    }
                    if(isset($_GET['seoHeader'])){
                        include(TEMPLATE_BACK."/seo.php");
                    }
                    if(isset($_GET['add_seoHeader'])){
                        include(TEMPLATE_BACK."/add_seoHeader.php");
                    }
                    if(isset($_GET['edit_seoHeader'])){
                        include(TEMPLATE_BACK."/edit_seoHeader.php");
                    }
                    if(isset($_GET['mfg'])){
                        include(TEMPLATE_BACK."/mfg.php");
                    }
                    if(isset($_GET['add_mfg'])){
                        include(TEMPLATE_BACK."/add_mfg.php");
                    }
                ?>
            </div><!-- /.container-fluid -->
        </div><!-- /#page-wrapper -->
<?php include(TEMPLATE_BACK . "/footer.php"); ?>