<?php 
    $mfg = new mfg_admin;
    $mfg->update_mfg();

    $mfg->id = $_GET["id"];

    $mfg->get_content_for_editForm();

    $mfg_id    = $mfg->id;
    $mfg_title  = $mfg->mfg_title;
    $mfg_name   = $mfg->mfg;
?>
<div class="col-md-12">
    <div class="row">
        <h1 class="page-header">
            Edit Manufacture
        </h1>
    </div>
    <form action="" method="POST" enctype="multipart/form-data">
        <div class="col-md-12">
            <div class="form-group">
                <label for="mfg_name">MFG Name </label>
                <input type="text" name="mfg_name" class="form-control" value="<?php echo $mfg_name; ?>">
            </div>
            <div class="form-group">
                <label for="mfg_title">MFG Title</label>
                <textarea name="mfg_title" id="" cols="30" rows="10" class="form-control"><?php echo $mfg_title; ?></textarea>
            </div>
            <div class="form-group">
                <label for="intro_img_file">Intro Image</label>
                <input type="file" name="intro_img_file">
            </div>
            <div class="form-group">
                <input type="submit" name="update" class="btn btn-primary btn-lg" value="Update">
            </div>
        </div><!--Main Content-->
    </form>
</div><!-- /.container-fluid -->