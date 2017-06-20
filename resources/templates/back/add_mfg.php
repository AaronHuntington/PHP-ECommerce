<?php 
    $mfg = new mfg_admin;
    $mfg->add_mfg();
    // $mfg->set_imgFile();
?>
<div class="col-md-12">
    <div class="row">
        <h1 class="page-header">
            Add Manufacture
        </h1>
    </div>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="col-md-8">
            <div class="form-group">
                <label for="mfg">Manufacture</label>
                <input type="text" name="mfg" class="form-control">
            </div>
            <div class="form-group">
                <label for="mfg_title">MFG Title</label>
                <input type="text" name="mfg_title" class="form-control">
            </div>
            <div class="form-group">
                <label for="logo_img">Logo Image</label>
                <input type="file" name="logo_img" class="form-control">
            </div>
         <!--    <div class="form-group">
                <label for="intro_img">Intro Image</label>
                <input type="file" name="intro_img" class="form-control">
            </div> -->

            <!-- <div class="form-group">
                <label for="main_title">Main Title </label>
                <input type="text" name="main_title" class="form-control">
            </div>
            <div class="form-group">
                <label for="meta_title">Meta Title</label>
                <textarea name="meta_title" id="" cols="30" rows="10" class="form-control"></textarea>
            </div>
            <div class="form-group">
                <label for="meta_description">Meta Description</label>
                <textarea name="meta_description" id="" cols="30" rows="10" class="form-control"></textarea>
            </div>
            <div class="form-group">
                <label for="meta_keywords">Meta Keywords</label>
                <textarea name="meta_keywords" id="" cols="30" rows="10" class="form-control"></textarea>
            </div> -->

         
            <input type="submit" name="publish" class="btn btn-primary btn-lg" value="Publish">
        </div><!--Main Content-->
    </form>
</div><!-- /.container-fluid -->