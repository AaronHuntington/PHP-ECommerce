<?php 
    $seo = new seo_admin;
    $seo->add_seoHeader();
?>
<div class="col-md-12">
    <div class="row">
        <h1 class="page-header">
            Add Seo Header
        </h1>
    </div>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="col-md-3">
            <div class="form-group">
                <label for="page_name">Page name </label>
                <input type="text" name="page_name" class="form-control">
            </div>
            <div class="form-group">
                <label for="main_title">Main Title </label>
                <input type="text" name="main_title" class="form-control">
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="meta_title">Meta Title</label>
                <textarea name="meta_title" id="" cols="30" rows="10" class="form-control"></textarea>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="meta_description">Meta Description</label>
                <textarea name="meta_description" id="" cols="30" rows="10" class="form-control"></textarea>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="meta_keywords">Meta Keywords</label>
                <textarea name="meta_keywords" id="" cols="30" rows="10" class="form-control"></textarea>
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group" style="float:right;">
                <input type="submit" name="publish" class="btn btn-primary btn-lg" value="Publish">
            </div>
        </div>
        
            
      
    </form>
</div><!-- /.container-fluid -->