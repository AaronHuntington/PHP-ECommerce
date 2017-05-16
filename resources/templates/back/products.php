<?php
    $products = new products_admin;
    $products->delete_product();
?>
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <h1 class="page-header">
                All Products
            </h1>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Category</th>
                        <th>Price</th>
                        <th>Quantity</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        $products->get_products();
                    ?>
                </tbody>
            </table>
        </div>
    </div><!-- /.container-fluid -->
</div><!-- /#page-wrapper -->