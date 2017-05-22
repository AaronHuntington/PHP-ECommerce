<?php

    class utility {

        //5/16/2017, Everytime I use this variable, it doesn't work.
        //This is used by only $this->display_image($picture) function.
        // public static $upload_directory = "uploads";

        public static function display_image($picture){
            $upload_directory = "uploads";

            //5/16/2017,Everytime I use this variable, it doesn't work.
            // $upload_directory = $this->upload_directory;

            return $upload_directory.DS.$picture;
        }
        public static function last_id(){
            global $connection;
            return mysqli_insert_id($connection);
        }
        public static function set_message($msg){
            if(!empty($msg)){
                $_SESSION['message'] = $msg;
            } else {
                $msg = "not work";
                $_SESSION['message'] = $msg;
            }
        }
        public static function display_message(){
            if(isset($_SESSION['message'])){
                echo $_SESSION['message'];
                unset($_SESSION['message']);
            }
        }
        public static function redirect($location){
            header("Location: $location ");
        }
        public static function query($sql){
            //Lets the public static function know that you are using a global variable inside its public static function. 
            global $connection;
            return mysqli_query($connection, $sql);
        }
        public static function confirm($result){
            global $connection; 
            if(!$result){
                die("QUERY FAILED " . mysqli_error($connection));
            }
        }
        public static function escape_string($string){
            global $connection;
            return mysqli_real_escape_string($connection, $string);
        }
        public static function fetch_array($result){
            return mysqli_fetch_array($result);
        }
        public static function del_folder($folder){
            self::clean_folder($folder);
            rmdir($folder);
        }
        public static function clean_folder($folder_path){
            $files = glob($folder_path.'/*');
            foreach($files as $file){
                if(is_file($file)){unlink($file);}
            }
        }
    }
?>
