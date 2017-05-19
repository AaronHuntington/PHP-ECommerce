<?php
    $seo = new seo_admin;
    $seo->del_seoHeader();
?>
<div class="col-md-12">
    <div class="row">
        <h1 class="page-header">
            SEO Headers
            <a class="btn btn-default" href="index.php?add_seoHeader" role="button">
                ADD
            </a>
        </h1>
        <h4 class="bg-success">
            <?php utility::display_message();?>
        </h4>
    </div>
    <div class="row">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Page</th>
                    <th>Name</th> 
                    <th>Content</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    $seo->display_header_seo();
                ?>
            </tbody>
        </table>
    </div>