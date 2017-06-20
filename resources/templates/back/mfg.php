<?php
    $mfg = new mfg_admin;
    $mfg->del_mfg();

    // $mfg->id = 1;
    // $mfg->set_classVars_byId();
?>
<div class="col-md-12">
    <div class="row">
        <h1 class="page-header">
            Manufacture Pages
            <a class="btn btn-default" href="index.php?add_mfg" role="button">
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
                    <th>ID</th>
                    <th>MFG</th> 
                    <th>Title</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    $mfg->display_mfgs();
                ?>
            </tbody>
        </table>
    </div>