<?php 

class User extends Db_object {
    
    protected static $db_table = "users";
    protected static $db_table_fields = array('username','password','first_name','last_name');
    public $id;
    public $username;
    public $password;
    public $first_name;
    public $last_name;

    
  
    
    public static function verify_user($password,$username){
        
        global $database;
        
        $password = $database -> escape_string($password);
        
        
        $sql = "SELECT * FROM " . self::$db_table . " WHERE ";
        $sql .="username = '{$username}' ";
        $sql .="LIMIT 1"; 
        
        $the_result_array = self::find_by_query($sql);
        
        $user = !empty($the_result_array) ? array_shift($the_result_array) : false;

        if($user && password_verify($password,$user->password)) {

            return $user;

        } else {

            return false;
        }
        
    }



    
} // End of user class




?>