<?php 
    $users = new users;
    $users->add_user();
?>
<div class="col-md-12">
    <div class="row">
        <h1 class="page-header">
            Add User
        </h1>
    </div>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="col-md-8">
            <div class="form-group">
                <label for="username">Username </label>
                <input type="text" name="username" class="form-control">
            </div>
            <div class="form-group">
                <label for="email">Email </label>
                <input type="email" name="email" class="form-control">
            </div>
            <div class="form-group">
                <label for="password">Password </label>
                <input type="password" name="password" class="form-control">
            </div>
            <div class="form-group">
                <input type="file" name="user_image">
            </div>
            <div class="form-group">
                <input type="submit" name="add_user" class="btn btn-warning btn-lg" value="Add User">
            </div>
        </div>
    </form>
</div><!-- /.container-fluid -->