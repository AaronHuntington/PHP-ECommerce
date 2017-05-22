<?php 
    $mfg = new mfg_admin;
    $mfg->add_mfg();
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
                <label for="mfg_title">Page Title</label>
                <input type="text" name="mfg_title" class="form-control">
            </div>
            <input type="submit" name="publish" class="btn btn-primary btn-lg" value="Publish">
        </div><!--Main Content-->
    </form>
</div><!-- /.container-fluid -->