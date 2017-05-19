<?php 
    $seo = new seo_admin;
    // $seo->update_product();
    $seo->get_content_for_edit_form();
    $seo->update_seo();

    $page_name          = $seo->page_name;        
    $main_title         = $seo->main_title;      
    $meta_title         = $seo->meta_title;       
    $meta_description   = $seo->meta_description; 
    $meta_keywords      = $seo->meta_keywords;    
?>
<div class="col-md-12">
    <div class="row">
        <h1 class="page-header">
            SEO Header: <?php echo $page_name;?>
        </h1>
    </div>
    <form action="" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="page_name" class="form-control" value="<?php echo $page_name; ?>">
        <div class="col-md-6">
            <div class="form-group">
                <label for="main_title">Main Title</label>
                <input type="text" name="main_title" class="form-control" value="<?php echo $main_title; ?>">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="meta_title">Meta Title</label>
                <input type="text" name="meta_title" class="form-control" value="<?php echo $meta_title; ?>">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="meta_description">Meta Description</label>
                <textarea name="meta_description" id="" cols="30" rows="10" class="form-control"><?php echo trim($meta_description); ?></textarea>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="meta_keywords">Meta keywords</label>
                <textarea name="meta_keywords" id="" cols="30" rows="10" class="form-control"><?php echo trim($meta_keywords); ?></textarea>
            </div>
        </div>
        <input type="submit" name="update" class="btn btn-primary btn-lg" value="Update">
    </form>
</div><!-- /.container-fluid -->