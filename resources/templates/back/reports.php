<?php
    $reports = new reports;
?>
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <h1 class="page-header">
                Reports
            </h1>
            <p class="bg-success"><?php utility::display_message();?></p>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Product ID</th>
                        <th>Order ID</th>
                        <th>Price</th>
                        <th>Product Title</th>
                        <th>Quantity</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        $reports->get_reports();
                    ?>
                </tbody>
            </table>
        </div>
    </div><!-- /.container-fluid -->
</div><!-- /#page-wrapper -->