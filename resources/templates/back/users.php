<?php
    $users = users::find_all();

    if(isset($_GET["del"])){
        $id = $_GET["del"];
        $user = users::find_by_id($id);
        if($user){
            $user->delete();
            $user->del_user_img();
            utility::redirect("index.php?users");
        }
    }
?>
<div class="col-lg-12">
    <h1 class="page-header">
        Users
    </h1>
    <p class="bg-success">
        <?php utility::display_message(); ?>
    </p>
    <a href="index.php?add_user" class="btn btn-primary">Add User</a>
    <div class="col-md-12">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Username</th>
                    <th>Email</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($users as $user) : ?>
                    <tr>
                        <td><?php echo $user->id;?></td>
                        <td>
                            <a href="index.php?edit_user&id=<?php echo $user->id; ?>">    
                                <?php echo $user->username;?><br>
                                <img height="100" src="<?php echo "../../resources/images/users/".$user->id.".jpg"; ?>">
                            </a> 
                        </td>
                        <td><?php echo $user->email;?></td>
                        <td>    
                            <a 
                             class="btn btn-danger" 
                             href="index.php?users&del=<?php echo $user->id; ?>">
                                <span class="glyphicon glyphicon-remove">
                                </span>
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table> <!--End of Table-->
    </div>
</div>