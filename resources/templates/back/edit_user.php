<?php  
    if(empty($_GET['id'])){
        redirect("users.php");
    } 

    $user = users::find_by_id($_GET['id']);

    if(isset($_POST['update'])){
        // if($user) {
            $user->id  = $_POST['id'];
            $user->username = $_POST['username'];
            $user->email    = $_POST['email'];
            $user->password = $_POST['password'];

            $user->save();
            utility::redirect('index.php?users');
        
            // if(empty($_FILES['user_image'])){
            //     $user->save();
            //     $session->message("The user has been updated.");
            //     redirect("users.php");
            // } else {
            //     $user->set_file($_FILES['user_image']);
            //     $user->upload_photo();
            //     $user->save();
            //     $session->message("The user has been updated.");

            //     // redirect("edit_user.php?id={$user->id}");
            //     redirect("users.php");
            // }

            // $user->set_file($_FILES['user_image']);
            // $user->save_user_and_image();
        // }
    }
?>
<div class="col-md-12">
    <div class="row">
        <h1 class="page-header">
            Edit Product
        </h1>
    </div>
    <form action="" method="POST" enctype="multipart/form-data">
        <div class="col-md-8">
            <div class="form-group hidden">
                <input type="text" name="id" class="form-control" value="<?php echo $user->id; ?>">
            </div>
            <div class="form-group">
                <label for="username">Username </label>
                <input type="text" name="username" class="form-control" value="<?php echo $user->username; ?>">
            </div>
            <div class="form-group">
                <label for="email">Email </label>
                <input type="text" name="email" class="form-control" value="<?php echo $user->email; ?>">
            </div>
            <div class="form-group hidden">
                <label for="password">New Password</label>
                <input type="password" name="password" class="form-control" size="60" value="<?php echo $user->password; ?>">
            </div>
            <div class="form-group hidden">
                <label for="passwordMatch">Type New Password Again</label>
                <input type="password" name="passwordMatch" class="form-control" size="60" value="<?php  ?>">
            </div>
            <div class="form-group">
                <input type="submit" name="update" class="btn btn-primary btn-lg" value="Update">
            </div>
        </div><!--Main Content-->
        <div class="col-md-4">
           
        </div>
    </form>
</div><!-- /.container-fluid -->