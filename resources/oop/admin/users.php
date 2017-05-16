<?php

class users {

    public function __construct(){
        $this->delete_user();
    }

    public function display_users(){
        $category_query = utility::query("SELECT * FROM users");
        utility::confirm($category_query);

        while($row = utility::fetch_array($category_query)){
            $user_id    = $row['user_id'];
            $username   = $row['username'];
            $email      = $row['email'];
            $password   = $row['password'];

$user = <<<DELIMETER
<tr>
    <td>{$user_id}</td>
    <td>{$username}</td>
    <td>{$email}</td>
    <td>    
        <a 
         class="btn btn-danger" 
         href="index.php?users&del={$row['user_id']}">
            <span class="glyphicon glyphicon-remove">
            </span>
        </a>
    </td>
</tr>
DELIMETER;
            echo $user;
        }
    }

    public function delete_user(){
        if(isset($_GET['del'])){
            $query = utility::query("DELETE FROM users WHERE user_id = ".utility::escape_string($_GET['del'])."");
            utility::confirm($query);
            utility::set_message("Users Deleted.");
            utility::redirect("index.php?users");
        } 
    }

    public function add_user(){
        if(isset($_POST['add_user'])){
            $username   = utility::escape_string($_POST['username']);
            $email      = utility::escape_string($_POST['email']);
            $password   = utility::escape_string($_POST['password']);
            $user_photo = utility::escape_string($_FILES['file']['name']);
            $photo_temp = utility::escape_string($_FILES['file']['tmp_name']);

            move_uploaded_file($photo_temp, UPLOAD_DIRECTORY.DS.$user_photo);

            $query = utility::query("INSERT INTO users(username,email,password,user_photo) VALUES('{$username}','{$email}','{$password}','{$user_photo}')");
            utility::confirm($query);

            utility::set_message("User Created.");

            utility::redirect("index.php?users");
        }
        
    }
}


?>