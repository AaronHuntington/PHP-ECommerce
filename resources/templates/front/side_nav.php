<div class="col-md-3">
    <p class="lead">Shop Name</p>
    <div class="list-group">
        <?php
            $categories = new categories;
            $categories->get_categories_sideNav();
        ?>
    </div>
</div>