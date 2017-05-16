<?php

class admin_login {

    public $username;
    public $password;

    function __construct(){
        if(isset($_POST['submit'])){
            $this->username = utility::escape_string($_POST['username']);
            $this->password = utility::escape_string($_POST['password']);
            $this->login_user();
        }
    }

    function login_user(){
        $username = $this->username;
        $password = $this->password;

        $query = utility::query("SELECT * FROM users WHERE username='{$username}' AND password='{$password}'" );
        utility::confirm($query);

        if(mysqli_num_rows($query) == 0){
            utility::set_message("Your Password or Username are wrong.");
            utility::redirect("login.php");
        } else {
            $_SESSION['username'] = $username;
            // set_message('Welcome to Admin {$username}!');
            utility::redirect("admin");
        }
    }
}


?>