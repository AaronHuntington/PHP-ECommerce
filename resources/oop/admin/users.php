<?php

class users extends db_objects{

    protected static $db_table = "users";
    protected static $db_table_fields = array('id','username','email','password','user_photo');
    public $id;
    public $username;
    public $email;
    public $password;
    public $user_image;    

    public $filename;
    public $tmp_path;
    public $type;
    public $size;
    public static $img_directory = "../../resources/images/users/";
    public $image_placeholder = "http://placehold.it/400x400&text=image";

    public function __construct(){
    }

    public function del_user_img(){
        unlink(self::$img_directory.$this->id.".jpg");
    }

    public function add_user(){
        if(isset($_POST['add_user'])){
            $this->username   = utility::escape_string($_POST['username']);
            $this->email      = utility::escape_string($_POST['email']);
            $this->password   = utility::escape_string($_POST['password']);
            // $this->tmp_path   = $_FILES['user_image']['tmp_name'];



            /////////////////////////////////////////////////////////////

$this->save();

            $this->set_file($_FILES['user_image']);
            $this->upload_photo();

            // $target_path = RESOURCES_DIRECTORY."images/users/12.jpg";
            // utility::last_id();
            // move_uploaded_file($this->tmp_path, $target_path);

         


            // $this->save();
            // $new_id = $this->get_last_id("users");
            // $target_path = RESOURCES_DIRECTORY."images/users/".$new_id.".jpg";
            // move_uploaded_file($this->tmp_path, $target_path);










            /////////////////////////////////////////////////////////

            // $this->user_photo = utility::escape_string($_FILES['file']['name']);
            // $photo_temp = utility::escape_string($_FILES['file']['tmp_name']);

            // move_uploaded_file($photo_temp, UPLOAD_DIRECTORY.DS.$user_photo);

            // $query = utility::query("INSERT INTO users(username,email,password,user_photo) VALUES('{$username}','{$email}','{$password}','{$user_photo}')");
            // utility::confirm($query);

            // utility::set_message("User Created.");








            // $this->save();
            // utility::redirect("index.php?users");
        }
    }

    public function upload_photo(){
        if(!empty($this->errors)){
            // return false;
            echo 'aa';
        }

        if(empty($this->user_image) || empty($this->tmp_path)){
            $this->errors[] = "The file was not available.";
            // return false;
            echo 'bbb';
        }

        // $target_path = SITE_ROOT.'admin'.DS.$this->upload_directory.DS.$this->user_image;
        // $target_path = RESOURCES_DIRECTORY."images/users/1.jpg";
        
        $new_id = $this->get_last_id("users");
        $target_path = RESOURCES_DIRECTORY."images/users/".$new_id.".jpg";
        // move_uploaded_file($this->tmp_path, $target_path);

        var_dump($this->errors);

        if(file_exists($target_path)){
            $this->errors[] = "The file {$this->user_image} already exists";
            // return false;
            echo 'cccc';
        }

        if(move_uploaded_file($this->tmp_path, $target_path)){
            // if($this->create()){
                unset($this->tmp_path);
                echo 'yoyo';
                return true;
            // }
        } else {
            $this->error[] = "The file directory probably does not have permission.";
            // return false;
            echo 'ddd';
        }
    }//upload_photo()
}


?>