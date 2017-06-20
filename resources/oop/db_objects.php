<?php

class db_objects{

    public $errors = array();
    public $upload_errors_array = array(
        UPLOAD_ERR_OK => "There is no error",
        UPLOAD_ERR_INI_SIZE => "The uploaded file exceeds the upload_max_file size directive",
        UPLOAD_ERR_FORM_SIZE => "The uploaded file exceeds the MAX_FILE_SIZE directive that",
        UPLOAD_ERR_PARTIAL => "The uploaded file was only partially uploaded.",
        UPLOAD_ERR_NO_FILE => "No file was uploaded",
        UPLOAD_ERR_NO_TMP_DIR => "Missing a temporary folder.",
        UPLOAD_ERR_CANT_WRITE => "Failed to write file to disk.",
        UPLOAD_ERR_EXTENSION => "A PHP extension stopped the file upload."
    );

    public function set_file($file){
        if(empty($file) || !$file || !is_array($file)){
            $this->errors[] = "There was no file uploaded here";
            // return false;
            echo '111';
        } elseif($file['error'] != 0){
            $this->errors[] = $this->upload_errors_array[$file['error']];
            // return false;
            echo "222";
        } else {
            $this->filename = basename($file['name']);
            $this->tmp_path = $file['tmp_name'];
            $this->type     = $file['type'];
            $this->size     = $file['size'];
            echo '333';
        }
    }//set_file()

    public static function find_all(){
        return static::find_by_query("SELECT * FROM ".static::$db_table."");
    }
    /*
        To use find_all() method for the front-end code example:
        $users = users::find_all();
    */

    public static function find_by_id($id){
        global $database;
        $the_result_array = static::find_by_query("SELECT * FROM ".static::$db_table." WHERE id=$id LIMIT 1");
        
        return !empty($the_result_array) ? array_shift($the_result_array) : false;
    }

    public static function get_last_id($table){
        global $database;
        // $the_result_array = $database->query("SELECT * FROM ".$table." ORDER BY id DESC LIMIT 1");
        $query = $database->query("SELECT * FROM ".static::$db_table." ORDER BY id DESC LIMIT 1");
        // $the_result_array = static::find_by_query("SELECT * FROM ".$table." WHERE id=1 LIMIT 1");

        
        // return !empty($the_result_array) ? array_shift($the_result_array) : false;  
        // return mysqli_fetch($the_result_array);     
        $result =  mysqli_fetch_assoc($query);   
        return $result['id'];
    }

    public static function find_by_query($sql){
        global $database;
        $result_set = $database->query($sql);
        $the_object_array  =array();

        while($row = mysqli_fetch_array($result_set)){
            $the_object_array[]= static::instantation($row);
        }
        return $the_object_array;
    }

    public static function instantation($the_record){
        $calling_class = get_called_class();

        $the_object = new $calling_class();

        // $the_object->id           = $found_user['id'];
        // $the_object->username     = $found_user['username'];
        // $the_object->password     = $found_user['password'];
        // $the_object->first_name   = $found_user['first_name'];
        // $the_object->last_name    = $found_user['last_name'];

        foreach($the_record as $the_attribute => $value){
            if($the_object->has_the_attribute($the_attribute)){
                $the_object->$the_attribute = $value;
            }
        }
        return $the_object;
    }

    private function has_the_attribute($the_attribute){
        
        //get_object_vars($this), gets all variables of this class. 
        $object_properties = get_object_vars($this);
        return array_key_exists($the_attribute, $object_properties);
    }

    protected function properties(){
        $properties = array();

        foreach(static::$db_table_fields as $db_field){
            if(property_exists($this, $db_field)){
                $properties[$db_field] = $this->$db_field;
            }
        }   
        return $properties;
    }

    protected function clean_properties(){
        global $database;

        $clean_properties = array();

        foreach($this->properties() as $key => $value){
            $clean_properties[$key] = $database->escape_string($value);
        }
        return $clean_properties;

    }

    public function save(){
        return isset($this->id) ? $this->update() : $this->create();
    }

    public function create(){
        global $database;

        $properties = $this->clean_properties();

        $sql = "INSERT INTO ".static::$db_table."(".implode(",", array_keys($properties)).") ";
        $sql .= "VALUES ('".implode("','", array_values($properties))."')";

        if($database->query($sql)){
            $this->id = $database->the_insert_id();
            return true;
        } else {
            return false;
        }
    }//create()

    /*
        CREATING using the create() for the front-end code example using users table:
        $this->username   = utility::escape_string($_POST['username']);
        $this->email      = utility::escape_string($_POST['email']);
        $this->password   = utility::escape_string($_POST['password']);
        $this->save();
    */

    public function update(){
        global $database;

        $properties = $this->clean_properties();

        $properties_pairs = array();

        foreach($properties as $key =>$value){
            $properties_pairs[] = "{$key}='{$value}'";
        }

        $sql = "UPDATE ".static::$db_table." SET ";
        $sql .= implode(", ", $properties_pairs);
        $sql .= "WHERE id= ".$database->escape_string($this->id);

        $database->query($sql);
            
        return (mysqli_affected_rows($database->connection) == 1) ? true : false;
    }//update()

    /*
        UPDATING (editing) in the front-end code example using users table:
        $user->id  = $_POST['id'];
        $user->username = $_POST['username'];
        $user->email    = $_POST['email'];
        $user->password = $_POST['password'];
        $user->save();        
    */

    public function delete(){
        global $database;

        $sql = "DELETE FROM ".static::$db_table." ";
        $sql .= "WHERE id=".$database->escape_string($this->id);
        $sql .= " LIMIT 1";

        $database->query($sql);

        return (mysqli_affected_rows($database->connection) == 1) ? true : false;
    }//delete()

    /*
        To use delete() in the front-end, code example using users table:
        $user = user::find_by_id($_GET['del']);
        if($user){
            $user->delete();
        }

    */

    public static function count_all(){
        global $database;

        $sql = "SELECT COUNT(*) FROM ".static::$db_table;
        $result_set = $database->query($sql);
        $row = mysqli_fetch_array($result_set);

        return array_shift($row);
    }

}//class db_object
 

?>