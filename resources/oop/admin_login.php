<?php

class admin_login {

    public $username;
    public $password;

    function __construct(){
        if(isset($_POST['submit'])){
            $this->username = escape_string($_POST['username']);
            $this->password = escape_string($_POST['password']);
            $this->login_user();
        }
    }

    function login_user(){
        $username = $this->username;
        $password = $this->password;

        $query = query("SELECT * FROM users WHERE username='{$username}' AND password='{$password}'" );
        confirm($query);

        if(mysqli_num_rows($query) == 0){
            set_message("Your Password or Username are wrong.");
            redirect("login.php");
        } else {
            $_SESSION['username'] = $username;
            // set_message('Welcome to Admin {$username}!');
            redirect("admin");
        }
    }
}


?>